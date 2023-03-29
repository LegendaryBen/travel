function query(a){
    return document.querySelector(a);
}


function listener(funcName,funcType,funcElement){
    funcElement.addEventListener(funcType,funcName);
}


let clients = query(".clients");
let applicants = query(".applicants");
let first_container = query(".container-first");
let last_container = query(".container-last");
let search = query(".search3");
let apply = query(".submit");
let form = query(".form1");




listener(showClients,"click",clients);
listener(showApplicants,"click",applicants);
listener(searchUsers,"click",search);


function searchUsers(){
    apply.click();
}





function showClients(e){
    first_container.style.transform = "translateX(0%)";
    last_container.style.transform = "translateX(0%)";
    clients.style.color = "rgb(255, 255, 255)";
    clients.style.backgroundColor = "rgb(235, 56, 0)";
    applicants.style.color = "rgb(79, 79, 79)";
    applicants.style.backgroundColor = "rgb(245, 245, 245)";
    form.style.display = "flex";
}


function showApplicants(e){
    first_container.style.transform = "translateX(-100%)";
    last_container.style.transform = "translateX(-100%)";
    clients.style.color = "rgb(79, 79, 79)";
    clients.style.backgroundColor = "rgb(245, 245, 245)";
    applicants.style.color = "rgb(255, 255, 255)";
    applicants.style.backgroundColor = "rgb(235, 56, 0)";
    form.style.display = "none";
}