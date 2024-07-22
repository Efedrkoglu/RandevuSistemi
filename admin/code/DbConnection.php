<?php
    function connect() {
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "randevu_sistemi";

        try {
            $conn = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
    }
?>