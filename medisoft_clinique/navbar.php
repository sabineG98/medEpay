</head>
<body id="home" class="text-dark">
   <nav class="navbar navbar-expand-sm bg-primary navbar-dark fixed-top show">
        <div class="container">            
            <?php 
               $noon=date('12:00:00');
               $evening=date('17:30:00');
               $now=date('H:i:s');
               if($now>$noon && $now<$evening)
               {
               echo'<a class="navbar-brand" href="userprofile.php?user='.$_SESSION['name'].'">Good Afternoon '.ucwords($_SESSION['name']).' !</a>'; 
               }
               elseif($now>$evening)
               {
               echo'<a class="navbar-brand" href="userprofile.php?user='.$_SESSION['name'].'">Good Evening '.ucwords($_SESSION['name']).' !</a>'; 
               }
               else
               {
               echo'<a class="navbar-brand" href="userprofile.php?user='.$_SESSION['name'].'">Good Morning '.ucwords($_SESSION['name']).' !</a>'; 
               } 
            ?>            
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon">
                           <?php
                            //   $products="SELECT count(msg) AS msgs FROM messages,users WHERE users.id=messages.from_id AND messages.to_id='$use_id' AND ifread=0 ORDER BY msg_date DESC";
                            //           $retval = mysqli_query($link,$products);
                            //           if(! $retval )
                            //              { die('Could not get data: ' . mysqli_error($link));  }                         
                            //            while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                            //                    {								 			 
                            //   						$msgs=$row['msgs'];
                            //   						if($msgs>0)
                            //   						{
                            //   							echo'<span class="badge blink badge-warning" style="background-color:#FF0; border-radius:60%; ">';
                            //   							echo $msgs;
                            //   							echo'</span>';
                            //   						}						
                            //   				 }
                          ?>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ml-auto">
                        <?php
                            if ($_SESSION['post']!='nurse' && $_SESSION['post']!='pharmacist' && $_SESSION['post']!='laboratin')
                                {
                            echo '<a href="home.php" class="nav-link text-dark"><span class="fas fa-home h3"></span> </a>';
                                }
                        ?>
                    </li>
                    <li class="nav-item ml-auto">
                        <a href="applications.php" class="nav-link text-dark"><i class="fas fa-qrcode h3"></i> </a>
                    </li>
                    <li class="nav-item ml-auto">
                        <a href="logout.php" class="nav-link text-dark"><i class="fas fa-power-off h3"></i> </a>
                    </li>
                    <!-- <li class="nav-item ml-auto">
                        <a href="inbox.php" onclick="return hs.htmlExpand(this, { objectType:'iframe', width:1400,height:600} )" class="nav-link text-dark"><i class="far fa-comment-alt h3"></i> 
                          <?php
                            //   $products="SELECT count(msg) AS msgs FROM messages,users WHERE users.id=messages.from_id AND messages.to_id='$use_id' AND ifread=0 ORDER BY msg_date DESC";
                            //           $retval = mysqli_query($link,$products);
                            //           if(! $retval )
                            //              { die('Could not get data: ' . mysqli_error($link));  }                         
                            //            while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                            //                    {								 			 
                            //   						$msgs=$row['msgs'];
                            //   						if($msgs>0)
                            //   						{
                            //   							echo'<span class="badge blink badge-warning" style="background-color:#FF0; border-radius:60%; ">';
                            //   							echo $msgs;
                            //   							echo'</span>';
                            //   						}						
                            //   				 }
                          ?>
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
   </nav>