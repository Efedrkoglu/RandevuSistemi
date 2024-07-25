<?php include('code/CheckAuthorized.php')?>
<?php
    ob_start();
    $title="Hizmet Düzenle";
    include('sidebar.php');
    include('code/HizmetQuerries.php');

    if(isset($_GET['edit'])) {
        $hizmet = selectHizmetById($_GET['edit']);
    }

    if(isset($_POST['update'])) {
        $hizmet->ad = $_POST['ad'];
        $hizmet->aciklama = $_POST['aciklama'];
        $hizmet->sure = $_POST['sure'];
        $hizmet->fiyat = $_POST['fiyat'];

        updateHizmet($hizmet);
        header("Location: hizmet.php");
        exit();
    }
    ob_end_flush();
?>

<div class="container-fluid mt-5">
    <a href="hizmet.php" class="btn btn-sm" style="background-color: black; color: white;"><i class="lni lni-arrow-left"></i></a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <h4 class="mt-3">Hizmet Düzenle</h4>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" name="ad" placeholder="Ad" value="<?php echo $hizmet->ad ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" name="aciklama" placeholder="Açıklama" value="<?php echo $hizmet->aciklama ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                        <div class="col">
                                <input type="number" class="form-control" name="sure" placeholder="Süre(dk)" value="<?php echo $hizmet->sure ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="number" class="form-control" name="fiyat" placeholder="Fiyat" value="<?php echo $hizmet->fiyat ?>">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success btn-sm" name="update" value="Güncelle">
                        <a href="hizmet.php" class="btn btn-sm" style="background-color: black; color: white;">Vazgeç</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>