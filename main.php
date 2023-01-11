<?php

        function chargerClasse($nomClasse) {
                require_once $nomClasse. '.php';

        }

        spl_autoload_register("chargerClasse");


        $test = new Etudiant("POOyanis", "POOhuard", "poo@poo.poo", "123456");
        $bdd = new DB("universite","127.0.0.1","root","" );
        $bdd->inscriptionEtudiant($test->getEmail(),$test->getLastname(), $test->getFirstname(),   $test->getPassword());
        $bdd->connection("poo@poo.poo","123456");


        


?>