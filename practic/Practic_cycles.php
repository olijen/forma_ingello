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


//28


$arr = [4,7,5,9,5,3,8,0,2,5];
$arrSum = [];
$key = [];
$qty = count($arr);




//30



//31



//32



//33



//34



//35


