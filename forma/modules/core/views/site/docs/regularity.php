​<p>Регламент определяет взаимодействие людей в компании друг с другом и с программным обеспечением.</p>

​<p>​Система ФОРМА предоставляет гибкий механизм настройки регламента индивидуально под свою компанию.</p>​
​<p>​Во многом успешность компании определяется её внутренней конституцией и набором правил.</p>​
​<p>​В системе ФОРМА Вы можете не только написать текст и добавить фото-видео для своего регламента.Механизм регламент
    позволяет прямо в тексте использовать специальные кнопки, которые будут открывать определенные элементы системы
    прямо во время прочтения регламента. Это позволит обучать и информаировать людей максимально быстро. Это экономит
    время для компании и руководителей.</p>​

​<p>​Но самое главное - Вы можете настроить регламенты без программиста и менять их в любое время. А для бизнеса
    критически важно уметь внедрять изменения и соответствовать быстрому темпу изменений внешнего мира!</p>​

<?php use yii\helpers\Url;
//echo 'https://forma.ingello.com'.Url::to((['/core/regularity/regularity', 'user-name' => Yii::$app->user->identity->username]));
echo Url::to(['@web/core/regularity/regularity', 'user-name' => Yii::$app->user->identity->username], true);
?>

<a class="btn btn-success" href="https://forma.ingello.com/<?= Yii::$app->user->identity->username?>/regularity"> Публичный регламент</a>