<?php include('code/CheckAuthorized.php')?>
<?php
    ob_start();
    $title = "Giderler";
    include('sidebar.php');
    include('code/GiderQuerries.php');
    include('code/Pagination.php');

    $currentPage = 1;
    $maxPage = getMaxPage("gider");
    if(isset($_GET['page'])) {
        $currentPage = $_GET['page'];
    }
    else {
        $currentPage = 1;
    }

    if(isset($_GET['delete'])) {
        $gider = selectGiderById($_GET['delete']);
        deleteGider($gider);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    ob_end_flush();
?>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Gider Silinecek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
            </div>
            <div class="modal-body">
                Bu gideri silmek istediğinizden emin misiniz?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm" style="background-color: black; color: white;" data-bs-dismiss="modal">Vazgeç</button>
                <a id="deleteConfirmButton" class="btn btn-sm" style="background-color: red; color: white;" href="#">Sil</a>
            </div>
        </div>
    </div>
</div>

<div class="container mb-3 mt-5">
    <h3>Giderler</h3>
    <a href="giderEkle.php" class="btn btn-success btn-sm mt-2">Gider Ekle</a>
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
                $giderler = selectGider($currentPage);
                $i = 1;
                foreach($giderler as $gider) {
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $gider->ad . "</td>";
                    echo "<td>" . $gider->miktar . "₺</td>";
                    echo "<td>" . $gider->aciklama . "</td>";
                    echo "<td>" . $gider->tarih . "</td>";
                    echo "<td><a href='giderDuzenle.php?edit=" . $gider->id . "' class='btn btn-sm' style='background-color: transparent; color: black;'><i class='lni lni-pencil-alt' style='font-size: 1.3rem;'></i></a>";
                    echo "<button onclick='confirmDelete(" . $gider->id . ")' class='btn btn-sm' style='background-color: transparent; color: red;'><i class='lni lni-trash-can' style='font-size: 1.3rem;'></i></button></td>";
                    echo "</tr>";
                    $i++;
                }
            ?>
        </tbody>
    </table>
    <a href="?page=<?php echo max(1, $currentPage - 1); ?>" class="btn btn-secondary btn-sm <?php if($currentPage == 1) echo 'disabled';?>" style="background-color: black; color: white;"><i class="lni lni-arrow-left"></i></a>
    <?php
        if($maxPage == 0) {
            echo "0/0";
        }
        else {
            echo $currentPage . "/" . $maxPage; 
        }
    ?>
    <a href="?page=<?php echo min($maxPage, $currentPage + 1); ?>" class="btn btn-secondary btn-sm <?php if($currentPage == $maxPage || $maxPage == 0) echo 'disabled';?>" style="background-color: black; color: white;"><i class="lni lni-arrow-right"></i></a>
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