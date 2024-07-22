<?php 
    include_once('DbConnection.php');
    include_once('Entity/Musteri.php');

    function insertMusteri(Musteri $musteri) {
        try {
            $connection = connect();
            $sql = "INSERT INTO musteri VALUES(DEFAULT, '{$musteri->isim}', '{$musteri->email}', '{$musteri->tel_no}')";

            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function updateMusteri(Musteri $musteri) {
        try {
            $connection = connect();
            $sql = "UPDATE musteri SET isim='{$musteri->isim}', email='{$musteri->email}', tel_no='{$musteri->tel_no}' 
                    WHERE id={$musteri->id}";

            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function deleteMusteri(Musteri $musteri) {
        try {
            $connection = connect();
            $sql = "DELETE FROM musteri WHERE id={$musteri->id}";

            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function selectMusteri() {
        try {
            $connection = connect();
            $sql = "SELECT * FROM musteri ORDER BY id";

            $result = $connection->query($sql);
            $musteriler = array();
            while($row = $result->fetch()) {
                array_push($musteriler, new Musteri($row['id'], $row['isim'], $row['email'], $row['tel_no']));
            }

            return $musteriler;
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function selectMusteriById($id) {
        try {
            $connection = connect();
            $sql = "SELECT * FROM musteri WHERE id={$id}";

            $result = $connection->query($sql);
            $row = $result->fetch();

            $musteri = new Musteri($row['id'], $row['isim'], $row['email'], $row['tel_no']);
            return $musteri;
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }
?>