<?php
if (!function_exists('auth_request')) {
    function auth_request($url,$send_info){
        // api url
        $url = $url;
        // create a new cURL resource
        $ch = curl_init($url);

        //attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $send_info);

        //set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute the POST request
        $result = curl_exec($ch);
        //close cURL resource
        curl_close($ch);
        echo $result;

    }
}
else{
    echo "this function already use.";
}