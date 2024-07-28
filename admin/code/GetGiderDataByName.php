<?php include('GiderQuerries.php')?>
<?php
    $totalGiderByName = selectTotalGiderByName();
    echo json_encode($totalGiderByName);
?>