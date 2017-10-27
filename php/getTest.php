<?php
// getTest(sutId)
// request a test script to run from the php command/control.

require "./DBConnection.php";
     
      if (isset($_GET["action"])) {

    $action = $_GET["action"];
     
    if ($action == "putResult") {
    $SUTId = $_GET["sutId"];
    $Result = $_GET["Result"];
    $description = $_GET["description"];
    updateResult ($SUTId, $Result, $description);
    }
    
    elseif($action == "getTest"){
        $scriptName = $_GET["scriptName"];
        getTest($scriptName);
    }
        
    }
	
     
    
        
        
    // Create connection



    function getTest($scriptName){
    	 // Open a connection to the database
     	 		  //
     		   $db = ADONewConnection('mysql'); // Create a connection handle to the local database
     		   $db->PConnect('localhost',  // Host to connect to
      		      	'cosctea4_cosc',     // Database user name
        		    'CoscTea4;',             // Password
        		    'cosctea4_cosc4345');   // Database    
    	$sql = "";  
        $sql ="select scriptName from tests ";
        $rs = $db->Execute($sql);
        
        
        
        if($rs == false) {
	
	
		print_r($rs);
		print "<br> SQL selected failed \n";
	}
	
	
	else{
	    while(!$rs->EOF){
	
	$scriptName = $rs->fields['scriptName'];
	
	print "sutId should run :" .$scriptName ; 
	"<br>".
	$rs->MoveNext();
	        }

	}
}//enf function getTest()
    
    
     function putResult($SUTId , $Result){
    	 // Open a connection to the database
     	 		  //
     		   $db = ADONewConnection('mysql'); // Create a connection handle to the local database
     		   $db->PConnect('localhost',  // Host to connect to
      		      	'cosctea4_cosc',     // Database user name
        		    'CoscTea4;',             // Password
        		    'cosctea4_cosc4345');   // Database    
    	$sql = "";  
        $sql ="INSERT INTO  'testResult' (testResult) values ('.$Result') WHERE sutId = '".$SUTId ."' ";
        $rs = $db->Execute($sql);
        
        if($rs == false) {
	
	
		print_r($rs);
		print "<br> SQL INSERTED failed \n";
	}
	
	
	else{
	    while(!$rs->EOF){
	
	$sutId = $rs->fields['sutId'];
	print "sutId:" .$sutId;
	print "logged result :" .$Result;
	$rs->MoveNext();
	        }

	}
}//enf function putResult()

    function updateResult($SUTID, $description){
        	 // Open a connection to the database
     	 		  //
     		   $db = ADONewConnection('mysql'); // Create a connection handle to the local database
     		   $db->PConnect('localhost',  // Host to connect to
      		      	'cosctea4_cosc',     // Database user name
        		    'CoscTea4;',             // Password
        		    'cosctea4_cosc4345');   // Database    
    	$sql = "";  
        $sql ="UPDATE testResult SET resultDescription = '".$description ."'   where sutId = '".$SUTId ."'";
        $rs = $db->Execute($sql);
        
        
        if($rs == false) {
	
	
		print_r($rs);
		print "<br> SQL UPDATED failed \n";
	}
	
    }
    
    
    

?>

     