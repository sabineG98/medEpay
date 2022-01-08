<?php include('head.php'); ?>
<title>.::JOURNAL::.</title>
<?php include('navbar.php'); ?>

<div class="container">
  <div class="col-lg-12 mt-5">
    <div style="background-color:#ECF5FF !important;width:100%;opacity:1;position:relative;box-shadow:0px 0px 0px #888;padding:2px;margin:1px 0;box-shadow:inset 5px 5px 5px rgba(0,0,0,.2);-webkit-box-shadow:inset 0 1px 4px rgba(0,0,0,.2);-webkit-border-radius:10px;border-color:#000;box-shadow:0px 0px 5px #000;height:79vh;overflow:auto;">
    <?php if($_SESSION['status']=='activated'){ ?>
      <iframe style="position:absolute;border: 0px solid #09F;overflow:hidden;background-color:#FFF;left:-1px;top:7px;width:100%;height:600px;" src="tabs-jour.php"></iframe>  
      <?php }else{ ?>
  <iframe style="position: absolute; border: 0px solid #09F; overflow: hidden; background-color: #FFF; left: 1px; top: 3px; width: 993px; height: 600px;" src="no.php"></iframe>
  <?php } ?>
    </div>
  </div>
</div>

<?php include('foot.php'); ?>