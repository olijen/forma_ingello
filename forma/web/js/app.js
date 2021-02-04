/* -----------------------------------------------
/* How to use? : Check the GitHub README
/* ----------------------------------------------- */

/* To load a config file (particles.json) you need to host this demo (MAMP/WAMP/local)... */
/*
particlesJS.load('particles-js', 'particles.json', function() {
  console.log('particles.js loaded - callback');
});
*/

/* Otherwise just put the config content (json): */

particlesJS('particles-js',

  {
  "particles": {

    /// ресурсозатраные поля:
    /// value - количестов частиц на странице
    /// density - количество частиц на (density) квадратный пиксель
    "number": {
      "value": 140,
      "density": {
        "enable": false,
        "value_area": 60
      }
    },
    "color": {
      "value": "#0dedd3"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 2,
        "color": "#14c4cf"
      },
      "polygon": {
        "nb_sides": 8
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 1,
      "random": false,
      "anim": {
        "enable": true,
        "speed": 7.393070450146613,
        "opacity_min": 0.5897842718656287,
        "sync": true
      }
    },
    "size": {
      "value": 2,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      //distance - дистанция между частицами когда начинает вырисовываться линия
      "enable": true,
      "distance": 180,
      "color": "#7fc0f0",
      "opacity": 0.43454377003615696,
      "width": 2.1
    },
    "move": {
      "enable": true,
      "speed": 33.3,
      "direction": "none",
      "random": false,
      "straight": false,
      "out_mode": "bounce",
      "bounce": true,
      "attract": {
        "enable": false,
        "rotateX": 1600,
        "rotateY": 4200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": false,
        "mode": "repulse"
      },
      "onclick": {
        "enable": false,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 215.77042027282963,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 623.3367696770634,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 0,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
}

);


/*
particlesJS("particles-js", {"particles":{"number":{"value":10,"density":{"enable":true,"value_area":163.9787811457196}},"color":{"value":"#8989ff"},"shape":{"type":"triangle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":6},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.6559151245828785,"random":true,"anim":{"enable":true,"speed":7.060797620926541,"opacity_min":1,"sync":true}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":213.1724154894355,"color":"#ffffff","opacity":0.4591405872080149,"width":2.623660498331514},"move":{"enable":true,"speed":29.51618060622953,"direction":"none","random":false,"straight":false,"out_mode":"bounce","bounce":false,"attract":{"enable":false,"rotateX":7297.055760984524,"rotateY":5247.3209966630275}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"repulse"},"onclick":{"enable":true,"mode":"repulse"},"resize":true},"modes":{"grab":{"distance":959.4377943729594,"line_linked":{"opacity":1}},"bubble":{"distance":1221.1026473837665,"size":207.67051826254533,"duration":6.562388377096432,"opacity":0.24920462191505438,"speed":3},"repulse":{"distance":141.2159524185308,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":false});var count_particles, stats, update; stats = new Stats; stats.setMode(0); stats.domElement.style.position = 'absolute'; stats.domElement.style.left = '0px'; stats.domElement.style.top = '0px'; document.body.appendChild(stats.domElement); count_particles = document.querySelector('.js-count-particles'); update = function() { stats.begin(); stats.end(); if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) { count_particles.innerText = window.pJSDom[0].pJS.particles.array.length; } requestAnimationFrame(update); }; requestAnimationFrame(update);;
 */