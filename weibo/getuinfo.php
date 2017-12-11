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

function writeinto($info){


    $infoarr=json_decode($info,true);
	$infos = serialize($info);

    $flag=new M('flag');
    $count=$flag->find("openid='".$infoarr['id']."'",'*','count');
    $sqlarr=array(
            "nickname"=>bin2hex($infoarr['nickname']),
            "avatar"=>$infoarr['headimgurl_large'],
            "fakeid"=>$infoarr['id'],
            "sex"=>$infoarr['sex'],
            "fromtype"=>'weibo',
            "datetime"=>time(),
            "flag"=>"2",
        );
		
		
	if($count){
	
	$savve=$flag->update("openid='".$infoarr['id']."'","`nickname` =  '".bin2hex($infoarr['nickname'])."',`avatar` =  '".$infoarr['headimgurl_large']."',`fakeid` =  '".$infoarr['id']."',`sex` =  '".$infoarr['sex']."',`fromtype` =  'weibo',`datetime` =  '".time()."',`flag` =  '2'");
        
    }
    if($savve){
        echo "ok";
    }
	
		
		
    if(isset($infoarr['shadyphone'])){
        $shady=new M('cj_shady');
        $shadyarr=$shady->find("phone=".$infoarr['shadyphone']);
        if(empty($shadyarr)){
			$addarr=array(
				'phone'=>$infoarr['shadyphone'],
				'shady'=>$shadyarr['grade']
				);
			$sqlarr=array_merge($sqlarr, $addarr);  
	        $savve=$flag->update("openid='".$infoarr['id']."'","`nickname` =  '".bin2hex($infoarr['nickname'])."',`avatar` =  '".$infoarr['headimgurl_large']."',`fakeid` =  '".$infoarr['id']."',`sex` =  '".$infoarr['sex']."',`fromtype` =  'weibo',`datetime` =  '".time()."',`flag` =  '2',`phone` =  '".$infoarr['shadyphone']."',`shady` =  '".$shadyarr['grade']."'");
		}
    }
      

    
}

?>