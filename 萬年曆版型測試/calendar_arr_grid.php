<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <title>grid版萬年曆</title>
</head>

<body>
    <?php
$calPre = [];
$cal = [];
$calNext = [];
$year = (isset($_GET['y'])) ? $_GET['y'] : date('Y');
$month = (isset($_GET['m'])) ? $_GET['m'] : date('n');

// 年或月超過允許範圍則重置
if ($month < 1 || $month > 12 || $year <= 0) {
    $year = date('Y');
    $month = date('n');
}

//修正邊界值異常-方法一
// if ($month == 13) {
//     $year = $year + 1;
//     $month = 1;
// } else if ($month == 0) {
//     $year = $year - 1;
//     $month = 12;
// }

$nextMonth = $month + 1;
$prevMonth = $month - 1;
$nextYear = $year;
$prevYear = $year;
//邊界異常處理方式二
if ($nextMonth > 12) {
    $nextMonth = 1;
    $nextYear = $year + 1;
} else if ($prevMonth < 1) {
    $prevMonth = 12;
    $prevYear = $year - 1;
}

//以每月一日為座標
$setDate = $year . '-' . $month . '-1';
//上個月的日期&天數設定
$preMonthDay = date('Y-m-d', strtotime('-1 month', strtotime($setDate)));
$preMonthLastDay = date('t', strtotime($preMonthDay));
//上個月的日期&天數設定
$nextMonthDay = date('Y-m-d', strtotime('+1 month', strtotime($setDate)));
$nextMonthLastDay = date('t', strtotime($nextMonthDay));
// 英文月份
$monEN = date("F", strtotime($setDate));
// 抓當月第一天是星期幾
$firstDateWeek = date('N', strtotime($setDate));
// 算出當月有幾天
$lastDays = date('t', strtotime($setDate));
//算出一個禮拜有幾週=整月天數+(1號的星期幾-1)再除7再無條件進位
$weekNum = ceil(($lastDays + ($firstDateWeek - 1)) / 7);
//比對是否為當天用的變數
$today = date('Y-m-d');
//reset鈕用的變數
$todayYear = date('Y');
$todayMonth = date('m');
$todayDay = date('d');
//本月剩餘天數-抓下個月要加入的區段用
$monthMod = $weekNum * 7 - ($lastDays + ($firstDateWeek - 1));
$lastWeekStart = ($weekNum - 1) * 7;



//上個月的日期
for ($i = 0; $i < $preMonthLastDay; $i++) {
    $calPre[] = date('Y-m-d', strtotime("+$i day", strtotime($preMonthDay)));
}
//這個月的日期
for ($i = 0; $i < $lastDays; $i++) {
    $cal[] = date('Y-m-d', strtotime("+$i day", strtotime($setDate)));
}
//下個月的日期
for ($i = 0; $i < $preMonthLastDay; $i++) {
    $calNext[] = date('Y-m-d', strtotime("+$i day", strtotime($nextMonthDay)));
}

//將上個月跟下個月要印的日期加入本月陣列的頭跟尾
for ($i = 1; $i < $firstDateWeek; $i++) {
    array_unshift($cal, $calPre[count($calPre) - $i]);
}
for ($i = 0; $i < $monthMod; $i++) {
    array_push($cal, $calNext[$i]);
}

switch ($month) {
    case 3:
    case 4:
    case 5:
        $season = "spring";
        break;
    case 6:
    case 7:
    case 8:
        $season = "summer";
        break;
    case 9:
    case 10:
    case 11:
        $season = "fall";
        break;
    case 12:
    case 1:
    case 2:
        $season = "winter";
        break;
}

?>

    <!-- calendar -->
    <div class="container <?=$season?>">
        <!-- prev & next button -->
        <div class="pre"><a href="?y=<?=$prevYear?>&m=<?=$prevMonth?>"></a></div>
        <div class="next"><a href="?y=<?=$nextYear?>&m=<?=$nextMonth?>"></a></div>
        <!-- prev & next button END-->
        <!-- month -->
        <div class="item month">
            <p><span><?=$year?></span><?=$monEN?></p>
        </div>
        <!-- month END-->
        <div class="decoration-line"></div>
        <!-- week -->
        <div class="item week">
            <p>MON</p>
        </div>
        <div class="item week">
            <p>TUE</p>
        </div>
        <div class="item week">
            <p>WED</p>
        </div>
        <div class="item week">
            <p>THU</p>
        </div>
        <div class="item week">
            <p>FRI</p>
        </div>
        <div class="item week">
            <p>STA</p>
        </div>
        <div class="item week">
            <p>SUN</p>
        </div>
        <!-- week END -->
        <div class="decoration-dash"></div>
        <div class="decoration-space"></div>
        <!-- 日期輸出區 -->
        <?php
foreach ($cal as $i => $day) {
    if ($day == $today) {
        echo '<div class="item day today"><p>';
        echo date('j', strtotime($day));
        echo "</p></div>";
    } else if (date('m', strtotime($day)) != date('m', strtotime($setDate)) && $i < $firstDateWeek - 1) {
        echo '<div class="item day"><p class="opacity">';
        echo date('j', strtotime($day));
        echo "</p></div>";
    } else if (date('m', strtotime($day)) != date('m', strtotime($setDate)) && $i >= $lastWeekStart) {
        echo '<div class="item day bottom"><p class="opacity">';
        echo date('j', strtotime($day));
        echo "</p></div>";
    } else if ($i >= $lastWeekStart) {
        echo '<div class="item day bottom"><p>';
        echo date('j', strtotime($day));
        echo "</p></div>";
    } else {
        echo '<div class="item day"><p>';
        echo date('j', strtotime($day));
        echo "</p></div>";
    }
}
?>
        <!-- 日期輸出區 END-->
        <!-- tool button -->
        <div class="tool <?=$season?>">
        <a href="./calendar_arr_grid.php" class="reset <?=$season?>">
                <p class="reset-title">TODAY</p>IS<p class="reset-date"><?=$todayMonth?><br><?=$todayDay?></p>
            </a>
            <!-- search box -->
            <form action="./calendar_arr_grid.php" method="get" class="<?=$season?>">
                <label for="year">YEAR</label>
                <input type="number" name="y" id="year" min="1" value="<?=$todayYear?>">
                <label for="month">MONTH</label>
                <input type="number" name="m" id="month" min="1" max="12" value="<?=$todayMonth?>">
                <label for="day">DAY</label>
                <input type="number" name="" id="day" min="1" max="31 "value="<?=$todayDay?>">
                <input type="submit" value="GO!">
            </form>
            <!-- search boe END -->
        </div>
        <!-- tool button END-->
    </div>
    <!-- calendar END-->
</body>

</html>