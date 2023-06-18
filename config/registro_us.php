<?php

include 'config-login.php';

$names = $_POST['names'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = "INSERT INTO user_db(names, email, password) VALUES('$names', '$email', '$password')";

$ejecutar = mysqli_query($conn, $query);

if ($ejecutar) {
    echo '
            <script>
                alert("Usuario creado exitosamente!");
                window.location = "../main.php";
            </script>
        ';
} else {
    echo '
            <script>
                alert("Intentalo denuevo, usuario no registrado");
                window.location = "../main.php";
            </script>
        ';
}

mysqli_close($conn);

?>