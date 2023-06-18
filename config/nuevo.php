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
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/glider.min.css">
    <title>Nuevo</title>
</head>

<body>
    <header style="background-color: #ab2020;">
        <h2 style="text-align: center; margin: 25px; ">INGRESAR PRODUCTOS</h2>
    </header>
    <main>
        <article class="container" style="margin:50px;">
            <form class="form-horizontal" method="POST" action="guardar.php" autocomplete="off">

                <section class="form-group">
                    <label for="product_name" class="col-sm-2 control-label">Marca</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="product_name" name="product_name"
                            placeholder="Marca" required>
                    </div>
                </section>

                <section class="form-group">
                    <label for="product_description" class="col-sm-2 control-label">Modelo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="product_description" name="product_description"
                            placeholder="Modelo" required>
                    </div>
                </section>

                <section class="form-group">
                    <label for="product_talle" class="col-sm-2 control-label">Talle</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="product_talle" name="product_talle"
                            placeholder="Talle" required>
                    </div>
                </section>

                <section class="form-group">
                    <label for="product_precio" class="col-sm-2 control-label">Precio</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="product_precio" name="product_precio"
                            placeholder="Precio" required>
                    </div>
                </section>

                <section class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="agregar-productos.php" class="btn btn-default">Regresar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </section>

            </form>
        </article>
    </main>
</body>

</html>