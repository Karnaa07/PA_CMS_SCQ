<?php
namespace App\Model;

use App\Core\Sql;

class TplSettings extends Sql  // SETTERS ET GETTERS DE NOS INFOS UTILISATEUR
{
    protected $id = null;
    protected $name ;
    protected $bgcolor ;
    protected $fontcolor;
    protected $font;

    public function __construct()
    {

        parent::__construct();
    }

    /**
     * @return null|int
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * @return null|string
     */
    public function getName(): ?string
    {

        return $this->name;
    }
    /**
     * @param string $name
     */
    public function setName(?string $name): void
    {
        $this->name = strtolower(trim($name));
    }


    /**
     * @return null|string
     */
    public function getBgcolor(): ?string
    {

        return $this->bgcolor;
    }
    /**
     * @param string $bgcolor
     */
    public function setBgColor(?string $bgcolor): void
    {
        $this->bgcolor = strtolower(trim($bgcolor));
    }
    /**
     * @return null|string
    */
    public function getFontColor(): ?string
    {

        return $this->fontcolor;
    }
    /**
     * @param string $fontcolor
     */
    public function setFontColor(?string $fontcolor): void
    {
        $this->fontcolor = strtolower(trim($fontcolor));
    }
    /**
     * @return null|string
    */
    public function getFont(): ?string
    {
        return $this->font;
    }
    /**
     * @param string $font
     */
    public function setFont(?string $font): void
    {
        $this->font = strtolower(trim($font));
    }
    /**
     * @return null|string
    */
    public function getTplSettingsForm(): array
    {
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>"",
                "submit"=>"Sauvegarder les changements"
            ],
            'inputs'=>[
                "name"=>[
                    "type"=>"text",
                    "required"=>true,
                    "class"=>"inputForm",
                    "id"=>"name",
                ],
                "bgcolor"=>[
                    "type"=>"color",
                    "required"=>true,
                    "class"=>"inputForm",
                    "id"=>"bgcolorForm",
                ],
                "fontcolor"=>[
                    "type"=>"color",
                    "required"=>true,
                    "class"=>"inputForm",
                    "id"=>"fontcolorForm",
                ],
                "font"=>[
                    "type"=>"select",
                    "placeholder"=>"Selectionnez une police d'écriture",
                    "option"=>['Arial','Helvetica','Trebuchet MS','Gill Sans','Arial Narrow'],
                    "class"=>"inputForm",
                    "id"=>"font",
                    "error"=>"Contenu incorect",
                    ],
            ]
        ];
    }
    public function setTplSettings(){
        if(!empty($_POST['bgcolor']))
            $this->setBgColor($_POST['bgcolor']);
        if(!empty($_POST['name']))
            $this->setName($_POST['name']);
        if(!empty($_POST['fontcolor']))
            $this->setFontColor($_POST['fontcolor']);
        if(!empty($_POST['font']))
            $this->setFont($_POST['font']);
    }
}