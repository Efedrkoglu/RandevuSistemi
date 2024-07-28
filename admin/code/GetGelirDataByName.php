<?php include('GelirQuerries.php')?>
<?php
    $totalGelirByName = selectTotalGelirByName();
    echo json_encode($totalGelirByName);
?>