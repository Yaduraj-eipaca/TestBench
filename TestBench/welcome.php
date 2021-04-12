<?php
session_start();

if(!$_SESSION['email'])
{

    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}

?>

<html>
<head>

    <title>
        Registration
    </title>
</head>

<body>
<h1>Welcome</h1><br>


<!-- to show the session email-->
<?php
echo $_SESSION['email'];
?>



<h3>You recently asked following doubts -</h3><br>



<!-- code to show question -->
<?php

////My code///////////
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, tdoubt, edoubt FROM question";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> question-id: ". $row["id"]. " | Title: ". $row["tdoubt"]. " | question: " . $row["edoubt"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();

//////////end of the my code ///////////

?>

<h1><a href="logout.php">Logout here</a> </h1>


</body>

</html>

