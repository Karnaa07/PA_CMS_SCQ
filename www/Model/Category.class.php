<?php
namespace App\Model;

use App\Core\Sql;

class Category extends Sql  // SETTERS ET GETTERS DE NOS INFOS UTILISATEUR
{
    protected $idCategory = null;
    protected $name;
    protected $description;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return null|int
     */
    public function getCategory(): ?int
    {
        return $this->idCategory;
    }

        /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
     /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = ucwords(strtolower(trim($name)));
    }
    /**
    * @param string $description
    */
   public function setDescription(string $description): void
   {
       $this->description = $description;
   }

   public function getCategoryForm(): array
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
                    "placeholder"=>"Nom de la categorie...",
                    "required"=>true,
                    "class"=>"inputForm",
                    "id"=>"nameCategoryForm",
                    "error"=>"Nom incorrect",
                ],
                
            ]
        ];
    }
}