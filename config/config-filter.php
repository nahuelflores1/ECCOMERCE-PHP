<?php
    $conn = new mysqli("localhost","root","","tienda_sneakers");
    if($conn->connect_error){
        die("Connection Erronea".$conn->connect_error);
    }
?>