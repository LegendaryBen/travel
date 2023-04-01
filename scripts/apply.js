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
let first_name = query('.first-name');
let last_name = query('.last-name');
let birth = query('.birth');
let language1 = query(".language");
let phone = query(".phone");
let national = query(".nationality");
let country = query(".country");
let sex = query(".sex")
let marital = query(".marital");
let occupation = query(".occupation");
let passport = query(".passport");
let issue = query(".issue");
let country1 = query(".country1");
let expire = query(".expire");
let choice = query(".choice");


listener(slideOut,"click",moveLeft)
listener(slideIn,"click",back);
listener(show,"click",ham);
listener(hide,"click",cancle);
listener(addName,"change",first_name);
listener(addLast,"change",last_name);
listener(addBirth,"change",birth);
listener(addLang,"change",language1);
listener(addPhone,"change",phone);
listener(addNation,"change",national);
listener(addCountry,"change",country);
listener(addSex,"change",sex);
listener(addMarital,"change",marital)
listener(addOccupation,"change",occupation);
listener(addPass,"change",passport);
listener(addIssue,"change",issue);
listener(addCountry1,"change",country1);
listener(addExpire,"change",expire);
listener(addChoice,"change",choice);
listener(selectImage,"click",img)
listener(changeImg,"change",file);
listener(showDocs,"click",mainDoc);
listener(showPdf,"change",pdf);





function showPdf(e){
    let obj = e.target.files[0];

    if(obj.type !=="application/pdf"){
        alert("FILE NOT SUPPORTED!!!. SELECT A PDF FILE")
        mainDoc.style.opacity = "0";
        return;
    }else{
        mainDoc.innerHTML = obj.name;
        mainDoc.style.opacity = "1";
    }
}





function showDocs(){
    pdf.click();
}


function changeImg(e){
    let obj = e.target.files[0];
    if(obj.type == "image/jpeg" || obj.type == "image/jpg" || obj.typ == "image/png"){
        preview.src = URL.createObjectURL(obj);
        img.style.opacity = "1";
    }else{
        alert("FILE NOT SUPPORTED!!!. SELECT A JPEG, JPG OR PNG  IMAGE FILE")
        img.style.opacity = "0";
    }
}

function selectImage(){
    file.click()
}

function setValues(){
    let choice1 = localStorage.getItem("choice")||"";
    choice.value = choice1;

    let expire1 = localStorage.getItem("expire")||"";
    expire.value = expire1;

    let issue1 = localStorage.getItem("issue")||"";
    issue.value = issue1;

    let pass = localStorage.getItem("pass")||"";
    passport.value = pass;

    let sex1 = localStorage.getItem("sex")||"";
    sex.value = sex1;

    let occupation1 = localStorage.getItem("occupation")||"";
    occupation.value = occupation1;

    let marital1 = localStorage.getItem("marital")||"";
    marital.value = marital1;

    let country2 = localStorage.getItem("country1")||"";
    country1.value = country2;

    let count = localStorage.getItem("country")||"";
    country.value = count;

    let nation1 = localStorage.getItem("nation")||"";
    national.value = nation1;

    let birth1 = localStorage.getItem("birth")||"";
    birth.value = birth1;

    let phone1 = localStorage.getItem("phone")||"";
    phone.value = phone1;

    let lang = localStorage.getItem("lang")||"";
    language1.value = lang;

    let name = localStorage.getItem("first-name")||"";
    first_name.value = name;

    let last = localStorage.getItem("last-name")||"";
    last_name.value = last;

}

setValues();



function addChoice(e){
    let val = e.target.value
    localStorage.setItem("choice",val)
}


function addExpire(e){
    let val = e.target.value
    localStorage.setItem("expire",val)
}


function addNin(e){
    let val = e.target.value
    localStorage.setItem("nin",val)
}

function addIssue(e){
    let val = e.target.value
    localStorage.setItem("issue",val)
}

function addPass(e){
    let val = e.target.value
    localStorage.setItem("pass",val)
}

function addSex(e){
    let val = e.target.value
    localStorage.setItem("sex",val)
}

function addOccupation(e){
    let val = e.target.value
    localStorage.setItem("occupation",val)
}

function addMarital(e){
    let val = e.target.value
    localStorage.setItem("marital",val)
}


function addCountry1(e){
    let val = e.target.value
    localStorage.setItem("country1",val)
}

function addCountry(e){
    let val = e.target.value
    localStorage.setItem("country",val)
}


function addNation(e){
    let val = e.target.value
    localStorage.setItem("nation",val)
}


function addBirth(e){
    let val = e.target.value
    localStorage.setItem("birth",val)
}

function addPhone(e){
    let val = e.target.value
    localStorage.setItem("phone",val)
}



function addLang(e){
    let val = e.target.value
    localStorage.setItem("lang",val)
}



function addName(e){
    let val = e.target.value
    localStorage.setItem("first-name",val)
}


function addLast(e){
    let val = e.target.value
    localStorage.setItem("last-name",val)
}

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