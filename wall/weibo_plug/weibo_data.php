<?php
if(isset($_GET['do'])){

	$do = $_GET['do'];

}else{

	die("invild action");

}
include_once('../../global.php'); 
include_once('files/db.class.php'); //连接类

	call_user_func($do);

function getmention(){
    $weibo=new M('weibo_config');
    $conf=$weibo->find();
    $wall_num=new M('wall_num');
    $maxid=$wall_num->find();
    $maxid=$maxid['lastmessageid'];
      if(empty($maxid)){
          $maxid=0;
      }
		    $url = "https://api.weibo.com/2/statuses/mentions.json?since_id=$maxid&access_token=".$conf['access_token'];
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);
	$arr=json_decode($output,true);
    $arr=$arr['statuses'];
   writeintowall($arr,$conf);
}
function writeintowall($arrs,$conf){
    if(!empty($arrs)){
    $config=new M('wall_config');
    $wallconf=$config->find();
    $wall_num=new M('wall_num');
   $wall_num->update('1',"`lastmessageid` = '".$arrs[0]['mid']."'");
    $wall=new M('wall');
    foreach($arrs as $arr){
        if($arr['user']['follow_me'] || !$conf['folllow']){
            if(empty($arr['bmiddle_pic'])){
                $arr['bmiddle_pic']=null;
            }
         $savve=$wall->add(array(
             "messageid"=>$arr['mid'],
             "fakeid"=>$arr['user']['id'],
             "num"=>"-1",
             "content"=>bin2hex($arr['text']),
             "nickname"=>bin2hex($arr['user']['screen_name']),
             "avatar"=>$arr['user']['avatar_large'],
             "ret"=>"0",
             "fromtype"=>"weibo",
             "image"=>$arr['bmiddle_pic'],//bmiddle_pic
             "datetime"=>time(),
             ));
             if(!$wallconf['shenghe']){
                 doshenhe($savve);
             }
        }else{
            if(!$arr['user']['follow_me']){
                include_once('weibo/sendmessage.php');
                $content="您好，需要关注后再发微博，才能够上墙的哟！";
                send($conf['access_token'],$content,$arr['user']['id']);
            }
        }
    }
    
        
    }
    
}
function doshenhe($cid){
	$sql_num="SELECT * FROM  `weixin_wall_num` ";
	$query_num=mysql_query($sql_num);
	$q=mysql_fetch_row($query_num);
	$num=$q[0];
	$sql_flg="SELECT * FROM  `weixin_wall` WHERE `id` = '$cid'";
	$query_num=mysql_query($sql_flg);
	$q=mysql_fetch_row($query_num);
	$fakeid=$q[2];
	$content=$q[4];
	$datetime=$q[10];
	$sql2="UPDATE  `weixin_flag` SET `status` =  '2',`content` = '$content',`datetime`='$datetime' WHERE `fakeid` = '$fakeid' and `status` !=  '1'";
	@$query2=mysql_query($sql2);
	$sql1="UPDATE  `weixin_wall` SET  `ret` =  '1',`num` = '$num' WHERE  `id` = '$cid'";
	$query1=mysql_query($sql1);
		if($query1){
		$sql_num="UPDATE `weixin_wall_num` SET `num` = `num`+1";
		$query_num=mysql_query($sql_num);
		}
	return 1;
}


?>