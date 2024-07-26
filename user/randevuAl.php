<?php include('../admin/code/HizmetQuerries.php');?>
<?php include('../admin/code/CalisanQuerries.php');?>
<?php include('../admin/code/OdemeYontemiQuerries.php');?>

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
                        <label for="name"><strong>Ad Soyad</strong></label>
                        <input type="text" id="name" name="name">
                        <label for="email" style="margin-top: 10px;"><strong>E-mail</strong></label>
                        <input type="text" id="email" name="email">
                        <label for="tel_no" style="margin-top: 10px;"><strong>Telefon Numarası</strong></label>
                        <input type="text" id="tel_no" name="tel_no">

                        <div class="btn-box">
                            <button type="button" id="next1" disabled>İleri <i class="lni lni-arrow-right"></i></button>
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
                        <select id="calisan" name="calisan" disabled>
                            <option selected disabled>Çalışan Seçiniz</option>
                            <?php
                                $calisanlar = selectCalisan();

                                foreach($calisanlar as $calisan) {
                                    echo "<option value='" . $calisan->id . "'>" . $calisan->isim . "</option>";
                                }
                            ?>
                        </select><br>
                        <label for="tarih" style="margin-top: 20px;"><strong>Tarih</strong></label>
                        <input type="date" id="tarih" name="tarih" disabled>
                        <label for="saat" style="margin-top: 20px;"><strong>Saat</strong></label>
                        <input type="time" id="saat" name="saat" disabled>

                        <div class="btn-box">
                            <button type="button" id="back1" style="background-color: gray;"><i class="lni lni-arrow-left"></i> Geri</button>
                            <button type="button" id="next2" disabled>İleri <i class="lni lni-arrow-right"></i></button>
                        </div>
                    </form>

                    <div id="form-3" class="confirm">
                        <h4 id="form-title">Randevu Bilgileri</h4>
                        <p><strong>Ad Soyad:</strong> <span id="confirm-name"></span></p>
                        <p><strong>E-mail:</strong> <span id="confirm-email"></span></p>
                        <p><strong>Telefon Numarası:</strong> <span id="confirm-tel_no"></span></p>
                        <p><strong>Hizmet:</strong> <span id="confirm-hizmet"></span></p>
                        <p><strong>Çalışan:</strong> <span id="confirm-calisan"></span></p>
                        <p><strong>Tarih:</strong> <span id="confirm-date"></span></p>
                        <p><strong>Saat:</strong> <span id="confirm-time"></span></p>
                        
                        <select id="odemeyontemi" name="odemeyontemi">
                            <option selected disabled>Ödeme Yöntemi</option>
                            <?php
                                $odemeyontemleri = selectOdemeYontemi();

                                foreach($odemeyontemleri as $odemeyontemi) {
                                    echo "<option value='" . $odemeyontemi->id . "'>" . $odemeyontemi->ad . "</option>";
                                }
                            ?>
                        </select>

                        <div class="btn-box">
                            <button type="button" id="back2" style="background-color: gray;"><i class="lni lni-arrow-left"></i> Geri</button>
                            <button type="button" id="submitBtn" disabled>Randevu Al</button>
                        </div>
                    </div>

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
    <div class="container-fluid mt-2" style="background-color: black;">
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
        document.addEventListener('DOMContentLoaded', () => {
            const form1 = document.getElementById('form-1');
            const form2 = document.getElementById('form-2');
            const form3 = document.getElementById('form-3');

            const next1 = document.getElementById('next1');
            const next2 = document.getElementById('next2');
            const back1 = document.getElementById('back1');
            const back2 = document.getElementById('back2');

            const progress = document.getElementById('progress');

            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const telNoInput = document.getElementById('tel_no');

            const hizmetInput = document.getElementById('hizmet');
            const calisanInput = document.getElementById('calisan');
            const tarihInput = document.getElementById('tarih');
            const saatInput = document.getElementById('saat');

            const odemeYontemiInput = document.getElementById('odemeyontemi');
            const submitBtn = document.getElementById('submitBtn');

            function checkForm1() {
                if (nameInput.value && emailInput.value && telNoInput.value) {
                    next1.disabled = false;
                } else {
                    next1.disabled = true;
                }
            }

            function checkForm2() {
                if (hizmetInput.value && calisanInput.value && tarihInput.value && saatInput.value) {
                    next2.disabled = false;
                } else {
                    next2.disabled = true;
                }
            }

            nameInput.addEventListener('input', checkForm1);
            emailInput.addEventListener('input', checkForm1);
            telNoInput.addEventListener('input', checkForm1);

            hizmetInput.addEventListener('change', () => {
                calisanInput.disabled = false;
                checkForm2();
            });
            calisanInput.addEventListener('change', () => {
                tarihInput.disabled = false;
                saatInput.disabled = false;
                checkForm2();
            });
            tarihInput.addEventListener('change', checkForm2);
            saatInput.addEventListener('change', checkForm2);

            odemeYontemiInput.addEventListener('change', () => {
                submitBtn.disabled = false;
            });

            next1.onclick = function() {
                form1.style.left = "-550px";
                form2.style.left = "80px";
                progress.style.width = "368px";
            };
            back1.onclick = function() {
                form1.style.left = "80px";
                form2.style.left = "650px";
                progress.style.width = "184px";
            };

            next2.onclick = function() {
                var hizmet = document.getElementById("hizmet");
                var selectedHizmet = hizmet.selectedIndex;
                var hizmetText = hizmet.options[selectedHizmet].text;

                var calisan = document.getElementById("calisan");
                var selectedCalisan = calisan.selectedIndex;
                var calisanText = calisan.options[selectedCalisan].text;

                document.getElementById("confirm-name").innerHTML = document.getElementById("name").value;
                document.getElementById("confirm-email").innerHTML = document.getElementById("email").value;
                document.getElementById("confirm-tel_no").innerHTML = document.getElementById("tel_no").value;
                document.getElementById("confirm-hizmet").innerHTML = hizmetText;
                document.getElementById("confirm-calisan").innerHTML = calisanText;
                document.getElementById("confirm-date").innerHTML = document.getElementById("tarih").value;
                document.getElementById("confirm-time").innerHTML = document.getElementById("saat").value;

                form2.style.left = "-550px";
                form3.style.left = "80px";
                progress.style.width = "554px";
            };
            back2.onclick = function() {
                form2.style.left = "80px";
                form3.style.left = "650px";
                progress.style.width = "368px";
            };
        });
    </script>
</body>
</html>