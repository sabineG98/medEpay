<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
tr:hover{ border:1px solid #F00;}
.button {border:hidden;display:inline-block;border-radius:4px;background-color:#069;color:#FFFFFF;text-align:center;font-size:16px;padding:7px;width:auto;transition: all 0.5s;cursor: pointer;margin: 2px;}
.button span {cursor: pointer; display: inline-block; position: relative; transition: 0.5s;}
.button span:after {content: 'Add'; position: absolute; opacity: 0; top: 0; right: -20px; transition: 0.5s;}
/* .button:hover span {padding-right: 25px;} */
.button:hover span:after {opacity: 1; right: 0;}
.test:hover{ background-color:#F4F4F4;}
input, select{border: 1px solid #069;  height:22px; padding-left:30px;  font-size:16px;}
</style>
</head>
<body>
<?php include('link.php');?>
<div>
<em><b>New Requisition</b></em>
<hr />
<table width="200" border="0">
<form action="req.php" method="post">
  <tr>
    <td>CODE:</td>
    <td bgcolor="#EEEEEE">  
    <?php 
	$code=0;
	$confirmed=0;
	 $per = "SELECT req_number,confirmed  FROM req_code ORDER BY time DESC LIMIT 1";
        $retvalper = mysqli_query($link,$per);
        if(! $retvalper )
           { die('Could not get data: ' . mysqli_error($link));  }                        
         while($rowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
				 $confirmed=$rowper['confirmed'];
                 $code=$rowper['req_number'];
	             }								 
				 if ($confirmed>0)
				 $code=$code+1;				 				 	
	?>                            
   <?php echo '<b>&nbsp;'.$code.'</b>'; ?> <input type="hidden" name= "code"  value="<?php echo $code; ?>" /></td>
  </tr>
  <tr>
    <td>Date:</td>
    <td><input type="text" name="date" value="<?php echo date('Y-m-d') ?>" /></td>
  </tr>
  <tr>
    <td>Comment</td>
    <td><textarea name="comment" rows="2" cols="30"></textarea></td>
  </tr>
   <tr>
    <td></td>
    <td><button class="button" ><span>Add</span></button></td>
  </tr>  
  </form>
</table>
</div>
<iframe  src="req_view.php"  class="test" style="border:0px solid #CCC;width: 100%; height: 300px;"></iframe>
</body>
</html>