<?php
    include_once('DbConnection.php');
    include_once('Entity/Gider.php');

    function insertGider(Gider $gider) {
        try {
            $connection = connect();
            $sql = "INSERT INTO gider VALUES(DEFAULT, '{$gider->ad}', {$gider->miktar}, '{$gider->aciklama}', '{$gider->tarih}')";

            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function updateGider(Gider $gider) {
        try {
            $connection = connect();
            $sql = "UPDATE gider SET ad='{$gider->ad}', miktar={$gider->miktar}, aciklama='{$gider->aciklama}', tarih='{$gider->tarih}' 
                    WHERE id={$gider->id}";

            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function deleteGider(Gider $gider) {
        try {
            $connection = connect();
            $sql = "DELETE FROM gider WHERE id={$gider->id}";

            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function selectGider() {
        try {
            $connection = connect();
            $sql = "SELECT * FROM gider ORDER BY YEAR(tarih) DESC, MONTH(tarih) DESC, DAY(tarih) DESC";

            $result = $connection->query($sql);
            $giderler = array();
            while($row = $result->fetch()) {
                array_push($giderler, new Gider($row['id'], $row['ad'], $row['miktar'], $row['aciklama'], $row['tarih']));
            }
            return $giderler;
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function selectGiderById($id) {
        try {
            $connection = connect();
            $sql = "SELECT * FROM gider WHERE id={$id}";

            $result = $connection->query($sql);
            $row = $result->fetch();
            
            return new Gider($row['id'], $row['ad'], $row['miktar'], $row['aciklama'], $row['tarih']);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }
?>