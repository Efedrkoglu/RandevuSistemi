<?php include('code/CheckAuthorized.php')?>
<?php
    ob_start();
    $title = "Gider Ekle";
    include('sidebar.php');
    include('code/GiderQuerries.php');

    if(isset($_POST['kaydet'])) {
        $gider = new Gider(1, $_POST['ad'], $_POST['miktar'], $_POST['aciklama'], $_POST['tarih']);
        insertGider($gider);
        header("Location: gider.php");
        exit();
    }
    ob_end_flush();
?>

<div class="container-fluid mt-5">
    <a href="gider.php" class="btn btn-sm" style="background-color: black; color: white;"><i class="lni lni-arrow-left"></i></a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <h4 class="mt-3">Gider Ekle</h4>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row mb-2">
                            <input type="text" class="form-control" name="ad" placeholder="Ad">
                        </div>
                        <div class="row mb-2">
                            <input type="number" class="form-control" name="miktar" placeholder="Miktar">
                        </div>
                        <div class="row mb-2">
                            <input type="text" class="form-control" name="aciklama" placeholder="Aciklama">
                        </div>
                        <div class="row mb-2">
                            <label for="tarih">Tarih</label>
                            <input type="date" id="tarih" class="form-control" name="tarih" placeholder="Tarih">
                        </div>
                        <input type="submit" class="btn btn-success btn-sm" name="kaydet" value="Kaydet">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>