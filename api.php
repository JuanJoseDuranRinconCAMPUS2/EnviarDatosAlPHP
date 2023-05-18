<?php

    header("Content-Type: application/json");
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $_METHOD = $_SERVER["REQUEST_METHOD"];
    $_HEADERS = apache_request_headers();
    echo($_HEADERS["Sec-Fetch-Mode"] . "<br><br><br><br>");
    foreach ($_HEADERS as $header => $value) {
        echo "$header: $value <br />\n";
    }
    // var_dump($_POST);
    // var_dump($_FILES);
    // move_uploaded_file($_FILES["archivo"]["tmp_name"], $_FILES["archivo"]["name"]);
    // echo '<br><a href="index.html">Atras</a>';

?>