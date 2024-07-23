<?php $title="Hizmet Ekle";?>
<?php include('sidebar.php');?>
<?php include('code/HizmetQuerries.php');?>

<?php 
    if(isset($_POST['kaydet'])) {
        $hizmet = new Hizmet(
            1,
            $_POST['ad'],
            $_POST['aciklama'],
            $_POST['sure'],
            $_POST['fiyat']
        );

        insertHizmet($hizmet);
        header("Location: hizmet.php");
        exit();
    }
?>

<div class="container-fluid mt-5">
    <a href="hizmet.php" class="btn btn-sm" style="background-color: black; color: white;"><i class="lni lni-arrow-left"></i></a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <h4 class="mt-3">Hizmet Ekle</h4>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" name="ad" placeholder="Ad">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" name="aciklama" placeholder="Açıklama">
                            </div>
                        </div>
                        <div class="row mb-3">
                        <div class="col">
                                <input type="number" class="form-control" name="sure" placeholder="Süre(dk)">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="number" class="form-control" name="fiyat" placeholder="Fiyat">
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