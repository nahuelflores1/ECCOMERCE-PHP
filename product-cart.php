<?php

require './config/config.php';
require './config/database.php';

$db = new Database();
$con = $db->conectar();

$producto = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

$lista_carrito = array();

if ($producto != null) {
    foreach ($producto as $clave => $cantidad) {
        $table = substr($clave, 0, 1) === 'D' ? 'products_destacados' : 'products_shoes';
        $id = substr($clave, 1); 
        $sql = $con->prepare("SELECT id, product_name, product_precio, product_image FROM $table WHERE id=:id");
        $sql->execute([':id' => $id]);
        $producto_carrito = $sql->fetch(PDO::FETCH_ASSOC);


        $sql = $con->prepare("SELECT id, product_name, product_precio, product_image FROM products_destacados WHERE activo=1");
        $sql->execute();
        $resultado_oferta = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($producto_carrito) {
            $producto_carrito['cantidad'] = $cantidad;
            $lista_carrito[] = $producto_carrito;
        }
    }

}

$sql = $con->prepare("SELECT id, product_name, product_precio, product_image FROM products_destacados WHERE activo=1");
$sql->execute();
$resultado_oferta = $sql->fetchAll(PDO::FETCH_ASSOC);

//session_destroy();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ken block Cars, Ken Garage, Life of Kenblock, Shop Kenblock">
    <meta name="keywords" content="Cars, kenblock, Hoonigan Racing, Motorbikes, Garage, high performance ">
    <meta name="author" content="hoonigan racing">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/ECCOMERCE/css/main.css">
    <link rel="stylesheet" href="http://localhost/ECCOMERCE/css/glider.min.css">
    <title>Carrito</title>
</head>

<body>
    <p class="sale">¡Use el código ET36 para obtener hasta un 15% de descuento en el mes de agosto!</p>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="col-4">
                    <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            MARCAS
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            CATEGORIAS
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                        <a class="nav-contacto nav-link" href="#" style="color: black;">CONTACTOS</a>
                    </div>
                </div>
                <div class="col-4">
                    <a class="navbar-brand" href="main.php"><img src="./img/kicksmarket.png" alt=""></a>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <ul class="navbar-nav">
                        <li class="icon-navbar nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                        </li>
                        <li class="icon-navbar nav-item">
                            <a class="nav-link" href="#"><i class="fa-user fa-solid" id="user-icon"></i></a>
                        </li>
                        <a href="."></a>
                        <li class="icon-navbar nav-item">
                            <a href="./config/carrito.php" class="btn btn-primary">
                                Carrito<span id="num_cart" class="badge bg-secondary">
                                    <?php echo $num_cart ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="section">
        <div class="wrapper hidden">
            <div class="logreg-box">
                <!-- LOGIN SECTION-->
                <div id="login-form" class="form-box">
                    <div class="logreg-title">
                        <h2>Iniciar</h2>
                    </div>
                    <form action="config/login_us.php" method="POST">
                        <div class=" input-box">
                            <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="email" require>
                            <label>Email</label>
                        </div>

                        <div class="input-box">
                            <span class="icon"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" require>
                            <label>Contraseña</label>
                        </div>

                        <div class="remember-forgot">
                            <label><input type="checkbox">Recordarme</label>
                            <a href="#">Olvidaste tu contraseña?</a>
                        </div>

                        <button name="btnIngresar" type="submit" class="btn-submit">Iniciar Sesion</button>


                        <div class="logreg-link">
                            <p>No tenes cuenta? <a href="#" class="register-link">Registrarse</a></p>
                        </div>
                    </form>
                </div>
                <!-- REGISTER SECTION-->
                <div id="register-form" class="form-box register">
                    <div class="logreg-title">
                        <h2>Registrarse</h2>
                    </div>

                    <form action="config/registro_us.php" method="POST">
                        <div class="input-box">
                            <span class="icon"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="names" require>
                            <label>Nombre Completo</label>
                        </div>

                        <div class="input-box">
                            <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="email" require>
                            <label>Email</label>
                        </div>

                        <div class="input-box">
                            <span class="icon"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" require>
                            <label>Contraseña</label>
                        </div>

                        <div class="remember-forgot">
                            <label><input type="checkbox">¿Estas de acuerdo con los terminos y condiciones?</label>
                        </div>

                        <button type="submit" class="btn-submit">Registrarse</button>

                        <div class="logreg-link">
                            <p>Ya tenes una cuenta? <a href="#" class="login-link">Iniciar</a></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="media-options">
                <a href="#">
                    <i class="fa-brands fa-google"></i>
                    <span>Ingresar con Google</span>
                </a>
                <a href="#">
                    <i class="fa-brands fa-facebook"></i>
                    <span>Ingresar con Facebook</span>
                </a>
            </div>
        </div>
    </section>

    <main>
        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>PRODUCTOS</th>
                            <th></th>
                            <th>PRECIO</th>
                            <th>CANTIDAD</th>
                            <th>SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($lista_carrito == null) {
                            echo '<tr><td colspan="6" class="text-center"><b>Lista Vacía</b></td></tr>';
                        } else {
                            $total = 0;
                            foreach ($lista_carrito as $producto) {
                                $_id = $producto['id'];
                                $nombre = $producto['product_name'];
                                $precio = $producto['product_precio'];
                                $cantidad = $producto['cantidad'];
                                $subtotal = $cantidad * $precio;
                                $total += $subtotal;
                                $product_image = $producto['product_image'];
                                $imagenData = base64_encode($product_image);
                                $imagen = 'data:image/jpeg;base64,' . $imagenData;
                                ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo $imagen; ?>" alt="<?php echo $nombre; ?>" width="50" height="50">
                                    </td>
                                    <td>
                                        <?php echo $nombre; ?>
                                    </td>
                                    <td>
                                        <?php echo MONEDA . number_format($precio, 2, '.', ','); ?>
                                    </td>
                                    <td>
                                        <input type="number" min="1" max="10" step="1" value="<?php echo $cantidad ?>" size="5"
                                            id="cantidad_<?php echo $_id; ?>" onchange="">
                                    </td>
                                    <td>
                                        <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?></div>
                                    </td>
                                    <td>
                                        <a href="#" id="btn btn-warning btn-sm" data-bs-id="<?php echo $_id; ?>"
                                            data-bs-toggle="modal" data-bs-target="eliminaModal">Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>

    </main>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

</body>

</html>