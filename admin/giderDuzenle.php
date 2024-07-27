<?php include('code/CheckAuthorized.php')?>
<?php
    ob_start();
    $title = "Gider Düzenle";
    include('sidebar.php');
    include('code/GiderQuerries.php');

    if(isset($_GET['edit'])) {
        $gider = selectGiderById($_GET['edit']);
    }

    if(isset($_POST['update'])) {
        $gider->ad = $_POST['ad'];
        $gider->miktar = $_POST['miktar'];
        $gider->aciklama = $_POST['aciklama'];
        $gider->tarih = $_POST['tarih'];

        updateGider($gider);
        header("Location: gider.php");
        exit();
    }
    ob_end_flush();
?>

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <h4 class="mt-3">Gider Düzenle</h4>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row mb-2">
                            <input type="text" class="form-control" name="ad" placeholder="Ad" value="<?php echo $gider->ad;?>">
                        </div>
                        <div class="row mb-2">
                            <input type="number" class="form-control" name="miktar" placeholder="Miktar" value="<?php echo $gider->miktar;?>">
                        </div>
                        <div class="row mb-2">
                            <input type="text" class="form-control" name="aciklama" placeholder="Aciklama" value="<?php echo $gider->aciklama;?>">
                        </div>
                        <div class="row mb-2">
                            <label for="tarih">Tarih</label>
                            <input type="date" id="tarih" class="form-control" name="tarih" placeholder="Tarih" value="<?php echo $gider->tarih;?>">
                        </div>
                        <input type="submit" class="btn btn-success btn-sm" name="update" value="Güncelle">
                        <a href="gider.php" class="btn btn-sm" style="background-color: black; color: white;">Vazgeç</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>