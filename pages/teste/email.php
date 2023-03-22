<?php
    $para = "suporte.eat.drink@gmail.com";
    $assunto = "Teste Email Recuperação Senha";
    $corpo = "Olá, este é um email para recuperar sua senha";
    $headers = "From:suporte.eat.drink@gmail.com";

    if(mail($para, $assunto, $corpo, $headers)){
        echo "Email enviado para $para com sucesso!";
    }else{
        echo "Falha no envio do Email.";
    }

?>