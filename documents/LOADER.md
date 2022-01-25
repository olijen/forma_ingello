#Чтобы убрать загрузку компонента 

##Необходимо добавить клаас no-loader
Пример

`class="select-modal-link no-loader"`

`no-loader` можно использовать, **например**, когда еще не получили данные из сервера, 
или отключать его если не нужно ожидать данные
#Пример

`$("a, input[type=submit], button[type=submit]").click(function (event) {
if ($(this).hasClass('no-loader')) return ;
let href = $(this).attr('href');
if (href == '#') return;
if (href && href[0] == '#') return;
showLoader();
});`