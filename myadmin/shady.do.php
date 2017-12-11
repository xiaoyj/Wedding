<?php
session_start();
if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){


} else {

$_SESSION['admin'] = false;

echo "<script>window.location='login.php';</script>";
}

@header("Content-type: text/html; charset=utf-8");

include("db.php");

if(isset($_GET['do'])){
	$do = $_GET['do'];
}else{

	die("invild action");

}
switch($do){

	    case "edit":
		edit();	
 		break;

	    case "delete":
		delete();	
 		break;
		
	    case "add":
		add();	
 		break;
		
		}

function add(){

$question = $_POST['phone'];
$daan1 = $_POST['grade'];

$sql_add="INSERT INTO `weixin_cj_shady` (`id`,`phone`,`grade`) VALUES (NULL,'$question','$daan1')";
	$succed=mysql_query($sql_add) or die(mysql_error());
echo "<script>alert('已经添加成功！');history.go(-1);</script>";

}

function edit(){

$cid = $_POST['cid'];
$value=$_POST['value'];
$name=$_POST['name'];

	$sql_flag="UPDATE  `weixin_cj_shady` SET  `{$name}` =  '{$value}' WHERE `id` = '{$cid}'";
	$succed=mysql_query($sql_flag) or die(mysql_error());

echo $value;
}

function delete(){
	$cid = $_GET['cid'];
	$sql_del="delete FROM `weixin_cj_shady` where `id` = '$cid'";
	mysql_query($sql_del);
	echo "<script>alert('已经删除成功！');history.go(-1);</script>";

}

	
	

?>