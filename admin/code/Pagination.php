<?php
    include_once('DbConnection.php');

    function getMaxPage($table) {
        try {
            $connection = connect();
            $sql = "SELECT COUNT(id) AS count FROM {$table}";

            $result = $connection->query($sql);
            $row = $result->fetch();
            $maxPage = ceil($row['count'] / 10);
            return $maxPage;
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }
?>