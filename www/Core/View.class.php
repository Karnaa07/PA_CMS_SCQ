<?php

namespace App\Core;

class View
{
    private $view;
    private $template;
    private $data=[];

    public function __construct($view, $template="front")
    {
        $this->setView($view);
        $this->setTemplate($template);
    }

    public function setView($view):void
    {
        $this->view = strtolower($view);
    }

    public function setTemplate($template):void
    {
        $this->template = strtolower($template);
    }


    public function __toString():string
    {
        return "La vue est : ". $this->view;
    }

    public function includePartial($partial, $data):void
    {
        if(!file_exists("View/Partial/".$partial.".partial.php")){
            die("Le partial ".$partial." n'existe pas");
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