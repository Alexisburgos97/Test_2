<?php
    if(isset($_POST['cod_postal'])){
        $cod_postal = $_POST['cod_postal'];
        $cod_postal_url = "https://api.republicofdevs.com/api/v1/zipcodes/".urlencode($cod_postal);
        $cod_postal_json = file_get_contents($cod_postal_url);
        $cod_postal_array = json_decode($cod_postal_json,true);
        //var_dump($cod_postal_array["content"][0]["codigoPostal"]);
        $cod = $cod_postal_array["content"][0]["codigoPostal"];
        $asentamiento = $cod_postal_array["content"][0]["asentamiento"];
        $ciudad = $cod_postal_array["content"][0]["ciudad"];
        $estado = $cod_postal_array["content"][0]["estado"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Código postal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Código Postal</h1>

    <h4>Ejemplos válidos de Cód. postal</h4>

    <ul>
            <li>01000</li>
            <li>01030</li>
            <li>01080</li>
    </ul>

    <form action="" method="POST">
        <div class="text-center">
            <input type="text" name="cod_postal" placeholder="Ingrese su código postal" required/>
            <input type="submit" value="Consultar">
        </div>
    </form>
    <?php
            if(isset($cod_postal)){
                echo "<div class='m-4'>";
                    echo "<table class='table table-bordered table-striped'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Código postal</th>";
                    echo "<th>Asentamiento</th>";
                    echo "<th>Ciudad</th>";
                    echo "<th>Estado</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>$cod</td>";
                    echo "<td>$asentamiento</td>";
                    echo "<td>$ciudad</td>";
                    echo "<td>$estado</td>";
                    echo "</tr>";
                    echo "</tbody>";
                    echo "</table>";
                echo "</div>";
            }else{
                "Ingrese un código postal";
            }
    ?>
</body>
</html>