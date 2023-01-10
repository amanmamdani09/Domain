<?php 
include 'dashboard.php';

$n1_sql = "SELECT (year(`expire_date`)) AS 'year', GROUP_CONCAT(DISTINCT(month(`expire_date`))) AS 'month', GROUP_CONCAT(DISTINCT expire_date SEPARATOR ',') as date, GROUP_CONCAT(name SEPARATOR ',') as name  FROM domain WHERE user_id = '".$_SESSION['id']."' GROUP BY expire_date";
// $n_sql = "SELECT name,MONTHNAME(expire_date) AS month,DISTINCT YEAR(expire_date) AS year FROM domain ORDER BY YEAR(expire_date) ASC";

$nres = mysqli_query($con, $n1_sql);

// session_start();
$result = mysqli_fetch_all($nres, MYSQLI_ASSOC);
$rows = [];
// $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

// while ($row = mysqli_fetch_array($nres)) {
//     $rows[] = $row['year'];
//     // $rows[] = $row['month'];
//     // foreach ($months as $value) {
//     //     $rows[]= "$value <br>";
//     // }
//     [$data['month']]=explode(',',$data['domain']);
//     $rows[] = $row['name'];
// }
foreach ($result as $key => $data) {
    $rows[$data['year']][$data['month']][date('d',strtotime($data['date']))] = explode(',', $data['name']);
}
/*echo "<pre>";
print_r($rows);
die;*/
?>
<br></br>
<!-- // echo array_values($months)[0]; -->

<!DOCTYPE html>
<html>

<body>
    <ul>
        <?php
        foreach ($rows as $year => $domainData) { ?>
            <li><?php echo $year ?></li>
            <ul><?php for ($i = 1; $i <= 12; $i++) { ?>
                    <li><?php $domainName = [];
                        if (isset($domainData[$i])) {
                            $domainName = $domainData[$i];
                        } 
                        ?>
                        <?php echo sprintf("%s (%d)", date("F", mktime(0, 0, 0, $i)), count($domainName)); ?>
                        <?php if (count($domainName)) { ?>
                            <ul>
                                <?php foreach ($domainName as $domain) { ?>
                                    <?php foreach ($domain as $date) { ?>
                                        <li><?php echo $date ?></li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>
    </ul>
</body>

</html>

<!-- function mygenerateTreeMenu($rows, $limit = 0)
{
    $tree = '';
    // $key = '';
    // if ($limit > 1000) return '';
    foreach ($rows as $value) {
        if (!is_int($value)) {
            $tree .= "<li>";
            $tree .= "<a>$value</a><ul>";
            $tree .= mygenerateTreeMenu(
                $value,
                // $limit++
            );
            $tree .= "</ul></li>\n";
            // $tree .= "<ul>";
        } else {
            $tree .= mygenerateTreeMenu(
                $value,
                // $limit++
            );
        }
    }
    return $tree;
}
echo "<ul>\n";
$tree = mygenerateTreeMenu($rows);
echo $tree;
echo "</ul>\n";
?> -->