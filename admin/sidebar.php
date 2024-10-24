<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title;?></title>
    <link href="style/sidebarStyle.css" rel="stylesheet"/>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button id="toggle-btn" type="button"><i class="lni lni-grid-alt"></i></button>
                <div class="sidebar-logo">
                    <a href="home.php">Randevu Sistemi</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="home.php" class="sidebar-link" style="text-decoration: none;">
                        <i class="lni lni-home"></i>
                        <span>Anasayfa</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="calisan.php" class="sidebar-link" style="text-decoration: none;">
                        <i class="lni lni-user"></i>
                        <span>Çalışanlar</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="randevu.php" class="sidebar-link" style="text-decoration: none;">
                        <i class="lni lni-calendar"></i>
                        <span>Randevular</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="hizmet.php" class="sidebar-link" style="text-decoration: none;">
                        <i class="lni lni-cut"></i>
                        <span>Hizmetler</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="odemeYontemi.php" class="sidebar-link" style="text-decoration: none;">
                        <i class="lni lni-wallet"></i>
                        <span>Ödeme Yöntemleri</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"
                     data-bs-target="#gelirgider" aria-expanded="false" aria-controls="gelirgider" style="text-decoration: none;">
                        <i class="lni lni-dollar"></i>
                        <span>Gelir-Gider</span>
                    </a>
                    <ul id="gelirgider" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="gelir.php" class="sidebar-link" style="text-decoration: none;">Gelirler</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="gider.php" class="sidebar-link" style="text-decoration: none;">Giderler</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="analiz.php" class="sidebar-link" style="text-decoration: none;">
                        <i class="lni lni-stats-up"></i>
                        <span>Analiz</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="logout.php" class="sidebar-link" style="text-decoration: none;">
                    <i class="lni lni-exit"></i>
                    <span>Çıkış</span>
                </a>
            </div>
        </aside>
        <div class="main p-3">
                
