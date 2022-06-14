<?php
ini_set( 'display_errors', 1);
error_reporting( E_ALL );
$from = "anabase@anthony-rodrigues.fr";
$to ="anthonyoutub@gmail.com";
$subject = "Vérification PHP Mail";
$message = "Le congressiste";
$headers = "From:" . $from;
mail($to,$subject,$message, $headers);

?>

