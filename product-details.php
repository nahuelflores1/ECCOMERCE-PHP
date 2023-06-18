<?php
require './config/config.php';
require './config/database.php';

$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == '') {
    echo 'Error al procesar la petición';
    exit;
}

$token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

$sql = $con->prepare("SELECT product_name, product_description, product_precio, product_image FROM products_destacados WHERE id=? AND activo=1 LIMIT 1");
$sql->execute([$id]);

if ($sql->rowCount() > 0 && $token == $token_tmp) {
    $row = $sql->fetch(PDO::FETCH_ASSOC);

    $nombre = $row['product_name'];
    $descripcion = $row['product_description'];
    $precio = $row['product_precio'];
    $imagenBlob = $row['product_image'];

    if (!empty($imagenBlob)) {
        $base64Image = base64_encode($imagenBlob);
        $rutaImg = 'data:image/jpeg;base64,' . $base64Image;
    } else {
        $rutaImg = 'img/nophoto.jpg';
    }

    $dir_img = 'img/shoes/' . $id . '/';

    $imagenes = array();
    $dir = dir($dir_img);

    while (($archivo = $dir->read()) !== false) {
        if ($archivo != 'principal.jpg' && (strpos($archivo, 'jpg') !== false || strpos($archivo, 'jpeg') !== false)) {
            $imagenes[] = $dir_img . $archivo;
        }
    }
    $dir->close();
}
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/glider.min.css">
    <title>KicksMarket</title>
</head>

<body>
    <p class="sale">¡Use el código ET36 para obtener hasta un 15% de descuento en el mes de agosto!</p>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="col-4">
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
                        <li class="icon-navbar nav-item"
                            style="display:flex; flex-direction:column; justify-content: center;">
                            <a href="./config/product-cart.php" class="btn btn-danger">
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
                        <?php
                        if (isset($_GET['mensaje_bienvenida'])) {
                            $mensaje_bienvenida = $_GET['mensaje_bienvenida'];
                            echo '<div id="mensaje-bienvenida">' . $mensaje_bienvenida . '</div>';
                        }
                        ?>
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
            <div class="row-details">
                <div class="col-md-6">
                    <img src=" <?php echo $rutaImg; ?>" class="img-fluid" alt="Producto">
                </div>
                <div class="col-md-6">
                    <h1>
                        <?php echo $nombre; ?>
                    </h1>
                    <p>
                        <?php echo $descripcion; ?>
                    </p>
                    <div class="small-h2">
                        <h2>$
                            <?php echo $precio; ?>
                        </h2>
                        <small></small>
                    </div>
                    <div class="mb-3">
                        <label for="cantidad">Cantidad:</label>
                        <input type="number" id="cantidad" name="cantidad" min="1" max="10" value="1">
                    </div>
                    <button type="button" class="btn-cart btn" onclick=" addProductoDestacado(<?php echo $id; ?>, '
                        <?php echo $token_tmp; ?>')">Agregar al
                        Carrito
                    </button>
                    <button type="button" class="btn-buy btn">Comprar Ahora</button>
                </div>
            </div>
        </div>
    </main>
    <footer>

    </footer>
    <script>
        function addProductoDestacado(id, token) {
            let url = './config/carrito.php';
            let formData = new FormData();
            formData.append('id', id);
            formData.append('token', token);

            fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'
            })
                .then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let elemento = document.getElementById("num_cart");
                        elemento.innerHTML = data.numero;
                    }
                });
        }
    </script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>