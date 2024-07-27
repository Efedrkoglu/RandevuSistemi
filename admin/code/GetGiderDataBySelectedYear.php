<?php include('GiderQuerries.php')?>
<?php
    if(isset($_GET['year'])) {
        $year = $_GET['year'];
        $totalGiderBySelectedYear = selectTotalGiderBySelectedYear($year);
        echo json_encode($totalGiderBySelectedYear);
    }
?>