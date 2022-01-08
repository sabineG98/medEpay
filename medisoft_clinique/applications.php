<?php include('head.php'); ?>
<title>.::APPLICATIONS::.</title>
<?php include('navbar.php'); ?>

<div class="home-inner">
        <div class="container">                    
            <div class="row">
                <div class="col-lg-8 pt-4">
                 <div class="row insu">
                 <?php
                    if ($_SESSION['post']=='nurse' || $_SESSION['post']=='pharmacist')
                      {
                        echo '
                        <!--Spacing-->
                        <div class="col-lg-12 col-sm-12 d-none d-lg-block d-md-block">
                          <div class="card bg-default text-center pb-lg-4 pt-lg-4 pb-sm-1 pt-sm-1">
                            <div class="card-body">
                              <div class="d-none d-sm-none d-lg-block" style="width: 60px; height: 53px;"></div>
                              <h6 class="text-dark">&nbsp;</h6>
                            </div>                    
                          </div> 
                        </div>                        
                        <!--End Spacing-->
                        <div class="col-lg-3 col-sm-3">
                         <a href="pricingx.php"><div class="card bg-default text-center pb-lg-4 pt-lg-4 pb-sm-4 pt-sm-4 card-hover">
                          <div class="card-body">
                            <img style="width: 60px; height: 53px;" src="img/tarif.JPG"/>
                            <h6 class="text-dark">TARIFICATION</h6>
                          </div>                    
                         </div></a>  
                        </div>
                        <div class="col-lg-3 col-sm-3">
                         <a href="applications0.php"><div class="card bg-default text-center pb-lg-4 pt-lg-4 pb-sm-4 pt-sm-4 card-hover">
                          <div class="card-body">
                            <img style="width: 60px; height: 53px;" src="img/med.png"/>
                            <h6 class="text-dark">PHARMACY</h6>
                          </div>                    
                         </div></a>  
                        </div>
                        <div class="col-lg-3 col-sm-3">
                        <a href="applications1x.php"><div class="card bg-default text-center pb-lg-4 pt-lg-4 pb-sm-4 pt-sm-4 card-hover">
                          <div class="card-body">
                          <img style="width: 60px; height: 53px;" src="img/consult.png"/>
                          <h6 class="text-dark">CONSULTATION</h6>
                          </div>                    
                        </div></a>  
                        </div>
                        <div class="col-lg-3 col-sm-3">
                        <a href="report_cons.php"><div class="card bg-default text-center pb-lg-4 pt-lg-4 pb-sm-4 pt-sm-4 card-hover">
                          <div class="card-body">
                          <img style="width: 60px; height: 53px;" src="img/report.png"/>
                          <h6 class="text-dark">REPORTS</h6>
                          </div>                    
                        </div></a>  
                        </div>                        
                        <!--Spacing-->
                        <div class="col-lg-12 col-sm-12 d-none d-lg-block d-md-block">
                          <div class="card bg-default text-center pb-lg-4 pt-lg-4 pb-sm-1 pt-sm-1">
                            <div class="card-body">
                              <div class="d-none d-sm-none d-lg-block" style="width: 60px; height: 53px;"></div>
                              <h6 class="text-dark">&nbsp;</h6>
                            </div>                    
                          </div>
                        </div>                        
                        <!--End Spacing-->
                        ';
                      }else{?>
                     
                  <div class="col-lg-3 col-sm-3">
                   <a href="journal.php"><div class="card bg-default text-center pb-lg-4 pt-lg-4 pb-sm-3 pt-sm-3 card-hover">
                    <div class="card-body">                    
                    <img style="width: 60px; height: 55px;" src="img/Journal.png"/>
                    <h6 class="text-dark">CASHIER</h6>
                    </div>                    
                   </div></a>                  
                  </div>
                  <div class="col-lg-3 col-sm-3">
                  <a href="factures.php"><div class="card bg-default text-center pb-lg-4 pt-lg-4 pb-sm-4 pt-sm-4 card-hover">
                    <div class="card-body">
                    <img src="img/fac.JPG" width="61" height="56" />
                    <h6 class="text-dark">FACTURES</h6>
                    </div>                    
                   </div></a>
                  </div>
                  <div class="col-lg-3 col-sm-3">
                  <a href="revenuesx.php"><div class="card bg-default text-center pb-lg-4 pt-lg-4 pb-sm-4 pt-sm-4 card-hover">
                    <div class="card-body">
                    <img style="width: 70px; height: 53px;" src="img/income.jpg"/>
                    <h6 class="text-dark">REVENUES</h6>
                    </div>                    
                   </div></a>  
                  </div>
                  <div class="col-lg-3 col-sm-3">
                  <a href="medecines1.php"><div class="card bg-default text-center pb-lg-4 pt-lg-4 pb-sm-4 pt-sm-4 card-hover">
                    <div class="card-body">
                    <img style="width: 60px; height: 53px;" src="img/med.png"/>
                    <h6 class="text-dark">PHARMACY</h6>
                    </div>                    
                   </div></a>  
                  </div>
                  <div class="col-lg-3 col-sm-3">
                  <a href="laboratoryx.php"><div class="card bg-default text-center pb-lg-4 pt-lg-4 pb-sm-4 pt-sm-4 card-hover">
                    <div class="card-body">
                    <img style="width: 60px; height: 53px;" src="img/lab1.png"/>
                    <h6 class="text-dark">LABORATORY</h6>
                    </div>                    
                   </div></a>  
                  </div>
                  <div class="col-lg-3 col-sm-3">
                  <a href="pricingx.php"><div class="card bg-default text-center pb-lg-4 pt-lg-4 pb-sm-4 pt-sm-4 card-hover">
                    <div class="card-body">
                    <img style="width: 60px; height: 53px;" src="img/tarif.JPG"/>
                    <h6 class="text-dark">TARIFICATION</h6>
                    </div>                    
                   </div></a>  
                  </div>
                  <div class="col-lg-3 col-sm-3">
                  <a href="clients.php"><div class="card bg-default text-center pb-lg-4 pt-lg-4 pb-sm-4 pt-sm-4 card-hover">
                    <div class="card-body">
                    <img style="width: 60px; height: 53px;" src="img/client.JPG"/>
                    <h6 class="text-dark">HISTORIQUE</h6>
                    </div>                    
                   </div></a>  
                  </div>
                  <!-- <div class="col-lg-3 col-sm-3">
                  <a href="fiche-musax.php"><div class="card bg-default text-center pb-lg-4 pt-lg-4 pb-sm-4 pt-sm-4 card-hover">
                    <div class="card-body">
                    <img style="width: 60px; height: 53px;" src="img/report.png"/>
                    <h6 class="text-dark">REPORTS</h6>
                    </div>                    
                   </div></a>  
                  </div>                                      -->
                  <!-- <div class="col-lg-3 col-sm-3">
                  <a href="accessx.php"><div class="card bg-default text-center pb-lg-4 pt-lg-4 pb-sm-4 pt-sm-4 card-hover">
                    <div class="card-body">
                    <img style="width: 60px; height: 53px;" src="img/cbhi.jpg"/>
                    <h6 class="text-dark">VERIFICATION</h6>
                    </div>                    
                   </div></a>  
                  </div> -->
                  <div class="col-lg-3 col-sm-3">
                  <a href="usercontrol.php"><div class="card bg-default text-center pb-lg-4 pt-lg-4 pb-sm-4 pt-sm-4 card-hover">
                    <div class="card-body">
                    <img style="width: 60px; height: 53px;" src="img/users.png"/>
                    <h6 class="text-dark">USERS</h6>
                    </div>                    
                   </div></a>  
                  </div>
                  <!-- <div class="col-lg-3 col-sm-3">
                  <a href="consum-recx.php"><div class="card bg-default text-center pb-lg-4 pt-lg-4 pb-sm-4 pt-sm-4 card-hover">
                    <div class="card-body">
                    <img style="width: 60px; height: 53px;" src="img/cons-image.png"/>
                    <h6 class="text-dark">CONSUMABLES</h6>
                    </div>                    
                   </div></a>  
                  </div> -->
                  <div class="col-lg-3 col-sm-3">
                  <a href="consultationx.php?service=1"><div class="card bg-default text-center pb-lg-4 pt-lg-4 pb-sm-4 pt-sm-4 card-hover">
                    <div class="card-body">
                    <img style="width: 60px; height: 53px;" src="img/consult.png"/>
                    <h6 class="text-dark">CONSULTATION</h6>
                    </div>                    
                   </div></a>  
                  </div>
                <?php }  ?>

                  <div style="position:absolute;border-radius:0px 200px 10px 10px;width:200px;border:0px solid #09F;height:38px;background-color:#BDF;left:0px;top:1px;padding-left:10px;color:#000;padding-top:8px;"><b>APPLICATIONS</b></div>
                 </div>                   
                </div>
                <div class="col-lg-4">
                    <div class="card bg-primary text-left card-form">
                        <div class="card-body">          
                        <?php
                         if ($_SESSION['post']=='nurse' || $_SESSION['post']=='pharmacist')
                         	{  
                             echo '<iframe src="iframe.php" style="background-color: #FFF; font-size:22px; padding-left:10px; opacity: 0.7; border: 1px solid #09C; border-radius: 6px; height: 583px; width: 400px;"></iframe>';
                          }
                        ?>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   

<?php include('foot.php'); ?>