<head>
<style>
table{
	font-family: arial, sana-serif;
	border-collapse:collapse;
	width:100%;
	
}
td,th{
	border: 1px soild #dddddd;
	text-align:center;
	padding:8px;
	
}
tr:nth-child(even)
{
	background-color:#dddddd;
}

</style>
</head>
<?php
$x=$_POST['firstname'];
$y=$_POST['lastname'];
$servername="localhost";
$username="root";
$password="";
$dbname="db1";
  //Creation of Database//
$conn =new mysqli($servername,$username,$password,$dbname);

 //Check Connection//
if ($conn->connect_error)
{
	die("connection failed".connect_error);
}
echo "Connected successfully";

$sql="INSERT INTO user (fname,lname) VALUES('$x','$y')";

if($conn->query($sql) === TRUE)
{
	echo "New RECORD CREATED SUCCESSFULLY";
}
else
{
	echo "error" .$sql , "<br>" . $conn->error;
}
$sql = "SELECT id,fname,lname FROM user";
$result =$conn->query($sql);

if($result->num_rows >0){
	//Output data row wise//
echo "<table>"
	while($row = $result->fetch_assoc())
	{
		echo "<tr><td> id " . $row["id"]. "</td><td> Name" . $row["fname"]." ". $row["lname"]. "</td></tr>";
	}
echo "</table>";
}
    else{
		echo "0 result";
	}
	
$conn->close();

?>