<?php
header('Access-Control-Allow-Origin: *'); 
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$from =@$_POST['from'];
	$to = @$_POST['to'];
	echo httpGet("smartfarm.ap-northeast-1.elasticbeanstalk.com/api/v1/sensors/c7c73254-ba1b-408e-a167-532c763445fb/data?",$from,$to);
}
		
		
function httpGet($url,$from,$to)
{
	$url = $url."from=".$from."&to=".$to;
    //echo $url;

	$ch = curl_init();  
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'GET');
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