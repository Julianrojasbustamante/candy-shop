$(".borrar-formulario").click(function(){
    location.reload();
});

$(document).on("change", "#nuevo_usuario_email", function(){
    var verificar_usuario_email = $("#nuevo_usuario_email").val();
    var datos = new FormData();
	datos.append("verificar_usuario_email", verificar_usuario_email);
    $.ajax({
		url:"vista/ajax/usuario.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
        success:function(respuesta){
            if(respuesta == 'usuario valido'){
            }else{
                swal({
                    title: "Error al registrar usuario",
                    text: respuesta,
                    type: "error",
                    closeOnConfirm: false,
                    confirmButtonText: "Ok"
                });
                $("#nuevo_usuario_email").val("");
            }
        }
    });
});

$(".nuevo-usuario").click(function(){
    var nuevo_usuario_auditoria_usuario = $("#nuevo_usuario_auditoria_usuario").val();
    var nuevo_usuario_auditoria_creado = $("#nuevo_usuario_auditoria_creado").val();
    var nuevo_usuario_nombres = $("#nuevo_usuario_nombres").val();
    var nuevo_usuario_email = $("#nuevo_usuario_email").val();
    var nuevo_usuario_rol = $("#nuevo_usuario_rol").val();
    var datos = new FormData();
    datos.append("nuevo_usuario_auditoria_usuario", nuevo_usuario_auditoria_usuario);
    datos.append("nuevo_usuario_auditoria_creado", nuevo_usuario_auditoria_creado);
	datos.append("nuevo_usuario_nombres", nuevo_usuario_nombres);
    datos.append("nuevo_usuario_email", nuevo_usuario_email);
    datos.append("nuevo_usuario_rol", nuevo_usuario_rol);
    datos.forEach(element => console.log(element));
	$.ajax({
        url:"vista/ajax/usuario.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
        success:function(respuesta){
            if(respuesta == "ok"){
                setTimeout(function(){
                    swal({
                        title: "Registro exitoso",
                        text: "Usuario creado!",
                        type: "success",
                        closeOnConfirm: false,
                        confirmButtonText: "Ok"
                        },
                        function(isConfirm){
                            alert("ok");
                            });
                            $(".swal2-confirm").click(function(){
                                location.reload();
                            });
                },250)
            }
        }
	});
});

$(document).on("click", ".cambiar-estado-usuario", function(){
    var estado_usuario_id = $(this).attr('estado_usuario_id');
    var estado_auditoria_usuario = $(this).attr('estado_auditoria_usuario');
    var estado_usuario = $(this).attr('estado_usuario');
    var datos = new FormData();
	datos.append("estado_usuario_id", estado_usuario_id);
    datos.append("estado_auditoria_usuario", estado_auditoria_usuario);
    datos.append("estado_usuario", estado_usuario);
	$.ajax({
		url:"vista/ajax/usuario.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
        success:function(respuesta){
            setTimeout(function(){
                swal({
                    title: "Registro exitoso",
                    text: respuesta,
                    type: "success",
                    closeOnConfirm: false,
                    confirmButtonText: "Ok"
                    },
                    function(isConfirm){
                        alert("ok");
                        });
                        $(".swal2-confirm").click(function(){
                            location.reload();
                        });
            },250)
        }
	});
});

$(document).on("click", ".editar-usuario", function(){
    var formulario_editar_id_usuario = $(this).attr('formulario_editar_id_usuario');
    var formulario_editar_actualizado_por = $(this).attr('formulario_editar_actualizado_por');
    var datos = new FormData();
	datos.append("formulario_editar_id_usuario", formulario_editar_id_usuario);
    datos.append("formulario_editar_actualizado_por", formulario_editar_actualizado_por);
	$.ajax({
		url:"vista/ajax/usuario.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
        success:function(respuesta){
            $("#formulario-modal").html(respuesta);
        }
	});
});

$(document).on("click", ".actualizar-usuario", function(){
    var editar_id_usuario = $("#editar_id_usuario").val();
    var editar_actualizado_por = $("#editar_actualizado_por").val();
    var editar_nombres = $("#editar_nombres").val();
    var editar_email = $("#editar_email").val();
    var editar_rol = $("#editar_rol").val();
    var datos = new FormData();
    datos.append("editar_id_usuario", editar_id_usuario);
    datos.append("editar_actualizado_por", editar_actualizado_por);
    datos.append("editar_nombres", editar_nombres);
    datos.append("editar_email", editar_email);
    datos.append("editar_rol", editar_rol);
    $.ajax({
        url:"vista/ajax/usuario.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
            if(respuesta == "ok"){
                setTimeout(function(){
                    swal({
                        title: "Registro exitoso",
                        text: "Usuario actualizado!",
                        type: "success",
                        closeOnConfirm: false,
                        confirmButtonText: "Ok"
                        },
                        function(isConfirm){
                            alert("ok");
                            });
                            $(".swal2-confirm").click(function(){
                                location.reload();
                            });
                },250)
            }
        }
    });
});

$(document).on("click", ".eliminar-usuario", function(){
    var formulario_eliminar_id_usuario = $(this).attr('formulario_eliminar_id_usuario');
    var formulario_eliminar_actualizado_por = $(this).attr('formulario_eliminar_actualizado_por');
    var datos = new FormData();
    datos.append("formulario_eliminar_id_usuario", formulario_eliminar_id_usuario);
    datos.append("formulario_eliminar_actualizado_por", formulario_eliminar_actualizado_por);
	$.ajax({
		url:"vista/ajax/usuario.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
        success:function(respuesta){
            $("#formulario-modal-eliminar").html(respuesta);
        }
	});
});

$(document).on("click", ".borrar-usuario", function(){
    var eliminar_id_usuario = $("#eliminar_id_usuario").val();
    var eliminar_actualizado_por = $("#eliminar_actualizado_por").val();
    var datos = new FormData();
	datos.append("eliminar_id_usuario", eliminar_id_usuario);
    datos.append("eliminar_actualizado_por", eliminar_actualizado_por);
	$.ajax({
		url:"vista/ajax/usuario.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
        success:function(respuesta){
            if(respuesta == "ok"){
                setTimeout(function(){
                    swal({
                        title: "Registro exitoso",
                        text: "Usuario eliminado!",
                        type: "success",
                        closeOnConfirm: false,
                        confirmButtonText: "Ok"
                        },
                        function(isConfirm){
                            alert("ok");
                            });
                            $(".swal2-confirm").click(function(){
                                $("#modal_eliminar_usuario").modal('hide');
                                location.reload();
                            });
                },250)
            }
        }
	});
});

$(document).on("change", "#nueva_contrasena", function(){
    var verificar_nueva_contrasena = $("#nueva_contrasena").val();
    if(verificar_nueva_contrasena.length < 6){
        $("#nueva_contrasena").parent().before('<div id="aviso" class="alert alert-danger text-center"><i class="icon fa fa-ban"></i><strong> ATENCIÓN:</strong> La contraseña debe tener minino seis caracteres</div>');
        $("#nueva_contrasena").val("");
    }
    else if(verificar_nueva_contrasena.length >= 6){
        $("#aviso").remove();
    }
});

$(document).on("change", "#verificar_nueva_contrasena", function(){
    var verificar_nueva_contrasena = $("#nueva_contrasena").val();
    var verificar_repetir_contrasena = $("#verificar_nueva_contrasena").val();
    if(verificar_nueva_contrasena != verificar_repetir_contrasena){
        $("#nueva_contrasena").parent().before('<div id="aviso" class="alert alert-danger text-center"><i class="icon fa fa-ban"></i><strong> ATENCIÓN:</strong> Las dos contraseñas deben ser iguales</div>');
        $("#verificar_nueva_contrasena").val("");
    }
    else if(verificar_nueva_contrasena == verificar_repetir_contrasena){
        $("#aviso").remove();
    }
});

$(document).on("click", ".cambio-contrasena", function(){
    var id_usuario_nueva_contrasena = $("#id_usuario_nueva_contrasena").val();
    var nueva_contrasena = $("#nueva_contrasena").val();
    var verificar_nueva_contrasena = $("#verificar_nueva_contrasena").val();
    if(nueva_contrasena.length >= 6 && nueva_contrasena == verificar_nueva_contrasena){
        var datos = new FormData();
    	datos.append("id_usuario_nueva_contrasena", id_usuario_nueva_contrasena);
        datos.append("nueva_contrasena", nueva_contrasena);
        // datos.forEach(element => console.log(element));
    	$.ajax({
    		url:"vista/ajax/usuario.ajax.php",
    		method: "POST",
    		data: datos,
    		cache: false,
    		contentType: false,
    		processData: false,
            success:function(respuesta){
                if(respuesta == "ok"){
                    setTimeout(function(){
                        swal({
                            title: "Registro exitoso",
                            text: "Contraseña actualizada, por favor ingresa de nuevo con tu nueva contraseña!",
                            type: "success",
                            closeOnConfirm: false,
                            confirmButtonText: "Ok"
                            },
                            function(isConfirm){
                                alert("ok");
                                });
                                $(".swal2-confirm").click(function(){
                                    window.location.href = "salir";
                                });
                    },250)
                }
                // console.log(respuesta);
            }
             
    	});
    }
});

$(document).on("click", ".recuperar_contrasena_correo", function(){
    var formulario_recuperar_contrasena_correo = $("#formulario_recuperar_contrasena_correo").val();
    var formulario_recuperar_contrasena_fecha = $("#formulario_recuperar_contrasena_fecha").val();
    var datos = new FormData();
    datos.append("formulario_recuperar_contrasena_correo", formulario_recuperar_contrasena_correo);
    datos.append("formulario_recuperar_contrasena_fecha", formulario_recuperar_contrasena_fecha);
    $.ajax({
        url:"vista/ajax/usuario.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
            console.log(respuesta);
            if(respuesta == 'Usuario no registrado!'
            || respuesta == 'El usuario existe y esta inactivo, comunicate con el administrador del sistema!'
            || respuesta == 'El usuario existe y esta borrado, comunicate con el administrador del sistema!'){
                swal({
                    title: "Error al solicitar contraseña",
                    text: respuesta,
                    type: "error",
                    closeOnConfirm: false,
                    confirmButtonText: "Ok"
                });
                $("#formulario_recuperar_contrasena_correo").val("");
            }else if(respuesta == 'Hemos enviado un mensaje a tu correo para restablecer tu contraseña, este mensaje será valido por 40 minutos!'){
                setTimeout(function(){
                    swal({
                        title: "Mensaje enviado",
                        text: respuesta,
                        type: "success",
                        closeOnConfirm: false,
                        confirmButtonText: "Ok"
                    },
                    function(isConfirm){
                        alert("ok");
                    });
                    $(".swal2-confirm").click(function(){
                        window.location.href = "login";
                    });
                },250)
            }else if(respuesta == 'El usuario ha sido desactivo, por superar el numero de intentos permitidos!'){
                setTimeout(function(){
                    swal({
                        title: "Error al solicitar contraseña",
                        text: respuesta,
                        type: "error",
                        closeOnConfirm: false,
                        confirmButtonText: "Ok"
                    },
                    function(isConfirm){
                        alert("ok");
                    });
                    $(".swal2-confirm").click(function(){
                        window.location.href = "index";
                    });
                },250)
            }
        }
    });
});

$(document).on("change", "#verificar_formulario_nueva_contrasena", function(){
    var verificar_nueva_contrasena = $("#formulario_nueva_contrasena").val();
    var verificar_repetir_contrasena = $("#verificar_formulario_nueva_contrasena").val();
    if(verificar_nueva_contrasena != verificar_repetir_contrasena){
        $("#aviso_verificar_contrasena").html('<i class="icon fa fa-ban"></i><strong> ATENCIÓN:</strong> Las dos contraseñas deben ser iguales');
        $("#aviso_verificar_contrasena").addClass("alert alert-danger text-center");
        // $("#formulario_nueva_contrasena").parent().before('<div id="aviso" class="alert alert-danger text-center"><i class="icon fa fa-ban"></i><strong> ATENCIÓN:</strong> Las dos contraseñas deben ser iguales</div>');
        $("#verificar_formulario_nueva_contrasena").val("");
    }
    else if(verificar_repetir_contrasena == verificar_repetir_contrasena){
        $("#aviso_verificar_contrasena").html();
    }
    else {
        $("#aviso_verificar_contrasena").html();
    }
});

$(document).on("click", "#formulario_nueva_contrasena", function(){
    var url = window.location.search.substring(1);
    var parametros = url.split('&');
    for (var i = 0; i < parametros.length; i++){
        var enlace = parametros[i].split('=');
        var formulario_llave_contrasena=(enlace[1]);
    }
    var formulario_nueva_contrasena = $("#formulario_nueva_contrasena").val();
    var formulario_nueva_contrasena_fecha = $("#formulario_nueva_contrasena_fecha").val();
    if(formulario_nueva_contrasena.length >= 6){
        var datos = new FormData();
        datos.append("formulario_nueva_contrasena", formulario_nueva_contrasena);
        datos.append("formulario_llave_contrasena", formulario_llave_contrasena);
        datos.append("formulario_nueva_contrasena_fecha", formulario_nueva_contrasena_fecha);
        // datos.forEach(element => console.log(element));
        $.ajax({
            url:"vista/ajax/usuario.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success:function(respuesta){
                if(respuesta == 'El enlace no es valido!'
                || respuesta == 'El enlace ha caducado!'){
                    setTimeout(function(){
                        swal({
                            title: "Error al cambiar contraseña",
                            text: respuesta,
                            type: "error",
                            closeOnConfirm: false,
                            confirmButtonText: "Ok"
                        },
                        function(isConfirm){
                            alert("ok");
                        });
                        $(".swal2-confirm").click(function(){
                            window.location.href = "login";
                        });
                    },250)
                }
                else if (respuesta == 'Contraseña actualizada correctamente!'){
                    setTimeout(function(){
                        swal({
                            title: "Mensaje enviado",
                            text: respuesta,
                            type: "success",
                            closeOnConfirm: false,
                            confirmButtonText: "Ok"
                        },
                        function(isConfirm){
                            alert("ok");
                        });
                        $(".swal2-confirm").click(function(){
                            window.location.href = "login";
                        });
                    },250)
                }
            }
        });
    }
});

$(document).on("click", ".perfil-editar-usuario", function(){
    var perfil_editar_id_usuario = $("#perfil_actualizado_por").val();
    var perfil_editar_usuario_nombres = $("#perfil_editar_usuario_nombres").val();
    var perfil_editar_usuario_email = $("#perfil_editar_usuario_email").val();
    var datos = new FormData();
	datos.append("perfil_editar_id_usuario", perfil_editar_id_usuario);
    datos.append("perfil_editar_usuario_nombres", perfil_editar_usuario_nombres);
    datos.append("perfil_editar_usuario_email", perfil_editar_usuario_email);
	$.ajax({
		url:"vista/ajax/usuario.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
        success:function(respuesta){
            if(respuesta == "ok"){
                setTimeout(function(){
                    swal({
                        title: "Registro exitoso",
                        text: "Usuario actualizado!",
                        type: "success",
                        closeOnConfirm: false,
                        confirmButtonText: "Ok"
                        },
                        function(isConfirm){
                            alert("ok");
                            });
                            $(".swal2-confirm").click(function(){
                                location.reload();
                            });
                },250)
            }
        }
	});
});

$(document).on("change", "#perfil-avatar", function(){
    var editar_usuario_avatar = this.files[0];

    if (editar_usuario_avatar["type"] != "image/jpeg" && editar_usuario_avatar["type"] != "image/png"){
        swal({
            title: "Error al subir la imagen",
            text: "La imagen debe estar en formato JPG o PNG!",
            type: "error",
            closeOnConfirm: false,
            confirmButtonText: "Ok"
        });
        $("#perfil-avatar").val("");
    }
    else if(editar_usuario_avatar["size"] > 2000000){
        swal({
            title: "Error al subir la imagen",
            text: "La imagen no debe pesar más de 2MB!",
            type: "error",
            closeOnConfirm: false,
            confirmButtonText: "Ok"
        });
        $("#perfil-avatar").val("");
    }
});

$(document).on("click", ".editar-perfil-avatar", function(){
    var perfil_editar_avatar_id_usuario = $("#perfil_editar_avatar_id_usuario").val();
    var perfil_editar_avatar_usuario = $("#perfil_editar_avatar_usuario")[0].files[0];
    var datos = new FormData();
    datos.append("perfil_editar_avatar_id_usuario", perfil_editar_avatar_id_usuario);
    datos.append("perfil_editar_avatar_usuario", perfil_editar_avatar_usuario);
    // datos.forEach(element => console.log(element));
    $.ajax({
        url:"vista/ajax/usuario.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
            if(respuesta == "ok"){
                setTimeout(function(){
                    swal({
                        title: "Registro exitoso",
                        text: "Imagen de perfil actualizada!",
                        type: "success",
                        closeOnConfirm: false,
                        confirmButtonText: "Ok"
                        },
                        function(isConfirm){
                            alert("ok");
                            });
                            $(".swal2-confirm").click(function(){
                                location.reload();
                            });
                },250)
            }
            // console.log(respuesta);
        }
    });
});
