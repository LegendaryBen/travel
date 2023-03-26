function query(a){
    return document.querySelector(a);
}


let span = query(".span")

span.onclick = function (){
    this.parentNode.parentNode.style.display = "none";
}