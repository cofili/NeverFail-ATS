<?php

//getNextTest.php
//Retrieves test information from the database
require "./AutomationTest.php";

// Process all key/value pairs that come with the $GET
if (isset($_GET["action"])) {

    $action = $_GET["action"];
    $test = new AutomationTest();     // Setup a test object
    $result = $test->getNextTest();	  // Retrive the test from the database
    $myJson = "Unknown Error";        // Setup json for the return info


    // Encode all of the test information
    if ($action == "getTest") {
        $myJson = json_encode($test->getTest()); }

	else if ($action == "getScriptName") {
		$myJson = json_encode($test->getScriptName()); }
	
	elseif($action == "getTestId") {
	    $myJson = json_encode($test->getTestId()); }
	
	elseif($action == "getTestResultId"){
	    $myJson = json_encode($test->getTestResultId()); }


	//Troubleshooting: return the json
	print "$myJson";
}

?>