<?php

use yii\helpers\Html;

$factors = [
    'yii' => true,
    'php' => true,
    'laravel' => true,
    'crm' => true,
    'erp' => true,
    'wmr' => true,
    'sql' => true,
    'приложен' => true,
    'senior' => true,
    'middle' => true,
    'ТЗ' => true,
    'автоматиз' => true,
    'долгосрочн' => true,

    'wp' => false,
    'wordpress' => false,
    'word press' => false,
    'opencart' => false,
    'опенкарт' => false,
    'cms' => false,
    'опенкард' => false,
    'опен карт' => false,
    'woo' => false,
    'open cart' => false,
    'joomla' => false,
    '1с' => false,
    'визитк' => false,
    'верст' => false,
    'вёрст' => false,
    'таргет' => false,
    'телеграм' => false,
    'стать' => false,
    'Open Cart' => false,
    'Ленд' => false,
    'лендинг' => false,
    'тильд' => false,
    'Контент-менеджер' => false,
    'СЕО' => false,
    'SEO-специалист' => false,
    'маски для Интаграм' => false,
    'смм' => false,
    'smm' => false,
    'в офис' => false,
    'семанти' => false,
    '3d' => false,
];

$this->title = 'Проекты FLH ('.count($projects).')';

?>

<?php foreach ($projects as &$project) :

    $project['negative'] = 0;
    $project['negativeList'] = '';
    $project['positive'] = 0;
    $project['positiveList'] = '';
    $project['attributes']['name_html'] = $project['attributes']['name'];

    foreach ($factors as $substr => $value) {
        $attribute = ($value) ? 'positive' : 'negative';
        $color = ($value) ? 'green' : 'red';

        // Проверяем заголовок проекта, подчеркиваем факторы
        $pos = strripos($project['attributes']['name'], $substr);

        if ($pos !== false) {
            //Если в заголовке есть негативное слово - пропускаем. Пока отключил.
            //if ($attribute == 'negative') continue 2;
            $project[$attribute] ++;
            $project[$attribute.'List'] .= $substr . ' ';
            $project['attributes']['name_html'] = str_ireplace($substr, '<span style="border-bottom: 4px solid '.$color.';">'.$substr.'</span>', $project['attributes']['name']);
        }

        //Проверяем текст проекта, подчёркиваем факторы
        $pos = strripos($project['attributes']['description'], $substr);

        if ($pos !== false) {
            $project[$attribute] ++;
            $project[$attribute.'List'] .= $substr . ' ';
            $project['attributes']['description_html'] = str_ireplace($substr, '<span style="border-bottom: 4px solid '.$color.';">'.$substr.'</span>', $project['attributes']['description_html']);
        }
    }

endforeach;

$positive = array_column($projects, 'positive');
$negative = array_column($projects, 'negative');

// Сортируем данные по volume по убыванию и по edition по возрастанию
// Добавляем $data в качестве последнего параметра, для сортировки по общему ключу
array_multisort($positive, SORT_DESC, $negative, SORT_ASC, $projects);

?>

<?php foreach ($projects as $project) : ?>

    <h3 style="background: <?=$project['status_color']?>;">

      <i title="<?=$project['positiveList']?>" class="fa fa-check-square" style="color: green;"><?=$project['positive']?></i>
      <i title="<?=$project['negativeList']?>" class="fa fa-close" style="color: red;"><?=$project['negative']?></i>

      <i class="fa fa-calendar"></i> <?=$project['attributes']['published_at']?>
            <?=$project['attributes']['name_html']?>
    </h3>

    <div>

        <form  target="_blank" method="post" action="/selling/freelancehunt/bid-form?url=<?=$project['links']['self']['web']?>">

            <?= Html::hiddenInput(
                \Yii::$app->getRequest()->csrfParam,
                \Yii::$app->getRequest()->getCsrfToken(), []
            ); ?>

            <input type="hidden" name="name" value="<?=$project['attributes']['name'] ?>">
            <input type="hidden" name="positive" value="<?=$project['positive'] ?>">
            <input type="hidden" name="negative" value="<?=$project['negative'] ?>">
            <input type="hidden" name="published_at" value="<?=date('Y-m-d H:i:s', strtotime($project['attributes']['published_at'])) ?>">
            <input type="hidden" name="description_html" value="<?=base64_encode($project['attributes']['description_html']) ?>">

            <input class="btn btn-primary" type="submit" value="Обработать" />

            <a class="btn btn-default" href="<?=$project['links']['self']['web']?>" target="_blank">
              Ссылка
            </a>

          <input type="text" value="<?=$project['links']['self']['web']?>" width="70%"/>

        </form>


    </div>

    <p>
        <?=$project['attributes']['description_html']?>

    </p>

<?php endforeach; ?>