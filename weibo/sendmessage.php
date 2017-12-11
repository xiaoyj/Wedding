<?php
function send($access,$content,$userid){
        $siurl = $_SERVER['HTTP_HOST'];
        $url = "http://www.weibiaozhi.com/weiboapi/sendmessage.php?siurl=$siurl";
        $post_data= "access_token=$access&userid=$userid&content=$content";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $output = curl_exec($ch);
      // var_dump($output);//全部消息
        curl_close($ch);
        return $output;
}

?>