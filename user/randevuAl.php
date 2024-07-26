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
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        #prev {
            background-color: lightgray;
        }

        #prev:active {
            transform: scale(0.97);
        }

        #prev:hover {
            background-color: #c4c4c4;
        }

        #prev:focus {
            outline: 0;
        }

        #next {
            background-color: black;
            color: white;
        }

        #next:hover {
            background-color: #545454;
            color: white;
        }

        #next:focus {
            outline: 0;
        }

        #next:active {
            transform: scale(0.97);
        }
    </style>
</head>
<body>
    <div class="container-fluid" style="background-color: black; color: white;">
        <div class="row">
            <div class="col text-center">
                <h3>Randevu Sistemi</h3>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card text-center mt-5">
                    <h3 class="mt-3">Randevu Al</h3>
                    <div class="card-body">
                        <div id="step-1" class="step active">
                            <form id="form-step1">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="name" placeholder="Ad Soyad">
                                    <label for="name">Ad Soyad</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="email" placeholder="E-mail">
                                    <label for="email">E-mail</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="tel_no" placeholder="Telefon Numarası">
                                    <label for="tel_no">Telefon Numarası</label>
                                </div>
                            </form>
                        </div>
                        <div id="step-2" class="step">
                            <form id="form-step2">
                                <select name="hizmet" class="form-select mb-3">
                                    <option selected disabled>Hizmet Seçiniz</option>
                                    <?php
                                        $hizmetler = selectHizmet();

                                        foreach($hizmetler as $hizmet) {
                                            echo "<option value='" . $hizmet->id . "'>" . $hizmet->ad . "</option>";
                                        }
                                    ?>
                                </select>
                                <select name="calisan" class="form-select mb-3">
                                    <option selected disabled>Çalışan Seçiniz</option>
                                    <?php
                                        $calisanlar = selectCalisan();

                                        foreach($calisanlar as $calisan) {
                                            echo "<option value='" . $calisan->id . "'>" . $calisan->isim . "</option>";
                                        }
                                    ?>
                                </select>
                            </form>
                        </div>
                        <div id="step-3" class="step">
                            <form id="form-step3">
                                <div class="form-floating">
                                    <input type="date" id="tarih" class="form-control mb-3">
                                    <label for="tarih">Tarih</label>
                                </div>
                                <div class="form-floating">
                                    <input type="time" id="saat" class="form-control mb-3">
                                    <label for="saat">Saat</label>
                                </div>
                            </form>
                        </div>
                        <div id="step-4" class="step">
                            <h4>Randevu Bilgileri</h4>
                            <p>Ad Soyad: <span id="confirm-name"></span></p>
                            <p>E-mail: <span id="confirm-email"></span></p>
                            <p>Telefon Numarası: <span id="confirm-tel_no"></span></p>
                            <p>Hizmet: <span id="confirm-hizmet"></span></p>
                            <p>Çalışan: <span id="confirm-calisan"></span></p>
                            <p>Tarih: <span id="confirm-date"></span></p>
                            <p>Saat: <span id="confirm-time"></span></p>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <button class="btn" id="prev"><i class="lni lni-arrow-left"></i> Geri</button>
                            </div>
                            <div class="col-8"></div>
                            <div class="col-2">
                                <button class="btn" id="next">İleri <i class="lni lni-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        
    </script>
</body>
</html>