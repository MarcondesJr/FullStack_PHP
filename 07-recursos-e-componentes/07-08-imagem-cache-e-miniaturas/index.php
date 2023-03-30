<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.08 - Imagem, cache e miniaturas");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ cropper ] https://packagist.org/packages/coffeecode/cropper
 */
fullStackPHPClassSession("cropper", __LINE__);

$thumb = new \Source\Support\Thumb();
var_dump($thumb);

/*
 * [ generate ]
 */
fullStackPHPClassSession("generate", __LINE__);

echo "<img src='{$thumb->make("images/2023/03/imagejpg.jpg", 300)}' alt='' title='' />";
echo "<img src='{$thumb->make("images/2023/03/imagejpg.jpg", 100, 100)}' alt='' title='' />";

var_dump($thumb->make("image.jpg", 100));

echo "<img src='{$thumb->make("images/2023/03/imagepng.png", 300)}' alt='' title='' />";
echo "<img src='{$thumb->make("images/2023/03/imagepng.png", 100, 100)}' alt='' title='' />";

//$thumb->flush("images/2023/03/imagepng.png");
$thumb->flush();