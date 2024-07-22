<?php
    include_once('DbConnection.php');
    include_once('Entity/Randevu.php');
    include_once('MusteriQuerries.php');
    include_once('CalisanQuerries.php');
    include_once('HizmetQuerries.php');
    include_once('OdemeYontemiQuerries.php');

    function insertRandevu(Randevu $randevu) {
        try {
            $connection = connect();
            $sql = "INSERT INTO randevu VALUES(DEFAULT, {$randevu->musteri->id}, {$randevu->calisan->id}, {$randevu->hizmet->id}
                    , '{$randevu->tarih}', {$randevu->odemeyontemi->id}, '{$randevu->randevu_notu}')";

            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function updateRandevu(Randevu $randevu) {
        try {
            $connection = connect();
            $sql = "UPDATE randevu SET musteri_id={$randevu->musteri->id}, calisan_id={$randevu->calisan->id}, hizmet_id={$randevu->hizmet->id},
                    tarih='{$randevu->tarih}', odeme_yontemi_id={$randevu->odemeyontemi->id}, randevu_notu='{$randevu->randevu_notu}'  
                    WHERE id={$randevu->id}";

            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function deleteRandveu(Randevu $randevu) {
        try {
            $connection = connect();
            $sql = "DELETE FROM randevu WHERE id={$randevu->id}";

            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function selectRandevu() {
        try {
            $connection = connect();
            $sql = "SELECT * FROM randevu ORDER BY id";

            $result = $connection->query($sql);
            $randevular = array();
            while($row = $result->fetch()) {
                array_push($randevular, new Randevu(
                    $row['id'],
                    selectMusteriById($row['musteri_id']),
                    selectCalisanById($row['calisan_id']),
                    selectHizmetById($row['hizmet_id']),
                    $row['tarih'],
                    selectOdemeYontemiById($row['odeme_yontemi_id']),
                    $row['randevu_notu']
                ));
            }

            return $randevular;
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function selectRandevuById($id) {
        try {
            $connection = connect();
            $sql = "SELECT * FROM randevu WHERE id={$id}";

            $result = $connection->query($sql);
            $row = $result->fetch();
            $randevu = new Randevu(
                $row['id'],
                selectMusteriById($row['musteri_id']),
                selectCalisanById($row['calisan_id']),
                selectHizmetById($row['hizmet_id']),
                $row['tarih'],
                selectOdemeYontemiById($row['odeme_yontemi_id']),
                $row['randevu_notu']
            );

            return $randevu;
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }
?>