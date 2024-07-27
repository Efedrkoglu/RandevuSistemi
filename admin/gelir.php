<?php include('code/CheckAuthorized.php')?>
<?php
    ob_start();
    $title = "Gelirler";
    include('sidebar.php');
    include('code/GelirQuerries.php');
    if(isset($_GET['delete'])) {
        $gelir = selectGelirById($_GET['delete']);
        deleteGelir($gelir);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    ob_end_flush();
?>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Gelir Silinecek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
            </div>
            <div class="modal-body">
                Bu geliri silmek istediğinizden emin misiniz?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm" style="background-color: black; color: white;" data-bs-dismiss="modal">Vazgeç</button>
                <a id="deleteConfirmButton" class="btn btn-sm" style="background-color: red; color: white;" href="#">Sil</a>
            </div>
        </div>
    </div>
</div>

<div class="container mb-3 mt-5">
    <h3>Gelirler</h3>
    <a href="gelirEkle.php" class="btn btn-success btn-sm mt-2">Gelir Ekle</a>
    <hr>
</div>

<div class="container mb-3 text-center">
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Ad</th>
                <th>Miktar</th>
                <th>Aciklama</th>
                <th>Tarih</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $gelirler = selectGelir();
                $i = 1;
                foreach($gelirler as $gelir) {
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $gelir->ad . "</td>";
                    echo "<td>" . $gelir->miktar . "₺</td>";
                    echo "<td>" . $gelir->aciklama . "</td>";
                    echo "<td>" . $gelir->tarih . "</td>";
                    echo "<td><a href='gelirDuzenle.php?edit=" . $gelir->id . "' class='btn btn-sm' style='background-color: transparent; color: black;'><i class='lni lni-pencil-alt' style='font-size: 1.3rem;'></i></a>";
                    echo "<button onclick='confirmDelete(" . $gelir->id . ")' class='btn btn-sm' style='background-color: transparent; color: red;'><i class='lni lni-trash-can' style='font-size: 1.3rem;'></i></button></td>";
                    echo "</tr>";
                    $i++;
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