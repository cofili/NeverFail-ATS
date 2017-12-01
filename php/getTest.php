<?php
//COSC 4345.01
//Project: Never Fail System
//Team 5
//Fall 2017


//getTest.php
include('../adodb5/adodb.inc.php');
//request a test script to run from the php command/control.

//-----------------------------------------------------------------------------
//Get actions and variables from Java
if (isset($_GET["action"]) ) {

    //Define action
    $action = $_GET["action"];
    
    //Store variables
    $result = $_GET["result"]; 
    $resultDesc = $_GET["resultDesc"];
    $sutId = $_GET["sutId"];
    $testId=$_GET["testId"];
    $startTime = $_GET["startTime"];
    $testResultId = $_GET["testResultId"];
    $testId = $_GET["testId"];
    
    //Call functions
    if ( $action == "putResult") {
       putResult ($result, $newScript, $resultDesc, $testResultId);
    }
    else if($action == "getTest"){
         getTest($sutId, $testId);
    }
    
}


//------------------------------------------------------------------------------
//Function getTest: Create new row in database to populate with test results
function getTest($sutId, $testId){

    //Open a connection to the database
    $db = ADONewConnection('mysql'); // Create a connection handle to the local database
    $db->PConnect('localhost',  // Host to connect to
    'cosctea4_cosc',     // Database user name
    'CoscTea4;',             // Password
    'cosctea4_cosc4345');   // Database       
    
    
    //Insert new row in table
    $sql = "INSERT INTO `testResult` (sutId, testId, testStartDateTime, testStatus)  VALUES ($sutId,$testId, NOW(), 'IN PROGRESS') ";
    $rs = $db->Execute($sql);
        
        
    //Troubleshooting: print if inserted succesfully or if error
    if($rs) { print "<br> ----Inserted successfuly --- \n"; }
	elseif($rs == false){
	    print "<br> insert failed   <br> ";
	    echo "<br> ".$sutId;
	    echo "<br> ".$sql; }
	

}//end function getTest()
    
    
    
//------------------------------------------------------------------------------
//Function putResult: Populate the database with results from Java
function putResult($result, $newScript, $resultDesc, $testResultId){


    //Open a connection to the database
    $db = ADONewConnection('mysql'); // Create a connection handle to the local database
    $db->PConnect('localhost',  // Host to connect to
    'cosctea4_cosc',     // Database user name
    'CoscTea4;',             // Password
    'cosctea4_cosc4345');   // Database    

    //Update database with
    $sql ="UPDATE testResult SET testFinishDateTime = NOW()+1, testResult = '".$result."', testStatus = 'COMPLETED', testResultDescription = '".$resultDesc."' where testResultId = '".$testResultId."' ";
    $rs = $db->Execute($sql);
         

    //Send an email if test fails 
    if ($result) {
        $to = "azizabdullah24@gmail.c";
        $subject = "TEST FAILED";
        $txt = "NeverFail Automated System encountered an issue while running a test
            \nTest Result ID: "  .$testResultId.
            "\nTest Result: "  .$result.
            "\nTest Description: " .$resultDesc. "";
        $headers = "From: noreply@neverFail.com" . "\r\n" . 
            "CC: psamani@sedwards.edu";
    
        //Send the email
        mail($to,$subject,$txt,$headers);
    }
        

    //Troubleshooting: print if inserted succesfully or if error
    if($rs) { print "<br> ----Inserted successfuly --- \n";        
	    print("%result : <br>" .$result);
        print("<br>%result description--<br>".$resultDesc);	}
	elseif(!$rs){ $fmsg =" <br> SQL UPDATED [[ Failed ]]  "; 
        echo $fmsg;	}
	
	
}//end function putResult()



?>

     