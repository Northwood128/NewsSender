<?php
	//http://stackoverflow.com/questions/17316873/php-array-to-a-ini-file
	function arr2ini(array $a, array $parent = array()){
    	$out = '';
		foreach ($a as $k => $v){
    		if (is_array($v)){
	        	//subsection case
				//merge all the sections into one array...
				$sec = array_merge((array) $parent, (array) $k);
				//add section information to the output
				$out .= '[' . join('.', $sec) . ']' . PHP_EOL;
				//recursively traverse deeper
	    		$out .= arr2ini($v, $sec);
			} else {
    			//plain key->value case
				$out .= "$k=$v" . PHP_EOL;
        	}
    	}
    		return $out;
	}
	/*
	 * This script only works on POST requests
	 */
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$form = $_POST;
		
		$ini_file = "../config/amazon_config.ini";
		$ini_file_content = parse_ini_file($ini_file,true);
		
	    if ($form['formid'] == 'rds'){
			
			$ini_file_content['RDS']['endpoint'] = $form['rdsendpoint'];
			$ini_file_content['RDS']['username'] = $form['rdsusername'];
			$ini_file_content['RDS']['password'] = $form['rdspassword'];
			
			//For the moment, we rewrite the file everytime a config change is made
			$ini_fh = fopen($ini_file, 'w');
			$ser_ini_file_content = arr2ini($ini_file_content);
			$result = fwrite($ini_fh, $ser_ini_file_content);
			fclose($ini_fh);
			
			if (!$result) {
				header('Location: fail.php');
			}
			
	    }
		
		if ($form['formid'] == 'ses'){
			
			$ini_file_content['SES']['awsak'] = $form['awsak'];
			$ini_file_content['SES']['awssk'] = $form['awssk'];
			
			//For the moment, we rewrite the file everytime a config change is made
			$ini_fh = fopen($ini_file, 'w');
			$ser_ini_file_content = arr2ini($ini_file_content);
			$result = fwrite($ini_fh, $ser_ini_file_content);
			fclose($ini_fh);
			
			if (!$result) {
				header('Location: fail.php');
			}
			
	    }
	}
?>