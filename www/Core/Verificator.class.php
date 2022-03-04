<?php

namespace App\Core;


class Verificator
{
    public static function checkForm($config, $data): array
    {
        $result = [];
        //Le nb de inputs envoyés ?
        if( count($data) != count($config['inputs'])){
            die("Tentative de hack !!!!");
        }// Si le nombre d'inputs renvoyé par notre formulaire ne correspond pas au nombres d'inputs de notre formulaire de base
        // (Inspecter l'élément ajout d'un champ)

        foreach ($config['inputs'] as $name=>$input){ // ON boucle sur les données de nos inputs pour effectuer des vérifications

            if(!isset($data[$name]) ){
                $result[] = "Le champs ".$name." n'existe pas";
            }

            if(empty($data[$name]) && !empty($input["required"]) ){
                $result[] = "Le champs ".$name." ne peut pas être vide";
            }

            if($input["type"] == "email" && !self::checkEmail($data[$name]) ){
                $result[] = $input["error"];
            }

            if($input["type"] == "password" && empty($input["confirm"]) && !self::checkPassword($data[$name]) ){
                $result[] = $input["error"];
            }

            if(!empty($input["confirm"]) && $data[$name] != $data[$input["confirm"]]){
                $result[] = $input["error"];
            }
            
            // a completer


        }


        return $result;

    }

    public static function checkEmail($email): bool
    {
       return filter_var($email, FILTER_VALIDATE_EMAIL); // On vérifie si le champ mail contient une valeur d'email
    }


    public static function checkPassword($password): bool // On vérifie le champ password
    {

        return strlen($password)>=8
            && preg_match("/[0-9]/", $password, $match)
            && preg_match("/[a-z]/", $password, $match)
            && preg_match("/[A-Z]/", $password, $match)
            ;
    }

 }