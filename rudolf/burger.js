
document.addEventListener("DOMContentLoaded", (event) => {
    const burgerBtn = document.querySelector('.burger-btn');
    const burgerMenu = document.querySelector('ul.burger-menu');
    const burgerTop = document.querySelector('.burger-bar-top');
    const burgerMid = document.querySelector('.burger-bar-mid');
    const burgerBot = document.querySelector('.burger-bar-bot');
    
    burgerBtn.addEventListener('click', function(){
        if(burgerMenu.classList.contains('open')){
            burgerMenu.classList.remove('open');
            burgerTop.removeAttribute('style');
            burgerMid.removeAttribute('style');
            burgerBot.removeAttribute('style');


        }
        else{
            burgerMenu.classList.add('open');
            burgerTop.style.transform = "rotate(45deg) translateY(5px)";
            burgerMid.style.opacity = 0;
            burgerBot.style.transform = "rotate(-45deg) translateY(-5px)"
        }
    })
});




