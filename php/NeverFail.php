<!-- Anthony Ofili-->

<?php
//Connection to the databse, queries and the result from queries

$connect = mysqli_connect("localhost", "cosctea4_cosc", "CoscTea4;", "cosctea4_cosc4345");

$query = "SELECT * FROM tests, testResult, SUT";

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
</head>

<body>
<br /><br />
<div class="container">
      <h3 align = "center"> NeverFail Test Log</h3>
      <p align = "center"> Record of all Tests run on the various SUTs</p>   
  <br />
      <div class ="table-responsive">
              <table id ="test_data" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Test Name</th>
                    <th>Test ID</th>
                    <th>Result ID</th>
                    <th>Test Result</th>
                    <th>SUT</th>
                    <th>Test StarTime</th>
                    <th>Test EndTime</th>
                    <th>SUT OS</th>
                  </tr>
                </thead>
                <tbody>
                    
                <?php //PHP Starting here
                while($row = mysqli_fetch_array($result))
                {
                    echo '
                    <tr>
                        <td>'.$row["testScriptName"]. '</td>
                        <td>'.$row["testResultId"]. '</td>
                        <td>'.$row["testId"]. '</td>
                        <td>'.$row["testResult"]. '</td>
                        <td>'.$row["sutId"]. '</td>
                        <td>'.$row["testStart"]. '</td>
                        <td>'.$row["testFinish"]. '</td>
                        <td>'.$row["sutOS"]. '</td>
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


