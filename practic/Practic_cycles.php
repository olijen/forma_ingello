<?php
//1

//for($a = 1;$a <= 100 ; $a++){
//    echo $a.'<br>';
//}

//2

//for($a = 0;$a <= 100 ; $a+=2){
//    echo $a.'<br>';
//}

//3

$summ = '';
$arr = [];
//for($a = 1;$a <= 100 ; $a++){
//    $summ += $a;
//}
//echo $sum;

//4

//for ($a=1; $a<=15;$a++){
//    $summ += $a*$a
//}

//5

//
//for ($a=1; $a<=15;$a++){
//    $summ += sqrt( $a);
//}
//echo round($summ , 2);

//6

//for ($a=1; $a<=100;$a++){
//    if ($a % 7 == 0 ){
//        $summ += $a;
//    }
//}
//echo $summ;
//exit();


//7

//for ($a =0;$a<=10;$a++){
//    $arr[] = 'x';
//}
//var_dump($arr);

//8

//for ($a = 1;$a<=10;$a++){
//    $arr[] = $a;
//}
//var_dump($arr);

//9

//for ($a = 10;$a>=1;$a--){
//    $arr[] = $a;
//}
//
//var_dump($arr);

//10

//$arr = [];
//for ($a = 1; $a <= 10; $a++) {
//    $arr[] = rand(1, 10);
//}
//var_dump($arr);

//11

//for ($a = 1;$a <= 6;$a++ ){
//    $summ  .= rand(1,9);
//}
//var_dump($summ);
//exit();

//12

//$arr = [1,2,3,4,5,6];
//foreach ($arr as $ar){
//    $summ += $ar;
//}
//var_dump($summ);

//13

//$arr = [1,2,3,4,5,6];
//foreach ($arr as $ar){
//    $summ += $ar*$ar;
//}
//var_dump($summ);

//14

//$arr = [1,2,3,4,5,6];
//foreach ($arr as $ar){
//    $summ += $ar*$ar;
//}
//echo floor(sqrt($summ));
//exit();

//15

//$arr = [0,1,2,3,4,5,6,7,8,9,10];
//foreach ($arr as $ar){
//    if ($ar>0 & $ar<10){
//        $summ += $ar;
//    }
//}
//echo $summ;
//exit();

//16

//$arr = [1,1,2,3,4,5,6,7,7,8];
//
//for ($a = 0; $a < count($arr); $a++) {
//    if ($a && $arr[$a] == $arr[($a-1)]) {
//        echo 'есть идущие подряд: '.$arr[$a].' - '.$arr[$a].'<br>';
//    }
//}
//exit();

//17

//for ($a = 1;$a <= 15;$a++){
//    for ($b = 1; $b <= $a; $b++){
//        $summ .= $a;
//    }
//}
//echo $summ;
//exit();

//18

//$arr = [
//    0=>['name'=>'Коля', 'salary'=>300],
//    1=>['name'=>'Вася', 'salary'=>400],
//    2=>['name'=>'Петя', 'salary'=>500],
//];

//foreach ($arr as $zp){
//    echo $zp['name'] .' '.$zp['salary'].'<br>';
//}
//exit();


//19

//
//for ($a = 1;$a <= 10;$a++){
//    for ($a = 1; $a <= 10; $a++){
//        $arr[$a][] = rand(1,10);
//    }
//}
//var_dump($arr);
//exit();

//20

//$a = "Lenovo";
//$first = mb_substr($a,0,1,'UTF-8');
//$last = mb_substr($a,1);
//$first = mb_strtoupper($first, 'UTF-8');
//$last = mb_strtolower($last, 'UTF-8');
//$b = $first.$last;
//echo $b;
//exit();

//21

//$name = 'Lenovo';
//$exp = str_split($name);
//$revers = array_reverse($exp);
//$imp = implode('',$revers);
//echo $imp;
//exit();

//21

//function mb_strrev($name)
//{
//    $name = strrev(mb_convert_encoding($name, 'UTF-16BE', 'UTF-8'));
//    return mb_convert_encoding($name, 'UTF-8', 'UTF-16LE');
//}
//
//echo mb_strrev('Lenovo');
//
//exit();

//22

//$name = 'Lenovo';
//$size = count(str_split($name, 1));
//echo $size;
//exit();

//23

//$a = "Lenovo";
//$first = mb_substr($a,0,1);
//$last = mb_substr($a,1);
//$first = mb_strtolower($first,);
//$last = mb_strtoupper($last);
//
//$b = $first.$last;
//echo $b;
//exit();

//24

//$a = 'le_no_vo';
//$name = '';
//$arr = explode('_',$a);
//foreach ($arr as $item) {
//    if ($item ==$arr[0]){
//        $name .= $item;
//        }else{
//        $name .= ucfirst($item);
//    }
//
//}
//echo $name;
//exit();

//25


//for ($a = 1; $a<= 9;$a++){
//    echo str_repeat($a , $a).'<br>';
//}
//
//exit();

//26

//$name = 'xxxxxxxxxxxx';
//$qty = strlen ($name);
//
//for ($a = $qty ;$a > 0; $a--){
//    $summ .= substr($name,0 ,$a).'<br>';
//}
//
//echo $summ;
//exit();


//27


//$arr = [1,5,6,2,6,8,4,3,2];
//$arrSum = [];
//
//foreach ($arr as $ar){
//    for ($a = 1; $a <= $ar ; $a ++){
//        $arrSum []= $ar;
//    }
//}
//var_dump($arrSum);
//exit();


//28   !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


//$arr = [4,7,5,9,5,3,8,0,2,5];
//$arrSum = [];
//$key = [];
//$qty = count($arr);
//
//for ($i = 1; $i <= $qty -1; $i+= 2) {
//    $key = $arr[$i];
//    $arrSumm[$key] = $arr[$i + 1];
//}
//var_dump($arrSumm);

//29

//$input = "ssdfss";
//$a = 0;
//
//while ($a <= strlen($input)) {
//    $summ .= substr($input, $a, 1);
//    $a += 2;
//}
//echo $summ;


//30

//$input = '12345678';
//$resInp = array_reverse(str_split(strrev($input), 2));
//echo implode('', $resInp);

//31

//$arr =  ['aa','aa','ab','cc','ds'];
//
//$result = [];
//foreach ($arr as $item) {
//    if (in_array($item, $result) == false) {
//        $result[] = $item;
//    }
//}
//var_dump($result);



//32    !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//$arr =  ['aa','aa','ab','cc','ds'];
//
//$summArr = [];
//$item = count($arr);
//for ($i = 0; $i < $item; $i++) {
//    $value = $arr[$i];
//    unset($arr[$i]);
//    if (in_array($value, $arr)) {
//        $summArr[] = $value;
//    }
//    $arr[$i] = $value;
//}
//$arr = $summArr;
//echo var_dump($arr);



//33

//$number = 21;
//
//$flag = false;
//for ($a = 2; $a < $number; $a++) {
//    if ($number % $a == 0) {
//        $flag = true;
//        break;
//    }
//}
//
//if ($flag == true) {
//    echo'Простое число';
//} else {
//    echo 'Сложное число';
//	}


//34


//$arr = ['http://sss', '//eeee', 'erere'];
//$summ = [];
//foreach ($arr as $elem) {
//    $tar = strpos($elem, 'http://');
//    if ($tar !== false) {
//        $summ[] = $elem;
//    }
//}
//
//var_dump($summ);





                                            //Простые алгоритмы

//1


//$currentYear = date('Y');
//
//$newYear = mktime(0, 0, 0, 1, 1, $currentYear + 1);
//$seconds = $newYear - time();
//
//$days = 0; $hours = 0; $minutes = 0;
//$oneMinute = 60;
//$oneHour = 60 * $oneMinute;
//$oneDay = $oneHour * 24;
//if ($seconds / $oneDay > 0) {
//    $days = (int)($seconds / $oneDay);
//    $seconds -= $days * $oneDay;
//}
//
//echo  'Осталось '.$days.' дней';


//2


//$year = '2020';
//
//if ($year % 4 == 0 && $year % 100 != 0 || $year % 400 == 0){
//    echo 'год высокосный';
//}


//3

//$a = '22.01.1994';
//$dates = [$a];
//$dayWeek = '';
//$days = [
//    'Воскресенье', 'Понедельник', 'Вторник', 'Среда',
//    'Четверг', 'Пятница', 'Суббота'
//];
//
//foreach($dates as $d){
//    $dayWeek = $days[ date("w", strtotime($d) )];
//}
//echo $dayWeek;


//4


//setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');
//
//$arr = ['понедельник',
//    'вторник',
//    'среда',
//    'четверг',
//    'пятница',
//    'суббота',
//    'воскресение'];
//$dayWeek = date('w')-1;
//echo strftime("%d %B, %Y", time()).' года '.$arr[$dayWeek];

//5

//$birthday = '26.07.1994';
//
//
//$arr = explode('.', $birthday);
//$tm=mktime(0, 0, 0, $arr[1], $arr[0], date('Y'));
//if($tm<time()) $tm=mktime(0, 0, 0, $arr[1], $arr[0], date('Y')+1);
//echo intval( ($tm-time())/86400 );
//

//6


//
//$blinDay =  date('d-m-Y', strtotime("last Sunday of May"));
//
//$arr = explode('.', $blinDay);
//var_dump($arr[1]);
//
//$tm=mktime(0, 0, 0, $arr[1], $arr[0], date('Y'));
//if($tm<time()) $tm=mktime(0, 0, 0, $arr[1], $arr[0], date('Y')+1);
//echo intval( ($tm-time())/86400 );


//7
//
//$birthDay = '22.12';
//$item = explode(".", $birthDay);
//$day = $item[0];
//$month = $item[1];
//
//    $signs = ["Козерог", "Водолей", "Рыбы", "Овен", "Телец", "Близнецы", "Рак", "Лев", "Девы", "Весы", "Скорпион", "Стрелец"];
//    $signsstart = [1=>21, 2=>20, 3=>20, 4=>20, 5=>20, 6=>20, 7=>21, 8=>22, 9=>23, 10=>23, 11=>23, 12=>23];
//    echo $day < $signsstart[$month + 1] ? $signs[$month - 1] : $signs[$month % 12];

//8


//$holidays = ['26.05',
//    '22.02',
//    '19.01'];
//foreach ($holidays as $holiday){
//    if ($holiday == date('d').'.'.date('m')){
//        echo 'сегодня празник';
//    }
//
//}

//9


//$birthDay = '26.07';
//$item = explode(".", $birthDay);
//$day = $item[0];
//$month = $item[1];
//$dateDay = date('d');
//$dateMouth = date ('m');
//
//$horoscope = ['Козерог1902'=>'vse',
//    'Козерог2002'=>'vse2',
//    'Лев1901'=>'sdsd',
//    'Лев2001'=>'sds222d',
//];
//
//    $signs = ["Козерог", "Водолей", "Рыбы", "Овен", "Телец", "Близнецы", "Рак", "Лев", "Девы", "Весы", "Скорпион", "Стрелец"];
//    $signsstart = [1=>21, 2=>20, 3=>20, 4=>20, 5=>20, 6=>20, 7=>21, 8=>22, 9=>23, 10=>23, 11=>23, 12=>23];
//    $zodiak = $day < $signsstart[$month + 1] ? $signs[$month - 1] : $signs[$month % 12];
//
//    foreach ($horoscope as $key=>$item){
//        if($key == $zodiak.$dateDay.$dateMouth){
//    echo $item;
//        }
//    }



//10


//$text = 'rrkrfkjk  dfdfdlkfl dfdfdf';
//$qtyItem = iconv_strlen($text);
//$item = ' ';
//$itemqty = str_replace($item , '' , $text);
//$qtyItem1 = iconv_strlen($itemqty);
//$qtyItem2 = str_word_count($text);
////echo 'Количество слов'. .'<br>';
//echo 'Количество символов'.$qtyItem.'<br>';
//echo 'Количество без пробелов'.$qtyItem1.'<br>';
//echo 'Количество слов'.$qtyItem2.'<br>';



//11


//$string = 'sdsdsdsdsdlljkjfkdsjfk';
//$qtyItem = iconv_strlen($string);
//$qtyProcent = round((100/ $qtyItem), 2);
//
//
//foreach (count_chars($string, 1) as $i => $val) {
//    $summ = $qtyProcent*$val;
//    echo "\"" , chr($i) , "\" занимает  $summ '%'.\n";
//}


//12

//$input = "сер";
//$letters = mb_str_split($input);
//
//$arr = ['сергей',
//    'тамара',
//    'ваня',
//    'федя'];
//foreach ($arr as $item){
//    foreach ($letters as $l){
//
//    }
//}


//13  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



//14

//function translit($value)
//{
//    $converter = array(
//        'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
//        'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
//        'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
//        'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
//        'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
//        'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
//        'э' => 'e',    'ю' => 'yu',   'я' => 'ya',
//
//        'А' => 'A',    'Б' => 'B',    'В' => 'V',    'Г' => 'G',    'Д' => 'D',
//        'Е' => 'E',    'Ё' => 'E',    'Ж' => 'Zh',   'З' => 'Z',    'И' => 'I',
//        'Й' => 'Y',    'К' => 'K',    'Л' => 'L',    'М' => 'M',    'Н' => 'N',
//        'О' => 'O',    'П' => 'P',    'Р' => 'R',    'С' => 'S',    'Т' => 'T',
//        'У' => 'U',    'Ф' => 'F',    'Х' => 'H',    'Ц' => 'C',    'Ч' => 'Ch',
//        'Ш' => 'Sh',   'Щ' => 'Sch',  'Ь' => '',     'Ы' => 'Y',    'Ъ' => '',
//        'Э' => 'E',    'Ю' => 'Yu',   'Я' => 'Ya',
//    );
//
//    $value = strtr($value, $converter);
//    return $value;
//}
//
//echo translit('Антон, Сифон, Мафон');


//15

//function translit($value)
//{
//    $converter = array(
//        'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
//        'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
//        'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
//        'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
//        'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
//        'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
//        'э' => 'e',    'ю' => 'yu',   'я' => 'ya',
//
//        'А' => 'A',    'Б' => 'B',    'В' => 'V',    'Г' => 'G',    'Д' => 'D',
//        'Е' => 'E',    'Ё' => 'E',    'Ж' => 'Zh',   'З' => 'Z',    'И' => 'I',
//        'Й' => 'Y',    'К' => 'K',    'Л' => 'L',    'М' => 'M',    'Н' => 'N',
//        'О' => 'O',    'П' => 'P',    'Р' => 'R',    'С' => 'S',    'Т' => 'T',
//        'У' => 'U',    'Ф' => 'F',    'Х' => 'H',    'Ц' => 'C',    'Ч' => 'Ch',
//        'Ш' => 'Sh',   'Щ' => 'Sch',  'Ь' => '',     'Ы' => 'Y',    'Ъ' => '',
//        'Э' => 'E',    'Ю' => 'Yu',   'Я' => 'Ya',
//    );
//
//    $value = strtr($value, $converter);
//    return $value;
//}
//
//echo translit('Антон, Сифон, Мафон');
//
//
//
//function retranslit($value)
//{
//    $converter = array(
//        "a"=>"а","b"=>"б","v"=>"в","g"=>"г","d"=>"д","e"=>"е","yo"=>"ё",
//        "j"=>"ж","z"=>"з","i"=>"и","i"=>"й","k"=>"к",
//        "l"=>"л","m"=>"м","n"=>"н","o"=>"о","p"=>"п","r"=>"р","s"=>"с","t"=>"т",
//        "y"=>"у","f"=>"ф","h"=>"х","c"=>"ц",
//        "ch"=>"ч","sh"=>"ш","sh"=>"щ","i"=>"ы","e"=>"е","u"=>"у","ya"=>"я","A"=>"А","B"=>"Б",
//        "V"=>"В","G"=>"Г","D"=>"Д", "E"=>"Е","Yo"=>"Ё","J"=>"Ж","Z"=>"З","I"=>"И","I"=>"Й","K"=>"К","L"=>"Л","M"=>"М",
//        "N"=>"Н","O"=>"О","P"=>"П",
//        "R"=>"Р","S"=>"С","T"=>"Т","Y"=>"Ю","F"=>"Ф","H"=>"Х","C"=>"Ц","Ch"=>"Ч","Sh"=>"Ш",
//        "Sh"=>"Щ","I"=>"Ы","E"=>"Е", "U"=>"У","Ya"=>"Я","'"=>"ь","'"=>"Ь","''"=>"ъ","''"=>"Ъ","j"=>"ї","i"=>"и","g"=>"ґ",
//        "ye"=>"є","J"=>"Ї","I"=>"І",
//        "G"=>"Ґ","YE"=>"Є"
//    );
//
//    $value = strtr($value, $converter);
//    return $value;
//}
//echo  retranslit('sddsdsd , sdsdsd ,dsdsd');





//19

//
//function f($n)
//{
//    return($n < 2 ? 1 : $n * f($n-1));
//}
//echo f ('10');
//

//20


//
//function eq_roots($a, $b, $c) {
//    if ($a==0) return false;
//
//    if ($b==0) {
//        if ($c<0) {
//            $x1 = sqrt(abs($c/$a));
//            $x2 = sqrt(abs($c/$a));
//        } elseif ($c==0) {
//            $x1 = $x2 = 0;
//        } else {
//            $x1 = sqrt($c/$a).'i';
//            $x2 = -sqrt($c/$a).'i';
//        }
//    } else {
//        $d = $b*$b-4*$a*$c;
//        if ($d>0) {
//            $x1 = (-$b+sqrt($d))/2*$a;
//            $x2 = (-$b-sqrt($d))/2*$a;
//        } elseif ($d==0) {
//            $x1 = $x2 = (-$b)/2*$a;
//        } else {
//            $x1 = -$b . '+' . sqrt(abs($d)) . 'i';
//            $x2 = -$b . '-' . sqrt(abs($d)) . 'i';
//        }
//    }
//    return array($x1, $x2);
//}
//var_dump( eq_roots (4,-16,10));
//


// 21


//$arr = [];
//function geometry($a, $b ,$c){
//    $arr = [$a ,$b,$c];
//    $z = max($arr);
//    $key = array_search($z,$arr);
//    unset($arr[$key]);
//    $key1 = array_key_first($arr);
//    $key2 = array_key_last($arr);
//    $x= ($arr[$key1]);
//    $y= ($arr[$key2]);
//
//    if ($z*$z == round(($x*$x) +($y*$y))){
//        echo 'треугольник равнобедренный ';
//    }else{
//        echo 'увы нет ';
//    }
//
//}
//echo geometry(10,6.6,12);



//22


//$number = '55';
//
//
//for ($i=1; $i<=$number; $i++){
//    if ($number % $i==0)
//        echo "$i <br>";
//}

//23

//$number  = 30;
//$arr = [];
//for ($i=2;$i<=$number;$i++) {
//    if (($number % $i) == 0) {
//        $arr[] = $i;
//        $number /= $i;
//        $i--;
//        if ($number<2) break;
//    }
//}
//echo implode(' * ', $arr);


// 24


//$number1 = 25 ;
//$number2 = 5;
//$arr = [$number1,$number2];
//$maxNumber = max($arr);
//
// for ($a = 2; $a <= $maxNumber ; $a++){
//     if(($number1 % $a) == 0 & ($number2 % $a) == 0 ){
//         echo "$a <br>";
//     }
// }



//25


//$number1 = 50 ;
//$number2 = 25;
//$arr = [$number1,$number2];
//$maxNumber = max($arr);
//$arrd = [];
// for ($a = 2; $a <= $maxNumber ; $a++){
//     if(($number1 % $a) == 0 & ($number2 % $a) == 0 ){
//    $arrd[] = $a;
//     }
//
// }
//$maxdel = max($arrd);
// echo $maxdel;


//26


//$number1 = 50 ;
//$number2 = 25;
//$arr = [$number1,$number2];
//$maxNumber = max($arr);
//$arrd = [];
// for ($a = 2; $a <= $maxNumber ; $a++){
//     if(($number1 % $a) == 0 & ($number2 % $a) == 0 ){
//    $arrd[] = $a;
//     }
//
// }
//$mindel = min($arrd);
// echo $mindel;

//27


//function calendar ($impDay,$impMouth,$impYear)
//{
//    if ($impDay <= 0 ) {
//        echo ' Не подходящий день  , минимальное значение 1';
//    }elseif ($impDay >31){
//        echo ' Не подходящий день , максимальное значение 31  ';
//    }
//    if ($impMouth <= 0  ) {
//        echo 'не подходящий месяц минимальное значение 1 ';
//    }elseif ($impMouth > 12){
//        echo 'не подходящий месяц максимальное значение 12  ';
//    }
//
//    if ($impYear < 1990 ) {
//        echo 'не подходящий год минимальное значение 1990';
//    }elseif ($impYear > 2025){
//        echo 'не подходящий год максимальное значение 2025 ';
//    }
//
//$dateToken = strtotime($impYear.'-'.$impMouth.'-'.$impDay.' 11:38');
//    $ITS_NUM = date("l",$dateToken);
//
//    echo $ITS_NUM;
//
//}
// calendar(31,12,1990);
