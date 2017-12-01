<!-- Anthony Ofili-->

<?php
//Connection to the databse, queries and the result from queries

$connect = mysqli_connect("localhost", "cosctea4_cosc", "CoscTea4;", "cosctea4_cosc4345");

$query = "SELECT testScriptName, testResult, testResultDescription, testStartDateTime, testFinishDateTime,sutOS, sutDescription, TIMEDIFF(testFinishDateTime, testStartDateTime) diff FROM Test, testResult, SUT WHERE testResult.testId = Test.testId AND testResult.sutId = SUT.sutId";

$result = mysqli_query($connect, $query);

?> <!-- End of PHP -->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>NeverFail Testing System</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
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
<li><a class="active" href="http://cosc4345-team5.com/NeverFail.php">Home</a></li>
<li><a href="http://cosc4345-team5.com/UpdateSUT.php">System</a></li>
<li><a href="http://cosc4345-team5.com/UpdateTest.php">Test</a></li>
</ul>
<br /><br />
<div class="container">
        <img src ="NeverFail Logo.png" align="middle">
      <h3 align = "center"> NeverFail Test Log</h3>
      <p align = "center"> Record of all Tests run on the various SUTs</p>   
  <br />
      <div class ="table-responsive">
              <table id ="test_data" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Test Name</th>
                    <th>Test Result</th>
                    <th>Result Description</th>
                    <th>Test Start Time</th>
                    <th>Test End Time</th>
                    <th>SUT OS</th>
                    <th>SUT Description</th>
                     <th>Duration</th>
                  </tr>
                </thead>
                <tbody>
                    
                <?php //PHP Starting here
                while($row = mysqli_fetch_array($result))
                {
                    echo ' 
                    <tr>';
                    echo'
                    <td>' .$row["testScriptName"].'</td>
                    ';
                    if ($row['testResult'] == 'SUCCESS')
                    {
                        echo '<td class= "alert alert-success">'.$row["testResult"].'</td>';
                    } //end of if
                    else
                    {
                        echo '<td class= "alert alert-danger">'.$row["testResult"]. '</td>';
                    } //end of else
                    
                    echo '
                   
                     
                    <td>'.$row["testResultDescription"]. '</td>
                        <td>'.$row["testStartDateTime"]. '</td>
                        <td>'.$row["testFinishDateTime"]. '</td>
                        <td>'.$row["sutOS"]. '</td>
                        <td>'.$row["sutDescription"]. '</td>
                        <td>'.$row["diff"]. '</td>
                    </tr>
                    ';
                 }// end of while 
                ?> 
                
                  
                </tbody>
              </table>
      </div>
</div>

</body>
</html>

<script>//starts javascript code
$(document).ready(function(){
    $('#test_data').DataTable();
});

//end of javascript code
</script>


