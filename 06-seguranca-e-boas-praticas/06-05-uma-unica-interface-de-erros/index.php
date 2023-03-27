<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.05 - Uma única interface de erros");

require __DIR__ . "/../source/autoload.php";

/*
 * [ message class ] Uma classe padrão para reportar ao usuário
 */
fullStackPHPClassSession("message class", __LINE__);

$message = new \Source\Core\Message();
var_dump(
    $message,
    get_class_methods($message)
);

/*
 * [ message types ] Métodos para cada tipo de mensagem
 */
fullStackPHPClassSession("message types", __LINE__);
$info = $message->info("Essa é uma mensagem de INFO.!");
$success = $message->success("Essa é uma mensagem de SUCESSO.!");
$warning = $message->warning("Essa é uma mensagem de AVISO.!");
$error = $message->error("Essa é uma mensagem de ERRO.!");


var_dump([
    $message->getText(),
    $message->getType()
]);
echo $message->info("Essa é uma mensagem de INFO.!");
echo $message->success("Essa é uma mensagem de SUCESSO.!");
echo $message->warning("Essa é uma mensagem de AVISO.!");
echo $message->error("Essa é uma mensagem de ERRO.!");

/*
 * [ json message ] Mudando o padrão de retorno
 */
fullStackPHPClassSession("json message", __LINE__);

echo $message->info($message->error("Essa é uma mensagem de ERRO.!")->json());

/*
 * [ flash message ] Uma mensagem via sessão para refresh de navegação
 */
fullStackPHPClassSession("flash message", __LINE__);
$session = new \Source\Core\Session();

$message->success("Essa é uma mensagem flash!")->flash();

if ($flash = $session->flash()){
    echo $flash;
    var_dump([
        $flash->getType(),
        $flash->getText()
    ]);
}


var_dump(
    $_SESSION,
    $session->all()
);

