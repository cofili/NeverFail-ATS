<!-- Anthony Ofili-->

<?php
// Web Api
// retrieves data fromthe database to input the Web UI table
//Connection to the databse, queries and the result from queries


function dbConnect()
{
    $servername = "localhost";
    $username = "cosctea4_cosc";
    $password = "CoscTea4;";
    $dbname = "cosctea4_cosc4345";


    $conn = new mysqli($servername, $username, $password, $dbname);
    //check if connection is established
    if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
    return $conn;
} 


function returnSUT()
{
    
    $sql = "Select sutID, sutOS, sutDescription, sutHardware FROM SUT";
    $conn = dbConnect();
	$result = $conn->query($sql);
	if($result->num_rows>0)
	{
		while ($row = $result->fetch_assoc())
		{
		    $sutID = $row['sutID'];
		    $sutOS = $row['sutOS'];
		    $sutDescription = $row['sutDescription'];
		    $sutHardware = $row['sutHardware'];


		    
		    
		    print
		    "
            <tr>
                <td> $sutOS </td>
                <td> $sutDescription </td>
    			<td> $sutHardware </td>

    			<td> 	 
    			        <form method= 'post' action '".$_SERVER['PHP_SELF']."'>\n
                		 <input type='hidden' name= 'id' value='$sutID'/>\n 
                		 <button type='submit' value='Remove' name='remove' class='btn btn-danger'>Delete</button>
                		 </form>
                		 
                </td>
                <td> 	 
                        <form method= 'post' action '".$_SERVER['PHP_SELF']."'>\n
                		 <input type='hidden' name= 'uID' value='$sutID'/>\n 
                		 <button type='submit' value='Update' name='update' class='btn btn-primary'>Update SUT</button>
                		 </form>
                </td>
			
			</tr>";
    			
		}
    }
}



//returns a created SUT
function createSUT()
{

	$sutOS = $_POST['sutOS'];
	$sutDescription = $_POST['sutDescription'];
	$sutHardware = $_POST['sutHardware'];
	
	
	
	

	$sql = "INSERT INTO SUT (sutHardware, sutDescription ,sutOS) VALUES('$sutHardware', '$sutDescription' , '$sutOS' )";
	$conn = dbConnect();
	$result = $conn->query($sql);

	if ($result=== TRUE)
	{
		echo "";
	}
	else
	{
		echo "";
	}


}//end of function


function deleteSUT($sutID)
{
	$sutID = $_POST['id'];
	$sql = "delete from SUT where sutID = $sutID";
	$conn = dbConnect();
	$result = $conn->query($sql);


	if ($result == TRUE)  //checks if entry was successfully deleted
	{
				
		echo "";			
		
	}
	else
	{
		echo "";
	}

}//end of function



function updateSUTForm()
{
		$uID = $_POST['uID'];
		$conn = dbConnect();
		$usql = "select * from SUT where sutID = '$uID'";
		$result = $conn->query($usql);
		$row = $result->fetch_assoc();
		$sutOS = $row['sutOS'];
		$sutDescription = $row['sutDescription'];
		$sutHardware = $row['sutHardware'];
		
		print
		"
            <form method='post' enctype='multipart/form-data' class='form-horizontal'>
               <div class='form'>
  			
  			   <input name='sutOS' class='form-control' value='$sutOS' id='sutOS'> 
  			   <br>   
  			   <input name='sutDescription' class='form-control' value='$sutDescription' id='sutDescription'>  
  			   <br>   
  			   <input name='sutHardware' class='form-control' value='$sutHardware' id='sutHardware'> 
  			
  			   <br>   
  			
            <input type='hidden' name= 'uID' value='$uID'/>
          	<input type='submit' value='Submit' name='updateSUT'/>
          	<button type='cancel' value='cancel'>Cancel</button>
";
}


function updateSUT()
  {
  		$conn = dbConnect();
  		$uID = $_POST['uID'];
  		$sutOS = $_POST['sutOS'];
		$sutDescription = $_POST['sutDescription'];
		$sutHardware = $_POST['sutHardware'];
		$sql = "UPDATE SUT SET sutOS='$sutOS', sutDescription='$sutDescription', sutHardware='$sutHardware' WHERE sutID = '$uID'";
		$result = $conn->query($sql);
		if ($result===true)
		{
			echo "";
		}
		else
		{
			echo "";


		}

}//end of function

// END OF SUT API





// START OF TEST API

function returnTests()
{
    
    $sql = "Select testId, testDescription, testScriptName FROM Test";
    $conn = dbConnect();
	$result = $conn->query($sql);
	if($result->num_rows>0)
	{
		while ($row = $result->fetch_assoc())
		{
		    $testId = $row['testId'];
		    $testDescription = $row['testDescription'];
		    $testScriptName = $row['testScriptName'];
		    


		    
		    
		    print
		    "
            <tr>
                <td> $testDescription </td>
                <td> $testScriptName </td>

    			<td> 	 
    			        <form method= 'post' action '".$_SERVER['PHP_SELF']."'>\n
                		 <input type='hidden' name= 'id' value='$testId'/>\n 
                		 <button type='submit' value='Remove' name='remove' class='btn btn-danger'>Delete</button>
                		 </form>
                		 
                </td>
                <td> 	 
                        <form method= 'post' action '".$_SERVER['PHP_SELF']."'>\n
                		 <input type='hidden' name= 'uID' value='$testId'/>\n 
                		 <button type='submit' value='Update' name='update' class='btn btn-primary'>Update Test</button>
                		 </form>
                </td>
			
			</tr>";
    			
		}
    }
}


//returns a created Tests
function createTests()
{

    $testDescription = $_POST['testDescription'];
    $testScriptName = $_POST['testScriptName'];
	
	

	$sql = "INSERT INTO Test (testDescription, testScriptName) VALUES('$testDescription', '$testScriptName')";
	$conn = dbConnect();
	$result = $conn->query($sql);

	if ($result=== TRUE)
	{
		echo "";
	}
	else
	{
		echo "";
	}


}//end of function





function deleteTests($testId)
{
	$testId = $_POST['id'];
	$sql = "delete from Test where testId = $testId";
	$conn = dbConnect();
	$result = $conn->query($sql);


	if ($result == TRUE)  //checks if entry was successfully deleted
	{
				
		echo "";			
		
	}
	else
	{
		echo "";
	}

}//end of function


function updateTestsForm()
{
		$uID = $_POST['uID'];
		$conn = dbConnect();
		$usql = "select * from Test where testId = '$uID'";
		$result = $conn->query($usql);
		$row = $result->fetch_assoc();
		$testDescription = $row['testDescription'];
		$testScriptName = $row['testScriptName'];
		
		print
		"
            <form method='post' enctype='multipart/form-data' class='form-horizontal'>
               <div class='form'>
  			
  			   <input name='testDescription' class='form-control' value='$testDescription' id='testDescription'> 
  			   <br>   
  			   <input name='testScriptName' class='form-control' value='$testScriptName' id='testScriptName'>  
  			   <br>   
  			
            <input type='hidden' name= 'uID' value='$uID'/>
          	<input type='submit' value='Submit' name='updateTests'/>
          	<button type='cancel' value='cancel'>Cancel</button>
";
}


function updateTests()
  {
  		$conn = dbConnect();
  		$uID = $_POST['uID'];
  		$testDescription = $_POST['testDescription'];
		$testScriptName = $_POST['testScriptName'];
		$sql = "UPDATE Test SET testDescription='$testDescription', testScriptName='$testScriptName'WHERE testId = '$uID'";
		$result = $conn->query($sql);
		if ($result===true)
		{
			echo "";
		}
		else
		{
			echo "";


		}

}//end of function




?>