<?php
    include_once('MusteriQuerries.php');
    include_once('HizmetQuerries.php');
    include_once('CalisanQuerries.php');
    include_once('OdemeYontemiQuerries.php');
    include_once('RandevuQuerries.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = isset($_POST['name']) ? $_POST['name'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $tel_no = isset($_POST['tel_no']) ? $_POST['tel_no'] : "";
        $hizmet_id = isset($_POST['hizmet']) ? $_POST['hizmet'] : "";
        $calisan_id = isset($_POST['calisan']) ? $_POST['calisan'] : "";
        $tarih = isset($_POST['tarih']) ? $_POST['tarih'] : "";
        $saat = isset($_POST['saat']) ? $_POST['saat'] : "";
        $randevu_notu = isset($_POST['randevu_notu']) ? $_POST['randevu_notu'] : "";
        $odemeyontemi_id = isset($_POST['odemeyontemi']) ? $_POST['odemeyontemi'] : "";

        insertMusteri(new Musteri(1, $name, $email, $tel_no));
        $hizmet = selectHizmetById($hizmet_id);
        $calisan = selectCalisanById($calisan_id);
        $randevu_tarihi = $tarih . " " . $saat;
        $odemeyontemi = selectOdemeYontemiById($odemeyontemi_id);

        insertRandevu(new Randevu(1, selectMusteriById(selectLastMusteriId()), $calisan, $hizmet, $randevu_tarihi, $odemeyontemi, $randevu_notu));
    }
?>