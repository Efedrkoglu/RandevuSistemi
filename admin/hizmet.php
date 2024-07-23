<?php $title="Çalışanlar";?>
<?php include('sidebar.php')?>
<?php include('code/HizmetQuerries.php');?>

<?php
    if(isset($_GET['delete'])) {
        $hizmet = selectHizmetById($_GET['delete']);
        deleteHizmet($hizmet);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
?>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hizmet Silinecek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
            </div>
            <div class="modal-body">
                Bu hizmeti silmek istediğinizden emin misiniz?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm" style="background-color: black; color: white;" data-bs-dismiss="modal">Vazgeç</button>
                <a id="deleteConfirmButton" class="btn btn-sm" style="background-color: red; color: white;" href="#">Sil</a>
            </div>
        </div>
    </div>
</div>

<div class="container mb-3 mt-5">
    <a href="hizmetEkle.php" class="btn btn-success btn-sm">Hizmet Ekle</a>
    <hr>
</div>

<div class="container mb-3 text-center">
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>Ad</th>
                <th>Açıklama</th>
                <th>Süre</th>
                <th>Fiyat</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $hizmetler = selectHizmet();

                foreach($hizmetler as $hizmet) {
                    echo "<tr>";
                    echo "<td>" . $hizmet->ad . "</td>";
                    echo "<td>" . $hizmet->aciklama . "</td>";
                    echo "<td>" . $hizmet->sure . " dk</td>";
                    echo "<td>" . $hizmet->fiyat . "₺</td>";
                    echo "<td><a href='hizmetDuzenle.php?edit=" . $hizmet->id . "' class='btn btn-sm' style='background-color: transparent; color: black;'><i class='lni lni-pencil-alt' style='font-size: 1.3rem;'></i></a>";
                    echo "<button onclick='confirmDelete(" . $hizmet->id . ")' class='btn btn-sm' style='background-color: transparent; color: red;'><i class='lni lni-trash-can' style='font-size: 1.3rem;'></i></button></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
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

<?php include('footer.php')?>