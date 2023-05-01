<?php
require './config/config-filter.php';
require './config/database.php';


if (isset($_POST['action'])) {
    $sql = "SELECT * FROM products_shoes WHERE product_talle !=''";

    if (isset($_POST['product_marca'])) {
        $product_marca = implode("','", $_POST['product_marca']);
        $sql .= "AND product_marca IN('" . $product_marca . "')";
    }
    if (isset($_POST['product_talle'])) {
        $product_talle = implode("','", $_POST['product_talle']);
        $sql .= "AND product_talle IN('" . $product_talle . "')";
    }

    $result = $conn->query($sql);
    $output = '';

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output .= '<div class="col-md-6" style="width:30vh;">
            <div class="card-deck">
                <div class="card">
                <img src="data:image/jpg;base64,' . base64_encode($row['product_image']) . '" class="card-img-top">
                    <div>
                        <h6 style="cursor:pointer;" class="card-title text-center"> ' . $row['product_name'] . '</h6>
                    </div>
                    <div class="text-price">
                        <h4 class=" card-title text-danger">Precio : ' . number_format($row['product_precio']) . '</h4>
                    </div>
                </div>
            </div>
        </div>';
        }
    } else {
        $output = "<h3>No se encontro nada</h3>";
    }
    echo $output;
}
?>