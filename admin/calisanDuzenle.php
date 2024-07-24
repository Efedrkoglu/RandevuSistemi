<?php
    ob_start();
    $title = "Calışan Ekle";
    include('sidebar.php');
    include('code/CalisanQuerries.php');

    if(isset($_GET['edit'])) {
        $calisan = selectCalisanById($_GET['edit']);

        $isim = explode(" ", $calisan->isim);
        $isimLength = count($isim);
        $ad = "";
        $soyad = "";

        for($i = 0; $i < $isimLength; $i++) {
            if($i != $isimLength - 1) {
                if($i == $isimLength - 2)
                    $ad .= $isim[$i];
                else 
                    $ad .= $isim[$i] . " ";
            }
            else
                $soyad .= $isim[$i];
        }
    }

    if(isset($_POST['update'])) {
        $isim = $_POST['ad'] . " " . $_POST['soyad'];
        $calisan->isim = $isim;
        $calisan->email = $_POST['email'];
        $calisan->calisma_baslangic = $_POST['calisma_baslangic'];
        $calisan->calisma_bitis = $_POST['calisma_bitis'];
        $calisan->ise_giris_tarihi = $_POST['ise_giris_tarihi'];
        $calisan->maas = $_POST['maas'];

        updateCalisan($calisan);
        header("Location: calisan.php");
        exit();
    }
    ob_end_flush();
?>

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <h4 class="mt-3">Çalışan Düzenle</h4>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" name="ad" placeholder="Ad" value="<?php echo $ad ?>">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="soyad" placeholder="Soyad" value="<?php echo $soyad ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="email" class="form-control" name="email" placeholder="E-mail" value="<?php echo $calisan->email ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="ise_giris_tarihi" class="form-label">İşe Giriş Tarihi</label>
                                <input type="date" id="ise_giris_tarihi" class="form-control" name="ise_giris_tarihi" value="<?php echo $calisan->ise_giris_tarihi ?>">
                            </div>
                            <div class="col">
                                <label for="calisma_baslangic" class="form-label">Mesai Başlangıç</label>
                                <input type="time" id="calisma_baslangic" class="form-control" name="calisma_baslangic" value="<?php echo $calisan->calisma_baslangic ?>">
                            </div>
                            <div class="col">
                                <label for="calisma_bitis" class="form-label">Mesai Bitiş</label>
                                <input type="time" id="calisma_bitis" class="form-control" name="calisma_bitis" value="<?php echo $calisan->calisma_bitis ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="number" class="form-control" name="maas" placeholder="Maaş" value="<?php echo $calisan->maas ?>">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success btn-sm" name="update" value="Güncelle">
                        <a href="calisan.php" class="btn btn-sm" style="background-color: black; color: white;">Vazgeç</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>