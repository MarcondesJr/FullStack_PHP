<?php $this->layout("test::base", ["title" => "Editando usuário {$user->first_name}"]); ?>

<?php $this->start("nav"); ?>
<a href="./" title="Voltar">Voltar</a>
<?php $this->stop(); ?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="first_name" value="<?= $user->first_name; ?>">
    <input type="text" name="last_name" value="<?= $user->last_name; ?>">
    <input type="text" name="email" value="<?= $user->email; ?>">
    <button>Atualizar usuário</button>
</form>
