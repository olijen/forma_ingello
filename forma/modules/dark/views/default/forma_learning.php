<style>
    .flex_wrap {
        background: url('/images/learn_back.jpg');
        background-size: cover;
        display: flex;
        justify-content: center;
        flex-direction: column;
        position: relative;
    }

    .particles_block {
        transition: opacity 0.1s;
        width: 100%;
        z-index: 10;
    }

    #dark_logo {
        background-color: black;
        position: absolute;
        top: 0;
        transition: opacity 0.5s;
        width: 50%;
        z-index: 1;
    }

    .btn {
        background-color: #3c8dbc;
        color: #fff;
        margin-bottom: 20px;
        display: inline-block;
        font-size: 32px;
        font-weight: normal;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        padding: 10px 15px;
        line-height: 1.42857143;
        border-radius: 4px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-box-shadow: none;
        box-shadow: none;

    }
</style>
<link rel="stylesheet" media="screen" href="css/style.css">
<div  class="flex_wrap">
    <div id="particles-js" class="particles_block">

    </div>
    <div class="d-flex justify-content-center">
        <button class="btn btn-primary">Продолжить обучение</button>
        <button class="btn btn-primary">Перейти на главную панель</button>
    </div>
</div>

<script src="/js/particles.js"></script>
<script src="/js/app.js"></script>
<script src="js/stats.js"></script>

<script>
    function randomInteger(min, max) {
        // случайное число от min до (max+1)
        let rand = min + Math.random() * (max + 1 - min);
        return Math.floor(rand);
    }

    // setInterval(function () {
    //     dark_logo.style.opacity = randomInteger(20, 30)/100
    // }, 550)

    var count_particles, stats, update;
    stats = new Stats;
    stats.setMode(0);
    stats.domElement.style.position = 'absolute';
    stats.domElement.style.left = '0px';
    stats.domElement.style.top = '0px';
    document.body.appendChild(stats.domElement);
    count_particles = document.querySelector('.js-count-particles');
    update = function() {
        stats.begin();
        stats.end();
        if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
            count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
        }
        requestAnimationFrame(update);
    };
    requestAnimationFrame(update);
</script>