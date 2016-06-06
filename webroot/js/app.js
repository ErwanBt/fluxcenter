"use strict";

window.addEventListener("load", initialiser);

function initialiser(evt){
    
    //Page Dashboard Popoup Plus
    var popUpPlus=document.getElementsByClassName("overlayPlus");
    var nbElemPlus= popUpPlus.length;
    for (var i=0; i<nbElemPlus; i++){
        var unElem=popUpPlus[i];
        unElem.style.display="none";
        unElem.style.opacity="0";
    }
    
    //Page Dashboard Popoup Article
    var popUp=document.getElementsByClassName("overlay");
    var nbElem= popUp.length;
    for (var i=0; i<nbElem; i++){
        var unElem=popUp[i];
        unElem.style.display="none";
        unElem.style.opacity="0";
    }

    
    if(document.getElementById("fermer") != null){
        document.getElementById("fermer").addEventListener("click", fermerFlash());
    }

    
    //Popup Add
    var btn=document.getElementById("boutonPlus");
    btn.addEventListener("click", cacherPlus);
    
    var btnCroixPlus=document.getElementById("croixPlus");
    btnCroixPlus.addEventListener("click", cacherPlus);
    
    var art=document.getElementById("plus");
    art.addEventListener("click", visiblePlus);
    
    //Popup Article
    var btnCroix=document.getElementById("croixArt");
    btnCroix.addEventListener("click", cacher);
    
    var arti=document.getElementsByClassName("arti");
    var nbArti= arti.length;
    for (var i=0; i<nbArti; i=i+1)
    {
        var unArti=arti[i];
        unArti.addEventListener("click", visible);
    } 
}

//Dashboard Popoup Com
function cacherCom(evt)
{
    var popUp=document.getElementsByClassName("overlayCom");
    var nbElem= popUp.length;
    for (var i=0; i<nbElem; i=i+1)
    {
        var unElem=popUp[i];
        unElem.style.visibility="hidden";
        unElem.style.opacity="0";
    } 
    
}
//Dashboard Popoup Plus
function cacherPlus(evt)
{
    var popUp=document.getElementsByClassName("overlayPlus");
    var nbElem= popUp.length;
    for (var i=0; i<nbElem; i=i+1)
    {
        var unElem=popUp[i];
        unElem.style.display="none";
        unElem.style.opacity="0";
    } 
    
}

//Popup Article 
function cacher(evt)
{
    document.getElementById('popupYoutube').remove();
    var popUp=document.getElementsByClassName("overlay");
    var nbElem= popUp.length;
    for (var i=0; i<nbElem; i=i+1)
    {
        var unElem=popUp[i];
        unElem.style.display="none";
        unElem.style.opacity="0";
    } 
    
}


//Dashboard Popoup Plus
function visiblePlus(evt)
{
    var popUp=document.getElementsByClassName("overlayPlus");
    var nbElem= popUp.length;
    for (var i=0; i<nbElem; i=i+1)
    {
        var unElem=popUp[i];
        unElem.style.display="flex";
        unElem.style.opacity="1";
    }
    
}

//Popup Article
function visible(evt){

    document.getElementById('popupArt').insertAdjacentHTML('afterbegin','<iframe width="560" height="315" src="https://www.youtube.com/embed/'+ this.firstElementChild.innerHTML +'" frameborder="0" allowfullscreen id="popupYoutube"></iframe>');

    var popUp=document.getElementsByClassName("overlay");
    var nbElem= popUp.length;
    for (var i=0; i<nbElem; i=i+1)
    {
        var unElem=popUp[i];
        unElem.style.display="block";
        unElem.style.opacity="1";
    }
    
    //Contenu PopUp
    var titre=this.firstElementChild.innerHTML;
    var imgPop=this.children[1].src;
    var p=this.children[2].innerHTML;
    var footer=this.children[3].innerHTML;

    var titrePop=document.getElementById("titreA");
    titrePop.innerHTML=titre;
    
    var paraPop=document.getElementById("paragraphe");
    paraPop.innerHTML=p;
    
    var footPop=document.getElementById("foot");
    footPop.innerHTML=footer;
    
    var imagePop=document.getElementById("imge");
    imagePop.src=imgPop;
    
}

//Pref
function recacher(evt)
{
    var txt=this.getElementsByTagName("p");
    var nbcate= txt.length;
    for (var i=0; i<nbcate; i=i+1)
    {
        var uneCate=txt[i];
        uneCate.style.display="none";
    }
    
    var img=this.getElementsByTagName("img");
    var imgFocus= img.length;
    for (var i=0; i<imgFocus; i=i+1)
    {
        var uneImg=img[i];
        uneImg.setAttribute("style", "-webkit-filter: none");
    }
}
