<?php
    include_once("animal.php");
    class Ape extends Animal{
    public $leg = 2;
    public function yell() {
        return "Auooo";
    }
}
?>