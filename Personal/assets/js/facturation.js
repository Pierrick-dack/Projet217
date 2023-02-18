function somme(){
    var id=this.getAttribute("id");
    var numero=id.substring(id.length-1,id.length);
    console.log(numero);
    var prix1=document.getElementById("pt"+numero);
    prixx=document.getElementsByClassName("prix");
    var prixtotal=0;
    for (var i=0;i<prixx.length;i++){
      if (!isNaN(parseInt(prixx[i].value)))
        prixtotal=prixtotal+parseInt(prixx[i].value);
    }
    var total = document.getElementById("totaux");
    total.value=prixtotal;
    var rem=document.getElementById("rem");
    rem.value=(prixtotal*10)/100;
    var totalf=document.getElementById("totalf");
    totalf.value=prixtotal-(prixtotal*10)/100;
}



var element=document.getElementsByClassName("prix");
for(var i=0;i<element.length;i++){
    element[i].addEventListener("change", somme, false);
}
// var index, table = document.getElementById("table");
//     for(var i = 1; i < table.rows.length; i++)
//     {
//         table.rows[i].cells[0].onclick = function()
//         {
//             var c = confirm("do you want to delete this row");
//             if(c === true)
//             {
//                 index = this.parentElement.rowIndex;
//                 table.deleteRow(index);
//             }
            
//             //console.log(index);
//         };
        
//     }
    
    
     

var plus = document.getElementById("plus");
plus.addEventListener('click',ajoutLigne,false);


function creationLigne(name,id,tr,table){
    var td=document.createElement("td");
    var input=document.createElement("input");
    input.setAttribute("type","text");
    input.setAttribute("name",name);
    input.setAttribute("id",id);
    table.appendChild(tr);


}

function ajoutLigne(){
    var table=document.getElementById("table");
    var tr=document.createElement("tr");
    creationLigne("num[]","num1",tr,table);
    creationLigne("pt[]","pt1",tr,table);
}


var d =new Date();
var h = new Date();

var date= d.getDate();
var heure= h.getHours();
document.getElementById("copy-date").innerHTML = date;
document.getElementById("copy-hour").innerHTML = heure;

