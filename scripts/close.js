function query(a){
    return document.querySelector(a);
}

let close1 = query(".close");
let span = query(".span")


close1.onclick = function (){
    this.parentNode.parentNode.parentNode.style.display = "none";
}


span.onclick = function (){
    this.parentNode.parentNode.style.display = "none";
}