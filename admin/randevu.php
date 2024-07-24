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
                        $saat = $time[1];

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

<script>
    async function fetchMusteriData(id) {
        const response = await fetch(`code/GetMusteriById.php?id=${id}`);
        const data = await response.json();
        return data;
    }

    async function fetchCalisanData(id) {
        const response = await fetch(`code/GetCalisanById.php?id=${id}`);
        const data = await response.json();
        return data;
    }

    async function fetchHizmetData(id) {
        const response = await fetch(`code/GetHizmetById.php?id=${id}`);
        const data = await response.json();
        return data;
    }

    document.getElementById('searchInput').addEventListener('keyup', function() {
        var input = document.getElementById('searchInput');
        var filter = input.value.toLowerCase();
        var rows = document.getElementById('randevuTable').getElementsByTagName('tr');
        
        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName('td');
            var match = false;
            
            for (var j = 0; j < cells.length; j++) {
                if (cells[j].innerText.toLowerCase().indexOf(filter) > -1) {
                    match = true;
                    break;
                }
            }
            
            if (match) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    });

    function confirmDelete(id) {
        var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'), {
            keyboard: false
        });
        document.getElementById('deleteConfirmButton').setAttribute('href', '?delete=' + id);
        deleteModal.show();
    }

    async function musteriInfo(id) {
        const musteriData = await fetchMusteriData(id);
        const values = Object.values(musteriData);

        var infoModal = new bootstrap.Modal(document.getElementById('infoModal'));
        document.getElementById('infoModalHeader').textContent = "Müşteri Bilgileri";
        var content = document.getElementById('modal-content');

        for (let i = 1; i < values.length; i++) {
            if(i == 2) {
                content.innerHTML +="E-mail: " + values[i] + "<br>";
            }
            else if(i == 3) {
                content.innerHTML +="Telefon: " + values[i] + "<br>";
            }
            else {
                content.innerHTML += values[i] + "<br>";
            }
        }

        infoModal.show();
    }

    async function hizmetInfo(id) {
        const hizmetData = await fetchHizmetData(id);
        const values = Object.values(hizmetData);

        var infoModal = new bootstrap.Modal(document.getElementById('infoModal'));
        document.getElementById('infoModalHeader').textContent = "Hizmet Bilgileri";
        var content = document.getElementById('modal-content');

        for (let i = 2; i < values.length; i++) {
            if(i == 3) {
                content.innerHTML += values[i] + " dk<br>";
            }
            else if(i == 4) {
                content.innerHTML += values[i] + "₺<br>";
            }
            else {
                content.innerHTML += values[i] + "<br>";
            }
        }

        infoModal.show();
    }

    async function calisanInfo(id) {
        const calisanData = await fetchCalisanData(id);
        const values = Object.values(calisanData);

        var infoModal = new bootstrap.Modal(document.getElementById('infoModal'));
        document.getElementById('infoModalHeader').textContent = "Çalışan Bilgileri";
        var content = document.getElementById('modal-content');

        content.innerHTML += values[1] + "<br>";
        content.innerHTML +="E-mail: " + values[2] + "<br>";
        content.innerHTML +="Telefon: " + values[7];

        infoModal.show();
    }

    function clearcontent() {
        document.getElementById('modal-content').innerHTML = "";
    }

</script>

<?php include('footer.php')?>