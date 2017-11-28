<?php

class UserController {
    public function indexAction($params) {
        echo "Action par défaut de user";
    }

    public function addAction($params) {
        echo "Ajout d'un utilisateur";
    }

    public function listAction($params) {
        echo "Liste les utilisateurs";
    }

    public function modifyAction($params) {
        echo "Modification des utilisateurs";
        echo $params["GET"]["id"];
    }
}