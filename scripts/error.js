function query(a){
    return document.querySelector(a);
}


function listener(funcName,funcType,funcElement){
    funcElement.addEventListener(funcType,funcName);
}


let ham = query(".ham");
let menu = query(".ham-menu");
let cancle = query(".cancle");


listener(show,"click",ham);
listener(hide,"click",cancle);


function show(){
    menu.style.top = "0%";
}

function hide(){
    menu.style.top = "-230%";
}
