<?php include('head.php'); ?>
<title>.::USERS::.</title>
<?php include('navbar.php'); ?>

<div class="container">
  <div class="col-lg-12 mt-5">
    <div style="background-color:#ECF5FF !important;width:100%;opacity:1;position:relative;padding:2px;margin:1px 0;-webkit-box-shadow:inset 0 1px 4px rgba(0,0,0,.2);-webkit-border-radius:10px;box-shadow:0px 0px 5px #000;height:88vh;overflow:auto;">
      <div style="position:absolute;overflow:auto;background-color:#FFF;left:-1px;top:7px;width:100%;height:87vh;">
	  	 <div style="position:absolute;z-index:1;border-radius:0px 200px 10px 10px;width:120px;border:1px solid #09F;height:25px;background-color:#BDF;left:4px;top:10px;color:#000;padding-left:20px;padding-top:3px;"><b>USERS</b></div>
        <div style="width:99.2%;height:82vh;border-top:1px solid #09F;overflow:auto;position:absolute;background-color:#FFF;left:4px;top:35px;">
          <iframe style="position: absolute; overflow: auto; background-color: #FFF; left: -1px;top:0px;width:100%; height:81vh;border:0px solid #09F;" src="tabs-user.php"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('foot.php'); ?>