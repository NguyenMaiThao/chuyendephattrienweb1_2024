<?php
require_once "I.php";

class C implements I {
    public function f() {
        echo 'This is function f from class C.' . PHP_EOL;
    }
}
