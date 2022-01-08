<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>



<script>
function showHint(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //document.getElementById("txtHint").innerHTML = this.responseText;
	  document.getElementById("frm1").submit();
    }
  };
  xhttp.open("GET", "cbhiupdate.php?q="+str, true);
  xhttp.send();   
}
</script>



</head>

<body>




<form  action="forminsert.php" method="POST">
<input type="hidden" value="777" name="test" />
fname<input type="text" id="text1" onblur="showHint(this.value)" name="fname" />
fname<input type="text" name="lname" />
<input type="submit" value="Go" />

</form>
<iframe src="yes.php" style="position:absolute; height:90%; left:0; width:99%;"></iframe>

</body>
</html>