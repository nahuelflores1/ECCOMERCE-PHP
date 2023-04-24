<?php

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id, nombre, precio FROM products WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

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
                    <a class="navbar-brand" href="#"><img src="./img/kicksmarket.png" alt=""></a>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <ul class="navbar-nav">
                        <li class="icon-navbar nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                        </li>
                        <li class="icon-navbar nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-user"></i></a>
                        </li>
                        <li class="icon-navbar nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section class="banner">
            <h1>SOMOS LA MARCA Nº1 DEL PAIS</BR> EN EXCLUSIVDAD</h1>
            <img src="./img/yezzy-banner.jpg" alt="">
        </section>
        <section>
            <h3 class="p-slider">PRODUCTOS DESTACADOS</h3>
            <div class="glider-contain">
                <div class="glider">
                    <?php foreach ($resultado as $row) { ?>
                        <section class="product-box">
                            <span class="p-discount">Sale</span>

                            <?php
                            $id = $row['id'];
                            $imagen = "img/shoes/" . $id . "/sneakers.jpg";

                            if (!file_exists($imagen)) {
                                $imagen = "img/no-photo.jpg";
                            }

                            ?>

                            <a href="details.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>"><img class="p-img-container p-img w-100" src="<?php echo $imagen; ?>"></a>
                            <div class="p-box-text">
                                <a href="details.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>" class="product-title">
                                    <?php echo $row['nombre']; ?>
                                </a>
                                <div class="price-buy">
                                    <span class="p-price">$
                                        <?php echo $row['precio']; ?>
                                    </span>
                                    <a class="p-buy-btn" href="">Agregar a carrito</a>
                                </div>
                            </div>
                        </section>
                    <?php } ?>
                </div>

                <button aria-label="Previous" class="glider-prev">«</button>
                <button aria-label="Next" class="glider-next">»</button>
            </div>

                



        </section>
        <section>
            <div class="row" style="padding: 100px 0px;">
                <div class="shoes-section col-md-8 p-0">
                    <p>ZAPATILLAS</p>
                    <img src="./img/jordan-1-red-banner.jpg" alt="">
                </div>
                <div class="col-md-4 p-0">
                    <div class="hoddie-section col-md-12 p-0">
                        <p>HODDIES</p>
                        <img src="./img/clothes-section.jpg" alt="">
                    </div>
                    <div class="t-shirts-section col-md-12 p-0">
                        <p>REMERAS</p>
                        <img src="./img/t-shirts-productos.jpg" alt="">
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>

    </footer>
    <script src="js/glider.min.js"></script>
    <script>
        new Glider(document.querySelector('.glider'), {
            slidesToScroll: 1,
            slidesToShow: 5,
            draggable: true,
            dots: '.dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>