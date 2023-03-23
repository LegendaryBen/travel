function query(a){
    return document.querySelector(a);
}




let spec = query(".special");



changePosition()







function changePosition(){

    setTimeout(()=>{
        spec.classList.remove("anime");
    },3000)
    
}


