<?php include('navigation.php');
 ?>      <!-- End Navigation -->

 <div class="container main-content">

		<div class="row">
            <div class="stats-container">
                <div class="col-lg-12  ">
                    <h2 class="user-name" style="color:#0000CC">微信墙配置信息：</h2>
		          <b><h2 class="user-name">URL:&nbsp;<?php 
				  echo "http://".$_SERVER['HTTP_HOST']."/api/weixin.php";
				  ?></h2></b>
                 <b><h2 class="user-name"> TOKEN:&nbsp; dianplu</h2></b>

                </div>
            </div>
        </div>
		<div class="row">
            <div class="stats-container">
                <div class="col-lg-12  ">
                    <h2 class="user-name" style="color:#0000CC">微博墙配置信息：</h2>
		          <b><h2 class="user-name">URL:&nbsp;<?php 
				  echo "http://".$_SERVER['HTTP_HOST']."/api/weibo.php";
				  ?></h2></b>
                 <b><h2 class="user-name"> APPKEY:&nbsp; 2844897078</h2></b>
				 <br />
                 <b><h2 class="user-name">提交后复制access_token</h2></b>
                </div>
            </div>
        </div>

		<div class="row">
            <div class="col-lg-12">
             <center>
                <img width="30%" src="images/banner.png"/>
                </center>
            </div>
        </div>


  </div>
</div>
    </div>
  </body>

</html>