<?php
$host = "";
$port = "";
$dbName = "";
$username = "";
$password = "";
$dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8";
try {
    $db = new PDO($dsn, $username, $password);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // FETCH as ASSOC array
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // echo "DB Connected <br>";
} catch (PDOException $e) {
    echo "" . $e->getMessage();
}
