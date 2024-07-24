<?php include_once('MusteriQuerries.php');?>
<?php
    if(isset($_GET['id'])) {
        $musteri = selectMusteriById($_GET['id']);
        echo json_encode($musteri);
    }
?>