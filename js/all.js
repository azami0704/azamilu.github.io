const about = document.getElementById('about');
const skill = document.getElementById('skill');
const aboutTitle = document.querySelector('.about-title');
const skillTitle = document.querySelector('.skill-title');
const progressBar =document.querySelectorAll('.progress-bar')
const skillSquare = document.querySelectorAll('.skill-list-item-square')
const skillPercent = document.querySelectorAll('.skill-list-item-percent')

let progressExecuted = false;
window.addEventListener('scroll',function(e){
    //about動態標題
    const topPos = about.getBoundingClientRect().top;
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

    if(window.scrollY>=skill.offsetTop-700){
        if(!progressExecuted){
            progressBar.forEach((item,idx)=>{
                let w=0;
                let progress = setInterval(()=>{
                    item.style.cssText=`width:${w}%`;
                    skillPercent[idx].textContent=`${w}%`;
                    skillSquare[idx].style.cssText=`transform: rotate(${45*w+45}deg);`;
                    w++;
                    if(w>progressBar[idx].dataset.width){
                        clearInterval(progress);
                    }
                },10)
            })
        }
        progressExecuted = true;
    }else if(window.scrollY<skill.offsetTop-700){
        progressBar.forEach((item)=>{
            item.style.width=`0%`;
        })
        progressExecuted = false;
    }
})



const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

