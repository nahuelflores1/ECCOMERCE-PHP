<?php
require 'config-login.php';
require 'config.php';
require 'database.php';

// Obtener los datos del formulario
$product_name = $_POST['product_name'];
$product_description = $_POST['product_description'];
$product_precio = $_POST['product_precio'];

// Crear la consulta SQL
$sql = "INSERT INTO products_destacados (product_name, product_description, product_precio) 
        VALUES ('$product_name', '$product_description', '$product_precio')";

// Ejecutar la consulta
$resultado = mysqli_query($conn, $sql);

// Verificar si la consulta se ejecutó correctamente
if ($resultado) {
    echo '<script>alert("Registro guardado");</script>';
    echo '<script>window.location.href = "../main.php";</script>';
} else {
    echo '<script>alert("Error al guardar");</script>';
    echo '<script>window.location.href = "../main.php";</script>';
}
?>