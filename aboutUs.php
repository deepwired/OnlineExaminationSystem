<style>
    * {
  box-sizing: border-box;
  -webkit-tap-highlight-color: rgba(255,255,255,0);
}
body {
  font-family: 'Source Sans Pro';
  line-height: 1.5;
  -webkit-font-smoothing: antialiased;
}
.overflow {
  height: 100vh;
  overflow: hidden;
}
.panels {
  width: 200%;
}
.panels__side {
  float: left;
  width: 50%;
  -webkit-perspective: 400px;
          perspective: 400px;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
          transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
}
.panels__side--left,
.panels__side--right {
  will-change: transform;
  position: relative;
  left: -25%;
  -webkit-transform: translate(0, 0);
      -ms-transform: translate(0, 0);
          transform: translate(0, 0);
}
.panels__side--left {
    background: #000;
}
.panels__side--left:hover .arrow {
  -webkit-transform: translate(-100%, -50%);
      -ms-transform: translate(-100%, -50%);
          transform: translate(-100%, -50%);
}
.panels__side--right {
    background: white;
}
.panels__side--right:hover .arrow {
  -webkit-transform: translate(0, -50%);
      -ms-transform: translate(0, -50%);
          transform: translate(0, -50%);
}
.panels__side--left-active {
  -webkit-transform: translate(50%, 0);
      -ms-transform: translate(50%, 0);
          transform: translate(50%, 0);
}
.panels__side--left-active .panels__side--inner-left {
  -webkit-transform: rotateY(0);
          transform: rotateY(0);
}
.panels__side--left-active .arrow {
  -webkit-transform: translate(-50%, -50%) rotate(180deg) !important;
      -ms-transform: translate(-50%, -50%) rotate(180deg) !important;
          transform: translate(-50%, -50%) rotate(180deg) !important;
}
.panels__side--right-active {
  -webkit-transform: translate(-50%, 0);
      -ms-transform: translate(-50%, 0);
          transform: translate(-50%, 0);
}
.panels__side--right-active .panels__side--inner-right {
  -webkit-transform: rotateY(0);
          transform: rotateY(0);
}
.panels__side--right-active .arrow {
  -webkit-transform: translate(-50%, -50%) rotate(180deg) !important;
      -ms-transform: translate(-50%, -50%) rotate(180deg) !important;
          transform: translate(-50%, -50%) rotate(180deg) !important;
}
.panels__side--left-hidden {
  -webkit-transform: translate(-50%, 0);
      -ms-transform: translate(-50%, 0);
          transform: translate(-50%, 0);
}
.panels__side--right-hidden {
  -webkit-transform: translate(50%, 0);
      -ms-transform: translate(50%, 0);
          transform: translate(50%, 0);
}
.panels__side--inner {
  cursor: pointer;
}
.panels__side--inner-left,
.panels__side--inner-right,
.panels__side--inner {
  will-change: transform;
  padding: 0 5vw;
  height: 100vh;
}
.panels__side--inner-left {
  -webkit-transform-origin: right center;
      -ms-transform-origin: right center;
          transform-origin: right center;
  -webkit-transform: rotateY(-90deg);
          transform: rotateY(-90deg);
  -webkit-transition-delay: 0.1s;
          transition-delay: 0.1s;
  background: url("images/deep.jpg") center/cover;
}
.panels__side--inner-left:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: window;
  z-index: -1;
  opacity: 0.5;
}
.panels__side--inner-right {
  -webkit-transform-origin: left center;
      -ms-transform-origin: left center;
          transform-origin: left center;
  -webkit-transform: rotateY(90deg);
          transform: rotateY(90deg);
  -webkit-transition-delay: 0.1s;
          transition-delay: 0.1s;
  background: url("images/kinnary.jpg") center/cover;
}
.panels__side--inner-right:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: window;
  z-index: -1;
  opacity: 0.5;
}
.panels__headline {
  margin: 0;
  font-size: 40px;
  text-align: center;
  color: #1a1a1a;
}
.panels p {
  font-size: 30px;
  margin: 0;
}
@media (max-width: 640px) {
  .panels {
    width: 100%;
    height: 200vh;
  }
  .panels__side {
    float: none;
    width: 100%;
    height: 100vh;
    display: block;
    text-align: center;
  }
  .panels__side--left,
  .panels__side--right {
    top: -25%;
    left: 0;
  }
  .panels__side--left:hover .arrow {
    -webkit-transform: translate(-50%, -80%) rotate(90deg);
        -ms-transform: translate(-50%, -80%) rotate(90deg);
            transform: translate(-50%, -80%) rotate(90deg);
  }
  .panels__side--right:hover .arrow {
    -webkit-transform: translate(-50%, -20%) rotate(90deg);
        -ms-transform: translate(-50%, -20%) rotate(90deg);
            transform: translate(-50%, -20%) rotate(90deg);
  }
  .panels__side--left-active {
    -webkit-transform: translate(0, 50%);
        -ms-transform: translate(0, 50%);
            transform: translate(0, 50%);
  }
  .panels__side--left-active .panels__side--inner-left {
    -webkit-transform: rotateX(0);
            transform: rotateX(0);
  }
  .panels__side--left-active .arrow {
    -webkit-transform: translate(-50%, -50%) rotate(-90deg) !important;
        -ms-transform: translate(-50%, -50%) rotate(-90deg) !important;
            transform: translate(-50%, -50%) rotate(-90deg) !important;
  }
  .panels__side--right-active {
    -webkit-transform: translate(0, -50%);
        -ms-transform: translate(0, -50%);
            transform: translate(0, -50%);
  }
  .panels__side--right-active .panels__side--inner-right {
    -webkit-transform: rotateX(0);
            transform: rotateX(0);
  }
  .panels__side--right-active .arrow {
    -webkit-transform: translate(-50%, -50%) rotate(-90deg) !important;
        -ms-transform: translate(-50%, -50%) rotate(-90deg) !important;
            transform: translate(-50%, -50%) rotate(-90deg) !important;
  }
  .panels__side--left-hidden {
    -webkit-transform: translate(0, -50%);
        -ms-transform: translate(0, -50%);
            transform: translate(0, -50%);
  }
  .panels__side--right-hidden {
    -webkit-transform: translate(0, 50%);
        -ms-transform: translate(0, 50%);
            transform: translate(0, 50%);
  }
  .panels__side--inner-left,
  .panels__side--inner-right,
  .panels__side--inner {
    height: 50vh;
    padding: 2vh 8vw;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
        -ms-flex-align: center;
            align-items: center;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
        -ms-flex-pack: center;
            justify-content: center;
  }
  .panels__side--inner-left {
    -webkit-transform-origin: center bottom;
        -ms-transform-origin: center bottom;
            transform-origin: center bottom;
    -webkit-transform: rotateX(90deg);
            transform: rotateX(90deg);
  }
  .panels__side--inner-right {
    -webkit-transform-origin: center top;
        -ms-transform-origin: center top;
            transform-origin: center top;
    -webkit-transform: rotateX(-90deg);
            transform: rotateX(-90deg);
  }
  .panels__headline {
    font-size: 32px;
  }
  .panels p {
    font-size: 20px;
  }
}
.arrow {
  position: absolute;
  top: 75%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  fill: #1a1a1a;
  border: 3px solid #1a1a1a;
  border-radius: 50%;
  -webkit-transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
          transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
}
@media (max-width: 640px) {
  .arrow {
    -webkit-transform: translate(-50%, -50%) rotate(90deg);
        -ms-transform: translate(-50%, -50%) rotate(90deg);
            transform: translate(-50%, -50%) rotate(90deg);
  }
  .arrow--left {
    top: 25%;
  }
}
.logo {
  position: fixed;
  bottom: 3vh;
  right: 3vw;
  z-index: 2;
}
.logo img {
  width: 45px;
  -webkit-transform: rotate(0);
      -ms-transform: rotate(0);
          transform: rotate(0);
  -webkit-transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
          transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
}
.logo img:hover {
  -webkit-transform: rotate(180deg) scale(1.1);
      -ms-transform: rotate(180deg) scale(1.1);
          transform: rotate(180deg) scale(1.1);
}

</style>
<div class="overflow">
  <section class="panels">
    <article class="panels__side panels__side--left">
      <div class="panels__side panels__side--inner-left">
        <p>"If Everything seems under control, You aren't going Fast Enough !!"</p>
      </div>
      <div class="panels__side panels__side--inner">
          <h1 class="panels__headline" ><a  style="color:white;text-decoration: none" href='https://www.linkedin.com/profile/view?id=AAMAAAaDyPUBN9y3qWIoE7xBScNeyPlWpiEixUU&trk=hp-identity-name' target="_blank">Deep Singh Baweja</a></h1><br>
          <svg class="arrow arrow--left" style="color: white" width="40" height="40" viewBox="0 0 24 24"><path d="M0 0h24v24h-24z" fill="none"/><path d="M20 11h-12.17l5.59-5.59-1.42-1.41-8 8 8 8 1.41-1.41-5.58-5.59h12.17v-2z"/></svg>
      </div>
    </article>
    <article class="panels__side panels__side--right">
      <div class="panels__side panels__side--inner">
          <h1 class="panels__headline"><a style="color: black;text-decoration: none" href='https://www.linkedin.com/profile/view?id=AAkAABZpLDgB17Ev__ryCcRU9GjiJ-kg8J6790g&authType=NAME_SEARCH&authToken=346l&locale=en_US&trk=tyah&trkInfo=clickedVertical%3Amynetwork%2CclickedEntityId%3A375991352%2CauthType%3ANAME_SEARCH%2Cidx%3A1-1-1%2CtarId%3A1444821915633%2Ctas%3Akinn' target="_blank">Kinnary Raval</a></h1><br>
        <svg class="arrow arrow--right" width="40" height="40" viewBox="0 0 24 24"><path d="M0 0h24v24h-24z" fill="none"/><path d="M12 4l-1.41 1.41 5.58 5.59h-12.17v2h12.17l-5.58 5.59 1.41 1.41 8-8z"/></svg>
      </div>
      <div class="panels__side panels__side--inner-right">
        <p>"Relax, Everyone is Crazy..... Its not a competition."</p>
      </div>
    </article>
  </section>
</div>
<!-- Ettrics -->
<script>
    var Panels = (function() {

  var panelLeft = document.querySelector('.panels__side--left');
  var panelRight = document.querySelector('.panels__side--right');

  var openLeft = function() {
    panelLeft.classList.toggle('panels__side--left-active');
    panelRight.classList.toggle('panels__side--right-hidden');
  };

  var openRight = function() {
    panelRight.classList.toggle('panels__side--right-active');
    panelLeft.classList.toggle('panels__side--left-hidden');
  };

  var bindActions = function() {
    panelLeft.addEventListener('click', openLeft, false);
    panelRight.addEventListener('click', openRight, false);
  };

  var init = function() {
    bindActions();
  };

  return {
    init: init
  };

}());

Panels.init();
</script>    