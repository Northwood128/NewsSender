<?php

//http://www.josephcrawford.com/php-articles/going-deep-inside-php-sessions/ 
class Session
{
    private $ses_id;
    private $db;
    private $table;
    private $ses_life;
    private $ses_start;
 
    private $fingerprintKey = 'sdfkj43545lkjlkmndsf89a*(&amp;(Nhnkj2h349*&amp;(';
    private $threshold = 25;
    static private $fingerprintChecks = 0;
 
    public function __construct($db, $table = 'sessions')
    {
        $this->db = $db;
        $this->table = $table;
    }
 
    public function open($path, $name)
    {
        $this->ses_life = ini_get('session.gc_maxlifetime');
    }
 
    public function close()
    {
        $this->gc();
    }
 
    public function read($ses_id)
    {
        $session_sql = "SELECT * FROM " . $this->_table. " WHERE ses_id = '$ses_id'";
        $session_res = $this->_db->Query($session_sql);
 
        if (!$session_res) return '';
 
        $session_num = $this->_db->NumRows($session_res);
        if ($session_num > 0)
        {
            $session_row = $this->_db->FetchArray($session_res);
            $ses_data = unserialize($session_row["ses_value"]);
            $this->_ses_start = $session_row['ses_start'];
            return $this->_ses_id = $ses_id;
        }
        else
        {
             return '';
        }
    }
 
    public function write($ses_id, $data) 
    {
        if(!isset($this->_ses_start)) $this->_ses_start = time();
        $session_sql = "SELECT * FROM ".$this->_table." WHERE ses_id='".$this->_ses_id."'";
        $res = $this->_db->Query($session_sql);
        if( $this->_db->NumRows($res) == 0 ) 
        {
            $session_sql = "INSERT INTO ".$this->_table." (ses_id, last_access, ses_start, ses_value) VALUES ('".$this->_ses_id."', ".time().", ".$this->_ses_start.", '".serialize($data)."')";
        }
        else
        {
            $session_sql = "UPDATE ".$this->_table." SET last_access=".time().", ses_value='".serialize($data)."' WHERE ses_id='".$this->_ses_id."'";
        }
 
        $session_res = $this->_db->Query($session_sql);
        if (!$session_res) return FALSE;
        else return TRUE;
    }
 
    public function destroy($ses_id)
    {
 
    }
 
    public function gc()
    {
        $ses_life = time() - $this->_ses_life;
        $session_sql = "DELETE FROM " . $this->_table. " WHERE last_access < $ses_life";
        $session_res = $this->db->Query($session_sql);
        if (!$session_res) return FALSE;
        else return TRUE;
    }
}
?>