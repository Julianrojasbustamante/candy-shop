<?php

session_destroy();

echo '<script type="text/javascript">
var pagina = "login";
var segundos = 0;
function redireccion() {
    document.location.href=pagina;
}
setTimeout("redireccion()",segundos);
</script>';
