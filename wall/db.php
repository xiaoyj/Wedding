<?php
@header("Content-type: text/html; charset=utf-8");
        include(dirname(__FILE__).'/../files/db.class.php');
        $wall_config=new M('wall_config');
        $xuanzezu=$wall_config->find('1','*','','row');
        $link= M::$wlink;
        
define("Web_ROOT",$xuanzezu[31]);
?>