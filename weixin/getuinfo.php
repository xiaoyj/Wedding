<?php

header("content-Type: text/html; charset=utf-8");
/*用户签到返还函数*/

$info=$_POST['uinfo'];
if(isset($info)){
    
include('../files/db.class.php');
    writeinto($info);
}else{
    die("非法请求！");
}
function randStr($len = 10){
 for($i=0;$i<$len;$i++){
 $rand .= mt_rand(0,9);
}
 return $rand;
}

function writeinto($info){
    $infoarr=json_decode($info,true);
    $flag=new M('flag');
    $count=$flag->find("openid='".$infoarr['openid']."'",'*','count');
    $sqlarr=array(
            "nickname"=>bin2hex($infoarr['nickname']),
            "avatar"=>$infoarr['headimgurl'],
            "fakeid"=>randStr(),
            "sex"=>$infoarr['sex'],
            "fromtype"=>'weixin',
            "datetime"=>time(),
            "flag"=>"2"
        );
    if(isset($infoarr['shadyphone'])){
        $shady=new M('cj_shady');
        $shadyarr=$shady->find("phone=".$infoarr['shadyphone']);
        if(empty($shadyarr)){
            $addarr=array(
                'phone'=>$infoarr['shadyphone'],
                'shady'=>$shadyarr['grade']
                );
            $sqlarr=array_merge($sqlarr, $addarr);  
        }
    }
    if($count){
        $savve=$flag->update("openid='".$infoarr['openid']."'",$sqlarr);
        
    }
    if($savve){
        echo "ok";
    }
    
}

?>