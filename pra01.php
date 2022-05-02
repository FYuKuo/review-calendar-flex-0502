<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>0502-複習PHP月曆</title>
</head>
<body>
    <h2>0502-複習PHP月曆</h2>
    <?php
    $month=5; //月份
    $firstDay=date("Y-") . $month . "-1"; //月份第一天
    $firstDaySecond=strtotime($firstDay); //月份第一天轉秒
    $firstDayWeek=date('w',$firstDaySecond); //月份第一天星期幾
    $monthDay=date('t',$firstDaySecond); //月份有幾天
    $lastDay=date('Y-') . $month . "-" . $monthDay; //月份最後一天
    $lastDaySecond=strtotime($lastDay); //月份最後一天轉秒
    $lastDayWeek=date('w',$lastDaySecond); //月份最後一天星期幾

    echo "月份 ==>" . $month . "<br>";
    echo "月份第一天 ==>" . $firstDay . "<br>";
    echo "月份第一天轉秒 ==>" . $firstDaySecond . "<br>";
    echo "月份第一天星期幾 ==>" . $firstDayWeek . "<br>";
    echo "月份有幾天 ==>" . $monthDay . "<br>";
    echo "月份最後一天 ==>" . $lastDay . "<br>";
    echo "月份最後一天轉秒 ==>" . $lastDaySecond . "<br>";
    echo "月份最後一天星期幾 ==>" . $lastDayWeek . "<br>";

    echo "<hr>";

    $allDate=[]; //要放入所有日期的空陣列
    ?>
</body>
</html>