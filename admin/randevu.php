<?php include('code/CheckAuthorized.php')?>
<?php
    ob_start();
    $title="Randevular";
    include('sidebar.php');
    include('code/RandevuQuerries.php');

    if(isset($_GET['delete'])) {
        $randevu = selectRandevuById($_GET['delete']);
        deleteRandevu($randevu);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    ob_end_flush();
?>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Randevu Silinecek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
            </div>
            <div class="modal-body">
                Bu randevuyu silmek istediğinizden emin misiniz?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm" style="background-color: black; color: white;" data-bs-dismiss="modal">Vazgeç</button>
                <a id="deleteConfirmButton" class="btn btn-sm" style="background-color: red; color: white;" href="#">Sil</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="infoModalHeader"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="modal-content"></p>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="clearcontent()" class="btn btn-sm" style="background-color: black; color: white;" data-bs-dismiss="modal">Kapat</button>
      </div>
    </div>
  </div>
</div>

<div class="container mb-3 mt-5">
    <h3>Randevular</h3>
    <hr>
</div>

<div class="container mb-3 text-center">
    <div class="row">
        <div class="input-group mb-3">
            <span class="input-group-text" style="background-color: black; color: white;"><i class="lni lni-search-alt"></i></span>
            <input type="text" id="searchInput" class="form-control">
        </div>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Müşteri</th>
                    <th>Hizmet</th>
                    <th>Çalışan</th>
                    <th>Tarih</th>
                    <th>Saat</th>
                    <th>Ödeme Yöntemi</th>
                    <th>Randevu Notu</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody id="randevuTable">
                <?php 
                    $randevular = selectRandevu();
                    $i = 1;
                    foreach($randevular as $randevu) {
                        $time = explode(" ", $randevu->tarih);
                        $tarih = $time[0];
                        $saat = date('H:i', strtotime($time[1]));

                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td><span onclick='musteriInfo(" . $randevu->musteri->id . ")' style='cursor: pointer; color: #0780f2;'>" . $randevu->musteri->isim . "</span></td>";
                        echo "<td><span onclick='hizmetInfo(" . $randevu->hizmet->id . ")' style='cursor: pointer; color: #0780f2;'>" . $randevu->hizmet->ad . "</span></td>";
                        echo "<td><span onclick='calisanInfo(" . $randevu->calisan->id . ")' style='cursor: pointer; color: #0780f2;'>" . $randevu->calisan->isim . "</span></td>";
                        echo "<td>" . $tarih . "</td>";
                        echo "<td>" . $saat . "</td>";
                        echo "<td>" . $randevu->odemeyontemi->ad . "</td>";

                        if($randevu->randevu_notu != null)
                            echo "<td>" . $randevu->randevu_notu. "</td>";
                        else
                            echo "<td>-</td>";

                        echo "<td><a href='randevuDuzenle.php?edit=" . $randevu->id . "' class='btn btn-sm' style='background-color: transparent; color: black;'><i class='lni lni-pencil-alt' style='font-size: 1.3rem;'></i></a>";
                        echo "<button onclick='confirmDelete(" . $randevu->id . ")' class='btn btn-sm' style='background-color: transparent; color: red;'><i class='lni lni-trash-can' style='font-size: 1.3rem;'></i></button></td>";
                        echo "</tr>";
                        $i++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="script/randevuScript.js"></script>

<?php include('footer.php')?>