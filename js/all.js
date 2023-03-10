const about = document.getElementById('about');
const skill = document.getElementById('skill');
const work = document.getElementById('work');
const aboutTitle = document.querySelector('.about-title');
const skillTitle = document.querySelector('.skill-title');
const workTitle = document.querySelector('.work-title');
const progressBar =document.querySelectorAll('.progress-bar');
const skillSquare = document.querySelectorAll('.skill-list-item-square');
const skillPercent = document.querySelectorAll('.skill-list-item-percent');
const skillItemTitle = document.querySelectorAll('.skill-item-title');

let progressExecuted = false;
window.addEventListener('scroll',()=>{
    //about動態標題
    if(window.scrollY>=about.offsetTop-650){
        aboutTitle.style.cssText="transform: translateX(0);opacity: 1;";
    }else{
        aboutTitle.style.cssText="transform: translateX(-100%);opacity: 0;";
    }
    if(window.scrollY>=skill.offsetTop-800){
        skillTitle.style.cssText="transform: translateY(0);opacity: 1;";
    }else{
        skillTitle.style.cssText="transform: translateY(-100%);opacity: 0;";
    }
    if(window.scrollY>=skill.offsetTop-400){
        skillItemTitle.forEach(item => {
            item.style.cssText="transform: translateX(0);";
        });
    }else{
        skillItemTitle.forEach(item => {
            item.style.cssText="transform: translateX(-100%);";
        });
    }
    if(window.scrollY>=work.offsetTop-800){
        workTitle.style.cssText="transform: translateX(0);opacity: 1;";

    }else{
        workTitle.style.cssText="transform: translateX(-100%);opacity: 0;";

    }
})



const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

