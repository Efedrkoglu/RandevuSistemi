<?php
    include_once('DbConnection.php');
    include_once('Entity/Gelir.php');

    function insertGelir(Gelir $gelir) {
        try {
            $connection = connect();
            $sql = "INSERT INTO gelir VALUES(DEFAULT, '{$gelir->ad}', {$gelir->miktar}, '{$gelir->aciklama}', '{$gelir->tarih}')";

            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function updateGelir(Gelir $gelir) {
        try {
            $connection = connect();
            $sql = "UPDATE gelir SET ad='{$gelir->ad}', miktar={$gelir->miktar}, aciklama='{$gelir->aciklama}', tarih='{$gelir->tarih}' 
                    WHERE id={$gelir->id}";

            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function deleteGelir(Gelir $gelir) {
        try {
            $connection = connect();
            $sql = "DELETE FROM gelir WHERE id={$gelir->id}";

            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function selectGelir() {
        try {
            $connection = connect();
            $sql = "SELECT * FROM gelir ORDER BY YEAR(tarih) DESC, MONTH(tarih) DESC, DAY(tarih) DESC";

            $result = $connection->query($sql);
            $gelirler = array();
            while($row = $result->fetch()) {
                array_push($gelirler, new Gelir($row['id'], $row['ad'], $row['miktar'], $row['aciklama'], $row['tarih']));
            }
            return $gelirler;
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function selectGelirById($id) {
        try {
            $connection = connect();
            $sql = "SELECT * FROM gelir WHERE id={$id}";

            $result = $connection->query($sql);
            $row = $result->fetch();
            
            return new Gelir($row['id'], $row['ad'], $row['miktar'], $row['aciklama'], $row['tarih']);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }
?>