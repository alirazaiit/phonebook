<?php
// $host = 'localhost';
// $username ='root';
// $password = '';
// $database = 'phonebook';
// $con = @mysqli_connect($host, $username, $password);
// if(!$con){
// 	die('could not connect'. mysqli_connect_error());
// }
// $dbcon= @mysqli_select_db( $database,$con);
// if(!$dbcon){
// 	$error = 'could not find database';
// 	die($error. mysqli_error($error));
// }





// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "phonebook";

// // Create connection
// $con = new mysqli($servername, $username, $password);

// // var_dump($con); exit;

// // Check con
// if ($con->connect_error) {
//   die("Connection failed: " . $con->connect_error);
// }
// else
// {
//   // echo "Connected successfully<br>";
// }




$con = new mysqli("localhost", "root", "", "phonebook");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
// $result = $con->query("SELECT contact_id FROM contactdetails");
// var_dump($result); exit;
// if ($result) {

//     /* determine number of rows result set */
//     $row_cnt = $result->num_rows;

//     printf("Result set has %d rows.\n", $row_cnt);

//     /* close result set */
//     $result->close();
// }

/* close connection */
// $mysqli->close();
// exit;
?>