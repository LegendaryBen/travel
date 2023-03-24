function query(a){
    return document.querySelector(a);
}


function listener(funcName,funcType,funcElement){
    funcElement.addEventListener(funcType,funcName);
}



let spec = query(".special");
let ham = query(".ham");
let menu = query(".ham-menu");
let cancle = query(".cancle");

changePosition()
listener(show,"click",ham);
listener(hide,"click",cancle);
listener(loadImages,"load",window);


function loadImages(){
    let special = query(".special");
    special.src = "images/study1.svg";
}



function changePosition(){

    setTimeout(()=>{
        spec.classList.remove("anime");
    },3000)
    
}

function show(){
    menu.style.top = "0%";
}

function hide(){
    menu.style.top = "-230%";
}


