<?php


    $servername = 'localhost';  // mysql服务器主机地址
    $username = 'root';            // mysql用户名
    $password = '666888aa';          // mysql用户名密码
    $dbname = 'justtry';
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql="insert into user values ('1','2')";

    $conn->query($sql);
    echo 'victory';



?>