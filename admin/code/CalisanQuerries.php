<?php 
    include_once('DbConnection.php');
    include_once('Entity/Calisan.php');

    function insertCalisan(Calisan $calisan) {
        try {
            $connection = connect();
            $sql = "INSERT INTO calisan VALUES(DEFAULT, '{$calisan->isim}', '{$calisan->email}', '{$calisan->calisma_baslangic}',
                    '{$calisan->calisma_bitis}', {$calisan->maas}, '{$calisan->ise_giris_tarihi}', '{$calisan->tel_no}')";
            
            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function updateCalisan(Calisan $calisan) {
        try {
            $connection = connect();
            $sql = "UPDATE calisan SET isim='{$calisan->isim}', email='{$calisan->email}', calisma_baslangic='{$calisan->calisma_baslangic}',
                    calisma_bitis='{$calisan->calisma_bitis}', maas={$calisan->maas}, ise_giris_tarihi='{$calisan->ise_giris_tarihi}',
                    tel_no='{$calisan->tel_no}' WHERE id={$calisan->id}";

            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function deleteCalisan(Calisan $calisan) {
        try {
            $connection = connect();
            $sql = "DELETE FROM calisan WHERE id={$calisan->id}";
            
            $result = $connection->exec($sql);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function selectCalisan() {
        try {
            $connection = connect();
            $sql = "SELECT * FROM calisan ORDER BY id";

            $result = $connection->query($sql);
            $calisanlar = array();
            while($row = $result->fetch()) {
                array_push($calisanlar, new Calisan($row['id'], $row['isim'], $row['email'], $row['calisma_baslangic'],
                            $row['calisma_bitis'], $row['maas'], $row['ise_giris_tarihi'], $row['tel_no']));
            }

            return $calisanlar;
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function selectCalisanById($id) {
        try {
            $connection = connect();
            $sql = "SELECT * FROM calisan WHERE id={$id}";

            $result = $connection->query($sql);
            $row = $result->fetch();

            $calisan = new Calisan($row['id'], $row['isim'], $row['email'], $row['calisma_baslangic'], $row['calisma_bitis'], $row['maas'], $row['ise_giris_tarihi'], $row['tel_no']);
            return $calisan;
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    function selectAyinElemani($month) {
        try {
            $connection = connect();
            $sql = "SELECT calisan.isim, COUNT(randevu.id) AS randevu FROM randevu JOIN calisan
                    ON randevu.calisan_id = calisan.id WHERE MONTH(randevu.tarih) = '{$month}' GROUP BY calisan.isim ORDER BY randevu DESC";

            $result = $connection->query($sql);
            $calisanlar = array();
            while($row = $result->fetch()) {
                $calisanlar[$row['isim']] = $row['randevu'];
            }
            return $calisanlar;
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }
?>