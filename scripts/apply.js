function query(a){
    return document.querySelector(a);
}


function listener(funcName,funcType,funcElement){
    funcElement.addEventListener(funcType,funcName);
}

let img = query(".show-img");
let file = query(".file");


img.onclick = function(){
    file.click();
}