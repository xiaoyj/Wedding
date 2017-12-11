<?php 
@header("Content-type: text/html; charset=utf-8");

session_start();

if(isset($_SESSION['views']) && $_SESSION['views'] == true){


} else {

$_SESSION['views'] = false;

echo "<script>window.location='../wall/login.php?url=".$_SERVER['PHP_SELF']."';</script>";
die;
}
if(isset($_GET["style"])){
    $style = $_GET["style"];
}else{
    $style ="jiuba";
}

include('db.php');
$conf=$wall_config->find();
/**
 * 
 * 以下为获取页面插件
 * 
 * qdq_switch	tinyint(1) [0]	 
cj_switch	tinyint(1) [0]	 
ddp_switch	tinyint(1) [0]	 
weibo_switch	tinyint(1) [0]	 
weixin_switch
 * */
if(file_exists("cjg_plug/cj_html.php") && $conf['cj_switch'])
 {  
        $cjg_plug=1;
        $cj_plug=0;
}else{
        $cjg_plug=0;
    if(file_exists("cj_plug/cj_html.php") && $conf['cj_switch']){
        $cj_plug=1;
		
    }else{
        $cj_plug=0;
    }
}

if(file_exists("ddp_plug/ddp_html.php") && $conf['ddp_switch'])
{
$ddp_plug=1;
}else{
$ddp_plug=0;
}

if(file_exists("vote_plug/vote_html.php") && $conf['voteopen']){
$vote_plug=1;
}else{
$vote_plug=0;
}

 if(file_exists("qdq_plug/qdq_html.php") && $conf['qdq_switch']){
$qdq_plug=1;
}else{
$qdq_plug=0;
}

 if(file_exists("../shake/index.php") && $conf['shakeopen']){
$shake=1;
}else{
$shake=0;
}
 if(file_exists("../api/weixin.php") && $conf['weixin_switch']){
    $weixin=1;
    $flag=new M('weixin_config');
    $weixinconf=$flag->find();
    $weixin_name=$weixinconf['nickname'];
    $dianplu_wxh =$weixinconf['dianplu_wxh'];
}else{
    $weixin=0;
}
 if(file_exists("../api/weibo.php") && $conf['weibo_switch']){
$weibo=1;
$flag=new M('weibo_config');
$weiboconf=$flag->find('id=1');
}else{
$weibo=0;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>天天掉馅饼大屏幕</title>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="../files/js/semantic.min.js"></script>
<script type="text/javascript" src="js/jquery.soChange-min.js"></script>
<script type="text/javascript"> 
if(document.all){
	alert("ie浏览器无法正常解析本页，请使用谷歌内核的流量器浏览。如（360浏览器，猎豹浏览器等）");
	window.history.back(-1); 
	//window.navigate("top.jsp"); 
	}
</script> 
<link rel="stylesheet" href="css/wxwall.css" type="text/css">
<link rel="stylesheet" href="css/emoji.css" type="text/css">
<link rel="stylesheet" href="../files/css/semantic.min.css" type="text/css">

<link rel="stylesheet" href="style/<?php echo $style?>/css/style.css" type="text/css">
</head>

    <body>

<?php
if(file_exists("style/".$style."/change.php"))
 {
include("style/".$style."/change.php");}
?>
<div class="main">
   <EMBED style=" z-index:-2;RIGHT: 250px; POSITION: absolute; TOP: 55px; absolute: " align=right src=".style/<?php echo $style?>/images/fl.swf" width=1600 height=625 type=application/x-shockwave-flash wmode="transparent" quality="high" ;></EMBED>
   <EMBED style="z-index:-2;LEFT: 250px; POSITION: absolute; TOP: 55px; absolute: " align=right src=".style/<?php echo $style?>/images/fl.swf" width=1600 height=625 type=application/x-shockwave-flash wmode="transparent" quality="high" ;></EMBED>

<div class="l"></div>
<div class="r"></div>
<div class="top" onClick="viewExplan();" data-position="right center" data-content="二维码，快捷键M">
	<?php 
		$i=1;
		for(;$i<20;$i++){
			if(file_exists('logo/'.$i.'.png')){
			}else{
				break;
			}
		}
		if ($i <= 2){
			echo '<div class="top-logo">';
		}else{
			echo '<div class="ui shape top-logo">';
		}
	
	?>
	<div class="sides">
	<?php 
		for($i=1;$i<20;$i++){
			if(file_exists('logo/'.$i.'.png')){
				if($i==1){
					echo '<img src="logo/1.png" width=455px height=135px class="active side"/>';
				}else{
					echo '<img src="logo/'.$i.'.png" width=455px height=135px class="side"/>';
				}
			}
		}
	
	?>
	</div>

</div>
<div class="kword ui shape ">
	<div class="sides">
		<div class="k active side">关注我们的官方账号<strong><?php echo $dianplu_wxh;?></strong> <br>发送<?php  echo $xuanzezu[0];?>您想说的话即可上墙！</div>

		<div class="k side"><?php  echo $xuanzezu[1];?></div>

		<div class="k side"><?php  echo $xuanzezu[2];?></div>
	</div>
</div>
</div>
    <div class="wall">
        <div class="left">
     
        </div>
      <div class="center">
            <div class="list">
                <ul id="list"></ul>
            </div>
            <div class="footer"></div>
        <div class="btns">
    
<?php 
if($qdq_plug)
 {
echo '<a href="javascript:void(0);" class="tooltip btnCheckin  btn-icon btn-checkin" title="签到墙，快捷键Q，【空格】开始" id="btnCheckin">签到墙</a>';
}
echo '<a onClick="viewstyle();" class="tooltip btnSkinSel  btn-icon btn-style" title="更换风格，快捷键F">风格选择</a>';
if($ddp_plug)
 {
echo '<a href="javascript:void(0);" class="tooltip btnDdp     btn-icon btn-pair " title="对对碰，快捷键D，【空格】开始">对对碰</a>';
}
if($shake)
 {
echo '<a href="../shake/index.php" class="tooltip btnCheckin  btn-icon btn-shake" target="_blank" title="摇一摇，快捷键Y">摇一摇</a>';
}
if($cj_plug || $cjg_plug)
 {
echo '<a  href="javascript:void(0);" class="tooltip btnLottery btn-icon btn-lottery "  title="抽奖，快捷键C，【空格】开始">抽奖</a>';
}
if($vote_plug)
 {
echo '<a href="javascript:void(0);" class="tooltip btnVote    btn-icon btn-vote " target="_blank" title="投票，快捷键T">投票</a>';
}
if(file_exists("style/".$style."/images/kuxuan.mp4"))
 {
echo "<i class=' bigbig volume off icon ' id='video-volume'></i>";}
 ?>

      </div></div>
        <div class="right"></div>
        
  </div>

<div class="ui transition hidden" onclick="viewstyle();"  id="style">

		  <div class="ui teal segment style-box">
		  
		<div class="ui ribbon teal label"><b style="font-size:3.4em;">互动墙风格选择</b></div>
    <div class="style-con">
   <?php 
   include 'style.php';
   $syl_num=count($sty_name);
   for($i=$syl_num;$i>=1;$i--){
   ?>
           <div class="style-img">
            <a href="<?php echo $sty_lnk[$i]?>" ><img src="<?php echo $sty_img[$i]?>" ></a>
            <div class="style-tx"><b><?php echo $sty_name[$i]?></b></div>
           </div>
   
   <?php }?>
 </div>
    </div>
</div> 
<!--抽奖层-->
<?php 
if($cjg_plug){
    include('cjg_plug/cj_html.php');
}else{
    if($cj_plug)
     {
        include('cj_plug/cj_html.php'); 
     }
}
?>
<!--对对碰层-->
<?php 
if($ddp_plug)
 {
include('ddp_plug/ddp_html.php');}
?>
<!--投票层-->
<?php 
if($vote_plug)
 {
include('vote_plug/vote_html.php');}
?>

<!--签到墙层-->
<?php 
 if($qdq_plug)
 {
include('qdq_plug/qdq_html.php');}
?>
<!--微博墙层-->
<?php 
 if($weibo && $weiboconf["mention"])
 {
include('weibo_plug/weibo_html.php');
     
 }
?>

<div class="mone" id="mone" onClick="viewOneHide();"><div class="leftside"><div class="part"><div class="pic"><img class="msgconimg" src="images/ma.jpg" width="100" height="100"></div><div class="username" style="color:#fff"><span style="color:#fff"></span></div></div></div><div class="rightside"><div class="rightmain"><div class="rconner"></div><span class="msgcon"></span></div></div></div>
    
 <div id="explan" onClick="viewExplan();" class="ui primary segment" >
     <div class="ui ribbon green label"><b style="font-size:50px;">上墙关注：</b></div>
    <div class="erweima">
    <center><div class="mabox">
        <?php 
            if($weibo){
                echo '<div class="pic"><center><a class="ui green label"><b style="font-size:2em;line-height: 1.7em;text-transform:lowercase;">微博:'.$weiboconf['nickname'].'</b></a></center><img src="'.$weiboconf['erweima'].'" width=362px height=362px;/></div>';
            }
            if($weixin){
                echo'<div class="pic"><center><a class="ui green label"><b style="font-size:2em;line-height: 1.7em;text-transform:lowercase;">微信:'.$dianplu_wxh.'</b></a></center><img src="'.$weixinconf['erweima'].'" width=362px height=362px;/></div>';
            }
            
        ?>
        
        
    </div></center>
    </div>
		<div class="ui bottom right attached label vote-right"><a class="ui black circular label" >×</a></div>
  </div>
  
</div>
<script type="text/javascript">
$(function(){
  $('.top').popup();
  $('.tooltip').popup();
$(document).keydown(function (event)
    {    
           if (event.keyCode == 77) {
				$('.top').click();
            }
			if(event.keyCode == 70){
				$('.btnSkinSel').click();
			}
<?php 
if($shake)
 {
echo "if(event.keyCode == 89){
				window.open('".Web_ROOT."/shake/');
			}";
	}
?>

    });  

});
var refreshtime =<?php echo $xuanzezu[23] ?>;
var len=4;
var cur=0;//当前位置
var mtime;
var data=new Array();
data[0]=new Array('0','../img/0.jpg','店谱网','欢迎来到互动墙!感受参与的乐趣！','','weibo');
//var word_id='96';
<?php 
$result = mysql_query('select num from `weixin_wall_num`');
$row = mysql_fetch_array($result,MYSQL_ASSOC);
$lastid = $row["num"] -5 ;
if($lastid < 0){
$lastid = 0;
}
?>
var lastid='<?=$lastid ?>';

function viewOneHide(){
	oopen=switchto(oopen,'mone');
}
function viewOne(cid,t)
{
        var str=$('#li'+cid);
		var onenickname = str.find("span").html();
		var oneword = str.find("word").text();
		var onesrc = str.find("img").attr('src');
		var oneimgsrc = str.find(".image").find("img").attr('src');
		if(typeof(oneimgsrc) == 'string'){
			$("#mone").find(".msgcon").html('<img src="'+oneimgsrc+'"/>');
		}else{
			$("#mone").find(".msgcon").text(oneword);
		}
        $("#mone").find("span").first().html(onenickname);
        $("#mone").find("img").first().attr('src',onesrc);
		oopen=switchto(oopen,'mone');
}
function viewExplan()
{

        $("#explan").transition('fade up');
}

function viewstyle()
{
        $("#style").transition('scale');
}
function messageAdd()
{
    if(cur==len)
    {
        messageData();
        return false;
    }
    if (data[cur][4] == ''){
        var str='<li id=li'+cur+' onclick="viewOne('+cur+',this);"><div class=m1><div class="'+data[cur][5]+' m2"><div class="pic"><img class="circular ui image " src="'+data[cur][1]+'" width="100" height="100" /><div class="bakico"><img  src="images/ico-'+data[cur][5]+'.png"/></div></div><div class="c f2"><span>'+data[cur][2]+'</span><span>：</span><word>'+data[cur][3]+'</word></div></div></div></li>';
        }
        else {
    var str='<li id=li'+cur+' onclick="viewOne('+cur+',this);"><div class=m1><div class="'+data[cur][5]+' m2"><div class="pic"><img class="circular ui image" src="'+data[cur][1]+'" width="100" height="100" /><div class="bakico"><img  src="images/ico-'+data[cur][5]+'.png"/></div></div><div class="c f2" style="width:57%"><span>'+data[cur][2]+'</span><span>：</span><word>'+data[cur][3]+'</word></div><div class="image"><img src="'+data[cur][4]+'"/></div></div></div></li>';
            }
            
            if(cur > 50){
                $("li").remove("#li"+(cur-50));
                }
    $("#list").prepend(str);
     $("#li"+cur).slideDown(600);
    if (data[cur][4] != ''){
		viewOne(cur,cur);
		window.setTimeout('viewOneHide();', 3000);
	}
    cur++;
    messageData();
}
function messageData()
{
    var url='api.php';
    $.getJSON(url,{lastid:lastid},function(d) {
        //alert(d);return;
        if(d['ret']==1)
        {
            $.each(d['data'], function(i,v){
                data.push(new Array(v['num'],v['avatar'],v['nickname'],v['content'],v['image'],v['fromtype']));
                lastid=v['num'];
                len++;
            });
        }else{
              //	alert('木有新消息..每5秒ajax一次');
                  window.setTimeout('messageData();', refreshtime*1000);
      }	
  });
}
window.onload=function()
{
  mtime=setInterval(messageAdd,refreshtime*1000);
  
  }
</script>
    <!--<li>
        <div class="l"></div>
        <div class="r">
            <span></span>
                    </div>
    </li>-->
    <script>

setInterval("$('.shape').shape('flip up');",5000);
      //头部文字切换
  

 
</script>
    <img class="bg" src="style/<?php echo $style?>/images/kuxuan.jpg"/>
</body>
</html>