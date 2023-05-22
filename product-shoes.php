<?php
require 'config/database.php';
require 'config/config-filter.php';
require 'config/config.php'
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="http://localhost/ECCOMERCE/css/main.css">
    <link rel="stylesheet" href="http://localhost/ECCOMERCE/css/glider.min.css">
    <title>KicksMarket</title>
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
                            <a href="./config/product-cart.php" class="btn btn-primary">
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
        <section class="banner">
            <h1>ZAPATILLAS</h1>
            <img src="./img/banner-shoess.jpg" alt="">
        </section>
            <div class="row">
                <div class="col-lg-3">
                    <h6>CATEGORIAS</h6>
                    <h5>MARCAS ZAPATILLAS</h5>
                    <ul class="list-group">
                        <?php
                            $sql = "SELECT DISTINCT product_marca FROM products_shoes ORDER BY product_marca";
                            $result = $conn->query($sql);
                            while($row=$result->fetch_assoc()) {
                        ?>
                            <li class="list-group-item">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="product_check form-check-input "
                                            value="<?= $row['product_marca']; ?>" id="product_marca"><?= $row['product_marca']; ?>
                                    </label>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                    <h5>TALLE CALZADO</h5>
                    <ul class="list-group">
                        <?php
                            $sql = "SELECT DISTINCT product_talle FROM products_shoes ORDER BY product_talle";
                            $result = $conn->query($sql);
                            while($row=$result->fetch_assoc()) {
                        ?>
                            <li class="list-group-item">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="product_check form-check-input "
                                            value="<?= $row['product_talle']; ?>" id="product_talle"><?= $row['product_talle']; ?>
                                    </label>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <h5 class="text-center" id="textChange">TODOS LOS PRODUCTOS
                    </h5>
                    <div class="text-center">
                        <img src="img/loader.gif" alt="loader" width="200" style="display:none;">
                    </div>                   
                    <div class="row" id="result">
                        <?php
                            $sql = "SELECT * FROM products_shoes";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                ?>
                            <div class="col-md-6-filter col-md-6" style="width:30vh; margin: 0px 50px;">
                                <div class="card-deck">
                                    <div class="card">
                                        <img src="data:images/jpg;base64, <?php echo base64_encode($row['product_image']); ?>" class="card-img-top">
                                            <div style="height: 100px; width: 90%;">
                                                <h6 style="cursor:pointer;" class="card-title text-center"><?= $row['product_name']; ?></h6>
                                            </div>
                                            <div class="text-price">
                                                <h4 class="card-title text-danger">Precio: $<?= number_format($row['product_precio']); ?></h4>
                                            </div>
                                        <button class="btn-shoes" onclick="addProducto('S<?php echo $row['id']; ?>', '<?php echo hash_hmac('sha1', 'S' . $row['id'], KEY_TOKEN); ?>')" href="">Agregar a carrito</button>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div> 
            </div>
        </section> 
    </main> 

    <script>
        function addProducto(id, token) {
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
    <script type="text/javascript">
        $(document).ready(function(){

            $(".product_check").click(function(){
                $("#loader").show();

                var action = 'data';
                var product_talle =get_filter_text('product_talle');
                var product_marca =get_filter_text('product_marca');

                $.ajax({
                    url:'action.php',
                    method: 'POST',
                    data:{action:action,product_marca:product_marca,product_talle:product_talle},
                    success:function(response){
                        $("#result").html(response);
                        $("#loader").hide();
                        $("#textChange").text("FILTRO DE PRODUCTOS");
                    }
                });
            });

            function get_filter_text(text_id){
                var filterData = [];
                $('#'+text_id+':checked').each(function(){
                    filterData.push($(this).val());
                });
                return filterData;
            }
        });
    </script>
</body>

</html>