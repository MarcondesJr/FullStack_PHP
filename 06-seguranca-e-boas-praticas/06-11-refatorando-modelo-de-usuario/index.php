<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.11 - Refatorando modelo de usuário");

require __DIR__ . "/../source/autoload.php";

/*
 * [ find ]
 */
fullStackPHPClassSession("find", __LINE__);
$model = new \Source\Models\User();
$user = $model->find("id = :id", "id=6");
var_dump($user);

/*
 * [ find by id ]
 */
fullStackPHPClassSession("find by id", __LINE__);
$user = $model->findById(7);
var_dump($user);

/*
 * [ find by email ]
 */
fullStackPHPClassSession("find by email", __LINE__);
$user = $model->findByEmail("lucas30@email.com.br");
var_dump($user);

/*
 * [ all ]
 */
fullStackPHPClassSession("all", __LINE__);
$list = $model->all(2, 5);
var_dump($list);

/*
 * [ save ]
 */
fullStackPHPClassSession("save create", __LINE__);
$user = $model->bootstrap(
    "Marcondes",
    "Nunes",
    "teste1@teste.com",
    123456789
);
if ($user->save()){
    echo message()->success("Cadastro realizado com sucesso.!");
}else{
    echo message()->error("Erro ao Cadastrar.!");
};
var_dump($user);

/*
 * [ save update ]
 */
fullStackPHPClassSession("save update", __LINE__);
$user = (new \Source\Models\User())->findById(51);
$user->first_name = "Junior";
$user->last_name = "Correa";
$user->password = "987654321";
if ($user->save()){
    echo message()->success("Dados atualizados com sucesso.!");
}else{
    echo $user->message();
};
var_dump($user);