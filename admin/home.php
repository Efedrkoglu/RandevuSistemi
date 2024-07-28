<?php include('code/CheckAuthorized.php')?>
<?php $title="Anasayfa";?>
<?php include('code/CalisanQuerries.php');?>
<?php include('sidebar.php');?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
<div class="container mt-5">
    <div class="row mb-3">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Merhaba <?php echo $_SESSION['username'];?></h3>
            </div>
        </div>
        <div class="col-auto">
            <div class="datetime-container">
                <div class="date" id="date"></div>
                <div class="time text-center" id="time"></div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="card">
                <h4 class="mt-2 text-center">Ayın Elemanı</h4>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="table-dark text-center">
                            <th>Çalışan</th>
                            <th>Randevu Sayısı</th>
                        </thead>
                        <tbody class="text-center">
                            <?php
                                $calisanlar = selectAyinElemani(date('n'));

                                foreach($calisanlar as $isim => $randevu) {
                                    echo "<tr>";
                                    echo "<td>" . $isim . "</td>";
                                    echo "<td>" . $randevu . "</td>";
                                    echo "</tr>";
                                }                                
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="card">
                <h4 class="mt-2 text-center">Yıllara göre toplam gelir</h4>
                <div class="card-body">
                    <canvas id="grafikGelirler" style="max-width:100%;"></canvas>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <h4 class="mt-2 text-center">Yıllara göre toplam gider</h4>
                <div class="card-body">
                    <canvas id="grafikGiderler" style="max-width:100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="card">
                <h4 class="mt-2 text-center">Gelir grupları</h4>
                <div class="card-body">
                    <canvas id="grafikGelirler2" style="max-width:100%;"></canvas>       
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <h4 class="mt-2 text-center">Gider grupları</h4>
                <div class="card-body">
                    <canvas id="grafikGiderler2" style="max-width:100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="script/homeScript.js"></script>

<?php include('footer.php');?>