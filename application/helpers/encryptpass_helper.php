<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('convert_password')) {
    function convert_password($password)
    {
       return $encrypt_password = base64_encode($password);
    }

}
if (!function_exists('generate_activation_key')) {
    function generate_activation_key()
    {
        $key = openssl_random_pseudo_bytes(16);
        //Convert the binary data into hexadecimal representation.
        $key = bin2hex($key);
        return $key;
    }

}
    ?>