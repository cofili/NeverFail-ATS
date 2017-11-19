<?php
// getTest(sutId)
// request a test script to run from the php command/control.
include('../adodb5/adodb.inc.php');
//include('./DBConnection.php');
 //require "./AutomationTest.php";    
      if (isset($_GET["action"]) ) {

    $action = $_GET["action"];
    
    $result = $_GET["result"]; 
    $newResult = $result;
    
    $resultDesc = $_GET["resultDesc"];
    $newResultDesc=$resultDesc;
    
    $sutId = $_GET["sutId"];
    $newSutId = $sutId; 
    
    $testId=$_GET["testId"];
    $newTestId = $testId;
    
    $startTime = $_GET["startTime"];
    $newStartTime = $startTime;
    
    $testResultId = $_GET["testResultId"];
    $newTestResultId =  $testResultId;
    
    $testId = $_GET["testId"];
    
    
    if ( $action == "putResult") {
        
      
       putResult ($result, $newScript, $resultDesc, $testResultId);
      
    }
    if($action == "getTest"){
         getTest($sutId, $testId);
        
    }
    
    }

    function getTest($sutId, $testId){
    	 // Open a connection to the database
     	 	
     	      $db = ADONewConnection('mysql'); // Create a connection handle to the local database
     		   $db->PConnect('localhost',  // Host to connect to
      		      	'cosctea4_cosc',     // Database user name
        		    'CoscTea4;',             // Password
        		    'cosctea4_cosc4345');   // Database       
        		   
        		    //$startTime = $_GET["startTime"];
                    
        		    $sutId = $_GET["sutId"];
        		    $testId = $_GET["testId"];
                     
        		   
        		   
        		 
        		    
         
 
    	 $sql = "INSERT INTO `testResult` (sutId, testId, testStartDateTime)  VALUES ($sutId,$testId, NOW()) ";
          $rs = $db->Execute($sql);
        
        
        if($rs) {
		print "<br> ----Inserted successfuly --- \n";
		
	}
	elseif($rs == false){
	    print "<br> insert failed   <br> ";
	    
	    echo "<br> ".$sutId;
	    
	    echo "<br> ".$sql;
      
	}
	

}//enf function getTest()
    
    
    
    
    
    
    
    
    
     function putResult($result, $newScript, $resultDesc, $testResultId){
    	 // Open a connection to the database
     	 		  
                     
     	      $db = ADONewConnection('mysql'); // Create a connection handle to the local database
     		   $db->PConnect('localhost',  // Host to connect to
      		      	'cosctea4_cosc',     // Database user name
        		    'CoscTea4;',             // Password
        		    'cosctea4_cosc4345');   // Database    
        		    
        		    
                    $result = $_GET["result"];
                     $newResult = $result;
                     $resultDesc = $_GET["resultDesc"];
                    $newResultDesc = $resultDesc;
                    $testId=$_GET["testId"];
                      $newTestId = $testId;
                      $sutId = $_GET["sutId"];
                    $newSutId = $sutId; 
                    $testResultId = $_GET["testResultId"];
                    $newTestResultId =  $testResultId;
        		    
        		     
         
         
         $sql ="UPDATE testResult SET testResult = '".$newResult."', testResultDescription = '".$newResultDesc."' where testResultId = '".$newTestResultId."' ";
         $rs = $db->Execute($sql);
         

        $sql = "UPDATE testResult SET testFinishDateTime = NOW()+1 where testResultId = '".$newTestResultId."'";
        $rs = $db->Execute($sql);
        
        
        
        //$sql = "select testResult from testResult where testResultId = '".$newTestResultId."' ";
        //$rs = $db->Execute($sql);
           
        if ($newResult == "ERROR" ) {
               
                //Send email if test fails 
                $to = "palosamaniego@gmail.com";
                $subject = "TEST FAILED";
                $txt = "NeverFail Automated System encountered an issue while running a test
                
                \nTest Result ID: "  .$newTestResultId.
                "\nTest Result: "  .$newResult.
                "\nTest Description: " .$newResultDesc. 
                "";
                $headers = "From: Administrator@neverfail.com" . "\r\n" .
                "CC: psamani@sedwards.edu";
    
                mail($to,$subject,$txt,$headers);
        }

        
        

        
        if($rs ) {
	    
		print "<br> SQL UPDATED ---> \n";
	    print("%result : <br>" .$result);
        print("<br>%result description--<br>".$resultDesc);
        
	}
	elseif(!$rs){
	     $fmsg =" <br> SQL UPDATED [[ Failed ]]  "; 
            echo $fmsg;
            
            
	}
	
}//end function putResult()

  
    
    
    

?>

     