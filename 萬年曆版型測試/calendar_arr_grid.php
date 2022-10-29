<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/calendar-days-regular.svg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./style.css">
    <title>萬年曆作業</title>
    <!-- v1.0.1 2022/10/29 20:57-->
</head>

<body>
    <?php
$calPre = [];
$cal = [];
$calNext = [];

$year = (isset($_GET['y'])) ? $_GET['y'] : date('Y');
$month = (isset($_GET['m'])) ? $_GET['m'] : date('n');

//若輸入的年或月超過範圍強制跳到今天
if ($month < 1 || $month > 12 || $year <= 0) {
    $year = date('Y');
    $month = date('n');
}

//修正小於100年年份判斷
while (strlen($year) < 4) {
    $year = "0$year";
}

$nextMonth = $month + 1;
$prevMonth = $month - 1;
$nextYear = $year;
$prevYear = $year;
//邊界異常處理方式
if ($nextMonth > 12) {
    $nextMonth = 1;
    $nextYear = $year + 1;
} else if ($prevMonth < 1) {
    $prevMonth = 12;
    $prevYear = $year - 1;
}

// 週日開始格式
if (isset($_GET['v']) && $_GET['v'] == "EN") {

    $version = $_GET['v'];
    //以每月一日為座標
    $setDay = "$year-$month-1";
    //上個月的日期&天數設定
    $firstDayWeek = date('w', strtotime($setDay));
    $lastDays = date('t', strtotime($setDay));
    $weekNum = ceil(($firstDayWeek + $lastDays) / 7);
    $modDays = $weekNum * 7 - ($firstDayWeek + $lastDays);
    $monEN = date("F", strtotime($setDay));
    //設定上個月變數
    $preMonthDay = date('Y-m-d', strtotime('-1 month', strtotime($setDay)));
    $PreMonthLastDay = date('t', strtotime($preMonthDay));
    //設定下個月變數
    $nextMonthDay = date('Y-m-d', strtotime('+1 month', strtotime($setDay)));
    $nextMonthLastDay = date('t', strtotime($nextMonthDay));
    //本月剩餘天數-抓下個月要加入的區段用
    $lastWeekStart = ($weekNum - 1) * 7;

    //印星期用陣列
    $week = ["SUN", "MON", "TUE", "WED", "THU", "FRI", "STA"];
    //上個月的日期
    for ($i = 0; $i < $PreMonthLastDay; $i++) {
        $calPre[] = date('Y-m-d', strtotime("+$i day", strtotime($preMonthDay)));
    }
    //這個月的日期
    for ($i = 0; $i < $lastDays; $i++) {
        $cal[] = date('Y-m-d', strtotime("+$i day", strtotime($setDay)));
    }
    //下個月的日期
    for ($i = 0; $i < $PreMonthLastDay; $i++) {
        $calNext[] = date('Y-m-d', strtotime("+$i day", strtotime($nextMonthDay)));
    }

    //將上個月跟下個月要印的日期加入本月陣列的頭跟尾
    for ($i = 0; $i < $firstDayWeek; $i++) {
        array_unshift($cal, $calPre[(count($calPre) - 1) - $i]);
    }
    for ($i = 0; $i < $modDays; $i++) {
        array_push($cal, $calNext[$i]);
    }

} else {
    //週一開始格式
    $version = '';

    //以每月一日為座標
    $setDay = "$year-$month-1";
    //上個月的日期&天數設定
    $preMonthDay = date('Y-m-d', strtotime('-1 month', strtotime($setDay)));
    $preMonthLastDay = date('t', strtotime($preMonthDay));
    //上個月的日期&天數設定
    $nextMonthDay = date('Y-m-d', strtotime('+1 month', strtotime($setDay)));
    $nextMonthLastDay = date('t', strtotime($nextMonthDay));
    // 英文月份
    $monEN = date("F", strtotime($setDay));
    // 抓當月第一天是星期幾
    $firstDayWeek = date('N', strtotime($setDay));
    // 算出當月有幾天
    $lastDays = date('t', strtotime($setDay));
    //算出一個禮拜有幾週=整月天數+(1號的星期幾-1)再除7再無條件進位
    $weekNum = ceil(($lastDays + ($firstDayWeek - 1)) / 7);
    //本月剩餘天數-抓下個月要加入的區段用
    $monthMod = $weekNum * 7 - ($lastDays + ($firstDayWeek - 1));
    $lastWeekStart = ($weekNum - 1) * 7;

    //印星期用陣列
    $week = ["MON", "TUE", "WEN", "THU", "FRI", "STA", "SUN"];
    //上個月的日期
    for ($i = 0; $i < $preMonthLastDay; $i++) {
        $calPre[] = date('Y-m-d', strtotime("+$i day", strtotime($preMonthDay)));
    }
    //這個月的日期
    for ($i = 0; $i < $lastDays; $i++) {
        $cal[] = date('Y-m-d', strtotime("+$i day", strtotime($setDay)));
    }
    //下個月的日期
    for ($i = 0; $i < $preMonthLastDay; $i++) {
        $calNext[] = date('Y-m-d', strtotime("+$i day", strtotime($nextMonthDay)));
    }

    //將上個月跟下個月要印的日期加入本月陣列的頭跟尾
    for ($i = 1; $i < $firstDayWeek; $i++) {
        array_unshift($cal, $calPre[count($calPre) - $i]);
    }
    for ($i = 0; $i < $monthMod; $i++) {
        array_push($cal, $calNext[$i]);
    }
}
//比對是否為當天用的變數
$today = date('Y-m-d');
//reset鈕用的變數
$todayYear = date('Y');
$todayMonth = date('m');
$todayDay = date('d');

//四季變色用變數
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
        <div class="pre"><a href="?y=<?=$prevYear?>&m=<?=$prevMonth?>&v=<?=$version?>"></a></div>
        <div class="next"><a href="?y=<?=$nextYear?>&m=<?=$nextMonth?>&v=<?=$version?>"></a></div>
        <!-- prev & next button END-->
        <!-- month -->
        <div class="item month">
            <p><span><?=$year?></span><?=$monEN?></p>
        </div>
        <!-- month END-->
        <div class="decoration-line"></div>
        <!-- week -->
        <?php
foreach ($week as $weeks) {
    echo '<div class="item week"><p>';
    echo $weeks;
    echo '</p></div>';
}
?>
        <!-- week END -->
        <div class="decoration-dash"></div>
        <div class="decoration-space"></div>
        <!-- 日期輸出區 -->
        <?php
foreach ($cal as $i => $day) {
    // 判斷是否為01-01
    if (date('m-d', strtotime($day)) == '01-01') {
        if (date('m', strtotime($day)) != date('m', strtotime($setDay))) {
            if ($day == $today) {
                echo '<div class="item day today holiday"><p class="opacity">';
                echo date('j', strtotime($day));
                echo '</p><p class="holiday-txt opacity">元旦';
                echo "</p></div>";
            } else {
                echo '<div class="item day holiday"><p class="opacity">';
                echo date('j', strtotime($day));
                echo '</p><p class="holiday-txt opacity">元旦';
                echo "</p></div>";
            }
        } else {
            if ($day == $today) {
                echo '<div class="item day today thisMonth holiday"><p>';
                echo date('j', strtotime($day));
                echo '</p><p class="holiday-txt">元旦';
                echo "</p></div>";
            } else {
                echo '<div class="item day holiday"><p>';
                echo date('j', strtotime($day));
                echo '</p><p class="holiday-txt">元旦';
                echo "</p></div>";
            }
        }
        //228判斷
    } else if (date('m-d', strtotime($day)) == '02-28') {
        if (date('m', strtotime($day)) != date('m', strtotime($setDay))) {
            if ($day == $today) {
                echo '<div class="item day today holiday"><p class="opacity">';
                echo date('j', strtotime($day));
                echo '</p><p class="holiday-txt opacity">和平紀念日';
                echo "</p></div>";
            } else {
                echo '<div class="item day holiday"><p class="opacity">';
                echo date('j', strtotime($day));
                echo '</p><p class="holiday-txt opacity">和平紀念日';
                echo "</p></div>";
            }
        } else {
            if ($day == $today) {
                echo '<div class="item day today thisMonth holiday"><p>';
                echo date('j', strtotime($day));
                echo '</p><p class="holiday-txt">和平紀念日';
                echo "</p></div>";
            } else {
                echo '<div class="item day holiday"><p>';
                echo date('j', strtotime($day));
                echo '</p><p class="holiday-txt">和平紀念日';
                echo "</p></div>";
            }
        }
        //05-01判斷
    } else if (date('m-d', strtotime($day)) == '05-01') {
        if (date('m', strtotime($day)) != date('m', strtotime($setDay))) {
            if ($day == $today) {
                echo '<div class="item day today holiday"><p class="opacity">';
                echo date('j', strtotime($day));
                echo '</p><p class="holiday-txt opacity">勞動節';
                echo "</p></div>";
            } else {
                echo '<div class="item day holiday"><p class="opacity">';
                echo date('j', strtotime($day));
                echo '</p><p class="holiday-txt opacity">勞動節';
                echo "</p></div>";
            }
        } else {
            if ($day == $today) {
                echo '<div class="item day today thisMonth holiday"><p>';
                echo date('j', strtotime($day));
                echo '</p><p class="holiday-txt">勞動節';
                echo "</p></div>";
            } else {
                echo '<div class="item day holiday"><p>';
                echo date('j', strtotime($day));
                echo '</p><p class="holiday-txt">勞動節';
                echo "</p></div>";
            }
        }
        //10-10判斷
    } else if (date('m-d', strtotime($day)) == '10-10') {
        if (date('m', strtotime($day)) != date('m', strtotime($setDay))) {
            if ($day == $today) {
                echo '<div class="item day today holiday"><p class="opacity">';
                echo date('j', strtotime($day));
                echo '</p><p class="holiday-txt opacity">國慶日';
                echo "</p></div>";
            } else {
                echo '<div class="item day holiday"><p class="opacity">';
                echo date('j', strtotime($day));
                echo '</p><p class="holiday-txt opacity">國慶日';
                echo "</p></div>";
            }
        } else {
            if ($day == $today) {
                echo '<div class="item day today thisMonth holiday"><p>';
                echo date('j', strtotime($day));
                echo '</p><p class="holiday-txt">國慶日';
                echo "</p></div>";
            } else {
                echo '<div class="item day holiday"><p>';
                echo date('j', strtotime($day));
                echo '</p><p class="holiday-txt">國慶日';
                echo "</p></div>";
            }
        }
        //12-25判斷(可能為非假日)
    } else if (date('m-d', strtotime($day)) == '12-25') {
        if (date('m', strtotime($day)) != date('m', strtotime($setDay))) {
            if (date('N', strtotime($day)) == 6 || date('w', strtotime($day)) == 0) {
                if ($day == $today) {
                    echo '<div class="item day today holiday"><p class="opacity">';
                    echo date('j', strtotime($day));
                    echo '</p><p class="holiday-txt opacity">聖誕節';
                    echo "</p></div>";
                } else {
                    echo '<div class="item day holiday"><p class="opacity">';
                    echo date('j', strtotime($day));
                    echo '</p><p class="holiday-txt opacity">聖誕節';
                    echo "</p></div>";
                }
            } else {
                if ($day == $today) {
                    echo '<div class="item today day"><p class="opacity">';
                    echo date('j', strtotime($day));
                    echo '</p><p class="spacial-txt opacity">聖誕節';
                    echo "</p></div>";
                } else {
                    echo '<div class="item day"><p class="opacity">';
                    echo date('j', strtotime($day));
                    echo '</p><p class="spacial-txt opacity">聖誕節';
                    echo "</p></div>";
                }
            }
        } else {
            if (date('N', strtotime($day)) == 6 || date('w', strtotime($day)) == 0) {
                if ($day == $today) {
                    echo '<div class="item day today thisMonth holiday"><p>';
                    echo date('j', strtotime($day));
                    echo '</p><p class="holiday-txt">聖誕節';
                    echo "</p></div>";
                } else {
                    echo '<div class="item day holiday"><p>';
                    echo date('j', strtotime($day));
                    echo '</p><p class="holiday-txt">聖誕節';
                    echo "</p></div>";
                }
            } else {
                if ($day == $today) {
                    echo '<div class="item today thisMonth day"><p>';
                    echo date('j', strtotime($day));
                    echo '</p><p class="spacial-txt">聖誕節';
                    echo "</p></div>";
                } else {
                    echo '<div class="item day"><p>';
                    echo date('j', strtotime($day));
                    echo '</p><p class="spacial-txt">聖誕節';
                    echo "</p></div>";
                }
            }
        }
        //判斷是否為今日
    } else if ($day == $today) {
        if (date('m', strtotime($day)) != date('m', strtotime($setDay))) {
            if (date('N', strtotime($day)) == 6 || date('w', strtotime($day)) == 0) {
                echo '<div class="item day today holiday"><p class=" opacity">';
                echo date('j', strtotime($day));
                echo "</p></div>";
            } else {
                echo '<div class="item today day"><p class=" opacity">';
                echo date('j', strtotime($day));
                echo "</p></div>";
            }
        } else {
            if (date('N', strtotime($day)) == 6 || date('w', strtotime($day)) == 0) {
                echo '<div class="item day today thisMonth holiday"><p>';
                echo date('j', strtotime($day));
                echo "</p></div>";
            } else {
                echo '<div class="item day today thisMonth"><p>';
                echo date('j', strtotime($day));
                echo "</p></div>";
            }
        }
        //是否為本月
    } else if (date('m', strtotime($day)) != date('m', strtotime($setDay))) {
        if (date('N', strtotime($day)) == 6 || date('w', strtotime($day)) == 0) {
            echo '<div class="item day holiday"><p class="opacity">';
            echo date('j', strtotime($day));
            echo "</p></div>";
        } else {
            echo '<div class="item day"><p class="opacity">';
            echo date('j', strtotime($day));
            echo "</p></div>";
        }
    } else {
        if (date('N', strtotime($day)) == 6 || date('w', strtotime($day)) == 0) {
            echo '<div class="item day holiday"><p>';
            echo date('j', strtotime($day));
            echo "</p></div>";
        } else {
            echo '<div class="item day"><p>';
            echo date('j', strtotime($day));
            echo "</p></div>";
        }
    }
}
?>
        <!-- 日期輸出區 END-->
        <!-- 底部陰影 -->
        <div class="bottom-shadow"></div>
        <div class="bottom-shadow"></div>
        <div class="bottom-shadow"></div>
        <div class="bottom-shadow"></div>
        <div class="bottom-shadow"></div>
        <div class="bottom-shadow"></div>
        <div class="bottom-shadow"></div>
        <!-- 底部陰影 END-->
        <!-- tool button -->
        <div class="tool <?=$season?>">
            <!-- reset today button -->
            <a href="./calendar_arr_grid.php?v=<?=$version?>" class="reset <?=$season?>">
                <p class="reset-title">TODAY</p>IS<p class="reset-date"><?=$todayMonth?><br><?=$todayDay?></p>
            </a>
            <!-- reset today button END-->
            <input type="checkbox" class="" id="box-button">
            <div class="switch-search">
                <!-- box switch -->
                <label for="box-button" class="box-button">
                    <div class="arrow"></div>
                </label>
                <!-- box switch END-->
                <!-- version change -->
                <form action="./calendar_arr_grid.php" method="get" class="switch <?=$season?>">
                    <input type="text" name="y" value="<?=$year?>" style="display:none;">
                    <input type="text" name="m" value="<?=$month?>" style="display:none;">
                    <input type="radio" name="v" id="CH" value=""><label for="CH" data-tooltip="START FROM MONDAY">M</label>
                    <input type="radio" name="v" id="EN" value="EN"><label for="EN" data-tooltip="START FROM SUNDAY">S</label>
                    <input type="submit" value="SWITCH!">
                </form>
                <!-- version change END -->
                <!-- search box -->
                <form action="./calendar_arr_grid.php" method="get" class="search <?=$season?>">
                    <label for="year">YEAR</label>
                    <input type="number" name="y" id="year" min="1" value="<?=$todayYear?>">
                    <label for="month">MONTH</label>
                    <input type="number" name="m" id="month" min="1" max="12" value="<?=$todayMonth?>">
                    <!-- 加上屬性避免搜尋後變回基本版 -->
                    <input type="text" name="v" value="<?=$version?>" style="display:none;">
                    <input type="submit" value="GO!">
                </form>
            </div>
            <!-- search box END -->
        </div>
        <!-- tool button END-->
    </div>
    <!-- calendar END-->
</body>
</html>