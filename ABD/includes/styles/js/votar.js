function votar(idUsuario,idElemento){
    
    ajax=objetoAjax();

    url="http://localhost/abd/procesado/votar.php";
    post="usuario="+idUsuario+"&elemento="+idElemento;
    ajax.open("POST",url,true) ;
    ajax.onreadystatechange=stateChangedExplotacion;
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.setRequestHeader("encoding", "UTF-8");
    ajax.send(post);
    
}
function stateChangedExplotacion(){

    if (ajax.readyState==4 || ajax.readyState=="complete"){

        res=ajax.responseText;
        respuesta=res.split('|');
        idSpan="votos"+respuesta[1];
        document.getElementById(idSpan).innerHTML=respuesta[0];
        
    }else {
    //alert(xmlHttp.status);
    }
}