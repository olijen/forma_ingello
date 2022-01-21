<?php include_once 'forma_test.php' ;
$arr_query = ['2+2 = ?',
    '2+3=?','3+5=?'];
$arr_answer = ['4','5','8'];

$count_array = count($arr_answer);


//?>
<!--<br>-->
<!--<br>-->
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <title>Query to you.</title>-->
<!--</head>-->
<!--<body>-->
<?php //foreach ($arr_query as $query)?>
<!--<form method="get">-->
<!--        <input type="text" name="answer" id="a" placeholder="--><?php //echo $arr_query[0]; ?><!--">-->
<!--        <input type="text" name="answer_1" id="a" placeholder="--><?php //echo $arr_query[1]; ?><!--">-->
<!--        <input type="text" name="answer_2" id="a" placeholder="--><?php //echo $arr_query[2]; ?><!--">-->
<!--        <input type="submit" value="Отправить.">-->
<!--    </form>-->
<!--</body>-->
<!--</html>-->
<!---->
<!---->
<?php
//$answer_0 = $_GET['answer'];
//$answer_1 = $_GET['answer_1'];
//$answer_2 = $_GET['answer_2'];
//$answer_array_push =array();
//for($i=0;$i<$count_array;$i++) {
//    array_push($answer_array_push, $answer_0, $answer_1, $answer_2);
//    if ($answer_array_push[$i] == $arr_answer[$i]) {
//        echo "Отличный ответ:  " . $arr_answer[$i] . "   ";
//    } else {
//        echo "   нет ответа : " . $answer_array_push[$i] . "    для вопроса :   " . $arr_query[$i] . "   ";
//    }
//}
//?>


<br>
<br>
<br>

<!--<form method='get'>-->
<!--    --><?php //echo $arr_query[0] ?><!--<br>-->
<!--    <input name="answer[0]" type="radio" value="Неверно">1<br>-->
<!--    <input name="answer[0]" type="radio" value="Верно"><br>-->
<!--    <input name="answer[0]" type="radio" value="Неверно">3<br>-->
<!--    --><?php //echo $arr_query[1] ?><!--<br>-->
<!--    <input name="answer[1]" type="radio" value="Неверно">5<br>-->
<!--    <input name="answer[1]" type="radio" value="Неверно">8<br>-->
<!--    <input name="answer[1]" type="radio" value="Верно">7<br>-->
<!--    --><?php //echo $arr_query[2] ?><!--<br>-->
<!--    <input name="answer[2]" type="radio" value="Верно">8<br>-->
<!--    <input name="answer[2]" type="radio" value="Неверно">4<br>-->
<!--    <input name="answer[2]" type="radio" value="Неверно">9<br>-->
<!--    <input type='submit' name="Submit" value='Отправить'>-->
<!--</form>-->
<?php
//$k=0;
//if (is_array($_GET['answer'])){
//    foreach($_GET['answer'] as $value)
//    {
//        if ($value=='Верно') {
//            $k=$k+1;
//        }
//        echo $value, '<br>';
//    }
//    echo "У вас {$k} правильных ответов", '<br>';
//}
//?>


<br>
<br>


<form method='get'>
    <?php echo $arr_query[0] ?><br>
    <input name="answer[0]" type="checkbox" value="Неверно">1<br>
    <input name="answer[0]" type="checkbox" value="Верно">4<br>
    <input name="answer[0]" type="checkbox" value="Неверно">3<br>
    <?php echo $arr_query[1] ?><br>
    <input name="answer[1]" type="checkbox" value="Верно">5<br>
    <input name="answer[1]" type="checkbox" value="Неверно">8<br>
    <input name="answer[1]" type="checkbox" value="Тоже верно">7<br>
    <?php echo $arr_query[2] ?><br>
    <input name="answer[2]" type="checkbox" value="Верно">8<br>
    <input name="answer[2]" type="checkbox" value="Тоже верно">4<br>
    <input name="answer[2]" type="checkbox" value="Неверно">9<br>
    <input type='submit' name="Submit" value='Отправить'>
</form>

<?php
$k=0;
if (is_array($_GET['answer'])){
    foreach($_GET['answer'] as $value)
    {
        if ($value=='Верно'& $value == 'Тоже верно') {
            echo 'Верно оба', '<br>'; $k=$k+1;
        }
        echo 'Верно оба', '<br>';
    }
    echo "У вас {$k} правильных ответов", '<br>';
}
?>