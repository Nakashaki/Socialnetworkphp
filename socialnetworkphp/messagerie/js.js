


window.onload=SubmitFormData();
const button = document.getElementById("ButtonValider");
button.addEventListener("click", SubmitFormData);




function SubmitFormData() {
    var name1 = $("#name").val();
    var message1 = $("#message").val();
    //var form_id = $("#form_id").val();
    //var to_id = $("#to_id").val();
    //console.log(form_id);
    //console.log(to_id);
    
    
    $.post("submit.php", {name: name1, message: message1},
    function(data) {
        const messages = JSON.parse(data);
        messages.forEach(message => creat(message.pseudo, message.message, message.id,));
	
	 $('#myForm')[0].reset();
    
    });  

}






function creat(name,message,id) {
    //récup le nom et message
    //let nom= document.getElementById('a');
    //let msg=document.getElementById('b');
    console.log("id")
    //création du pseudo
    if (document.getElementsByName(id)[0]==null){
    let nouvo=document.createElement('p');
    nouvo.innerText=`nom : ${name} `;
    document.getElementById("results").appendChild(nouvo);
  
    //création du message
    let nouvo1=document.createElement('p');
    
    nouvo1.setAttribute("id", id+"a");
    nouvo1.innerText=`message : ${message} `;
    document.getElementById("results").appendChild(nouvo1);
  
    //création bouton de modif
    let bout=document.createElement("button");
    bout.innerHTML="modifier  ";
    bout.setAttribute("id", id+"b");
    bout.setAttribute("name",id);
    bout.setAttribute("onclick",`modif(this.id,0,this.name)`);
    document.getElementById("results").appendChild(bout);
    }
  }



  function modif(u,v,name) {
    //on crée l'input pour écrire le nouveau texte
    let ct=document.createElement("input");
    ct.setAttribute("id", name+"c");
    document.getElementById(name+"a").appendChild(ct);
    //on change le boutton comme ça quand on reclick dessus ça va dans le if
    document.getElementById(name+"b").setAttribute("onclick",`modif(this.id,1,this.name)`);
  
    if(v==1){
    //on modifie le texte
    let modif=document.getElementById(name+"a");
    //le texa c'est le ct(champ de texte) qui est juste au dessus
    let texa=document.getElementById(name+"c");
    modif.innerText=`message : ${texa.value}`;
    document.getElementById(name+"b").setAttribute("onclick",`modif(this.id,0,this.name)`);
    $.post("modificate.php", {id: name, message: texa.value},);
    }

  }