<?php
set_time_limit(60);
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


function de($data, $exit = true)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    if ($exit) {
        exit();
    }
}

//Выведите с помощью цикла столбец чисел от 1 до 100. Показать решение.

//for ($i = 1; $i<=100; $i++){
//    echo $i . '<br>';
//}

// Выведите с помощью цикла столбец четных чисел от 1 до 100. Показать решение.
//for ($i = 1; $i<=100; $i++){
//    if ($i%2 == 0){
//        echo $i;
//    }
//}
// Найдите с помощью цикла сумму чисел от 1 до 100. Показать решение.
//$count = 0;
//for ($i = 1; $i<=100; $i++){
//
//    $count +=$i ;
//}
//echo $count;

// Найдите с помощью цикла сумму квадратов чисел от 1 до 15. Показать решение.
//$count = 0;
//for ($i = 1; $i<=15; $i++){
//
//    $count +=pow($i,2) ;
//}
//echo $count;
//
//  Найдите с помощью цикла сумму корней чисел от 1 до 15.
//for ($i = 1; $i<=15; $i++){
//
//    $count +=sqrt($i) ;
//}
////echo $count;
///
// Найдите с помощью цикла сумму корней чисел от 1 до 15. Результат округлите до двух знаков после дробной части. Показать решение.
//$count = 0;
//for ($i = 1; $i<=15; $i++){
//
//    $count +=round(sqrt($i),2) ;
//}
//echo $count;

// Найдите с помощью цикла сумму тех чисел от 1 до 100, которые делятся на 7. Показать решение.
//$count = 0;
//for ($i = 1; $i<=100; $i++){
//
//    if ($i%7 == 0){
//
//        echo $i;
//    }
//}
//echo $count;
//
// Заполните массив 10-ю иксами с помощью цикла. Показать решение.
//$arr = [];
//for ($i = 0; $i<=9; $i++){
//
//    $arr[$i] = 'x';
//}
//var_dump($arr);

// Заполните массив числами от 1 до 10 с помощью цикла. Показать решение.
//$arr = [];
//for ($i = 0; $i<=9; $i++){
//
//    $arr[$i] = $i+1;
//}
//var_dump($arr);

//Заполните массив числами от 10 до 1 с помощью цикла. Показать решение.

//
//$arr = [];
//for ($i = 10; $i>0; $i--){
//
//    $arr[$i] = $i;
//}
//var_dump($arr);
//

// Заполните массив 10-ю случайными числами от 1 до 10 с помощью цикла. Показать решение.
//$arr = [];
//for ($i = 0; $i<=10; $i++){
//
//    $arr[$i] = rand(0,100);
//}
//var_dump($arr);
//

// С помощью цикла создайте строку из 6-ти символов, состоящую из случайных чисел от 1 до 9. Показать решение.
//$arr = '';
//for ($i = 0; $i<=5; $i++){
//
//    $arr.= rand(0,9);
//}
//var_dump($arr);


// Дан массив с числами. С помощью цикла найдите сумму квадратов элементов этого массива. Показать решение.
//$arr = [];
//for ($i = 0; $i<=9; $i++){
//    $arr[$i]= rand(0,17);
//}
//$count = 0;
//foreach ($arr as $item){
//    $count += $item;
//}
//var_dump($count);


// Дан массив с числами. С помощью цикла найдите сумму квадратов элементов этого массива. Показать решение.
//$count = 0;
//foreach ($arr as $item){
//    $count += $item*$item;
//}

//Дан массив с числами. С помощью цикла найдите корень из суммы квадратов элементов этого массива. Результат округлите в меньшую сторону до целых. Показать решение.

//var_dump(floor(sqrt($count)));
//var_dump($count);

//Дан массив с числами. Найдите сумму тех элементов массива, которые больше 0 и меньше 10. Показать решение.
//$count = 0;
//foreach ($arr as $item){
//    if ($item>0 && $item<10){
//        $count +=$item;
//    }
//}
//echo $count;

// Дан массив с числами. Проверьте, что в нем есть 3 одинаковых числа подряд.  --
//$arr = [1,1,2,3,4,5,5,5,6,7,8,9];
//$array = & $arr;
//de($array);

//$result = [];
//
//for ($i = 0;$i = count($arr)-1;$i++){
//    if ($arr[$i]==$array[$i+1]){
//        $result[] = $arr[$i];
//    }
//
//}
//de($result);
//foreach ($arr as $k=>$i){
//    foreach ($arr as $key=>$item){
//        if ($k !== $key){
//            if ($i == $item){
//                $array[] = $i;
//            }
//        }
//    }
//}
//de(1);


//С помощью цикла сформируйте строку '1223334444...' и так далее до заданного числа. Показать решение.

//$arr = '';
//for($i = 1;$i <= 10;$i++){
//    for ($j = 1;$j <=$i; $j++)
//    $arr.= $i;
//
//}
//de($arr);

// Дан многомерный массив (см. его под задачей). С помощью цикла выведите строки в формате 'имя-зарплата'.
//$arr = [
//    0=>['name'=>'Коля', 'salary'=>300],
//    1=>['name'=>'Вася', 'salary'=>400],
//    2=>['name'=>'Петя', 'salary'=>500],
//];
//foreach ($arr as $i){
//    echo $i['name'] . '-' . $i['salary'] . '<br>' ;
//}


// Заполните двумерный массив случайными числами от 1 до 10. В каждом подмассиве должно быть по 10 элементов. Должно быть 10 подмассивов. Показать решение.
//$arr = range(1,10);
//foreach ($arr as $k=>$i){
//    $arr[$k] = range(1,10);
//}
//de($arr);

// Напишите свой аналог функции ucfirst (аналог - значит можно использовать все, что угодно, кроме этой функции). Показать решение.
$str = 'asdadasddqwd';
$result = '';

//$str[0] = strtoupper($str[0]);
//echo($str);

// Напишите свой аналог функции strrev. Решите задачу двумя способами. Показать подсказку. Показать решение.
//for ($i = strlen($str)-1; $i >=0; $i-- ){
//    echo $str[$i];
//}
//echo $result;


// Напишите свой аналог функции strlen. Показать решение.
//$str = 'qweeqwqe';
//$arr = str_split($str);
//echo count($arr);

// Поменяйте в строке большие буквы на маленькие и наоборот. Показать решение.
//$str = 'ASdqwerSdsfDCfdvVREdvfrDDDDD';
//$result = '';
//for ($i=0;$i <= strlen($str)-1;$i++){
//    if ($str[$i] == ctype_upper($str[$i])){
//        $result .=strtolower($str[$i]);
//    }else{
//        $result.= strtoupper($str[$i]);
//    }
//}
//de($result);

//Преобразуйте строку 'var_text_hello' в 'varTextHello'. Скрипт должен работать с любыми стоками такого рода. Скрыть решение.
//$str = 'var_text_hello';
//$str = explode('_',$str);
//$result = '';
//foreach ($str as $item){
//    $result.=ucfirst($item);
//}
//de(lcfirst($result));

//С помощью только одного цикла нарисуйте следующую пирамидку: Скрыть подсказку.
//for ($i = 1;$i <=10;$i++){
//    echo str_repeat($i,$i) . '<br>';
//}

// Нарисуйте пирамиду, как показано на рисунке, только у вашей пирамиды должно быть не 5 рядов, а произвольное количество, оно задается так: $str = 'xxxxxxxx'; - это первый ряд пирамиды. Показать подсказку.
//$str = 'xxxxxxxx';
//for ($i = strlen($str)-1;$i >=1;$i--){
//    echo substr($str,0,$i) . '<br>';
//}
////echo substr($str,0,-1);
///
///  Дан массив с произвольными числами. Сделайте так, чтобы элемент повторился в массиве количество раз, соответствующее его числу. Пример: [1, 3, 2, 4] превратится в [1, 3, 3, 3, 2, 2, 4, 4, 4, 4]. Показать решение.
//$arr = [1, 3, 2, 4] ;
//$result = [];
//foreach ($arr as $i){
//    for ($j = 1; $j<=$i;$j++){
//        $result[] = $i;
//    }
//}
//de($result);

// Дан массив с произвольными целыми числами. Сделайте так, чтобы первый элемент стал ключом второго элемента, третий элемент - ключом четвертого и так далее. Пример: [1, 2, 3, 4, 5, 6] превратится в [1=>2, 3=>4, 5=>6]. Показать решение.

?>

<?php
//de($_SERVER['QUERY_STRING']);
//if (is_numeric(($_GET['country']))){
//
//    de('ne');
//}
if (isset($_GET['idu'])) {
    setcookie('idu', $_GET['idu']);
}

//if (isset($_GET['sort'])) {
//    $string = '';
//}
function selectForUpdate()
{
    if (isset($_GET['idu'])) {
        $conn = connection();
        $sql = "SELECT * FROM alex_test_info where id=" . $_GET['idu'];
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        foreach ($result as $k => $i) {
            $_GET[$k] = $i;
        }

    }
}

selectForUpdate();
if (isset($_COOKIE['idu'])) {
    $conn = connection();
    $sql = "UPDATE alex_test_info
SET country =" . '\'' . $_GET['country'] . '\'' . ",city =" . '\'' . $_GET['city'] . '\'' . ",str =" . '\'' . $_GET['str'] . '\'' . ",house =" . '\'' . $_GET['house'] . '\'' . ",floor =" . '\'' . $_GET['floor'] . '\'' . ",apartment =" . '\'' . $_GET['apartment'] . '\'' . "  
WHERE id = " . '\'' . $_COOKIE['idu'] . '\'';
    $query = $conn->query($sql);
    setcookie("idu", "", time() - 3600);
}
function connection()
{
    $servername = "localhost:3300";
    $database = "forma";
    $username = "root";
    $password = "root";
// Создаем соединение
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Нет соединения с бд: " . mysqli_connect_error());
    } else {
        return $conn;
    }
}


if (isset($_GET['floor']) && isset($_GET['apartment']) && isset($_GET['house'])) {

    $_GET['floor'] = (int)$_GET['floor'];
    $_GET['apartment'] = (int)$_GET['apartment'];
    $_GET['house'] = (int)$_GET['house'];
}


function select()
{
    $conn = connection();
    $sql = "SELECT * FROM alex_test_info LIMIT 10";
    $key = null;
    if (!empty($_GET['sort'])) {

        $uri='\''.$_SERVER['REQUEST_URI'].'\'';
            if ($_GET['typesort'] == ' asc') {
                $key = 'desc';
            }
            $sql = "SELECT * FROM alex_test_info  ORDER BY " . $_GET['sort'] . $_GET['typesort'] . " LIMIT 10";
//            $sql.=$uri;

    }
    if ($key == null) {
        $key = ' asc';
    }
    if (!empty($_GET['submitFilter'])) {
        $sql = "SELECT * FROM alex_test_info WHERE";
        $str = '';
        foreach ($_GET['filter'] as $k => $i) {
            if (!empty($i)) {
                $str .= "  $k LIKE '%" . $i . "%' and ";
            }
        }
        $sql .= $str;
        $sql = substr($sql, 0, -4);
    }
    if (!empty($_GET['page'])) {
        $num = 10;
        $conn = connection();
        $sum = $_GET['page'] - 1;
        $sql .= " OFFSET " . ($sum * $num);
    }
    $query = $conn->query($sql);

    $result = $query->fetch_all(MYSQLI_ASSOC);
    $td = array_keys($result[0]);
    $cols = count($result); // количество столбцов, td
    $table = '<table border="1" width="100%">
               <form id="filter">';
    foreach ($td as $i) {
        $table .= '<td> <b> <a href="cycle.php?sort=' . $i . "+&typesort=$key" . '">' . $i . '</a> <input type="text" 
                    name="filter['.$i .']" ></b></td>';

    }
    $table .= '<td><b> <input type="submit" name="submitFilter" value="отфильтровать"></td>';
    $table .= '<td><b><a href="cycle.php?cleanParams" >очистить</a></td>';
    echo '</form>';
    $id = '';
    for ($tr = 0; $tr <= $cols - 1; $tr++) {
        $table .= '<tr>';
        for ($td = 1; $td <= 1; $td++) {
            foreach ($result[$tr] as $k => $i) {
                $id = $result[$tr]['id'];
                $table .= '<td>' . $i . '</td>';
            }
            $table .= '<td><a href="cycle.php?id=' . $id . '" >удалить</td>';
            $table .= '<td><a href="cycle.php?idu=' . $id . '" >обновить</td>';
            $table .= '</tr>';
        }
    }
    $table .= '</table>';
    return $table;
}

if (isset($_GET['cleanParams'])) {
    unset($_GET);
}

function delete()
{

    if (isset($_GET['id']) && !isset($_GET['idu'])) {
        $conn = connection();
        $deleteSql = "Delete From alex_test_info where id=" . $_GET['id'];
        if ($conn->query($deleteSql)) {
            echo 'delete';
        }
    }

}

delete();

function validation()
{
    if (!empty($_GET)) {
        if (empty($_GET['id']) && empty($_GET['idu']) && !isset($_GET['sort']) && !isset($_GET['page']) && empty($_GET['submitFilter'])) {
            if (empty(trim($_GET['country']))) {
                echo '<br>' . "Введите  корректно country";
            } elseif (is_numeric(trim($_GET['country']))) {
                echo 'введите строку country <br>';
            } else {
                $country = $_GET['country'];
            }


            if (empty(trim($_GET['city']))) {
                echo '<br>' . "Введите  корректно city";
            } elseif (is_numeric(trim($_GET['city']))) {
                echo 'введите строку city <br>';
            } else {
                $city = $_GET['city'];
            }

            if (empty(trim($_GET['str'])) && trim($_GET['str']) == '') {
                echo '<br>' . "Введите  корректно str";
            } elseif (is_numeric(trim($_GET['str']))) {
                echo 'введите строку str <br>';
            } else {
                $str = $_GET['str'];
            }

            if (empty(trim($_GET['house'])) && is_int(trim($_GET['house'])) == 0) {
                echo '<br>' . "Введите  корректно house";
            } else {
                $house = $_GET['house'];
            }

            if (empty(trim($_GET['floor'])) && is_int(trim($_GET['floor'])) == 0) {
                echo '<br>' . "Введите  корректно floor";
            } else {
                $floor = $_GET['floor'];
            }

            if (empty(trim($_GET['apartment'])) && is_int(trim($_GET['apartment'])) == 0) {
                echo '<br>' . "Введите  корректно apartment";
            } else {
                $apartment = $_GET['apartment'];
            }
            if (isset($apartment) && isset($floor) && isset($house) && isset($city) && isset($str) && isset($country)) {
                return true;
            } else {
                return false;
            }
        }
    }
}

insert();
function insert()
{

    if (validation() && !isset($_COOKIE['idu']) && empty($_GET['submitFilter'])) {
        $country = '\'' . $_GET['country'] . '\'';
        $city = '\'' . $_GET['city'] . '\'';
        $str = '\'' . $_GET['str'] . '\'';
        $house = '\'' . $_GET['house'] . '\'';
        $floor = '\'' . $_GET['floor'] . '\'';
        $apartment = '\'' . $_GET['apartment'] . '\'';

        $conn = connection();


        $sql = "INSERT INTO alex_test_info (country,city,str,house,floor,apartment) VALUES ($country,$city,$str,$house,$floor,$apartment)";
        if ($conn->query($sql)) {
            echo "Данные успешно добавлены";
        }
    }

}

$b = select();
echo $b;

if (!isset($_GET['submitFilter'])) {
    ?>
    <form method="get" action="cycle.php" id="insertUpdate" >
        <div >
        <input type="text" placeholder="страна"  value="<?php if (!empty($_GET['country'])) {
            echo $_GET['country'];
        } ?>" name="country">
        <input type="text" placeholder="город" value="<?php if (!empty($_GET['city'])) {
            echo $_GET['city'];
        } ?>" name="city">
        <input type="text" placeholder="улица" value="<?php if (!empty($_GET['str'])) {
            echo $_GET['str'];
        } ?>" name="str">
        <input type="text" placeholder="дом" value="<?php if (!empty($_GET['house'])) {
            echo $_GET['house'];
        } ?>" name="house">
        <input type="text" placeholder="этаж" value="<?php if (!empty($_GET['floor'])) {
            echo $_GET['floor'];
        } ?>" name="floor">
        <input type="text" placeholder="квартира" value="<?php if (!empty($_GET['apartment'])) {
            echo $_GET['apartment'];
        } ?>" name="apartment">
        <input type="submit">
        </div>
        <hr>
    </form>
<?php };
$countRow = 10;
$conn = connection();
$count = "SELECT count(*) FROM alex_test_info;";
$query = $conn->query($count);
$row = $query->fetch_row();
$page = intval(($row[0] - 1) / $countRow) + 1;
//de($page);
$result = '';
for ($i = 1; $i <= $page; $i++) {
    $result .= "<a href='cycle.php?page=" . $i . "'>" . $i . ",</a>";
}
$result = substr($result, 0, -5);
echo $result;

exit();

?>