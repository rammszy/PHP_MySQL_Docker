<?php

$connect = mysqli_connect(
    'mysql_db', #service name
    'root', #username
    'root', #password
    'mysql' #db table
);

$table_name = "Details";

$query = "SELECT * FROM $table_name";

$response = mysqli_query($connect, $query);


while($i = mysqli_fetch_assoc($response))
{
    echo "<p>" ."hello world, " , $i["FirstName"]. " " .$i['Surname']."</p>";
    echo "<hr>";
}