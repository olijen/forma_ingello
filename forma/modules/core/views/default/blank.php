<style>
    body {
        background-color: #1d1f20;
        min-height: 100vh;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        align-content: space-around;
    }
    section {
        flex: 1 1 25%;
    }
    section#preloader {
        display: flex;
        height: 70vh;
    }
    .sk-cube-grid {
        width: 10em;
        height: 10em;
        margin: auto;
        /* * Spinner positions * 1 2 3 * 4 5 6 * 7 8 9 */
    }
    .sk-cube-grid .sk-cube {
        width: 33%;
        height: 33%;
        background-color: #00a65a;
        float: left;
        animation: sk-cube-grid-scale-delay 1.3s infinite ease-in-out;
    }
    .sk-cube-grid .sk-cube-1 {
        animation-delay: 0.2s;
    }
    .sk-cube-grid .sk-cube-2 {
        animation-delay: 0.3s;
    }
    .sk-cube-grid .sk-cube-3 {
        animation-delay: 0.4s;
    }
    .sk-cube-grid .sk-cube-4 {
        animation-delay: 0.1s;
    }
    .sk-cube-grid .sk-cube-5 {
        animation-delay: 0.2s;
    }
    .sk-cube-grid .sk-cube-6 {
        animation-delay: 0.3s;
    }
    .sk-cube-grid .sk-cube-7 {
        animation-delay: 0s;
    }
    .sk-cube-grid .sk-cube-8 {
        animation-delay: 0.1s;
    }
    .sk-cube-grid .sk-cube-9 {
        animation-delay: 0.2s;
    }
    @keyframes sk-cube-grid-scale-delay {
        0%, 70%, 100% {
            transform: scale3D(1, 1, 1);
        }
        35% {
            transform: scale3D(0, 0, 1);
        }
    }
    .sk-fading-circle {
        width: 4em;
        height: 4em;
        position: relative;
        margin: auto;
    }
    .sk-fading-circle .sk-circle {
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
    }
    .sk-fading-circle .sk-circle:before {
        content: '';
        display: block;
        margin: 0 auto;
        width: 15%;
        height: 15%;
        background-color: #337ab7;
        border-radius: 100%;
        animation: sk-fading-circle-delay 1.2s infinite ease-in-out both;
    }
    .sk-fading-circle .sk-circle-2 {
        transform: rotate(30deg);
    }
    .sk-fading-circle .sk-circle-3 {
        transform: rotate(60deg);
    }
    .sk-fading-circle .sk-circle-4 {
        transform: rotate(90deg);
    }
    .sk-fading-circle .sk-circle-5 {
        transform: rotate(120deg);
    }
    .sk-fading-circle .sk-circle-6 {
        transform: rotate(150deg);
    }
    .sk-fading-circle .sk-circle-7 {
        transform: rotate(180deg);
    }
    .sk-fading-circle .sk-circle-8 {
        transform: rotate(210deg);
    }
    .sk-fading-circle .sk-circle-9 {
        transform: rotate(240deg);
    }
    .sk-fading-circle .sk-circle-10 {
        transform: rotate(270deg);
    }
    .sk-fading-circle .sk-circle-11 {
        transform: rotate(300deg);
    }
    .sk-fading-circle .sk-circle-12 {
        transform: rotate(330deg);
    }
    .sk-fading-circle .sk-circle-2:before {
        animation-delay: -1.1s;
    }
    .sk-fading-circle .sk-circle-3:before {
        animation-delay: -1s;
    }
    .sk-fading-circle .sk-circle-4:before {
        animation-delay: -0.9s;
    }
    .sk-fading-circle .sk-circle-5:before {
        animation-delay: -0.8s;
    }
    .sk-fading-circle .sk-circle-6:before {
        animation-delay: -0.7s;
    }
    .sk-fading-circle .sk-circle-7:before {
        animation-delay: -0.6s;
    }
    .sk-fading-circle .sk-circle-8:before {
        animation-delay: -0.5s;
    }
    .sk-fading-circle .sk-circle-9:before {
        animation-delay: -0.4s;
    }
    .sk-fading-circle .sk-circle-10:before {
        animation-delay: -0.3s;
    }
    .sk-fading-circle .sk-circle-11:before {
        animation-delay: -0.2s;
    }
    .sk-fading-circle .sk-circle-12:before {
        animation-delay: -0.1s;
    }
    @keyframes sk-fading-circle-delay {
        0%, 39%, 100% {
            opacity: 0;
        }
        40% {
            opacity: 1;
        }
    }
    .sk-folding-cube {
        width: 4em;
        height: 4em;
        position: relative;
        margin: auto;
        transform: rotateZ(45deg);
    }
    .sk-folding-cube .sk-cube {
        float: left;
        width: 50%;
        height: 50%;
        position: relative;
        transform: scale(1.1);
    }
    .sk-folding-cube .sk-cube:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #337ab7;
        animation: sk-folding-cube-angle 2.4s infinite linear both;
        transform-origin: 100% 100%;
    }
    .sk-folding-cube .sk-cube-2 {
        transform: scale(1.1) rotateZ(90deg);
    }
    .sk-folding-cube .sk-cube-3 {
        transform: scale(1.1) rotateZ(180deg);
    }
    .sk-folding-cube .sk-cube-4 {
        transform: scale(1.1) rotateZ(270deg);
    }
    .sk-folding-cube .sk-cube-2:before {
        animation-delay: 0.3s;
    }
    .sk-folding-cube .sk-cube-3:before {
        animation-delay: 0.6s;
    }
    .sk-folding-cube .sk-cube-4:before {
        animation-delay: 0.9s;
    }
    @keyframes sk-folding-cube-angle {
        0%, 10% {
            transform: perspective(140px) rotateX(-180deg);
            opacity: 0;
        }
        25%, 75% {
            transform: perspective(140px) rotateX(0deg);
            opacity: 1;
        }
        90%, 100% {
            transform: perspective(140px) rotateY(180deg);
            opacity: 0;
        }
    }
</style>

<!-- / 9 -->
<div class="d-flex flex-column" style="width: 100%;">
    <section id="preloader">
        <div class="sk-cube-grid" style="position: relative; top:20%">
            <div class="sk-cube sk-cube-1"></div>
            <div class="sk-cube sk-cube-2"></div>
            <div class="sk-cube sk-cube-3"></div>
            <div class="sk-cube sk-cube-4"></div>
            <div class="sk-cube sk-cube-5"></div>
            <div class="sk-cube sk-cube-6"></div>
            <div class="sk-cube sk-cube-7"></div>
            <div class="sk-cube sk-cube-8"></div>
            <div class="sk-cube sk-cube-9"></div>
        </div>
    </section>
    <section class="d-flex justify-content-center">
        <p id="preloader_text" class="text-center">
            <i class="big-round-icon fa fa-table"></i> Загружаем тестовые данные...
        </p>
    </section>

</div>

<script>

    wordsArray = [
        '<i class="big-round-icon fa fa-users"></i> Создаем имитацию клиентов...',
        '<i class="big-round-icon fa fa-money-check-alt"></i> Создаем демонстрационные продажи...',
        '<i class="big-round-icon fa fa-boxes"></i> Создаем фейковые продукты и склады...',
        '<i class="big-round-icon fa fa-box-open"></i> Заполняем склады псевдо-товарами...',
        '<i class="big-round-icon fa fa-project-diagram"></i> Придумываем какие-то проекты...',
        '<i class="big-round-icon fa fa-file"></i> Размещаем ненастоящие вакансии...',
        '<i class="big-round-icon fa fa-user-tag"></i> Назначаем людей на выдуманные должности...',
        '<i class="big-round-icon fa fa-truck"></i> Проводим первую пробную закупку...',
    ];

    let i = 0;
    let t = setInterval(function () {
        $('#preloader_text').animate({left: '-3000px'}, 500, () => {
            preloader_text.innerHTML = wordsArray[i];
            i++;
            if (i == wordsArray.length) i = 0;
            $('#preloader_text').css({left: '3000px'});
            $('#preloader_text').animate({left: '0%'}, 500);
        });
    }, 3000);

    document.addEventListener("DOMContentLoaded", function(event) {
        $.ajax({
            type: 'get',
            url: 'core/default/test-data',
            data: '',
            success: function (message) {
                //todo: clear interval "t" if time is go
                alert('Поздравляем! Ваш профиль успешно заполнен тестовыми данными!')
            },
            error: function (request, status, error) {
                alert('ОШИБКА: ' + JSON.stringify(request));
            }
        })
    });
</script>

<style>
    .big-round-icon{
        padding: 25px;
        font-size: 200%;
    }
    #preloader_text {
        position: relative;
        color: #00a65a;
        font-size: 4rem;
        text-shadow: 10px 10px 10px rgba(0,0,0,0.5);
    }
    @media screen and (max-width: 479px) {
        #preloader_text {
            position: relative;
            color: #00a65a;
            font-size: 2rem;
        }
    }

    body {
        background: url('/images/loaddata.jpg') !important;
        background-size: cover!important;
    }
</style>