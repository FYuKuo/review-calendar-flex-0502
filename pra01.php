<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>0502-複習PHP月曆</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .table {
            width: 700px;
            /* height: 610px; */
            display: flex;
            flex-wrap: wrap;
            align-content: flex-start;
            justify-content: center;
            margin: 0 auto;
            margin-top: 10px;
            background-color: #F0F9E9;
            border-radius: 20px;
            padding-top:5px ;
            box-shadow:1px 1px 25px lightgrey;
        }
        .table>div {
            /* border: 1px solid lightgray; */
            width: 100px;
            height: 100px;
            margin-left: -1px;
            margin-top: -1px;
            line-height: 100px;
            text-align: center;
        }
        .table>.headerMonth {
            width: 100%;
            height: 50px;
            text-align: center;
            line-height: 50px;
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 2px;
        }
        .table>.header {
            height: 50px;
            line-height: 50px;
            font-weight: bold;
            text-transform: uppercase; /*小寫轉大寫*/
            border-bottom: 1px solid black;
        }
        .table>.today {
            color: red;
            text-decoration: underline;
            text-underline-offset: 5px;
            text-decoration-color: red;
            font-weight: bold;
        }
        .weekendH{
           color: red; 
        }
        </style>
</head>
<body>
    <h2>0502-複習PHP月曆</h2>
    <?php
    $month=5; //月份
    $firstDay=date("Y-") . $month . "-1"; //月份第一天
    $firstDaySecond=strtotime($firstDay); //月份第一天轉秒
    $monthFont=date("F",$firstDaySecond); //月份英文
    $firstDayWeek=date('w',$firstDaySecond); //月份第一天星期幾
    $monthDay=date('t',$firstDaySecond); //月份有幾天
    $lastDay=date('Y-') . $month . "-" . $monthDay; //月份最後一天
    $lastDaySecond=strtotime($lastDay); //月份最後一天轉秒
    $lastDayWeek=date('w',$lastDaySecond); //月份最後一天星期幾

    echo "月份 ==>" . $month . "<br>";
    echo "月份英文 ==>" . $monthFont . "<br>";
    echo "月份第一天 ==>" . $firstDay . "<br>";
    echo "月份第一天轉秒 ==>" . $firstDaySecond . "<br>";
    echo "月份第一天星期幾 ==>" . $firstDayWeek . "<br>";
    echo "月份有幾天 ==>" . $monthDay . "<br>";
    echo "月份最後一天 ==>" . $lastDay . "<br>";
    echo "月份最後一天轉秒 ==>" . $lastDaySecond . "<br>";
    echo "月份最後一天星期幾 ==>" . $lastDayWeek . "<br>";

    echo "<hr>";

    $allDate=[]; //要放入所有日期的空陣列

    //利用for迴圈將月份第一天之前的空白放入陣列
    for($i=0; $i<$firstDayWeek; $i++){
        $allDate[]="";
    }
    
    //利用for迴圈將日期從第一天開始每次加一天,加到月份的最後一天,並放入陣列之中
    for($i=0; $i<$monthDay ;$i++){
        $date=date('Y-m-d',strtotime("+$i days",$firstDaySecond));
        $allDate[]=$date;
    }
    
    //利用for迴圈將月份最後一天之後的空白放入陣列
    for($i=0; $i<6-$lastDayWeek; $i++){
        $allDate[]="";
    }

    echo "<pre>";
    print_r($allDate);
    echo "</pre>";

    echo "<hr>";

    //包住所有日期之div的外框
    echo "<div class='table'>";

    echo "<div class='headerMonth'>$monthFont</div>";

    echo "<div class='header weekendH'>Sun</div>";
    echo "<div class='header'>Mon</div>";
    echo "<div class='header'>Tues</div>";
    echo "<div class='header'>Wed</div>";
    echo "<div class='header'>Thur</div>";
    echo "<div class='header'>Fri</div>";
    echo "<div class='header weekendH'>Sat</div>";

    
    //利用陣列的迴圈將日期印出
    foreach($allDate as $day){
        $checktoday=""; //檢查是否為今天的空變數
        $today=date('Y-m-d'); //今天的日期

        //如果day變數內的日期是今天,就把checktoday變數放入today的字串 並在印出div時 加上class=checktoday變數
        if($day == $today){
            $checktoday='today';
        }

        //檢查變數$day中是否含有空白 如果沒有就將$day變數轉成日期只有d的格式 並印出來, 沒有的話就只印出div
        if(!empty($day)){
            $dayFont=date("d",strtotime($day));
            echo "<div class='$checktoday'>{$dayFont}</div>";
        }else{
            echo "<div></div>";
        }
    }

    echo "</div>";
    ?>
    <br><br><br>
</body>
</html>