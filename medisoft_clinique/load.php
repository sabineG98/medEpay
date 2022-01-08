<!DOCTYPE html>
 <html>
<head>
<title>AJAX | Project</title>
 <link href="project.css" rel="stylesheet"/>
 <script src="jquery.js"></script>

  </head>
 <body>


<div id="mainCon">

  <h1>Contact Book</h1>
<div id="form_input">
<form id="myform" method="post"    action="addrecord.php">

    <label for="fullname">Name:</label>
    <input type="text" name="fullname" id="fullname"/><span id="NameError">   </span>
    <br/>
    <label for="phonenumber">Phone Number:</label>
    <input type="text" id="phonenumber" name="phonenumber"><span   id="PhoneError"></span>

    <br />

<input id="buttton" type="submit" onClick="addnumber()" value="Add Phone   Number"/>
    <input type="button" id="show" value="the Results"/>
 </form>


</div>

    <div id="form_output">


    </div>


</div>
 <script src="project.js"></script>
 <script type="text/javascript">

 function addnumber(){

 var Fullname = document.getElementById("fullname").value;
var Phonenumber = document.getElementById("phonenumber").value;



 if(Fullname == ""){
document.getElementById("NameError").innerHTML = "Please Enter a valided Name";
}

if(Phonenumber == ""){
document.getElementById("PhoneError").innerHTML = "Please Enter a valided Name";
}

}

</script>
</body>
</html>