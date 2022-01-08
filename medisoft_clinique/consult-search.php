<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <?php
  $service=$_GET['service'];  
  ?>
  <script>
function getVote(int,service) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("poll").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","searching.php?client="+int+"&service="+service,true);
  xmlhttp.send();
}
</script>
  
    <style>
      .button {
        border:hidden;
        display: inline-block;
        border-radius: 4px;
        background-color:#069;
        color: #FFFFFF;
        text-align: center;
        font-size: 16px;
        padding: 7px;
        width: auto;
        transition: all 0.5s;
        cursor: pointer;
        margin: 2px;
      }

      .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
      }

      .button span:after {
        content: '»';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
      }

      .button:hover span {
        padding-right: 25px;
      }

      .button:hover span:after {
        opacity: 1;
        right: 0;
      }

      input, select{border: 1px solid #069;  height:22px; padding-left:30px;  font-size:16px;}
      tr:hover{ border:5px solid #F00;}

    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
  </head>

  <body>
   
    <div  style=" width:100% overflow:auto; box-shadow: 0px 0px 0px 0px #000; border: 0px solid #09F; position:absolute; background-color:#FFF; left: 4px; top: 1px;">
    <form action="consult-search.php" method="post">
        <input  type="text" placeholder="Insurance code, name,..." style="border: 1px solid #069;  height:30px; padding-left:30px;  font-size:16px;" autocomplete="off" name="client" value="" size="30" onKeyUp="getVote(this.value,<?php echo $service; ?>)"/>
        <!--<button class="button"  >Search</button>-->
    </form>
    <form action="consultationx.php?service=<?php echo $service; ?>" method="post" target="_parent">
    <div id="poll"></div>
       </form>
      <br />
    </div>
  </body>
</html>