<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.08 - Camada de manipulação pt3");

require __DIR__ . "/../source/autoload.php";

/*
 * [ validate helpers ] Funções para sintetizar rotinas de validação
 */
fullStackPHPClassSession("validate", __LINE__);
$message = new \Source\Core\Message();
$email = "cursos@gmail.com";
if (!is_email($email)) {
    echo $message->error("Email Não válido");
}else{
    echo $message->success("Email válido");
}

$pass ="12345678123456781234567812345678123456781";
echo strlen($pass);

if (!is_password($pass)) {
    echo $message->error("Senha Inválida");
}else{
    echo $message->success("Senha válida");
}


/*
 * [ navigation helpers ] Funções para sintetizar rotinas de navegação
 */
fullStackPHPClassSession("navigation", __LINE__);

var_dump([
    url("/blog/titulo-do-artigo"),
    url("blog/titulo-do-artigo"),
]);

if (empty($_GET)){
    redirect("?f=true");
}

/*
 * [ class triggers ] São gatilhos globais para criação de objetos
 */
fullStackPHPClassSession("triggers", __LINE__);

var_dump(user()->load(1));

echo message()->error("Erro");
echo message()->warning("Aviso");
session_start();
session()->set("user", user()->load(2));
var_dump(session()->all());