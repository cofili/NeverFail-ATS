<?php

require_once "WebAPI.php";

if($_POST['remove'])
{
	deleteTests($testId);
	printHTML();
}
elseif($_POST['insertTests'])
{
	
	showTestsForm();
	
}
elseif($_POST['submitTests'])
{
    createTests($testDescription, $testScriptName);
    printHTML();
}
elseif($_POST['update'])
{
	updateTestsForm();
	printHTML();
}
elseif($_POST['updateTests'])
{
	updateTests();
	printHTML();
}
elseif (isset($_POST['cancel']))
{
    printHTML();
}
else
{
	printHTML();
}




function printHTML()
{
    print "<!DOCTYPE html> <!-- starts html document --> <html> <!-- starts html code -->

<head>
	<title> NeverFail Testing System </title> <!-- displays title of site on tab bar -->
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js'></script> <!-- this gives us access to google's api library for the Jquery plugin -->
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' /> <!-- this provides the style in bootstrap from bootstrap's website -->

	<!-- the following are links to sites that let us use the datatables plugin from datatables.net -->
	<script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script> <!-- this allows us to use the functionality of the datatales plugin -->
	<script src='https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'></script> <!-- this provides the formatting for the datatable using a stylesheet for bootstrap -->
	<link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css' /> <!-- this is the actual boostrap stylesheet -->
	<link href='./css/SysTA.css' rel='stylesheet'> <!-- This references the stylesheet for the sidebar -->
	<!-- Bootstrap core JavaScript -->
    <script src='vendor/jquery/jquery.min.js'></script>
    <script src='vendor/bootstrap/js/bootstrap.bundle.min.js'></script>
    <script src='./js/dataTable.js'></script>
    
      
      
      </head>
        <style>
        
        img{
     display: block;
     margin: 0 auto;
 }
 
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
</style>
</head>

<body>
<ul>
<li><a class='active' href='http://cosc4345-team5.com/NeverFail.php'>Home</a></li>
<li><a href='http://cosc4345-team5.com/UpdateSUT.php'>System</a></li>
<li><a href='#contact'>Test</a></li>
<li><a href='#about'>About</a></li>
</ul>
<br /><br />
        	

		<!-- Page Content -->
		<div id='page-content-wrapper'>
			<div class='container-fluid'>
			    <div class='container'>
			            <img src ='NeverFail Logo.png' align='middle'>
      <h3 align = 'center'> NeverFail Test Log</h3>
      <p align = 'center'> Record of all types of Tests that can be run on  various SUTs</p>   
  <br />

				<br /><br />
					<br />
					<div class='table-responsive'>
					
										<table id='test_data' class='table table-striped table-bordered' style='background-color:#f0f5f5'>
							<thead>
								<tr>
									<th>Test Description</th>
									<th>Test Script Name</th>
									<th>Delete</th>
									<th>Edit</th>
								</tr>
							</thead>
							    <tbody>";
                                returnTests();
print
"
                                </tbody>
                        </table>
		               </div>
		               <form method= 'post' action='".$_SERVER['PHP_SELF']."'>
                	   <input type='hidden' name= 'insert' value='$testDescription'/> 
                	  <button type='submit' value='Insert Test' name='insertTests' class='btn btn-info'>Insert New Test</button> 
            </form>
		               
                	</div>
                	
                </div>
            </div>
            
            
            
<!-- code for sidebar ends -->
	</div>
</body>

            

</div>
</html> <!-- ends html code -->
";
}



function showTestsForm()
{
	print
	        "  
	        <h2> Insert a Test </h2>
               <form method='post' enctype='multipart/form-data' class='form-horizontal'>
               <div class='form'>
  			    <input name='testDescription' class='form-control' placeholder='Enter Test Description' id='testDescription'> 
  			    <input name='testScriptName' class='form-control' placeholder='Enter Test Script Name' id='testScriptName'> 
  			   

  			   <br>  "; 
  			

  			
  	print		"   <input type='submit' value='Submit' name='submitTests'/>\n".
  			    "<input type = 'submit' value = 'cancel' name = 'cancel'/> \n";
  			
		"   </div>   \n".
		"   </form>  \n";
		

}

?>