<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<title>clock</title>
		<script type="text/javascript">
function startTime()
{
var today=new Date();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('txt').innerHTML=h+":"+m+":"+s;
t=setTimeout('startTime()',500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}
</script>
	</head>



<body onload="startTime()">

<!--<table width="300" height="51" border="1" bgcolor="#000" bordercolor="#FF0000">
  <tr>
    <td><font size="5" color="#fff" face="DigifaceWide">
    <div id="txt"></div></font></td>
  </tr>
</table>-->

<table style="height:53px;"  border="0"  bgcolor="" bordercolor="#000000">
  <tr>
    <td style=" color:red;"><font size="5" color="" face="DigifaceWide">
    <div id="txt"></div></font><b><b></td>
  
    <td><font size="5"  color="" face="DigifaceWide">,<?php echo date('d-M-Y') ?></font></td>
  </tr>
</table>


</body>
</html>