<?php 
header('Access-Control-Allow-Origin: *');  
 
echo  $_SERVER['REQUEST_METHOD'];
if($_SERVER['REQUEST_METHOD'] == "POST"){
    
	if($_POST['check01'] == 1)
    {
		$on_off = "on";
	}
    else {
		$on_off = "off";
    }
	echo httpPut("smartfarm.ap-northeast-1.elasticbeanstalk.com/api/v1/controllers/21001722-ce96-4ebc-a0f3-cbca69a7caa4/",$on_off);
}


function httpPut($url,$on_off)
{
	$url = $url.$on_off;
		
    $ch = curl_init();  
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'PUT');
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
	curl_setopt($ch,CURLOPT_HTTPHEADER, array(
                                            'Content-Type: application/json',
                                            'apiKey: hsnl33564',
											'token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIzM2JmMGQzNi0wODQ5LTRhMmMtYjk4Mi0wOWU0NjQ1ZmUzMDYiLCJleHAiOjE0OTk2NzY4NjE0MDYsImlhdCI6MTQ5OTU5MDQ2MTQwNn0.7rUYjqGYT_U8gLzND8lSobcTWD2kt906hSsnjisfO58'
                                            ));
    $output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
}


?>