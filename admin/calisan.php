<?php include('code/CheckAuthorized.php')?>
<?php
    ob_start();
    $title = "Çalışanlar";
    include('sidebar.php');
    include('code/CalisanQuerries.php');
    if(isset($_GET['delete'])) {
        $calisan = selectCalisanById($_GET['delete']);
        deleteCalisan($calisan);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    ob_end_flush();
?>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Çalışan Silinecek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
            </div>
            <div class="modal-body">
                Bu Çalışanı silmek istediğinizden emin misiniz?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm" style="background-color: black; color: white;" data-bs-dismiss="modal">Vazgeç</button>
                <a id="deleteConfirmButton" class="btn btn-sm" style="background-color: red; color: white;" href="#">Sil</a>
            </div>
        </div>
    </div>
</div>

<div class="container mb-3 mt-5">
    <h3>Çalışanlar</h3>
    <a href="calisanEkle.php" class="btn btn-success btn-sm mt-2">Çalışan Ekle</a>
    <hr>
</div>

<div class="container mb-3 text-center">
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>İsim</th>
                <th>E-mail</th>
                <th>Telefon</th>
                <th>Mesai Saatleri</th>
                <th>İşe Başlama Tarihi</th>
                <th>Maaş</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $calisanlar = selectCalisan();
                $i = 1;
                foreach($calisanlar as $calisan) {
                    $calisma_baslangic = date('H:i', strtotime($calisan->calisma_baslangic));
                    $calisma_bitis = date('H:i', strtotime($calisan->calisma_bitis));

                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $calisan->isim . "</td>";
                    echo "<td>" . $calisan->email . "</td>";
                    echo "<td>" . $calisan->tel_no . "</td>";
                    echo "<td>" . $calisma_baslangic . "-" . $calisma_bitis . "</td>";
                    echo "<td>" . $calisan->ise_giris_tarihi . "</td>";
                    echo "<td>" . $calisan->maas . "₺</td>";
                    echo "<td><a href='calisanDuzenle.php?edit=" . $calisan->id . "' class='btn btn-sm' style='background-color: transparent; color: black;'><i class='lni lni-pencil-alt' style='font-size: 1.3rem;'></i></a>";
                    echo "<button onclick='confirmDelete(" . $calisan->id . ")' class='btn btn-sm' style='background-color: transparent; color: red;'><i class='lni lni-trash-can' style='font-size: 1.3rem;'></i></button></td>";
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