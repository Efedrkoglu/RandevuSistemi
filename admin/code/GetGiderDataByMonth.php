<?php include('GiderQuerries.php')?>
<?php
    if(isset($_GET['year'])) {
        $year = $_GET['year'];
        $totalGiderByMonth = selectTotalGiderByMonth($year);
        echo json_encode($totalGiderByMonth);
    }
?>