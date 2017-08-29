<?php
header('Access-Control-Allow-Origin: *'); 
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$from =@$_POST['from'];
	$to = @$_POST['to'];
	$type = @$_POST['type'];
	if($type == 'C1'){
		echo httpGet("smartfarm.ap-northeast-1.elasticbeanstalk.com/api/v1/sensors/e1f84974-9d57-4918-9979-72b560c92a0b/data?",$from,$to);
	}
	else if ($type == "C2"){
		echo httpGet("smartfarm.ap-northeast-1.elasticbeanstalk.com/api/v1/sensors/5551fb57-8166-48aa-b818-e6c87d500162/data?",$from,$to);	
	}
	else if ($type == "C4"){
		echo httpGet("smartfarm.ap-northeast-1.elasticbeanstalk.com/api/v1/sensors/ce2c4edd-9930-4189-8632-df264a90cd73/data?",$from,$to);	
	}
	else {
		echo "nothing!!!";
	}
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