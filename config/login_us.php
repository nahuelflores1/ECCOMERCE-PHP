<?php
include 'config-filter.php';

$email = $_POST['email'];
$password = $_POST['password'];

$validar_login = mysqli_query($conn, "SELECT * FROM user_db WHERE email='$email' 
    and password='$password'");

if (mysqli_num_rows($validar_login) > 0) {
    header("location: ../main.php");
} else {
    echo '<script>
            alert("No existe usuario");
            window.location = "../main.php";
        </script>';
}
?> 

