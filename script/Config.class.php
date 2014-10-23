<?php
    
    class ConfigLoader{
       private $location = '../config/';
       private $settings_file = '_config.ini';
       private $user_settings;
       private $amazon_settings;
	   private $app_settings;
        
       public function ConfigLoader($user=NULL){
           
           if ($user == 'amazon') {
               try {
                   $file = $this->location."amazon".$this->file;
				   $bool = file_exists($file);
                   if ($bool) {
                       $this->amazon_settings = parse_ini_file($file, true);
                   }
               }catch(Exception $e){
                   echo $e->getMessage();
               }
           }else{
               try{
                   $file = $this->location.$user.$this->settings_file;
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
	   
	   public function getDbSettings(){
	   		$this->app_settings = parse_ini_file("$this->location" . "app_config.ini",true);
			return $this->app_settings;
	   }
}
?>