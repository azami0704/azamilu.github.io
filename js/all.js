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
const skillItemTitleEN = document.querySelectorAll('.skill-item-title[lang="en"]');
const skillItemTitleZH = document.querySelectorAll('.skill-item-title[lang="zh"]');
const zhBtn=document.getElementById('zh');
const enBtn=document.getElementById('en');
const page=document.getElementsByTagName('html');
const en=document.querySelectorAll('[lang="en"]');
const zh=document.querySelectorAll('[lang="zh"]');

if(document.documentElement.lang=='zh_Hant'){
        zh.forEach((item,idx)=>{
        item.style.cssText="display:block";
        en[idx].style.cssText="display:none";
    })
}
zhBtn.addEventListener('click',()=>{
    document.documentElement.lang='zh_Hant';
    zh.forEach((item,idx)=>{
        item.style.cssText="display:block";
        en[idx].style.cssText="display:none";
    })
})
enBtn.addEventListener('click',()=>{
    document.documentElement.lang='en';
        en.forEach((item,idx)=>{
            item.style.cssText="display:block";
            zh[idx].style.cssText="display:none";
        })
})

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
        if(!progressExecuted){
            if(document.documentElement.lang=='zh_Hant'){
                skillItemTitleZH.forEach((item,idx) => {
                    item.style.cssText="transform: translateX(0);";
                    skillItemTitleEN[idx].style.cssText="display:none";
                });
            }else{
                    skillItemTitleEN.forEach((item,idx) => {
                    item.style.cssText="transform: translateX(0);";
                    skillItemTitleZH[idx].style.cssText="display:none";
                });
            }
            progressExecuted=true;
        }
    }else{
        skillItemTitle.forEach(item => {
            item.style.cssText="transform: translateX(-100%);";
        });
        progressExecuted=false;
    }
    if(window.scrollY>=work.offsetTop-800){
        workTitle.style.cssText="transform: translateX(0);opacity: 1;";

    }else{
        workTitle.style.cssText="transform: translateX(-100%);opacity: 0;";

    }
})




const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

