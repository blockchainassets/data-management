<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- La siguiente linea de código nos permitirá actualizar la página cada 60 segundos,
         lo que equivale a 1 minuto, lo cual realizará la petición consecutiva de nuestro código en php -->
    <meta http-equiv="refresh" content="60">
</head>

<body>
<?php    
//Para el consumo del API, se optó realizarlo con CURL, concatenando la url con la clave proporcionada del 
//siguiente sitio web: https://p.nomics.com/cryptocurrency-bitcoin-api

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.nomics.com/v1/currencies/ticker?key=#######");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// $output contendrá el resultado de la petición //La respuesta en JSON // Al mismo tiempo ejecutamos la petición
$output = curl_exec($ch);
// Cerrarmos curl para liberar recursos del sistema
curl_close($ch);   
//Interpretamos el resultado JSON para facilitar la manipulación de los datos
$array = json_decode($output, true);
//Se realiza un recorrido o ciclo de toda la información obtenida. 
foreach ($array as $value) {
        //Se pregunta si el id sea referente a la moneda Bitcoin
        //En caso que lo sea se muestra en pantalla el nombre de moneda y su precio
        if ($value['id'] == "BTC")
        {
                $cadena = "Nombre de moneda : ".$value['name'];
                echo "<br>";
                echo "Extraer el precio de la moneda Bitcoin cada 1 minuto";
                echo "<br>";
                echo "<br>";
                print ($cadena);
                echo "<br>";
                echo "Precio: ".$value['price'];
                echo "<br>";
        }
}

//NOTA: Para realizar este mismo procedimiento pueden ser de diferentes formas, usando Ajax, Jquery y/o Javascript
//Se crear un time para ejecutar la petición Curl encapsulado a una función cada 1 minuto y de esa manera se van registrando los precios 
//de cripto moneda en la misma página 

?>
</body>
</html>
