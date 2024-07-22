<?php
    include_once('DbConnection.php');
    include_once('Entity/OdemeYontemi.php');

    function insertOdemeYontemi(OdemeYontemi $odemeyontemi) {
        try {
            $connection = connect();
            $sql = "INSERT INTO odeme_yontemi VALUES(DEFAULT, '{$odemeyontemi->ad}')";

            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function updateOdemeYontemi(OdemeYontemi $odemeyontemi) {
        try {
            $connection = connect();
            $sql = "UPDATE odeme_yontemi SET ad='{$odemeyontemi->ad}' WHERE id={$odemeyontemi->id}";

            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function deleteOdemeYontemi(OdemeYontemi $odemeyontemi) {
        try {
            $connection = connect();
            $sql = "DELETE FROM odeme_yontemi WHERE id={$odemeyontemi->id}";

            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function selectOdemeYontemi() {
        try {
            $connection = connect();
            $sql = "SELECT * FROM odeme_yontemi ORDER BY id";

            $result = $connection->query($sql);
            $odemeyontemleri = array();
            while($row = $result->fetch()) {
                array_push($odemeyontemleri, new OdemeYontemi($row['id'], $row['ad']));
            }

            return $odemeyontemleri;
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function selectOdemeYontemiById($id) {
        try {
            $connection = connect();
            $sql = "SELECT * FROM odeme_yontemi WHERE id={$id}";

            $result = $connection->query($sql);
            $row = $result->fetch();

            $odemeyontemi = new OdemeYontemi($row['id'], $row['ad']);
            return $odemeyontemi;
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }    
?>