<?php include('code/CheckAuthorized.php')?>
<?php
    ob_start();
    $title = "Randevu Düzenle";
    include('sidebar.php');
    include('code/RandevuQuerries.php');

    if(isset($_GET['edit'])) {
        $randevu = selectRandevuById($_GET['edit']);
        $time = explode(" ", $randevu->tarih);
        $tarih = $time[0];
        $saat = $time[1];
    }

    if(isset($_POST['update'])) {
        $time = $_POST['tarih'] . " " . $_POST['saat'];
        $randevu->calisan = selectCalisanById($_POST['calisan']);
        $randevu->hizmet = selectHizmetById($_POST['hizmet']);
        $randevu->tarih = $time;
        $randevu->odemeyontemi = selectOdemeYontemiById($_POST['odemeyontemi']);
        $randevu->randevu_notu = $_POST['randevu_notu'];

        updateRandevu($randevu);
        header("Location: randevu.php");
        exit();
    }
    ob_end_flush();
?>

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <h4 class="mt-3">Randevu Düzenle</h4>
                <div class="card-body">
                    <form action=""method="POST">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="hizmet" class="form-label">Hizmet</label>
                                <select name="hizmet" id="hizmet" class="form-select">
                                    <?php 
                                        $hizmetler = selectHizmet();

                                        foreach($hizmetler as $hizmet) {
                                            if($hizmet->id == $randevu->hizmet->id)
                                                echo "<option value='" . $hizmet->id . "' selected>" . $hizmet->ad . "</option>";
                                            else
                                                echo "<option value='" . $hizmet->id . "'>" . $hizmet->ad . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="calisan" class="form-label">Çalışan</label>
                                <select name="calisan" id="calisan" class="form-select">
                                    <?php 
                                        $calisanlar = selectCalisan();

                                        foreach($calisanlar as $calisan) {
                                            if($calisan->id == $randevu->calisan->id)
                                                echo "<option value='" . $calisan->id . "' selected>" . $calisan->isim . "</option>";
                                            else
                                                echo "<option value='" . $calisan->id . "'>" . $calisan->isim . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="tarih" class="form-label">Tarih</label>
                                <input type="date" id="tarih" class="form-control" name="tarih" value="<?php echo $tarih;?>">
                            </div>
                            <div class="col">
                                <label for="saat" class="form-label">Saat</label>
                                <input type="time" id="saat" class="form-control" name="saat" value="<?php echo $saat;?>">
                            </div>
                            <div class="col">
                                <label for="odemeyontemi" class="form-label">Ödeme Yöntemi</label>
                                <select name="odemeyontemi" id="odemeyontemi" class="form-select">
                                    <?php 
                                        $odemeyontemleri = selectOdemeYontemi();

                                        foreach($odemeyontemleri as $odemeyontemi) {
                                            if($odemeyontemi->id == $randevu->odemeyontemi->id)
                                                echo "<option value='" . $odemeyontemi->id . "' selected>" . $odemeyontemi->ad . "</option>";
                                            else
                                                echo "<option value='" . $odemeyontemi->id . "'>" . $odemeyontemi->ad . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="randevu_notu" class="form-label">Randevu Notu</label>
                            <input type="text" id="randevu_notu" class="form-control" name="randevu_notu" value="<?php echo $randevu->randevu_notu == null ? '' : $randevu->randevu_notu;?>">
                        </div>
                        <input type="submit" class="btn btn-success btn-sm" name="update" value="Güncelle">
                        <a href="randevu.php" class="btn btn-sm" style="background-color: black; color: white;">Vazgeç</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>