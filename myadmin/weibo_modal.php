           <!--weibo_config-->
        <div class="modal fade" id="weibo-setconfig">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" class="close" data-dismiss="modal" type="button">&times;</button>
                        <h4 class="modal-title">
                          微博墙参数配置
                        </h4>
                      </div>
                      <div class="modal-body">
        <center><a href="index.php"><img width="200" height="70" src="images/logo-login%402x.png" /></a></center>
        <p></p>
        		<div class="alert alert-warning">
                      <button class="close" data-dismiss="alert" type="button">×</button>说明：<br>
					  1、微博名称:用于显示于微博端回复的欢迎头条。<br>
					  2、access_token:用于微博墙的获取用户信息，对接微博后出现。<br>
					  3、是否必须关注:开启后用户必须关注后才可参与。<br>
					  4、发私信上墙:开启后用户发私信可上墙。<br>

                    </div>
        <p></p>
        <form  method="post" action="shenhe.do.php?do=set_weibo_conf" enctype="multipart/form-data" >
          <div class="form-group" style="height:2.4em">
          <label class="control-label col-md-3" style="text-align:right;">微博名称:</label>
            <div class="col-md-8">
            <input class="form-control" name="nickname" value="<?=$weibo_config['nickname']?>" placeholder="用于显示于微博端回复的欢迎头条" type="text">
            </div>
          </div>
          <div class="form-group" style="height:2.4em">
          <label class="control-label col-md-3" style="text-align:right;">access_token:</label>
            <div class="col-md-8">
            <input class="form-control" name="access_token" value="<?=$weibo_config['access_token']?>" placeholder="用于显示于微博墙的关注号码" type="password">
          </div></div>
          <div class="form-group">
            <label class="control-label col-md-3">是否必须关注:</label>
            <div class="col-md-8">
               <div class="toggle-switch conf-switch" data-off="danger" data-on="success" style="margin-bottom:8px">
                <input <?php if ($weibo_config['folllow']){echo "checked";}?>  value="1" name="folllow"  type="checkbox">
              </div>
           </div>
         </div>
          <div class="form-group">
            <label class="control-label col-md-3">发私信上墙:</label>
            <div class="col-md-8">
               <div class="toggle-switch conf-switch" data-off="danger" data-on="success" style="margin-bottom:8px">
                <input <?php if ($weibo_config['letter']){echo "checked";}?>  value="1" name="letter"  type="checkbox">
              </div>
           </div>
         </div>
           <div class="form-group">
            <label class="control-label col-md-3" style="text-align:right;">二维码上传:</label>
            <div class="col-md-8">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new img-thumbnail" style="width: 150px; height: 150px;">
                  <img src="<?=$weibo_config['erweima']?>">
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
                <!--end weibo_config-->
