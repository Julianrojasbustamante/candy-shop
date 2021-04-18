'use strict';
const btn_enviar = document.querySelector('.btn_enviar'); 
const requerido = document.querySelectorAll('.frm-requerido [required]');
let requerir_letras = document.getElementsByClassName('requerir_letras');
let requerir_numero = document.getElementsByClassName('requerir_numero');
let requerir_correo = document.getElementsByClassName('requerir_correo');
let required_telefono = document.getElementsByClassName('required_telefono');

let i;
let error = false;
let expresion_correo = /\w+@\w+\.+[a-z]/;
let expresion_telefono = /^\d{10}$/; // 0000000000
// let expresion_telefono = /^\d{5}-\d{5}$/; // 00000-00000
// let expresion_telefono = /^\d{5}\s\d{5}$/; // 00000 00000
// let expresion_telefono = /^\d{3}-\d{3}-\d{4}$/; // 000-000-0000

let validar_requerido = () => {
    for(i = 0; i < requerido.length; i++){
        if(requerido[i].value == ''){
            requerido[i].classList.add('input-error');
            error = true;
        }else{
            requerido[i].classList.remove('input-error');
        }
    }
    return error;
};
let validar_requerir_letras = () =>{ 
  for(i = 0; i < requerir_letras.length; i++){
        if(requerir_letras[i].value != ''){
            requerir_letras[i].classList.add('input-correcto');
            error = true;
        }else{
            requerir_letras[i].classList.remove('input-correcto');
            requerir_letras[i].classList.add('input-error');
        }
    }
    return error;
};
let validar_requerir_numero = () =>{ 
    for(i = 0; i < requerir_numero.length; i++){
        if(Number(requerir_numero[i].value < requerir_numero[i].min)){
            requerir_numero[i].classList.add('input-error');
            error = true;
        }else{
            requerir_numero[i].classList.remove('input-error');
        }
    }
    return error;
};
let validar_requerir_correo = () =>{ 
    for(i = 0; i < requerir_correo.length; i++){
        if(!expresion_correo.test(requerir_correo[i].value)){
            requerir_correo[i].classList.add('input-error');
            error = true;
        }else{
            requerir_correo[i].classList.remove('input-error');
        }
    }
    return error;
};
let validar_requerir_telefono = () =>{ 
    for(i = 0; i < required_telefono.length; i++){
        if(!expresion_telefono.test(required_telefono[i].value)){
            required_telefono[i].classList.add('input-error');
            console.log('error');
            error = true;
        }else{
            required_telefono[i].classList.remove('input-error');
            console.log('hecho');
        }
    }
    return error;
};
$(document).on("change", ".requerir_letras", function(){
    for(i = 0; i < requerir_letras.length; i++){
        if(requerir_letras[i].value != ''){
            requerir_letras[i].classList.add('input-correcto');
        }else{
            requerir_letras[i].classList.remove('input-correcto');
        }
    }
});
$(document).on("change", ".requerir_numero", function(){
    for(i = 0; i < requerir_numero.length; i++){
        if(Number(requerir_numero[i].value) > Number(requerir_numero[i].min)){
            requerir_numero[i].classList.add('input-correcto');
        }else if(Number(requerir_numero[i].value) < Number(requerir_numero[i].min)){
            requerir_numero[i].classList.remove('input-correcto');
            requerir_numero[i].classList.add('input-error');
        }else{
            requerir_numero[i].classList.remove('input-correcto');
            requerir_numero[i].classList.add('input-error');
        }
    }
});
$(document).on("change", ".requerir_correo", function(){
    for(i = 0; i < requerir_correo.length; i++){
        if(expresion_correo.test(requerir_correo[i].value) && requerir_correo[i].value != ''){
            requerir_correo[i].classList.add('input-correcto');
        }else if(!expresion_correo.test(requerir_correo[i].value)){
            requerir_correo[i].classList.remove('input-correcto');
            requerir_correo[i].classList.add('input-error');
        }
    }
    return error;
});
$(document).on("change", ".required_telefono", function(){
    for(i = 0; i < required_telefono.length; i++){
        if(expresion_telefono.test(required_telefono[i].value) && required_telefono[i].value != ''){
            required_telefono[i].classList.add('input-correcto');
        }else if(!expresion_telefono.test(required_telefono[i].value)){
            required_telefono[i].classList.remove('input-correcto');
            required_telefono[i].classList.add('input-error');
        }
    }
    return error;
});

let obtener_dato = () =>{
    let verificar_error_requerido = validar_requerido();
    let verificar_error_requerir_letras = validar_requerir_letras ();
    let verificar_error_requerir_numero = validar_requerir_numero ();
    let verificar_error_requerir_correo = validar_requerir_correo ();
    let verificar_error_requerir_telefono = validar_requerir_telefono ();

    if(verificar_error_requerido == true || verificar_error_requerir_letras == true || verificar_error_requerir_numero == true 
        || verificar_error_requerir_correo == true || verificar_error_requerir_telefono == true){
        swal({
            title: "Sus datos no se pudieron enviar",
            text: "Por favor revise los campos resaltados ",
            type: "error",
            closeOnConfirm: false,
            confirmButtonText: "Ok"
        });
    }

};

btn_enviar.addEventListener('click', obtener_dato);
