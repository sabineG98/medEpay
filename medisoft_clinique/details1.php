<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Pure CSS Tabs with Fade Animation Demo 1</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="Author for Onextrapixel" />
		<link rel="shortcut icon" href="../file/favicon.gif"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />

		<!-- Edit Below -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="css/animate.min.css"></script>
    	<link href='css/animate.min.css' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/style1.css" />
		<script src="../file/js/modernizr.js"></script>
		<style type="text/css">
	      body, html {
	          height: 100%;
	          margin: 0;
	          -webkit-font-smoothing: antialiased;
	          font-weight: 100;
	          background: #aadfeb;
	          text-align: center;
	          font-family: helvetica;
	      }
		  
	      
	      .tabs input[type=radio] {
			  
	          position: absolute;
	          top: -9999px;
	          left: -9999px;
	      }
	      .tabs {
			 position:absolute;
		    top:1px;
	        width: 650px;
	        float: none;
	        list-style: none;
	        position: relative;
	        padding: 0;
	        margin: 75px auto;
	      }
	      .tabs li{
	        float: left;
	      }
	      .tabs label {
	          display: block;
	          padding: 10px 20px;
	          border-radius: 2px 2px 0 0;
	          color: #08C;
	          font-size: 16px;
	          font-weight: normal;
	          font-family: 'Roboto', helveti;
	          background: rgba(255,255,255,0.2);
	          cursor: pointer;
	          position: relative;
	          top: 3px;
	          -webkit-transition: all 0.2s ease-in-out;
	          -moz-transition: all 0.2s ease-in-out;
	          -o-transition: all 0.2s ease-in-out;
	          transition: all 0.2s ease-in-out;
	      }
	      .tabs label:hover {
	        background: rgba(255,255,255,0.5);
	        top: 0;
	      }
	      
	      [id^=tab]:checked + label {
	        background: #08C;
	        color: white;
	        top: 0;
	      }
	      
	      [id^=tab]:checked ~ [id^=tab-content] {
	          display: block;
	      }
	      .tab-content{
	        z-index: 2;
	        display: none;
	        text-align: left;
	        width: 100%;
	        font-size: 20px;
	        line-height: 140%;
	        padding-top: 10px;
	        padding: 15px;
	        color: white;
	        position: absolute;
	        top: 53px;
	        left: 0;
	        box-sizing: border-box;
	        -webkit-animation-duration: 0.5s;
	        -o-animation-duration: 0.5s;
	        -moz-animation-duration: 0.5s;
	        animation-duration: 0.5s;
	      }
	    </style>
	</head>
	<body>
    
    
		<div class="container">
			<!-- Top Navi -->
			<div class="main">
  <ul class="tabs">
			        <li>
			          <input type="radio" checked name="tabs" id="tab1">
			          <label for="tab1">Consultation</label>
			          <div id="tab-content1" class="tab-content animated fadeIn">
			          TAB1
                      </div>
			        </li>
                    
                    
                    
                    
			        <li>
			          <input type="radio" name="tabs" id="tab2">
			          <label for="tab2">Laboratoire</label>
			          <div id="tab-content2" class="tab-content animated fadeIn">
			          TAB2
                      </div>
			        </li>
                    
                    
                    
                    
			        <li>
			          <input type="radio" name="tabs" id="tab3">
			          <label for="tab3">Medicaments</label>
			          <div id="tab-content3" class="tab-content animated fadeIn">
                        TAB3
			          </div>
			        </li>
                    
                     <li>
			          <input type="radio" name="tabs" id="tab3">
			          <label for="tab3">Consomables</label>
			          <div id="tab-content3" class="tab-content animated fadeIn">
                        TAB3
			          </div>
			        </li>
                    
                    
                    
                    
                    
			    </ul>
	      	</div>
		</div><!-- Container -->
        
        
	</body>
</html>