<?php
header("Content-type: text/html; charset=utf-8");
if($_POST) {

    // your mail here
    $to = "contato@cloudsbox.com.br"; 

    //Vars
    $nome = $_POST["userName"];
    $email = $_POST["userEmail"];
    $message = $_POST["content"];
    $subject = $_POST["subject"];

    // Corpo do Email
    $body = "<html>
    <head>
     <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
   </head>
   <body>
    De: <b>$nome</b><br/><br/>
    Assunto: <b>{$subject}</b><br/><br/>
    Mensagem: {$message}<br/>
    <br/>
    <br/>
    ---<br/>
    Enviado do formulário do site.
   </body>
   </html>";

    // Mail header
    $headers = "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: =?utf-8?b?".base64_encode($nome)."?= <".$email.">\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Transfer-Encoding: 8bit\r\n";
    $headers .= "Date: ".date("r (T)")."\r\n";
    $headers .= "Reply-To: $email\r\n";  
    $headers .= "X-Mailer: PHP/" . phpversion();

    if(@mail($to, '=?utf-8?B?'.base64_encode($subject).'?=', $body, $headers)) {
        print "<p class='success'>{$nome}, sua mensagem foi enviada!</p>";
    } else {
        print "<p class='error'>Problema no envio de email.</p>";
    }
}

