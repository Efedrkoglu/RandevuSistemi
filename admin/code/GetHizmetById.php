<?php
    include_once('HizmetQuerries.php');

    if(isset($_GET['id'])) {
        $hizmet = selectHizmetById($_GET['id']);
        echo json_encode($hizmet);
    }
?>