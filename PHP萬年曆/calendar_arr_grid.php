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
    <!-- v1.0.3 2022/11/3 08:13-->
    <!-- 新增首次登入導覽 -->
</head>

<body>
    <?php
    if (!isset($_COOKIE['visited'])) {
        setcookie('visited', 1);
    ?>
        <input type="checkbox" id="light-box">
        <div class="light-box">
            <div class="guid-box">
                <div class="guid-top">
                    <div class="guid-top-left">前往上個月
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="114.837px" height="86.904px" viewBox="0 0 114.837 86.904" enable-background="new 0 0 114.837 86.904" xml:space="preserve">
                            <path fill="#FFFFFF" d="M114.796,30.424c-2.435-11.022-11.632-22.083-20.321-29.246c-0.184-0.92-1.098-1.302-1.865-1.143
	c-0.749-0.04-1.451,0.477-1.668,1.107c-0.126,0.029-0.253,0.071-0.382,0.137C79.132,7.175,71.951,16.803,62.154,24.721
	c-1.505,1.216,0.632,3.325,2.121,2.121C73.72,19.209,80.68,9.933,91.584,4.138c0.447,24.086-5.384,48.9-24.655,64.91
	C49.056,83.896,23.992,86.002,1.885,82.47c-1.892-0.302-2.704,2.588-0.798,2.893c23.262,3.717,48.029,1.274,67.156-13.545
	C88.535,56.096,94.859,29.792,94.597,5.216c7.632,6.821,15.178,16.37,17.307,26.006C112.321,33.111,115.213,32.31,114.796,30.424z" />
                        </svg>
                    </div>
                    <div class="guid-top-right">前往下個月
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="114.837px" height="86.904px" viewBox="0 0 114.837 86.904" enable-background="new 0 0 114.837 86.904" xml:space="preserve">
                            <path fill="#FFFFFF" d="M114.796,30.424c-2.435-11.022-11.632-22.083-20.321-29.246c-0.184-0.92-1.098-1.302-1.865-1.143
	c-0.749-0.04-1.451,0.477-1.668,1.107c-0.126,0.029-0.253,0.071-0.382,0.137C79.132,7.175,71.951,16.803,62.154,24.721
	c-1.505,1.216,0.632,3.325,2.121,2.121C73.72,19.209,80.68,9.933,91.584,4.138c0.447,24.086-5.384,48.9-24.655,64.91
	C49.056,83.896,23.992,86.002,1.885,82.47c-1.892-0.302-2.704,2.588-0.798,2.893c23.262,3.717,48.029,1.274,67.156-13.545
	C88.535,56.096,94.859,29.792,94.597,5.216c7.632,6.821,15.178,16.37,17.307,26.006C112.321,33.111,115.213,32.31,114.796,30.424z" />
                        </svg>
                    </div>
                </div>
                <div class="guid-today">回到今天
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="114.837px" height="86.904px" viewBox="0 0 114.837 86.904" enable-background="new 0 0 114.837 86.904" xml:space="preserve">
                        <path fill="#FFFFFF" d="M114.796,30.424c-2.435-11.022-11.632-22.083-20.321-29.246c-0.184-0.92-1.098-1.302-1.865-1.143
	c-0.749-0.04-1.451,0.477-1.668,1.107c-0.126,0.029-0.253,0.071-0.382,0.137C79.132,7.175,71.951,16.803,62.154,24.721
	c-1.505,1.216,0.632,3.325,2.121,2.121C73.72,19.209,80.68,9.933,91.584,4.138c0.447,24.086-5.384,48.9-24.655,64.91
	C49.056,83.896,23.992,86.002,1.885,82.47c-1.892-0.302-2.704,2.588-0.798,2.893c23.262,3.717,48.029,1.274,67.156-13.545
	C88.535,56.096,94.859,29.792,94.597,5.216c7.632,6.821,15.178,16.37,17.307,26.006C112.321,33.111,115.213,32.31,114.796,30.424z" />
                    </svg>
                </div>
                <div class="guid-tool">切換版型
                    <div class="guid-tool-switch">
                        <span class="left">週一開始</span>
                        <span class="right">週日開始</span>
                        <div class="arrow-svg">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="114.837px" height="86.904px" viewBox="0 0 114.837 86.904" enable-background="new 0 0 114.837 86.904" xml:space="preserve">
                            <path fill="#FFFFFF" d="M114.796,30.424c-2.435-11.022-11.632-22.083-20.321-29.246c-0.184-0.92-1.098-1.302-1.865-1.143
	c-0.749-0.04-1.451,0.477-1.668,1.107c-0.126,0.029-0.253,0.071-0.382,0.137C79.132,7.175,71.951,16.803,62.154,24.721
	c-1.505,1.216,0.632,3.325,2.121,2.121C73.72,19.209,80.68,9.933,91.584,4.138c0.447,24.086-5.384,48.9-24.655,64.91
	C49.056,83.896,23.992,86.002,1.885,82.47c-1.892-0.302-2.704,2.588-0.798,2.893c23.262,3.717,48.029,1.274,67.156-13.545
	C88.535,56.096,94.859,29.792,94.597,5.216c7.632,6.821,15.178,16.37,17.307,26.006C112.321,33.111,115.213,32.31,114.796,30.424z" />
                        </svg>
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="114.837px" height="86.904px" viewBox="0 0 114.837 86.904" enable-background="new 0 0 114.837 86.904" xml:space="preserve">
                            <path fill="#FFFFFF" d="M114.796,30.424c-2.435-11.022-11.632-22.083-20.321-29.246c-0.184-0.92-1.098-1.302-1.865-1.143
	c-0.749-0.04-1.451,0.477-1.668,1.107c-0.126,0.029-0.253,0.071-0.382,0.137C79.132,7.175,71.951,16.803,62.154,24.721
	c-1.505,1.216,0.632,3.325,2.121,2.121C73.72,19.209,80.68,9.933,91.584,4.138c0.447,24.086-5.384,48.9-24.655,64.91
	C49.056,83.896,23.992,86.002,1.885,82.47c-1.892-0.302-2.704,2.588-0.798,2.893c23.262,3.717,48.029,1.274,67.156-13.545
	C88.535,56.096,94.859,29.792,94.597,5.216c7.632,6.821,15.178,16.37,17.307,26.006C112.321,33.111,115.213,32.31,114.796,30.424z" />
                        </svg>
                        </div>
                    </div>
                    <div class="guid-tool-search">
                        <div class="guid-tool-search-year">搜尋年份
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="114.837px" height="86.904px" viewBox="0 0 114.837 86.904" enable-background="new 0 0 114.837 86.904" xml:space="preserve">
                            <path fill="#FFFFFF" d="M114.796,30.424c-2.435-11.022-11.632-22.083-20.321-29.246c-0.184-0.92-1.098-1.302-1.865-1.143
	c-0.749-0.04-1.451,0.477-1.668,1.107c-0.126,0.029-0.253,0.071-0.382,0.137C79.132,7.175,71.951,16.803,62.154,24.721
	c-1.505,1.216,0.632,3.325,2.121,2.121C73.72,19.209,80.68,9.933,91.584,4.138c0.447,24.086-5.384,48.9-24.655,64.91
	C49.056,83.896,23.992,86.002,1.885,82.47c-1.892-0.302-2.704,2.588-0.798,2.893c23.262,3.717,48.029,1.274,67.156-13.545
	C88.535,56.096,94.859,29.792,94.597,5.216c7.632,6.821,15.178,16.37,17.307,26.006C112.321,33.111,115.213,32.31,114.796,30.424z" />
                        </svg>
                        </div>
                        <div class="guid-tool-search-month">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="114.837px" height="86.904px" viewBox="0 0 114.837 86.904" enable-background="new 0 0 114.837 86.904" xml:space="preserve">
                            <path fill="#FFFFFF" d="M114.796,30.424c-2.435-11.022-11.632-22.083-20.321-29.246c-0.184-0.92-1.098-1.302-1.865-1.143
	c-0.749-0.04-1.451,0.477-1.668,1.107c-0.126,0.029-0.253,0.071-0.382,0.137C79.132,7.175,71.951,16.803,62.154,24.721
	c-1.505,1.216,0.632,3.325,2.121,2.121C73.72,19.209,80.68,9.933,91.584,4.138c0.447,24.086-5.384,48.9-24.655,64.91
	C49.056,83.896,23.992,86.002,1.885,82.47c-1.892-0.302-2.704,2.588-0.798,2.893c23.262,3.717,48.029,1.274,67.156-13.545
	C88.535,56.096,94.859,29.792,94.597,5.216c7.632,6.821,15.178,16.37,17.307,26.006C112.321,33.111,115.213,32.31,114.796,30.424z" />
                        </svg>
                            搜尋月份
                        </div>
                    </div>
                </div>
                <label for="light-box" class="close-btn">GOT IT!</label>
            </div>
        </div>
    <?php
    }
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
    if (isset($_GET['v']) && $_GET['v'] == "ASIA") {
        $version = $_GET['v'];
        //以每月一日為座標
        $setDay = "$year-$month-1";
        //上個月的日期&天數設定
        $firstDayWeek = date('N', strtotime($setDay));
        $lastDays = date('t', strtotime($setDay));
        $weekNum = ceil(($firstDayWeek + ($lastDays - 1)) / 7);
        $monthMod = $weekNum * 7 - ($lastDays + ($firstDayWeek - 1));
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
        $week = ["MON", "TUE", "WEN", "THU", "FRI", "STA", "SUN"];
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
        for ($i = 1; $i < $firstDayWeek; $i++) {
            array_unshift($cal, $calPre[count($calPre) - $i]);
        }
        for ($i = 0; $i < $monthMod; $i++) {
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
        $firstDayWeek = date('w', strtotime($setDay));
        // 算出當月有幾天
        $lastDays = date('t', strtotime($setDay));
        //算出一個禮拜有幾週=整月天數+(1號的星期幾-1)再除7再無條件進位
        $weekNum = ceil(($lastDays + $firstDayWeek) / 7);
        //本月剩餘天數-抓下個月要加入的區段用
        $modDays = $weekNum * 7 - ($firstDayWeek + $lastDays);
        $lastWeekStart = ($weekNum - 1) * 7;

        //印星期用陣列
        $week = ["SUN", "MON", "TUE", "WED", "THU", "FRI", "STA"];
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
        for ($i = 0; $i < $firstDayWeek; $i++) {
            array_unshift($cal, $calPre[(count($calPre) - 1) - $i]);
        }
        for ($i = 0; $i < $modDays; $i++) {
            array_push($cal, $calNext[$i]);
        }
    }
    //比對是否為當天用的變數
    $today = date('Y-m-d');
    //reset鈕用的變數
    $todayYear = date('Y');
    $todayMonth = date('m');
    $todayDay = date('d');

    $specialDay = [
        '01-01' => ['元旦', 'holiday'],
        '02-28' => ['和平紀念日', 'holiday'],
        '03-08' => ['婦女節', 'normal'],
        '04-22' => ['世界地球日', 'normal'],
        '05-01' => ['勞動節', 'holiday'],
        '09-18' => ['教師節', 'normal'],
        '10-10' => ['國慶日', 'holiday'],
        '10-25' => ['光復節', 'normal'],
        '10-31' => ['萬聖節', 'normal'],
        '12-25' => ['聖誕節', 'normal']
    ];
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
    <div class="container <?= $season ?>">
        <!-- prev & next button -->
        <div class="pre"><a href="?y=<?= $prevYear ?>&m=<?= $prevMonth ?>&v=<?= $version ?>"></a></div>
        <div class="next"><a href="?y=<?= $nextYear ?>&m=<?= $nextMonth ?>&v=<?= $version ?>"></a></div>
        <!-- prev & next button END-->
        <!-- month -->
        <div class="item month">
            <p><span><?= $year ?></span><?= $monEN ?></p>
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
            // 判斷特殊節日
            $dayMonth = date('m-d', strtotime($day));
            if (array_key_exists($dayMonth, $specialDay)) {
                if ($specialDay[$dayMonth][1] == 'holiday') {
                    if (date('m', strtotime($day)) != date('m', strtotime($setDay))) {
                        if ($day == $today) {
                            echo '<div class="item day today holiday"><p class="opacity">';
                            echo date('j', strtotime($day));
                            echo '</p><p class="holiday-txt opacity">';
                            echo "{$specialDay[$dayMonth][0]}";
                            echo "</p></div>";
                        } else {
                            echo '<div class="item day holiday"><p class="opacity">';
                            echo date('j', strtotime($day));
                            echo '</p><p class="holiday-txt opacity">';
                            echo "{$specialDay[$dayMonth][0]}";
                            echo "</p></div>";
                        }
                    } else {
                        if ($day == $today) {
                            echo '<div class="item day today thisMonth holiday"><p>';
                            echo date('j', strtotime($day));
                            echo '</p><p class="holiday-txt">';
                            echo "{$specialDay[$dayMonth][0]}";
                            echo "</p></div>";
                        } else {
                            echo '<div class="item day holiday"><p>';
                            echo date('j', strtotime($day));
                            echo '</p><p class="holiday-txt">';
                            echo "{$specialDay[$dayMonth][0]}";
                            echo "</p></div>";
                        }
                    }
                } else {
                    if (date('m', strtotime($day)) != date('m', strtotime($setDay))) {
                        if (date('N', strtotime($day)) == 6 || date('w', strtotime($day)) == 0) {
                            if ($day == $today) {
                                echo '<div class="item day today holiday"><p class="opacity">';
                                echo date('j', strtotime($day));
                                echo '</p><p class="holiday-txt opacity">';
                                echo "{$specialDay[$dayMonth][0]}";
                                echo "</p></div>";
                            } else {
                                echo '<div class="item day holiday"><p class="opacity">';
                                echo date('j', strtotime($day));
                                echo '</p><p class="holiday-txt opacity">';
                                echo "{$specialDay[$dayMonth][0]}";
                                echo "</p></div>";
                            }
                        } else {
                            if ($day == $today) {
                                echo '<div class="item today day"><p class="opacity">';
                                echo date('j', strtotime($day));
                                echo '</p><p class="spacial-txt opacity">';
                                echo "{$specialDay[$dayMonth][0]}";
                                echo "</p></div>";
                            } else {
                                echo '<div class="item day"><p class="opacity">';
                                echo date('j', strtotime($day));
                                echo '</p><p class="spacial-txt opacity">';
                                echo "{$specialDay[$dayMonth][0]}";
                                echo "</p></div>";
                            }
                        }
                    } else {
                        if (date('N', strtotime($day)) == 6 || date('w', strtotime($day)) == 0) {
                            if ($day == $today) {
                                echo '<div class="item day today thisMonth holiday"><p>';
                                echo date('j', strtotime($day));
                                echo '</p><p class="holiday-txt">';
                                echo "{$specialDay[$dayMonth][0]}";
                                echo "</p></div>";
                            } else {
                                echo '<div class="item day holiday"><p>';
                                echo date('j', strtotime($day));
                                echo '</p><p class="holiday-txt">';
                                echo "{$specialDay[$dayMonth][0]}";
                                echo "</p></div>";
                            }
                        } else {
                            if ($day == $today) {
                                echo '<div class="item today thisMonth day"><p>';
                                echo date('j', strtotime($day));
                                echo '</p><p class="spacial-txt">';
                                echo "{$specialDay[$dayMonth][0]}";
                                echo "</p></div>";
                            } else {
                                echo '<div class="item day"><p>';
                                echo date('j', strtotime($day));
                                echo '</p><p class="spacial-txt">';
                                echo "{$specialDay[$dayMonth][0]}";
                                echo "</p></div>";
                            }
                        }
                    }
                }
                //是否為今日
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
        <div class="tool <?= $season ?>">
            <!-- reset today button -->
            <a href="./calendar_arr_grid.php?v=<?= $version ?>" class="reset <?= $season ?>">
                <p class="reset-title">TODAY</p>IS<p class="reset-date"><?= $todayMonth ?><br><?= $todayDay ?></p>
            </a>
            <!-- reset today button END-->
            <input type="checkbox" class="" id="box-button">
            <?php
            if (!isset($_COOKIE['visited'])) {
            ?>
                <input type="checkbox" class="" id="box-button" checked>
            <?php
            }
            ?>
            <div class="switch-search">
                <!-- box switch -->
                <label for="box-button" class="box-button">
                    <div class="arrow"></div>
                </label>
                <!-- box switch END-->
                <!-- version change -->
                <form action="./calendar_arr_grid.php" method="get" class="switch <?= $season ?>">
                    <input type="text" name="y" value="<?= $year ?>" style="display:none;">
                    <input type="text" name="m" value="<?= $month ?>" style="display:none;">
                    <input type="radio" name="v" id="ASIA" value="ASIA"><label for="ASIA" data-tooltip="START FROM MONDAY">M</label>
                    <input type="radio" name="v" id="EN" value="EN"><label for="EN" data-tooltip="START FROM SUNDAY">S</label>
                    <input type="submit" value="SWITCH!">
                </form>
                <!-- version change END -->
                <!-- search box -->
                <form action="./calendar_arr_grid.php" method="get" class="search <?= $season ?>">
                    <label for="year">YEAR</label>
                    <input type="number" name="y" id="year" min="1" value="<?= $todayYear ?>">
                    <label for="month">MONTH</label>
                    <input type="number" name="m" id="month" min="1" max="12" value="<?= $todayMonth ?>">
                    <!-- 加上屬性避免搜尋後變回基本版 -->
                    <input type="text" name="v" value="<?= $version ?>" style="display:none;">
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