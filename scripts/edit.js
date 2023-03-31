function query(a){
    return document.querySelector(a);
}


function listener(funcName,funcType,funcElement){
    funcElement.addEventListener(funcType,funcName);
}


let mainDoc = query(".doc-main");
let pdf = query(".pdf");
let preview = query(".prev");
let img = query(".show-img");
let file = query(".file");
let moveLeft = query(".next")
let slideDiv = query(".form-first");
let loader = query(".sec1-container>div");
let sec1_first = query(".sec1-first");
let sec2_first = query(".sec1-second");
let back = query(".back");
let submit = query(".submit");
let warn = query(".warning");
let ham = query(".ham");
let menu = query(".ham-menu");
let cancle = query(".cancle");


listener(slideOut,"click",moveLeft)
listener(slideIn,"click",back);
listener(show,"click",ham);
listener(hide,"click",cancle);




function hideDiv(){
    warn.style.display = "none";
}

function show(){
    menu.style.top = "0%";
}

function hide(){
    menu.style.top = "-230%";
}

function slideOut(){
    slideDiv.style.left = "-100%";
    loader.style.left = "50%";
    sec1_first.style.opacity = "0";
    sec2_first.style.opacity = "1";
    back.style.display = "flex";
    submit.style.display = "flex";
    this.style.display = "none";
}

function slideIn(){
    slideDiv.style.left = "0%";
    loader.style.left = "0%";
    sec1_first.style.opacity = "1";
    sec2_first.style.opacity = "0";
    back.style.display = "none";
    submit.style.display = "none";
    moveLeft.style.display = "flex";
}