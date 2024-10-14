<?php

// Nhúng các file class và interface
require_once "I.php";
require_once "C.php";
require_once "A.php";
require_once "B.php";

// Lớp Demo
class Demo {
    // Phương thức mẫu kiểm tra hai tham số kiểu I hoặc null và trả về kiểu I hoặc null
    public function demoFunction(?I $x, ?I $y): ?I {
        if ($x === null && $y === null) {
            echo "Both X and Y are null." . PHP_EOL;
            return null;
        } elseif ($x === null) {
            echo "X is null, Y is a valid instance of " . get_class($y) . PHP_EOL;
            return $y;
        } elseif ($y === null) {
            echo "Y is null, X is a valid instance of " . get_class($x) . PHP_EOL;
            return $x;
        }

        // Các trường hợp cụ thể với A và B
        if ($x instanceof A && $y instanceof B) {
            echo "X is an instance of A, Y is an instance of B." . PHP_EOL;
            return $x;
        } elseif ($x instanceof B && $y instanceof A) {
            echo "X is an instance of B, Y is an instance of A." . PHP_EOL;
            return $y;
        }

        // Mặc định
        echo "X is an instance of " . get_class($x) . ", Y is an instance of " . get_class($y) . PHP_EOL;
        return $x;
    }
}

// Tạo đối tượng demo và các đối tượng khác
$demo = new Demo();

$a = new A(); // Instance của class A
$b = new B(); // Instance của class B
$c = new C(); // Instance của class C
$nullObject = null; // Null

// Gọi phương thức demoFunction với nhiều trường hợp
echo "Test case 1: A và B" . PHP_EOL;
$demo->demoFunction($a, $b);

echo PHP_EOL . "Test case 2: B và A" . PHP_EOL;
$demo->demoFunction($b, $a);

echo PHP_EOL . "Test case 3: A và null" . PHP_EOL;
$demo->demoFunction($a, $nullObject);

echo PHP_EOL . "Test case 4: null và B" . PHP_EOL;
$demo->demoFunction($nullObject, $b);

echo PHP_EOL . "Test case 5: C và A" . PHP_EOL;
$demo->demoFunction($c, $a);

echo PHP_EOL . "Test case 6: C và C" . PHP_EOL;
$demo->demoFunction($c, $c);

echo PHP_EOL . "Test case 7: null và null" . PHP_EOL;
$demo->demoFunction($nullObject, $nullObject);

