<?php include('GiderQuerries.php')?>
<?php
    $totalGiderByYear = selectTotalGiderByYear();
    echo json_encode($totalGiderByYear);
?>