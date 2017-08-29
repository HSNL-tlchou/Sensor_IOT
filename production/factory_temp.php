<?php
header('Access-Control-Allow-Origin: *'); 
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$from =@$_POST['from'];
	$to = @$_POST['to'];
	$type = @$_POST['type'];
	if($type == 'C1'){
		echo httpGet("smartfarm.ap-northeast-1.elasticbeanstalk.com/api/v1/sensors/5373ec64-5281-4191-bc0a-ccb46332c5ed/data?",$from,$to);
	}
	else if ($type == "C2"){
		echo httpGet("smartfarm.ap-northeast-1.elasticbeanstalk.com/api/v1/sensors/b3273439-82ea-455e-b76f-f77265e7db6e/data?",$from,$to);	
	}
	else if ($type == "C4"){
		echo httpGet("smartfarm.ap-northeast-1.elasticbeanstalk.com/api/v1/sensors/2027f970-b369-4f78-b10a-2f2358a5e3fe/data?",$from,$to);	
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