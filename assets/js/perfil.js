var datos;
var datosC;
$(document).ready(function() {

    ///////CAMBIO DEl nick
    $('#nick').change(function() {
        var n_user=$('#nick').val();
        //alert(n_user);
        eliminar(n_user);
    });

    $('#correo').change(function() {
        var c_user=$('#correo').val();
        //alert(n_user);
        eliminarC(c_user);
    });


});

function eliminar(user){
    console.log(user);
        $.ajax({
            data:{"N_NICK":user},
            dataType: 'json',
            url:'valNick',
            type:'post',
            success: function(data){
                console.log("bien");
                datos=data;
                comprobar(user);
            }
        });

}

function comprobar(nick){
    console.log(datos[0].nick);
    $("#mensaje").show(3000);

    var str='';
    if (datos) {
        if(datos[0].nick==nick){
            str+='<div class="alert alert-danger"><label for="username" class="cols-sm-12 control-label" >El nick de usuario ya existe</label></div>';
            $("#mensaje").html(str);
            $('#nick').val("");
            $("#mensaje").hide(3000);
        }else{

        }
    }else{

    }
}

function eliminarC(corr){
    console.log(corr);
        $.ajax({
            data:{"C_USER":corr},
            dataType: 'json',
            url:'valCorreo',
            type:'post',
            success: function(data){
                console.log("bien");
                datosC=data;
                comprobarC(corr);
            }
        });

}

function comprobarC(corr){
    console.log(datosC[0].correo);
    $("#mensaje1").show(3000);

    var str='';
    if (datosC) {
        if(datosC[0].correo==corr){
            str+='<div class="alert alert-danger">El correo ya existe</div>';
            $("#mensaje1").html(str);
            $('#correo').val("");
            $("#mensaje1").hide(3000);
        }else{

        }
    }else{

    }
}


