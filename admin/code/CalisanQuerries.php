<?php 
    include_once('DbConnection.php');
    include_once('Entity/Calisan.php');

    function insertCalisan(Calisan $calisan) {
        try {
            $connection = connect();
            $sql = "INSERT INTO calisan VALUES(DEFAULT, '{$calisan->isim}', '{$calisan->email}', '{$calisan->calisma_baslangic}',
                    '{$calisan->calisma_bitis}', {$calisan->maas}, {$calisan->aktif}, '{$calisan->ise_giris_tarihi}')";
            
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
                    calisma_bitis='{$calisan->calisma_bitis}', maas={$calisan->maas}, aktif={$calisan->aktif}, ise_giris_tarihi='{$calisan->ise_giris_tarihi}' 
                    WHERE id={$calisan->id}";

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
                            $row['calisma_bitis'], $row['maas'], $row['aktif'], $row['ise_giris_tarihi']));
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

            $calisan = new Calisan($row['id'], $row['isim'], $row['email'], $row['calisma_baslangic'], $row['calisma_bitis'], $row['maas'], $row['aktif'], $row['ise_giris_tarihi']);
            return $calisan;
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }
?>