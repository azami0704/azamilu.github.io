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
    $count = (isset($_GET['m']))?$_GET['m']:0;
    $nextMonth =$count+1;
    $prevMonth =$count-1;
    ?>
    <div class="container">
        <div class="next"><a href="?m=<?=$nextMonth?>" ></a></div>
        <div class="pre"><a href="?m=<?=$prevMonth?>"></a></div>
    <?php

    $num = 0;
    $num = $num+$count;
    // 換月用的變數
    $timestamp = strtotime(date("Y-m-1"));
    //設定今天的時間戳-因邊緣測試異常，一律轉換成每月第一天避免因當天為月尾而產生大小月問題
    $setDate = strtotime("+$num month",$timestamp);
    //與今日的時間戳+-月份
    $year=  date("Y",$setDate);
    // 抓出指定的年份
    $mon = date("n",$setDate);
    // 抓出指定的月份
    $monEN = date("F",$setDate);
    // 抓出指定的英文月份
    $firstDate = date("Y-m-1", $setDate);
    //  先抓出當月第一天
    $firstDateWeek = date('N', strtotime($firstDate));
    // 再抓當月第一天是星期幾
    $lastDate = date('t', strtotime($firstDate));
    // 算出當月有幾天
    $weekNum = ceil(($lastDate + ($firstDateWeek - 1)) / 7);
    //算出一個禮拜有幾週=整月天數+(1號的星期幾-1)再除7再無條件進位
    $today = strtotime('today');
    ?>
        <!-- month &  week -->
        <div class="item month"><p><span><?=$year?></span><?=$monEN?></p></div>
        <div class="decoration-line"></div>
        <div class="item week"><p>MON</p></div>
        <div class="item week"><p>TUE</p></div>
        <div class="item week"><p>WED</p></div>
        <div class="item week"><p>THU</p></div>
        <div class="item week"><p>FRI</p></div>
        <div class="item week"><p>STA</p></div>
        <div class="item week"><p>SUN</p></div>
        <!-- month &  week END -->
        <div class="decoration-dash"></div>
        <div class="decoration-space"></div>
        <!-- 日期輸出區 -->
            <?php
        for ($i = 1; $i <= $weekNum; $i++) {
            for ($j = 1; $j <= 7; $j++) {
                // 算式太長用變數簡化
                $date = ($i - 1) * 7 + $j - ($firstDateWeek - 1);
                if ($i == 1 && $j < $firstDateWeek || $date > $lastDate) {
                    echo '<div class="item day"><p>&nbsp;</p></div>';
                } else if (floor(strtotime('today')/86400) == floor(strtotime($year.'-'. $mon .'-'.$date)/86400)) {
                    // 將日期轉為秒數比對
                    echo '<div class="item day today">';
                    echo $date;
                    echo "</p></div>";
                } else if ($date <= $lastDate) {
                    echo '<div class="item day"><p>';
                    echo $date;
                    echo "</p></div>";
                }
            }
        }
        ?>
        <!-- 日期輸出區 END-->
        </div>
</body>

</html>