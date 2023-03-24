function query(a){
    return document.querySelector(a);
}


function listener(funcName,funcType,funcElement){
    funcElement.addEventListener(funcType,funcName);
}


let spec = query(".fix");
let ham = query(".ham");
let menu = query(".ham-menu");
let cancle = query(".cancle");


listener(show,"click",ham);
listener(hide,"click",cancle);
listener(loadImages,"load",window);
changePosition();


function loadImages(){
    let special = query(".special");
    special.src = "images/about.svg";
}

function show(){
    menu.style.top = "0%";
}

function hide(){
    menu.style.top = "-230%";
}

function changePosition(){

    setTimeout(()=>{
        spec.classList.remove("anime");
    },3000)
    
}

