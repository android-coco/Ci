<?php
/**
 * Created by PhpStorm.
 * User: 38314
 * Date: 2017/7/4
 * Time: 14:58
 */
function bool2str($bool)
{
    if ($bool === false) {
        return 'FALSE';
    } else {
        return 'TRUE';
    }
}

function compareObjects(&$o1, &$o2)
{
    echo 'o1 == o2 : ' . bool2str($o1 == $o2) . "\n";
    echo 'o1 != o2 : ' . bool2str($o1 != $o2) . "\n";
    echo 'o1 === o2 : ' . bool2str($o1 === $o2) . "\n";
    echo 'o1 !== o2 : ' . bool2str($o1 !== $o2) . "\n";
}

class Flag
{
    public $flag;

    function Flag($flag = true) {
        $this->flag = $flag;
    }
}

class OtherFlag
{
    public $flag;

    function OtherFlag($flag = true) {
        $this->flag = $flag;
    }
}

$o = new Flag();
$p = new Flag();
$q = $o;
$r = new OtherFlag();

echo "Two instances of the same class\n";
compareObjects($o, $p);

echo "\nTwo references to the same instance\n";
compareObjects($o, $q);

echo "\nInstances of two different classes\n";
compareObjects($o, $r);
echo "\n";
$fruits = array (
    "fruits"  => array("a" => "orange", "b" => "banana", "c" => "apple"),
    "numbers" => array(1, 2, 3, 4, 5, 6),
    "holes"   => array("first", 5 => "second", "third")
);
print_r(json_encode($fruits));
print_r("\n");
$input_array = array("FirSt" => 1, "SecOnd" => 4);
print_r(array_change_key_case($input_array, CASE_LOWER));

echo pi()."\n";
$str = "Hello World!\n\n";
echo rtrim($str)."\n";
echo mt_rand(0,9)."\n";
echo rand(0,9)."\n";

$str = 123;
echo str_pad($str,10,"0")."\n";
echo strrev(123)."\n";

$str = "An example on a long word is:
Supercalifragulistic";
echo wordwrap($str,15)."\n";

$str = "John & 'Adams'";
echo htmlentities($str, ENT_COMPAT)."\n"; // John & 'Adams'
$new = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
echo $new."\n"; // &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;
echo chr(052)."\n"; // ASCII 值返回对应的字符
echo ord("hello")."\n"; //字符串第一个字符的 ASCII 值