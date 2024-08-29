//Intialize Variable

let taskinput=document.getElementById("text");
let listcontainer=document.getElementById("list-container");
let mainContainer=document.getElementById("main-container");
let addButton=document.getElementById("add");
let alter=document.getElementById("alter");
let save=document.getElementById("save-itmes");

//Function TO Add Task Into The list

function AddTask(){
    if(taskinput.value==='')
        alert("You Must Write A Task Description");
    else{
     let li=document.createElement("li");
     li.innerHTML=taskinput.value;
     listcontainer.appendChild(li);
     let span=document.createElement("span");
     span.innerHTML="&#10006";
     li.appendChild(span);
    }
    taskinput.value="";
listcontainer.addEventListener("click",function(e){
            if(e.target.tagName==="LI"){
              e.target.classList.toggle("checked");
            }
            else if(e.target.tagName==="SPAN"){
             e.target.parentElement.remove();
            }      
    },false)
}

//Function To Alert When There Is An Exception

mainContainer.addEventListener("click",function(e){
    if(e.target.tagName==="H3"){
      e.target.classList.toggle("alter");
    }
},false)

//function To Ad a Save Alert 

function AddAlert(){
    if(taskinput.value===''){
       let span=document.createElement("span");
       span.innerHTML="Tasks Saved Successfully";
       span.style.color="hsl(100,50%,50%)";
       save.appendChild(span);
    }
    window.onscroll("click",function(e){
        span.innerHTML="";
})
}
window.stop(removeEventListener);
