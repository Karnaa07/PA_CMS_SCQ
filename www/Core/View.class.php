<?php

namespace App\Core;

class View // On définie nos vues
{
    private $view; // Le nom du fichier view qu'on souhaite appeller exemple : ( App/View/VALEUR.view.php )
    private $template; // Le template utilisé ( Back , front ...) exemple : ( App/View/back.tpl.php )
    private $data=[];

    public function __construct($view, $template="front")
    {
        $this->setView($view);
        $this->setTemplate($template);
    }

    public function setView($view):void
    {
        $this->view = strtolower($view); // Nos fichiers sont en minuscule donc on met en forme au cas ou
    }

    public function setTemplate($template):void
    {
        $this->template = strtolower($template); // Idem qu'au dessus
    }


    public function __toString():string
    {
        return "La vue est : ". $this->view;
    }

    public function includePartial($partial, $data):void // On inclue notre partial
    {
        if(!file_exists("View/Partial/".$partial.".partial.php")){
            die("Le partial ".$partial." n'existe pas"); // Message d'erreur si le partial n'éxiste pas 
        }
        include "View/Partial/".$partial.".partial.php";
    }

    public function assign($key, $value):void
    {
        $this->data[$key]=$value;
    }

    public function __destruct()
    {
        //array("pseudo"=>"Prof") ---> $pseudo = "Prof";
        extract($this->data);
        include "View/".$this->template.".tpl.php";
    }

}