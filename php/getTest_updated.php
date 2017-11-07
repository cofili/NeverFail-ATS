<?php
// getTest(sutId)
// request a test script to run from the php command/control.
include('../adodb5/adodb.inc.php');
require "./DBConnection.php";
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
    
    $scriptName = $_GET["scriptName"];
    $newScript=$scriptName;
    
    
    if ($action == "putResult") {
        
       
       putResult ($result, $newScript, $resultDesc, $sutId);
      
    }
    elseif($action == "getTest"){
        getTest($testStart, $newTestId, $newSutId, $newScript);
        
    }
    
    
        
    }

    function getTest($testStart, $newTestId, $newSutId, $newScript){
    	 //global $lastTestId;
    	 // Open a connection to the database
     	 	
     	      $db = ADONewConnection('mysql'); // Create a connection handle to the local database
     		   $db->PConnect('localhost',  // Host to connect to
      		      	'cosctea4_cosc',     // Database user name
        		    'CoscTea4;',             // Password
        		    'cosctea4_cosc4345');   // Database       
        		   
        		  
        		   
        		   
        		   
        		$newTestId = 1;   
        		    
         $sql = "";
 
    	 $sql = "INSERT INTO testResult (testStartDateTime, testId, sutId)
    	 VALUES ( NOW() +1, '$newTestId', '$newSutId') ";
         $rs = $db->Execute($sql);
        
        /*
        $sql = "SELECT MAX(testResultID) FROM testResult";
         $result = mysql_query($sql);
         $rs = mysql_fetch_array($result);

        $lastTestId = $rs['testResultID'];   
          */
          
          
      // $lastTestId = $conn->lastInsertId();
        //if ($conn->query($sql) === TRUE) {
          //  $lastTestId = $conn->mysqli_insert_testResultID;
        //$rs = $db->Execute($sql);
        //$rs = $db->Execute($sql);

        
        if($rs) {
		print "<br> ----Inserted successfuly --- \n";
		print "<br> <br> scriptName".$newScript;
	}
	elseif($rs == false){
	    print "<br> insert failed   <br> scriptName".$newScript;
	}
	

}//enf function getTest()
    
    
    
    
    
    
    
    
    
     function putResult($result, $newScript, $resultDesc, $sutId){
    	 // Open a connection to the database
     	 	//global $lastTestId;	  
            
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
        		    
        		     
         $sql = ""; 
         
         /*
         $sql ="UPDATE testResult SET testResult = '".$newResult."', testResultDescription = '".$newResultDesc."' where sutId = 2  AND testResultID = '$lastTestId' ";
         $rs = $db->Execute($sql);
         */
         
          $sql ="UPDATE testResult SET testResult = '".$newResult."', testResultDescription = '".$newResultDesc."' where sutId = 2";
         $rs = $db->Execute($sql);
          
           /*
        $sql ="UPDATE testResult SET testResultDescription = '".$newResultDesc."' where sutId = 2";
         $rs = $db->Execute($sql);
         */

        $sql = "UPDATE testResult SET testFinishDateTime = NOW()+1 where testStartDateTime = NOW()";
        $rs = $db->Execute($sql);
        

        
       $sql = "UPDATE testResult SET testId = (select testId from Test where testScriptName LIKE '$newScript' ) where testStartDateTime = NOW()";
        $rs = $db->Execute($sql);
        
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

     