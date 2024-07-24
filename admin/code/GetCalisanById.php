<?php
    include_once('CalisanQuerries.php');

    if(isset($_GET['id'])) {
        $calisan = selectCalisanById($_GET['id']);
        echo json_encode($calisan);
    }
?>