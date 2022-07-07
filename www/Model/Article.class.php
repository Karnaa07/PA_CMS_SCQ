<?php
namespace App\Model;

use App\Core\Sql;

class Article extends Sql  // SETTERS ET GETTERS DE NOS INFOS UTILISATEUR
{
    protected $idArticle = null;
    protected $title;
    protected $content;
    protected $urlImage;
    protected $idCategory = null;
    protected $id = null;
    protected $idPage = null;


    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @return null|int
     */
    public function getId(): ?int
    {
        return $this->idArticle;
    }

        /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

        /**
     * @return string
     */
    public function getUrlImage(): string
    {
        return $this->urlImage;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = trim($title);
    }
    /**
    * @param string $content
    */
    public function setContent(string $content): void
    {
        $this->content = trim($content);
    }
    
//faut il un setter pour l'url ou faut il le générer?
    public function getArticleForm(): array
    {
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>"",
                "enctype"=>"multipart/form-data",
                "submit"=>"Ajouter"
            ],
            'inputs'=>[
                "title"=>[
                    "type"=>"text",
                    "placeholder"=>"Titre de votre article...",
                    "required"=>true,
                    "class"=>"inputForm",
                    "id"=>"titleForm",
                    "error"=>"Titre incorrect",
                ],
                "content"=>[
                    "type"=>"textarea",
                    "placeholder"=>"Description breve de votre article",
                    "required"=>true,
                    "class"=>"inputForm",
                    "id"=>"contentArticleForm",
                    "error"=>"Contenu incorect",
                    ],
                "image"=>[
                    "type"=>"file",
                    "placeholder"=>"",
                    "required"=>true,
                    "class"=>"inputForm",
                    "id"=>"urlImageForm",
                    "error"=>"Image manquante",
                    ],
                "idCategory"=>[
                    "type"=>"select",
                    "placeholder"=>"Quelle est la catégorie de votre article ?",
                    "option"=>['Publicité','Documentation','Etude','Information','Revue','Debat'],
                    "class"=>"inputForm",
                    "id"=>"urlImageForm",
                    "error"=>"Contenu incorect",
                    ],
            ]
        ];
    }
    public function setArticle(){
        $this->setTitle($_POST["title"]);
        $this->setContent($_POST["content"]);
    }
}