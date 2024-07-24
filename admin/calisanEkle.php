<?php
    ob_start();
    $title="Çalışan Ekle";
    include('sidebar.php');
    include('code/CalisanQuerries.php');

    if(isset($_POST['kaydet'])) {
        $isim = $_POST['ad'] . " " . $_POST['soyad'];
        $calisan = new Calisan(
            1,
            $isim,
            $_POST['email'],
            $_POST['calisma_baslangic'],
            $_POST['calisma_bitis'],
            $_POST['maas'],
            1,
            $_POST['ise_giris_tarihi']
        );

        insertCalisan($calisan);
        header("Location: calisan.php");
        exit();
    }
    ob_end_flush();
?>

<div class="container-fluid mt-5">
    <a href="calisan.php" class="btn btn-sm" style="background-color: black; color: white;"><i class="lni lni-arrow-left"></i></a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <h4 class="mt-3">Çalışan Ekle</h4>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" name="ad" placeholder="Ad">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="soyad" placeholder="Soyad">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="email" class="form-control" name="email" placeholder="E-mail">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="ise_giris_tarihi" class="form-label">İşe Giriş Tarihi</label>
                                <input type="date" id="ise_giris_tarihi" class="form-control" name="ise_giris_tarihi">
                            </div>
                            <div class="col">
                                <label for="calisma_baslangic" class="form-label">Mesai Başlangıç</label>
                                <input type="time" id="calisma_baslangic" class="form-control" name="calisma_baslangic">
                            </div>
                            <div class="col">
                                <label for="calisma_bitis" class="form-label">Mesai Bitiş</label>
                                <input type="time" id="calisma_bitis" class="form-control" name="calisma_bitis">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="number" class="form-control" name="maas" placeholder="Maaş">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success btn-sm" name="kaydet" value="Kaydet">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>

