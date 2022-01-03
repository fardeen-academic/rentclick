window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("header").style.height = "70px";
    var myNav = document.getElementById('header');
    myNav.classList.add("bg-light");
    myNav.classList.remove("nav-transparent");
    document.getElementById('logotitle').classList.add('text-dark')
    document.getElementById('logotitle').classList.remove('text-light')
    document.getElementById('head-text').classList.add('text-dark')
    document.getElementById('head-text').classList.remove('text-light')
    document.getElementById('head-text2').classList.add('text-dark')
    document.getElementById('head-text2').classList.remove('text-light')
    document.getElementById('head-text3').classList.add('text-dark')
    document.getElementById('head-text3').classList.remove('text-light')
    
      
  } else {
    document.getElementById("header").style.height= "90px";
    var myNav = document.getElementById('header');
    myNav.classList.add("nav-transparent");
    myNav.classList.remove("bg-light");

    document.getElementById('logotitle').classList.remove('text-dark')
    document.getElementById('logotitle').classList.add('text-light')
    document.getElementById('head-text').classList.remove('text-dark')
    document.getElementById('head-text').classList.add('text-light')
    document.getElementById('head-text2').classList.remove('text-dark')
    document.getElementById('head-text2').classList.add('text-light')
    document.getElementById('head-text3').classList.remove('text-dark')
    document.getElementById('head-text3').classList.add('text-light')
    
  }
}