<style>
    .flex_wrap {
        background-color: black;
        display: flex;
        justify-content: center;
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
</style>
<link rel="stylesheet" media="screen" href="css/style.css">
<h1>Добро пожаловать на темную сторону Forma Ingello!</h1>
<div  class="flex_wrap">
    <div id="particles-js" class="particles_block">

    </div>
    <img id="dark_logo" src="/images/dark_logo.png" alt="">
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

    setInterval(function () {
        dark_logo.style.opacity = randomInteger(20, 30)/100
    }, 550)

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