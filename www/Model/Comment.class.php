<?php
namespace App\Model;

use App\Core\Sql;

class Comment extends Sql  // SETTERS ET GETTERS DE NOS INFOS UTILISATEUR
{
    protected $idComment = null;
    protected $content;
    protected $id = null;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return null|int
     */
    public function getComment(): ?int
    {
        return $this->idComment;
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
    public function getId(): string
    {
        return $this->id;
    }
     /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = trim($content);
    }
    /**
    * @param string $id
    */
//    public function setId(?string $id): void
//    {
//        $this->id = $id;
//    }

public function getCommentForm(): array
    {
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>"",
                "submit"=>"Publier"
            ],
            'inputs'=>[
                "content"=>[
                    "type"=>"textarea",
                    "placeholder"=>"",
                    "required"=>true,
                    "class"=>"inputForm",
                    "id"=>"contentCommentForm",
                    "error"=>"Contenu incorect",
                    ],
            ]
        ];
    }
}