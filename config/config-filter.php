<?php
    $con = new mysqli("localhost","root","","tienda_sneakers");
    if($con->connect_error){
        die("Connection Erronea".$con->connect_error);
    }
?>