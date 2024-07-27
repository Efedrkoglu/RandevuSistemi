<?php include('code/CheckAuthorized.php');?>
<?php $title="Analiz";?>
<?php include('sidebar.php');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<div class="container mt-5">
    <form action="">
        <div class="row">
            <div class="col">
                <select class="form-select" name="year" id="yearSelect">
                    <option value="" disabled selected>Yıllar</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>
            </div>
        </div>
    </form>
</div>
<div class="container mt-4">
    <div class="row mb-3">
        <div class="col">
            <div class="card">
                <div class="card-body" style="background-color: rgb(76,175,80); color: white; font-size: 20px;">
                    <h5 class="card-title">Toplam gelir</h5>
                    <div id="toplamGelir"></div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body" style="background-color: rgb(255,0,0); color: white; font-size: 20px;">
                    <h5 class="card-title">Toplam gider</h5>
                    <div id="toplamGider"></div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body" id="netKazancCard">
                    <h5 class="card-title">Net Kazanç</h5>
                    <div id="netKazanc"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Aylık Gelirler</h5>
                <canvas id="grafikGelirler" style="width:100%;"></canvas>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Aylık Giderler</h5>
                <canvas id="grafikGiderler" style="width:100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="script/analizScript.js"></script>

<?php include('footer.php');?>