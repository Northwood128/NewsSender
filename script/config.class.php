<?php
    
    class ConfigLoader{
       private $location = '../config/';
       private $userfile = '_config.ini';
       public $user_settings;
       public $amazon_settings;
        
       public function ConfigLoader($user){
           
           if ($user == 'amazon') {
               try {
                   $file = $this->location."amazon".$this->userfile;
				   $bool = file_exists($file);
                   if ($bool) {
                       $this->amazon_settings = parse_ini_file($file);
                   }
               }catch(Exception $e){
                   echo $e->getMessage();
               }
           }else{
               try{
                   $file = $this->location.$user.$this->userfile;
				   $bool = file_exists($file);
                   if ($bool) {
                       $this->user_settings = parse_ini_file($file);
                   }
               }catch(Exception $e){
                   echo $e->getMessage();
               }
           }
        }
        
       public function getUserSettings($index=NULL){
            if (isset($index)) {
                return $this->user_settings[$index];
            }else{
                return $this->user_settings;
            }
       }
       
       public function getAmazonSettings($index=NULL){
            if (isset($index)) {
                return $this->amazon_settings[$index];
            }else{
                return $this->amazon_settings;
            }
       }
    }
    
    $obj = new ConfigLoader('agustin');
    $set = $obj->getUserSettings();
    print_r($set);
?>