           <!--weixin_config-->
        <div class="modal fade" id="weixin-setconfig">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" class="close" data-dismiss="modal" type="button">&times;</button>
                        <h4 class="modal-title">
                          微信墙参数配置
                        </h4>
                      </div>
                      <div class="modal-body">
        <center><a href="index.php"><img width="200" height="70" src="images/logo-login%402x.png" /></a></center>
        <p></p>
        		<div class="alert alert-warning">
                      <button class="close" data-dismiss="alert" type="button">×</button>说明：<br>
					  1、微信名称:用于显示于微信端回复的欢迎头条。<br>
					  2、微信号:用于显示于微信墙的关注号码。<br>
					  3、微信登录帐号:用于模拟登录微信公众平台的帐号。<br>
					  4、微信密码:用于模拟登录微信公众平台的密码。<br>

                    </div>
        <p></p>
        <form  method="post" action="shenhe.do.php?do=set_weixin_conf" enctype="multipart/form-data" >
          <div class="form-group" style="height:2.4em">
          <label class="control-label col-md-3" style="text-align:right;">微信名称:</label>
            <div class="col-md-8">
            <input class="form-control" name="nickname" value="<?=$weixin_config['nickname']?>" placeholder="用于显示于微信端回复的欢迎头条" type="text">
            </div>
          </div>
          <div class="form-group" style="height:2.4em">
          <label class="control-label col-md-3" style="text-align:right;">微信号:</label>
            <div class="col-md-8">
            <input class="form-control" name="xiaobai_wxh" value="<?=$weixin_config['xiaobai_wxh']?>" placeholder="用于显示于微信墙的关注号码" type="text">
          </div></div>
          <div class="form-group" style="height:2.4em">
          <label class="control-label col-md-3" style="text-align:right;">微信登录帐号:</label>
            <div class="col-md-8">
            <input class="form-control" name="username" value="<?=$weixin_config['username']?>" placeholder="用于验证微信端来源的帐号" type="text">
          </div></div>
           <div class="form-group" style="height:2.4em">
          <label class="control-label col-md-3" style="text-align:right;">微信登录密码:</label>
            <div class="col-md-8">
            <input class="form-control" name="password" value="<?=$weixin_config['password']?>" placeholder="用于验证微信端来源的密码" type="text">
          </div></div>
           <div class="form-group">
            <label class="control-label col-md-3" style="text-align:right;">二维码上传:</label>
            <div class="col-md-8">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new img-thumbnail" style="width: 150px; height: 150px;">
                  <img src="<?=$weixin_config['erweima']?>">
                </div>
                <div class="fileupload-preview fileupload-exists img-thumbnail" style="width: 150px; height: 150px"></div>
                <div style="float:left; color:red">请上传长宽尺寸小于500px、1:1、格式为jpg的二维码</div>
                <div>
                  <span class="btn btn-default btn-file"><span class="fileupload-new">选择图片</span><span class="fileupload-exists">更换</span><input name="erweima" type="file"></span>
                </div>
              </div>
            </div>
          </div>

          
          </div>
       
                      <div class="modal-footer">
                        <input class="btn btn-primary" type="submit" value="保存更改"><button class="btn btn-default-outline" data-dismiss="modal" type="button">Close</button>
                         </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--end weixin_config-->
