<?php 
    include_once('DbConnection.php');

    function authorize($username, $password) {
        try {
            $connection = connect();
            $sql = "SELECT * FROM users WHERE BINARY username='{$username}' AND BINARY password='{$password}'";

            $result = $connection->query($sql);
            $row = $result->fetch();

            if($row)
                return true;
            else
                return false;
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
    }
?>