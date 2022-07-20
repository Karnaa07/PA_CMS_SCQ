<?php
namespace App\Model;

use App\Core\Sql;

class Page extends Sql  // SETTERS ET GETTERS DE NOS INFOS UTILISATEUR
{
    protected $idPage = null;
    protected $name;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return null|int
     */
    public function getId(): ?int
    {
        return $this->idPage;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

     /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $name = htmlspecialchars($name);
        $name = strtolower($name);
        $this->name = trim($name);
    }

public function getPageForm(): array
    {
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>"",
                "submit"=>"Ajouter"
            ],
            'inputs'=>[
                "name"=>[
                    "type"=>"text",
                    "placeholder"=>"Nom de la page...",
                    "required"=>true,
                    "class"=>"inputForm",
                    "id"=>"nameForm",
                    "unicity"=>"true",
                    "error"=>"Nom incorrect veuillez ne pas mettre de caractere speciaux",
                    "errorUnicity"=>"Email déjà en bdd",
                ],
            ]
        ];
    }
    public function setPage(){
        $this->setName($_POST["name"]);
    }
}