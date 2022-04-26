<?php

namespace App\Classes;

class Sms {

    private $user = '#####';
    private $pass = '#####';

    public function sendSms(string $msg){

        $user = $this->user;
        $pass = $this->pass;

        $url = 'https://smsapi.free-mobile.fr/sendmsg?user='.$user.'&pass='.$pass.'&msg='.$msg;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_exec($curl);
        curl_close($curl);

    }







}


?>