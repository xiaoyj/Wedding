$(function(){
    getmention();
   
});
function getmention(){
        $.get("weibo_plug/weibo_data.php?do=getmention", function(){
           setTimeout('getmention();', 20*1000);
        });
   }