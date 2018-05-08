<?php
$mail = 'wli@campings.com';
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))

{

    $passage_ligne = "\r\n";

}

else

{

    $passage_ligne = "\n";

}

$message_txt = "Test envoie message avec script PHP.";

$boundary = "-----=".md5(rand());

$sujet = "test script php";

$header = "FROM: \" \"<liwendong29@gmail.com>".$passage_ligne;
$header .= "Reply-to: \"<wli@campings.com>".$passage_ligne;
$header .= "MIME-Version: 1.0".$passage_ligne;
$header .= "Content-Type: multipart/alternative;".$passage_ligne."boundary=\"$boundary\"".$passage_ligne;

$message = $passage_ligne."--".$boundary.$passage_ligne;
$message .= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message .= "Content-Transfer-Encoder: 8bit".$passage_ligne;
$message .= $passage_ligne.$message_txt.$passage_ligne;

$message .=$passage_ligne."--".$boundary."--".$passage_ligne;
$message .=$passage_ligne."--".$boundary."--".$passage_ligne;

mail($mail, $sujet, $message, $header);

?>