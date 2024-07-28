<?php include('GelirQuerries.php')?>
<?php
    $totalGelirByYear = selectTotalGelirByYear();
    echo json_encode($totalGelirByYear);
?>