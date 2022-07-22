<?php
namespace App\Model;

use App\Core\Sql;
use App\Core\Mail;

class User extends Sql  // SETTERS ET GETTERS DE NOS INFOS UTILISATEUR
{
    protected $id = null;
    protected $firstname = null;
    protected $lastname = null;
    protected $email;
    protected $password;
    protected $contry;
    protected $status = 0;
    protected $role_id = 4;
    protected $token = null;

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
     * @param int $id
     */
    public function setIdUser(string $id): void
    {
        $this->id = $id;
    }
    /**
     * @return null|string
     */
    public function getFirstname(): ?string
    {

        return $this->firstname;
    }
    /**
     * @param string $firstname
     */
    public function setFirstname(?string $firstname): void
    {
        $firstname = htmlspecialchars($firstname);
        $this->firstname = ucwords(strtolower(trim($firstname)));
    }
    /**
     * @return null|string
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param null|string
     */
    public function setLastname(?string $lastname): void
    {
        $lastname = htmlspecialchars($lastname);
        $this->lastname = strtoupper(trim($lastname));
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = strtolower(trim($email));
    }

    /**
     * @return string
     */
    public function getContry(): string
    {
        return $this->contry;
    }

    /**
     * @param string $contry
     */
    public function setContry(string $contry): void
    {
        $contry = htmlspecialchars($contry);
        $this->contry = ucfirst(strtolower(trim($contry)));
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }


    public function getRole(): int
    {
        return $this->role;
    }
    public function setRole(int $role_id): void
    {
        $this->role = $role_id;
    }
    /**
     * @return null|string
     */
    public function getToken(): ?string
    {
        return $this->token;
    }
    /**
     * length : 255
     */
    public function generateToken(): void
    {
        $this->token = substr(bin2hex(random_bytes(128)), 0, 255);
    }
    public function getRegisterForm(): array
    {
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>"",
                "submit"=>"S'inscrire"
            ],
            'inputs'=>[
                "email"=>[
                    "type"=>"email",
                    "placeholder"=>"Votre email ...",
                    "required"=>true,
                    "class"=>"inputForm",
                    "id"=>"emailForm",
                    "error"=>"Email incorrect",
                    "unicity"=>"true",
                    "errorUnicity"=>"Email déjà en bdd",
                ],
                "password"=>[
                    "type"=>"password",
                    "placeholder"=>"Votre mot de passe ...",
                    "required"=>true,
                    "class"=>"inputForm",
                    "id"=>"pwdForm",
                    "error"=>"Votre mot de passe doit faire au min 8 caractères avec majuscule, minuscules et des chiffres",
                    ],
                "passwordConfirm"=>[
                    "type"=>"password",
                    "placeholder"=>"Confirmation ...",
                    "required"=>true,
                    "class"=>"inputForm",
                    "id"=>"pwdConfirmForm",
                    "confirm"=>"password",
                    "error"=>"Votre mot de passe de confirmation ne correspond pas",
                ],
                "firstname"=>[
                    "type"=>"text",
                    "placeholder"=>"Votre prénom ...",
                    "class"=>"inputForm",
                    "id"=>"firstnameForm",
                    "min"=>2,
                    "max"=>50,
                    "error"=>"Prénom incorrect"
                ],
                "lastname"=>[
                    "type"=>"text",
                    "placeholder"=>"Votre nom ...",
                    "class"=>"inputForm",
                    "id"=>"lastnameForm",
                    "min"=>2,
                    "max"=>100,
                    "error"=>"Nom incorrect"
                ],
                "contry"=>[
                    "type"=>"text",
                    "placeholder"=>"Votre pays ...",
                    "class"=>"inputForm",
                    "id"=>"paysForm",
                    "min"=>2,
                    "max"=>50,
                    "error"=>"Nom incorrect"
                ],
            ]
        ];
    }

    public function getLoginForm(): array
    {
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>"",
                "submit"=>"Se connecter"
            ],
            'inputs'=>[
                "token"=>[
                    "type"=>"hidden",
                    "value"=> $_SESSION['token']
                ],
                "email"=>[
                    "type"=>"email",
                    "placeholder"=>"Votre email ...",
                    "required"=>true,
                    "class"=>"inputForm",
                    "id"=>"emailForm",
                    "error"=>"Email incorrect"
                ],
                "password"=>[
                    "type"=>"password",
                    "placeholder"=>"Votre mot de passe ...",
                    "required"=>true,
                    "class"=>"inputForm",
                    "id"=>"pwdForm"
                ]
            ]
        ];
    }
    public function getChangeForm(): array{
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>"",
                "submit"=>"Changer de mot de passe"
            ],
            'inputs'=>[
                "passwordOld"=>[
                    "type"=>"password",
                    "placeholder"=>"Votre ancien mot de passe ...",
                    "required"=>true,
                    "class"=>"inputForm",
                    "id"=>"pwdConfirmForm",
                    "error"=>"Mauvais mot de passe",
                ],
                "password"=>[
                    "type"=>"password",
                    "placeholder"=>"Votre mot de passe ...",
                    "required"=>true,
                    "class"=>"inputForm",
                    "id"=>"pwdForm",
                    "error"=>"Votre mot de passe doit faire au min 8 caractères avec majuscule, minuscules et des chiffres",
                    ],
                "passwordConfirm"=>[
                    "type"=>"password",
                    "placeholder"=>"Confirmation ...",
                    "required"=>true,
                    "class"=>"inputForm",
                    "id"=>"pwdConfirmForm",
                    "confirm"=>"password",
                    "error"=>"Votre mot de passe de confirmation ne correspond pas",
                ],
               
            ]
        ];

    }
    public function getForgetForm(): array{
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>"",
                "submit"=>"Changer de mot de passe"
            ],
            'inputs'=>[
                "email"=>[
                    "type"=>"email",
                    "placeholder"=>"Votre email ...",
                    "required"=>true,
                    "class"=>"inputForm",
                    "id"=>"emailForm",
                    "error"=>"Email incorrect",
                    "unicity"=>"true",
                    "errorUnicity"=>"Email déjà en bdd",
                ],
               
            ]
        ];

    }
    public function setUser(){
        $this->setEmail($_POST["email"]);
        $this->setPassword($_POST["password"]);
        if(!empty($_POST['firstname']))
            $this->setFirstname($_POST['firstname']);
        if(!empty($_POST['lastname']))
            $this->setLastname($_POST['lastname']);
        if(!empty($_POST['role_id']))
            $this->setRole($_POST['role_id']);
        if(!empty($_POST['contry']))
            $this->setContry($_POST['contry']);
        $this->generateToken();
        $this->setStatus(0);

    }

    public function update(Page $page) {
        echo( ' La page ' . $page->name . ' a été publié !');
        $mail = new Mail();
        $mail-> send_mail_page($this->email, $page->name);
    }


}