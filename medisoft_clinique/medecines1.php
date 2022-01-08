<?php include('head.php'); ?>
<?php include('navbar.php'); ?>

<title>.::PHARMACY::.</title>
<div class="container">
  <div class="col-lg-12 mt-5">
    <div style="background-color:#ECF5FF !important;width:100%;opacity:1;position:relative;box-shadow:0px 0px 0px #888;padding:2px;margin:1px 0;box-shadow:inset 5px 5px 5px rgba(0,0,0,.2);-webkit-box-shadow:inset 0 1px 4px rgba(0,0,0,.2);-webkit-border-radius:10px;border-color:#000;box-shadow:0px 0px 5px #000;height:88vh;overflow:auto;">
      <div style="position:absolute;border:0px solid #09F;overflow:hidden;background-color:#FFF;left:-1px;top:7px;width:100%;height:87vh;">
	  	 <div style="position:absolute;z-index:1;border-radius:0px 200px 10px 10px;width:330px;border:1px solid #09F;height:25px;background-color:#BDF;left:4px;top:33px;color:#000;padding-left:20px;padding-top:3px;"><b>PHARMACY MANAGEMENT (MEDICINES)</b></div>
              <?php 
                // if ($_SESSION['phar']=='pharmacist' || $_SESSION['post']=='nurse' || $_SESSION['post']=='accountant' || $_SESSION['post']=='titulaire' || $_SESSION['post']=='admin' || $_SESSION['post']=='Verification')
                // {
                // echo '<form action="pharmacyx.php" method="post">
                // <button class="buttondist" style="position: absolute; color: white; left: 350px; top: 20px;" ><span>POINTAGE DE DISTRIBUTION</span></button>
                // </form>';
                // }
              ?>
         	<div style="width:99.5%;height:84vh;box-shadow:0px 0px 5px 0px #000;border:1px solid #09F;position:relative;background-color:#FFF;left:4px;top:60px;overflow:auto;">	
           <iframe style="border: 0px solid #09F; overflow: hidden; background-color: #FFF;width: 100%; height: 82vh;" src="tabs_phar.php"></iframe>
          </div>       
       </div>
      </div>
    </div>
  </div>
</div>

  <?php include('foot.php'); ?>