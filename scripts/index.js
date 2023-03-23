function query(a){
    return document.querySelector(a);
}

function queryAll(a){
    return document.querySelectorAll(a);
}


function listener(funcName,funcType,funcElement){
    funcElement.addEventListener(funcType,funcName);
}


let ham = query(".ham");
let hamMenu = query(".ham-menu");
let cancle = query(".cancle");
let moving = query(".moving");
let track = 1;
let backgrounds = queryAll(".switch");
let counters = queryAll(".counter1>div");
let section2 = query(".sec2-1");
let sec211 = query(".sec2-11");
let scetion3 = queryAll(".section-3>div");
let section6 = query(".section-6");
let copy = query(".copy");
let section7 = query(".section-7");
let section9 = query(".section-9");
let left = query(".left");
let right = query(".right");
let sec11 = query(".section-11");


listener(slideUp,"click",ham);
listener(slideDown,"click",cancle);
listener(scrollUp,"scroll",window);
listener(moveRight,"click",right);
listener(moveLeft,"click",left);
setInterval(switchBackground, 10000);
listener(optimize,"load",window)


function moveRight(){
    section9.scrollBy({
        top:0,
        left:450,
        behavior:"smooth"
    })
}

function moveLeft(){
    section9.scrollBy({
        top:0,
        left:-300,
        behavior:"smooth"
    })
}


function slideUp(){
    hamMenu.style.top = "0%";
}


function slideDown(){
    hamMenu.style.top = "-230%";
}


function switchBackground(){

    track++;

    if(track > 2){
        track = 0;
    }

    for(let div of counters){
        div.style.right = "0px";
        div.style.transform = "scale(0%)";
    }
    
    for(let div of backgrounds){
        div.style.zIndex = "1";
        div.style.opacity = "0";
        div.style.transform = "scale(50%)";
    }
    backgrounds[track].style.zIndex = "3";
    backgrounds[track].style.opacity = "1";
    backgrounds[track].style.transform = "scale(100%)";

    let check = moving.clientHeight * track;

    moving.style.transform = "translateY("+check+"px"+")";

    counters[track].style.right = "50px";
    counters[track].style.transform = "scale(200%)";
}


function scrollUp(){
    let val = window.scrollY;
    let sec2Pos = section2.getBoundingClientRect().top;
    let sec6Pos = section6.getBoundingClientRect().top;
    let copyPos = copy.getBoundingClientRect().top;
    let sec7Pos = section7.getBoundingClientRect().top;
    let sec11Pos = sec11.getBoundingClientRect().top;
    
    for(let div of scetion3){
        let pos = div.getBoundingClientRect().top;

        if(val < pos){
            div.children[0].style.transform = "translateY(100%)";
            div.children[0].style.opacity = "0";
        }else{
            div.children[0].style.transform = "translateY(0%)";
            div.children[0].style.opacity = "1";
        }
    }

    if(val < sec2Pos){
        section2.children[0].style.opacity = "0";
        section2.children[0].style.transform = "translateY(100%)";
    }else{
        section2.children[0].style.opacity = "1";
        section2.children[0].style.transform = "translateY(0%)";
    }

    if(val < sec6Pos){
        section6.children[0].style.transform = "translateX(-100%)";
        section6.children[0].style.opacity = "0";
        section6.children[1].style.transform = "translateX(100%)";
        section6.children[1].style.opacity = "0";
    }else{
        section6.children[0].style.transform = "translateX(0%)";
        section6.children[0].style.opacity = "1";
        section6.children[1].style.transform = "translateX(0%)";
        section6.children[1].style.opacity = "1";
    }

    if(val < copyPos + 1500){
        copy.children[0].style.transform = "translateY(100%)";
        copy.children[0].style.opacity = "0";
    }else{
        copy.children[0].style.transform = "translateY(0%)";
        copy.children[0].style.opacity = "1";
    }

    if(val < sec7Pos + 1500){
        for(let i =0;i<section7.children.length;i++){
            section7.children[i].style.transition = "3s";
            section7.children[i].style.transform = "translateY(100%)";
            section7.children[i].style.opacity = "0";
        }
    }else{
        for(let i =0;i<section7.children.length;i++){
            section7.children[i].style.transition = "3s";
            section7.children[i].style.transform = "translateY(0%)";
            section7.children[i].style.opacity = "1";
            setTimeout(()=>{
                section7.children[i].style.transition = "0.5s";
            },2000)
           
        }
    }

    if(val < sec11Pos + 2500){
        sec11.children[0].style.transform = "translateY(160%)";
        sec11.children[0].style.opacity = "0";
    }else{
        sec11.children[0].style.transform = "translateY(0%)";
        sec11.children[0].style.opacity = "1";
    }


}

function optimize(){
    let logo1 = query(".logo1");
    logo1.src = "images/logo.svg";
    let cancle = query(".cancle");
    cancle.src = "images/cancel.svg";
    let back1 = query(".back1");
    back1.src = "images/bg1.svg";
    let back2 = query(".back2");
    back2.src = "images/bg2.svg";
    let back3 = query(".back3");
    back3.src = "images/bg3.svg";
    let log = query(".log");
    log.src = "images/logo.svg";
    ham.src = "images/ham.svg";
    let fb = query(".fb");
    fb.src = "images/fb.svg";
    let tw = query(".tw");
    tw.src = "images/tw.svg";
    let ig2 = query(".ig2")
    ig2.src = "images/ig2.svg";
    let m1 = query(".m1");
    m1.src = "images/user-menu.svg";
    let m2 = query(".m2");
    m2.src = "images/user.svg";
    let m3 = query(".m3");
    m3.src = "images/visa2.svg";
    let ticket = query(".ticket");
    ticket.src = "images/ticket.svg";
    let plane = query(".plane");
    plane.src = "images/plane.svg";
    let world = query(".world");
    world.src = "images/world.svg";
    let home = query(".home");
    home.src = "images/home.svg";
    let amex = query(".amex");
    amex.src = "images/amex.svg";
    let badge = query(".badge");
    badge.src = "images/badge.svg";
    let master = query(".master");
    master.src = "images/Mastercard.svg";
    let wells = query(".wells");
    wells.src = "images/Wellsfargo.svg";
    let wire = query(".wire");
    wire.src = "images/wire.svg";
    let student = query(".student");
    student.src = "images/students.svg";
    let school = query(".school");
    school.src = "images/school.svg";
    let work = query(".work");
    work.src = "images/work.svg";
    let visit = query(".visit");
    visit.src = "images/visit.svg";
    let transit = query(".transit");
    transit.src = "images/transit.svg";
    let foot = query(".foot");
    foot.src = "images/foot-img.svg";
}



