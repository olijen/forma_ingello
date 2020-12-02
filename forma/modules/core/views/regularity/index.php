<?php

use yii\helpers\Url;

$this->params['doc-page'] = 'regularity';
$this->title = 'Регламент';

?>

<!-- Вывод регламентов и их пунктов-->
<section class="content">
    <?php if ($regularitys): ?>

        <?= $this->render('regularity', [
            'regularitys' => $regularitys,
            'items' => $items,
            'order_id' => $order_id
        ]);
        ?>

    <?php elseif (!$regularitys): ?>
        <h4>У вас нет регламентов, но вы можете их добавить пройдя по ссылке <br><br>
            <a href="/core/regularity/settings">Добавить регламент</a>
        </h4>
    <?php endif; ?>
</section>


<h1>Эти функции можно использовать в регламенте для прямого запуска компонентов системы</h1>
<?=  $this->render('function_buttons')?>


<style>
    .nav-tabs li {
        border-top: 3px solid #ccc !important;
    }

    .nav-tabs li.active {
        border-top: 3px solid green !important;
    }

    a {
        color: green;
    }

    @media screen and (max-width: 768px) {
        .nav-tabs > a > i {
            width: 100px;
        }
    }
</style>


<script>
    let modalBtnArr = document.getElementsByClassName('modalBtn');
    console.log(modalBtnArr);
    for (let i = 0; i < modalBtnArr.length; i++) {
        modalBtnArr[i].addEventListener('click', {
            handleEvent(event) {
                document.getElementById('myFrame').style.height = '100%';
                //alert(event.type + " на " + event.currentTarget);
            }
        });
    }

</script>