<?php
//常量
define("YH","youhao");
// 以下代码在 PHP 5.3.0 后可以正常工作
const CONSTANT = 'Hello World';
/**
 * Created by PhpStorm.
 * User: yh
 * Date: 2017/7/3
 * Time: 10:44
 */
// An example callback function
function my_callback_function() {
    echo 'hello world!';
}

// An example callback method
class MyClass {
    static function myCallbackMethod() {
        echo 'Hello World!';
    }
}

// Type 1: Simple callback
call_user_func('my_callback_function');

// Type 2: Static class method call
call_user_func(array('MyClass', 'myCallbackMethod'));

// Type 3: Object method call
$obj = new MyClass();
call_user_func(array($obj, 'myCallbackMethod'));

// Type 4: Static class method call (As of PHP 5.2.3)
call_user_func('MyClass::myCallbackMethod');

// Type 5: Relative static class method call (As of PHP 5.3.0)
class A {
    public static function who() {
        echo "A\n";
    }
}

class B extends A {
    public static function who() {
        echo "B\n";
    }
}

call_user_func(array('B', 'parent::who')); // A

// Type 6: Objects implementing __invoke can be used as callables (since PHP 5.3)
class C {
    public function __invoke($name) {
        echo 'Hello ', $name, "\n";
    }
}

$c = new C();
call_user_func($c, 'PHP!');

echo YH;

?>
<?php
if (isset($_POST['action']) && $_POST['action'] == 'submitted') {
    echo '<pre>';
    print_r($_POST);
    echo '<a href="'. $_SERVER['PHP_SELF'] .'">Please try again</a>';

    echo '</pre>';
} else {
    ?>

    <?php if(defined('YH'))
    {
        echo YH.'FF';
    } ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Name:  <input type="text" name="personal[name]"><br />
        Email: <input type="text" name="personal[email]"><br />
        Beer: <br>
        <select multiple name="beer[]">
            <option value="warthog">Warthog</option>
            <option value="guinness">Guinness</option>
            <option value="stuttgarter">Stuttgarter Schwabenbr</option>
        </select><br />
        <input type="hidden" name="action" value="submitted" />
        <input type="submit" name="submit" value="submit me!" />
    </form>
    <?php } ?>
