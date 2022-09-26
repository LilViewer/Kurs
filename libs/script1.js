$(document).on('ready', function() {

  $(".vertical-center").slick({
    vertical: true,
    verticalSwiping: true,
    autoplay: true,
    slidesToShow: 1,
    speed: 100,
    autoplaySpeed: 2000,
    nextArrow: '<img src="content/icon/row2.png" class="slick-next"> ',
    prevArrow: '<img src="content/icon/row.png" class="slick-prev"> ',
  });


  $('.vertical-center').on('afterChange', function(event, slick, currentSlide,nextSlide){
    let num = $('.vertical-center').slick('slickCurrentSlide') ;
    console.log(num);
    green_line.style.cssText='top: '+ num*46 +'px';

  });

});

var but_min = document.querySelector("#min"),
but_rec = document.querySelector("#rec"),
block_min = document.querySelector(".min"),
block_rec = document.querySelector(".rec");



if(but_min){
  but_min.onclick = function(){
    but_min.classList.add('but_activeen')
    but_rec.classList.remove('but_activeen')
    block_min.style.display = "block";
    block_rec.style.display = "none";
  }
}

if(but_rec){
  but_rec.onclick = function(){
    but_rec.classList.add('but_activeen')
    but_min.classList.remove('but_activeen')
    block_rec.style.display = "block";
    block_min.style.display = "none";
  }
}

var but_one = document.querySelector(".but_one"),
but_two = document.querySelector(".but_two"),
price_one = document.querySelector(".price_one"),
price_two = document.querySelector(".price_two"),
price_onet = document.querySelector(".price_onet"),
price_twot = document.querySelector(".price_twot");

if(but_one){
  but_one.onclick = function(){
    but_one.classList.add('but_active')
    but_two.classList.remove('but_active')
    price_one.style.display = "block";
    price_two.style.display = "none";
    price_onet.style.display = "inline";
    price_twot.style.display = "none";
  }
}
if(but_two){
  but_two.onclick = function(){
    but_two.classList.add('but_active')
    but_one.classList.remove('but_active')
    price_two.style.display = "block";
    price_one.style.display = "none";
    price_twot.style.display = "inline";
    price_onet.style.display = "none";
  }
}

var but_profil = document.querySelector("#but_profil"),
but_cabinet = document.querySelector("#but_cabinet"),
but_history = document.querySelector("#but_history"),
but_admin = document.querySelector("#but_admin"),
but_key = document.querySelector("#but_key"),
but_cupon = document.querySelector("#but_cupon"),
profil = document.querySelector("#profil"),
cabinett = document.querySelector("#cabinett"),
historys = document.querySelector("#historys"),
key = document.querySelector("#key"),
cupon = document.querySelector("#cupon"),
admin = document.querySelector("#admin");


if(but_profil){
  but_profil.onclick = function(){
    but_profil.classList.add('but_active')
    but_cabinet.classList.remove('but_active')
    but_history.classList.remove('but_active')
    but_admin.classList.remove('but_active')
    but_key.classList.remove('but_active')
    but_cupon.classList.remove('but_active')
    profil.style.display = "block";
    cabinett.style.display = "none";
    historys.style.display = "none";
    admin.style.display = "none";
    key.style.display = "none";
    cupon.style.display = "none";
  }
}
if(but_history){
  but_history.onclick = function(){
    but_history.classList.add('but_active')
    but_cabinet.classList.remove('but_active')
    but_history.classList.remove('but_active')
    but_admin.classList.remove('but_active')
    but_key.classList.remove('but_active')
    profil.style.display = "none";
    historys.style.display = "block";
    cabinett.style.display = "none";
    admin.style.display = "none";
    key.style.display = "none";
    but_cupon.classList.remove('but_active')
    cupon.style.display = "none";
  }
}
if(but_cabinet){
  but_cabinet.onclick = function(){
    but_cabinet.classList.add('but_active')
    but_profil.classList.remove('but_active')
    but_history.classList.remove('but_active')
    but_admin.classList.remove('but_active')
    but_key.classList.remove('but_active')
    cabinett.style.display = "block";
    profil.style.display = "none";
    historys.style.display = "none";
    admin.style.display = "none";
    key.style.display = "none";
    but_cupon.classList.remove('but_active')
    cupon.style.display = "none";
  }
}
if(but_admin){
  but_admin.onclick = function(){
    but_admin.classList.add('but_active')
    but_cabinet.classList.remove('but_active')
    but_history.classList.remove('but_active')
    but_profil.classList.remove('but_active')
    but_key.classList.remove('but_active')
    admin.style.display = "block";
    cabinett.style.display = "none";
    historys.style.display = "none";
    profil.style.display = "none";
    key.style.display = "none";
    but_cupon.classList.remove('but_active')
    cupon.style.display = "none";
  }
}
if(but_key){
  but_key.onclick = function(){
    but_key.classList.add('but_active')
    but_cabinet.classList.remove('but_active')
    but_history.classList.remove('but_active')
    but_profil.classList.remove('but_active')
    but_admin.classList.remove('but_active')
    key.style.display = "block";
    cabinett.style.display = "none";
    historys.style.display = "none";
    profil.style.display = "none";
    admin.style.display = "none";
    but_cupon.classList.remove('but_active')
    cupon.style.display = "none";
  }
}
if(but_cupon){
  but_cupon.onclick = function(){
    but_cupon.classList.add('but_active')
    but_cabinet.classList.remove('but_active')
    but_history.classList.remove('but_active')
    but_profil.classList.remove('but_active')
    but_admin.classList.remove('but_active')
    cupon.style.display = "block";
    cabinett.style.display = "none";
    historys.style.display = "none";
    profil.style.display = "none";
    admin.style.display = "none";
    but_key.classList.remove('but_active')
    key.style.display = "none";
  }
}


var log_but = document.querySelector("#log_but"),
reg_but = document.querySelector("#reg_but"),
block_log = document.querySelector(".block_log"),
block_reg = document.querySelector(".block_reg");

if(log_but){
  log_but.onclick = function(){
    log_but.classList.add('but_active')
    reg_but.classList.remove('but_active')
    block_log.style.opacity = "1";
    block_reg.style.opacity = "0";
  }
}
if(reg_but){
  reg_but.onclick = function(){
    reg_but.classList.add('but_active')
    log_but.classList.remove('but_active')
    block_reg.style.opacity = "1";
    block_log.style.opacity = "0";
  }
}

var but_tov = document.querySelector("#but_tov"),
but_gen = document.querySelector("#but_gen"),
but_dev = document.querySelector("#but_dev"),
but_pub = document.querySelector("#but_pub"),
tov = document.querySelector("#tov"),
gen = document.querySelector("#gen"),
dev = document.querySelector("#dev"),
pub = document.querySelector("#pub");


if(but_tov){
  but_tov.onclick = function(){
    but_tov.classList.add('but_active')
    but_gen.classList.remove('but_active')
    but_dev.classList.remove('but_active')
    but_pub.classList.remove('but_active')
    tov.style.display = "block";
    gen.style.display = "none";
    dev.style.display = "none";
    pub.style.display = "none";
  }
}
if(but_gen){
  but_gen.onclick = function(){
    but_gen.classList.add('but_active')
    but_tov.classList.remove('but_active')
    but_dev.classList.remove('but_active')
    but_pub.classList.remove('but_active')
    gen.style.display = "block";
    tov.style.display = "none";
    dev.style.display = "none";
    pub.style.display = "none";
  }
}
if(but_dev){
  but_dev.onclick = function(){
    but_dev.classList.add('but_active')
    but_gen.classList.remove('but_active')
    but_tov.classList.remove('but_active')
    but_pub.classList.remove('but_active')
    dev.style.display = "block";
    gen.style.display = "none";
    tov.style.display = "none";
    pub.style.display = "none";
  }
}
if(but_pub){
  but_pub.onclick = function(){
    but_pub.classList.add('but_active')
    but_gen.classList.remove('but_active')
    but_dev.classList.remove('but_active')
    but_tov.classList.remove('but_active')
    pub.style.display = "block";
    gen.style.display = "none";
    dev.style.display = "none";
    tov.style.display = "none";
  }
}