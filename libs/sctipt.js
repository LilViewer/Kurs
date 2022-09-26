var log_but = document.querySelector("#log_but"),
    reg_but = document.querySelector("#reg_but"),
    block_log = document.querySelector(".block_log"),
    block_reg = document.querySelector(".block_reg");


log_but.onclick = function(){
  log_but.classList.add('but_active')
  reg_but.classList.remove('but_active')
  block_log.style.opacity = "1";
  block_reg.style.opacity = "0";
}

reg_but.onclick = function(){
  reg_but.classList.add('but_active')
  log_but.classList.remove('but_active')
  block_reg.style.opacity = "1";
  block_log.style.opacity = "0";
}