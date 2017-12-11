<?php
function updateimg($date,$filename){
    if(!empty($_SERVER['HTTP_APPNAME'])){
        $weburl=saeup($date,$filename);
    }else{
        $weburl=commenup($date,$filename);
    }

        
    return $weburl;
}
function commenup($date,$filename){
            $path=dirname(__FILE__)."/../img/head/";
            //允许上传的文件格式 
        $tp = array("image/pjpeg","image/jpeg","image/png"); 
        //检查上传文件是否在允许上传的类型 
        if(!in_array($date["type"],$tp)) 
        { 
        echo "不能上传该文件格式"; 
        exit; 
        }//END IF 
        if($date["name"]) 
        { 
        $file1=$filename.'.jpg'; 
        //$file2 = $path.time().$file1; 
        //文件名称 取原文件名
        $file2 = $path.$file1; 
        }//END IF 
        $result=move_uploaded_file($date["tmp_name"],$file2); 
        return Web_ROOT.'/img/head/'.$file1;
}
function saeup($date,$filename){
    $storage = new SaeStorage();
    $domain = 'img';
    $destFileName = $filename.'jpg';
    $srcFileName = $_FILES['tmp_name'];
    $result = $storage->upload($domain,$destFileName,$date["tmp_name"]);
    return $result;
}