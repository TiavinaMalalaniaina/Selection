<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('bu')){
    function bu($url){
        $rs = base_url().$url;
        echo $rs;
    }
}
if(!function_exists('su')){
    function su($url){
        $rs = site_url().$url;
        echo $rs;
    }
}
?>