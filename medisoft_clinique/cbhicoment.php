<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<title>:::Applications</title>
<style>
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 450px;
	height:350px;
	background-color:#FFF;
	color: #000;
	opacity:0.7;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    margin-left: 0px;
	transition-duration:1s;
	box-shadow: 0px 0px 5px 0px #000;
	border-bottom:5px solid #09F;
	border-top:5px solid #09F;

}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    bottom: 100%;
    left: 40%;
    margin-left: -13px;
    border-width: 0px;
    border-style: solid;
    border-color: transparent transparent white transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}
</style>


</head>
<body style="text-align:center;">


<div class="tooltip"><img  style="position:absolute; left: 250px; top: -13px; " src="img/app.png"  />
  <span class="tooltiptext">
  <em>Deduction</em>
  <br />
  <br />
  
  <iframe src="addcoment.php" style="width:99%; height:85%">
  </iframe>
  
  
  </span>
</div>

</body>
</html>
