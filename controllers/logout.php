<?php
// seteo una fecha pasada para que caduque la cookie y se pierda la sesion del usuario
setcookie("user_id", "", time() - 3600, "/"); 

header("Location: /");
exit();
?>
