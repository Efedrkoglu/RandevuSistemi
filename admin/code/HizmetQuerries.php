<?php
    include_once('DbConnection.php');
    include_once('Entity/Hizmet.php');

    function insertHizmet(Hizmet $hizmet) {
        try {
            $connection = connect();
            $sql = "INSERT INTO hizmet VALUES(DEFAULT, '{$hizmet->ad}', '{$hizmet->aciklama}', {$hizmet->sure}, {$hizmet->fiyat})";

            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function updateHizmet(Hizmet $hizmet) {
        try {
            $connection = connect();
            $sql = "UPDATE hizmet SET ad='{$hizmet->ad}', aciklama='{$hizmet->aciklama}', sure={$hizmet->sure}, fiyat={$hizmet->fiyat}  
                    WHERE id={$hizmet->id}";

            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function deleteHizmet(Hizmet $hizmet) {
        try {
            $connection = connect();
            $sql = "DELETE FROM hizmet WHERE id={$hizmet->id}";

            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function selectHizmet() {
        try {
            $connection = connect();
            $sql = "SELECT * FROM hizmet ORDER BY id";

            $result = $connection->query($sql);
            $hizmetler = array();
            while($row = $result->fetch()) {
                array_push($hizmetler, new Hizmet($row['id'], $row['ad'], $row['aciklama'], $row['sure'], $row['fiyat']));
            }

            return $hizmetler;
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function selectHizmetById($id) {
        try {
            $connection = connect();
            $sql = "SELECT * FROM hizmet WHERE id={$id}";

            $result = $connection->query($sql);
            $row = $result->fetch();

            $hizmet = new Hizmet($row['id'], $row['ad'], $row['aciklama'], $row['sure'], $row['fiyat']);
            return $hizmet;
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }
?>