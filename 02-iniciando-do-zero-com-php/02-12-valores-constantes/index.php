<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.12 - Constantes e constantes mágicas");

/*
 * [ constantes ] https://php.net/manual/pt_BR/language.constants.php
 */
fullStackPHPClassSession("constantes", __LINE__);
define("COURSE", "Full Stack PHP");
const AUTHOR = "Marcondes";

$formation = true;
if ($formation){
    define("COURSE_TYPE", "Formação");
}else{
    define("COURSE_TYPE", "Curso");
}

echo "<p>COURSE_TYPE COURSE AUTHOR</p>";
echo "<p>{COURSE_TYPE} {COURSE} {AUTHOR}</p>";
echo "<p>", COURSE_TYPE, " ", COURSE, " de ", AUTHOR, "</p>";
echo "<p>". COURSE_TYPE. " ". COURSE. " de ". AUTHOR. "</p>";

class OnClass{
    const USER = "root";
    const HOST = "localhost";
}

echo "<p>", OnClass::HOST ,"</p>";
echo "<p>", OnClass::USER ,"</p>";

var_dump(get_defined_constants(true)["user"]);

/*
 * [ constantes mágicas ] https://php.net/manual/pt_BR/language.constants.predefined.php
 */
fullStackPHPClassSession("constantes mágicas", __LINE__);
var_dump([
    __LINE__,
    __FILE__,
    __DIR__
]);

function fullStackPhp(){
    return __FUNCTION__;
}

echo fullStackPhp();

trait myTrait {
    public $traitName = __TRAIT__;
}

class FsPHP
{
    use myTrait;
    public $className = __CLASS__;
}

var_dump(new FsPHP());

require __DIR__ . "/MyClass.php";
var_dump(new \Source\MyClass());
var_dump(\Source\MyClass::class);