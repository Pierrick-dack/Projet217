<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>
    var i=0;
    function addinput()
    {
        i++;/*
        document.getElementById("frm" ).innerHTML += "<br /><input name='txt"+i+"' type='text' value='' />";*/
         
        var frm = document.getElementById("frm"); //le noeud parent
         
        // creation d'un champ
        var inpt = document.createElement('input');
        inpt.setAttribute('name','txt'+i);
        inpt.setAttribute('type','text');
        frm.appendChild(inpt);
         
        // retour a la ligne aprés l'ajout
        var br = document.createElement('br');
        frm.appendChild(br);
         
        //Incrementation du compteur i (nombre de champ)
        document.getElementById("cmp" ).value=i;
    }
</script>
<form method="post">
    <input type='button' id='ajIn' value=' ajouter ' onClick='addinput()' />
    <input  type="hidden" value="javascript:i;" name="cmp" id="cmp" />
    <div id="frm" ></div>
    <input type="submit" value=" Envoyer ">
 
</form >
<?php
    //pour recuperer le contenu des champs envoyés par post
     
    for($n=1; $n<= intval($_POST['cmp']) ; $n++)
    {
        echo $_POST['txt'.$n].'<br />';
    }
     
    //var_dump($_POST);
     
?>
</body>
</html>