<?php
    ob_start();
    $title="Ödeme Yöntemleri";
    include('code/OdemeYontemiQuerries.php');
    include('sidebar.php');

    if(isset($_POST['kaydet'])) {
        $odemeyontemiId = $_POST['id'];
        $odemeyontemiAd = $_POST['ad'];

        if(!empty($odemeyontemiId)) 
            updateOdemeYontemi(new OdemeYontemi($odemeyontemiId, $odemeyontemiAd));
        else 
            insertOdemeYontemi(new OdemeYontemi(1, $odemeyontemiAd));

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    if(isset($_POST['vazgec'])) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    if(isset($_GET['delete'])) {
        $odemeyontemi = selectOdemeYontemiById($_GET['delete']);
        deleteOdemeYontemi($odemeyontemi);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    ob_end_flush();
?>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Ödeme Yöntemi Silinecek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
            </div>
            <div class="modal-body">
                Bu ödeme yöntemini silmek istediğinizden emin misiniz?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm" style="background-color: black; color: white;" data-bs-dismiss="modal">Vazgeç</button>
                <a id="deleteConfirmButton" class="btn btn-sm" style="background-color: red; color: white;" href="#">Sil</a>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card text-center">
                <?php
                    $currentOdemeYontemi = null;
                    if(isset($_GET['edit']))  {
                        $currentOdemeYontemi = selectOdemeYontemiById($_GET['edit']);
                    }
                ?>
                <h4 class="mt-3">Ödeme Yöntemi Ekle</h4>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $currentOdemeYontemi->id : '';?>">
                        <input type="text" class="form-control mb-3" name="ad" placeholder="Ödeme Yöntemi" value="<?php echo isset($_GET['edit']) ? $currentOdemeYontemi->ad : '';?>">
                        <input type="submit" class="btn btn-sm btn-success" name="kaydet" value="<?php echo isset($_GET['edit']) ? 'Güncelle' : 'Kaydet';?>">
                        <input type="<?php echo isset($_GET['edit']) ? 'submit' : 'hidden';?>" class="btn btn-sm" style="background-color: black; color: white;" name="vazgec" value="Vazgeç">
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
                <h4 class="mt-3">Ödeme Yöntemleri</h4>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <th>#</th>
                            <th>Ödeme Yöntemi</th>
                            <th>İşlemler</th>
                        </thead>
                        <tbody>
                            <?php 
                                $odemeyontemleri = selectOdemeYontemi();
                                $i = 1;
                                foreach($odemeyontemleri as $odemeyontemi) {
                                    echo "<tr>";
                                    echo "<td>" . $i . "</td>";
                                    echo "<td>" . $odemeyontemi->ad . "</td>";
                                    echo "<td><a href='?edit=" . $odemeyontemi->id . "' class='btn btn-sm' style='background-color: transparent; color: black;'><i class='lni lni-pencil-alt' style='font-size: 1.3rem;'></i></a>";
                                    echo "<button onclick='confirmDelete(" . $odemeyontemi->id . ")' class='btn btn-sm' style='background-color: transparent; color: red;'><i class='lni lni-trash-can' style='font-size: 1.3rem;'></i></button></td>";
                                    echo "</tr>";
                                    $i++;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'), {
            keyboard: false
        });
        document.getElementById('deleteConfirmButton').setAttribute('href', '?delete=' + id);
        deleteModal.show();
    }
</script>

<?php include('footer.php');?>