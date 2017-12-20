<?php

class View {
    private $view;
    private $tpl;

    public function __construct($v = "default", $t = "front") {
        $this->view = $v . ".view.php";
        $this->tpl = $t . ".tpl.php";

        if (!file_exists('views/' . $this->view)) {
            die("La view " . $this->view . " n'existe pas");
        }
        if (!file_exists('views/templates/' . $this->tpl)) {
            die("Le template " . $this->tpl . " n'existe pas");
        }
    }

    public function __destruct() {
        include('views/templates/' . $this->tpl);
    }
}
