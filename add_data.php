<?php
$value = $_POST["value"];

// connect to database
$mysqli = new mysqli("localhost", "groupdek_axelino", "passwordeopoiki", "groupdek_axelino");

// query save data to database
$query = "INSERT INTO potensiometer (potensiometer) VALUES ('$value')";
$mysqli->query($query);

// close database connection
$mysqli->close();
?>
