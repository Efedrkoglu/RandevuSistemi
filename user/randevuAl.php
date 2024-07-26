<?php include('../admin/code/HizmetQuerries.php');?>
<?php include('../admin/code/CalisanQuerries.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Randevu Al</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <style>
        
    </style>
</head>
<body>
    <div class="container-fluid" style="background-color: black; color: white;">
        <div class="row">
            <div class="col text-center">
                <h2 style="margin: 10px;">Randevu Sistemi</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="form-container">
                    <h3 style="text-align: center; margin: 30px 0;">Randevu Al</h3>
                    <form action="" id="form-1">
                        <h4 id="form-title">Bilgilerinizi Giriniz</h4>
                        <input type="text" name="name" placeholder="Ad Soyad" required>
                        <input type="text" name="email" placeholder="E-mail" required>
                        <input type="text" name="tel_no" placeholder="Telefon Numarası" required>

                        <div class="btn-box">
                            <button type="button" id="next1">İleri <i class="lni lni-arrow-right"></i></button>
                        </div>
                    </form>

                    <form action="" id="form-2">
                        <h4 id="form-title">Hizmet ve Tarih Seçiniz</h4>
                        <select id="hizmet" name="hizmet">
                            <option selected disabled>Hizmet Seçiniz</option>
                            <?php
                                $hizmetler = selectHizmet();

                                foreach($hizmetler as $hizmet) {
                                    echo "<option value='" . $hizmet->id . "'>" . $hizmet->ad . "</option>";
                                }
                            ?>
                        </select>
                        <select id="calisan" name="calisan">
                            <option selected disabled>Çalışan Seçiniz</option>
                            <?php
                                $calisanlar = selectCalisan();

                                foreach($calisanlar as $calisan) {
                                    echo "<option value='" . $calisan->id . "'>" . $calisan->isim . "</option>";
                                }
                            ?>
                        </select><br>
                        <label for="tarih" style="margin-top: 20px;">Tarih</label>
                        <input type="date" id="tarih" name="tarih" disabled>
                        <label for="saat" style="margin-top: 20px;">Saat</label>
                        <input type="time" id="saat" name="saat" disabled>

                        <div class="btn-box">
                            <button type="button" id="back1"><i class="lni lni-arrow-left"></i> Geri</button>
                            <button type="button" id="next2">İleri <i class="lni lni-arrow-right"></i></button>
                        </div>
                    </form>

                    <form action="" id="form-3">
                        <h4 id="form-title">Randevu Bilgileri</h4>
                        <input type="text" name="name" placeholder="Ad Soyad" required>
                        <input type="text" name="email" placeholder="E-mail" required>
                        <input type="text" name="tel_no" placeholder="Telefon Numarası" required>

                        <div class="btn-box">
                            <button type="button" id="back2"><i class="lni lni-arrow-left"></i> Geri</button>
                            <button type="submit" id="submitBtn">Randevu Al</button>
                        </div>
                    </form>

                    <div class="step-row">
                        <div id="progress"></div>
                        <div class="step-col"><small>1. Adım</small></div>
                        <div class="step-col"><small>2. Adım</small></div>
                        <div class="step-col"><small>3. Adım</small></div>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <div class="container-fluid mt-5" style="background-color: black;">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="row text-center" style="font-size: 2rem; margin: 10px;">
                <div class="col" ><a href="#" style="color: white; text-decoration: none;"><i class="lni lni-instagram"></i></a></div>
                <div class="col"><a href="#"  style="color: white; text-decoration: none;"><i class="lni lni-twitter-original"></i></a></div>
                <div class="col"><a href="#"  style="color: white; text-decoration: none;"><i class="lni lni-facebook-original"></i></a></div>
                <div class="col"><a href="#"  style="color: white; text-decoration: none;"><i class="lni lni-youtube"></i></a></div>
                <div class="col"><a href="#"  style="color: white; text-decoration: none;"><i class="lni lni-whatsapp"></i></a></div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        var form1 = document.getElementById("form-1");
        var form2 = document.getElementById("form-2");
        var form3 = document.getElementById("form-3");

        var next1 = document.getElementById("next1");
        var next2 = document.getElementById("next2");
        var back1 = document.getElementById("back1");
        var back2 = document.getElementById("back2");

        var progress = document.getElementById("progress");
    
        document.getElementById("calisan").addEventListener('change', () => {
            document.getElementById("tarih").disabled = false;
            document.getElementById("saat").disabled = false;
        });

        next1.onclick = function() {
            form1.style.left = "-550px";
            form2.style.left = "80px";
            progress.style.width = "368px";
        }
        back1.onclick = function() {
            form1.style.left = "80px";
            form2.style.left = "650px";
            progress.style.width = "184px";
        }

        next2.onclick = function() {
            form2.style.left = "-550px";
            form3.style.left = "80px";
            progress.style.width = "554px";
        }
        back2.onclick = function() {
            form2.style.left = "80px";
            form3.style.left = "650px";
            progress.style.width = "368px";
        }
    </script>
</body>
</html>