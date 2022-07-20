<?php

namespace App\Controller;

use App\Core\View;
use App\Core\Crud as CrudUser;
use App\Core\Permissions;
use App\Model\User as UserModel; 
use App\Model\TplSettings as TplSettingsModel;
use App\Core\TplSettings;
use App\Core\CrudPages as PageCrud;


class Admin
{

    public function dashboard()
    {
        $users = CrudUser ::getInstance();
        //$userModel = new UserModel();
        if (isset($_COOKIE['Connected']) && !empty($_COOKIE['Connected']) && isset($_COOKIE['id']) && !empty($_COOKIE['id'])) {
            $token = $users -> tokenReturn('user', $_COOKIE['id']);
            if ($token[0]['token'] == $_COOKIE['Connected']) {
                $perms = new Permissions();
                if ($perms->cando(3)) { // right Back end access
                    $view = new View("dashboard", "back"); // A l'appelle de contact on crée une vue de formumlaire de contact
                } else {
                    //http_response_code(403);
                    header("HTTP/1.1 403 No perms");
                }
            }else{
                header('Location: /login');
            }
        }else{
            header('Location: /login');
        }
    }   
    public function media()
    {
        $users = CrudUser ::getInstance();
        //$userModel = new UserModel();
        if (isset($_COOKIE['Connected']) && !empty($_COOKIE['Connected']) && isset($_COOKIE['id']) && !empty($_COOKIE['id'])) {
            $token = $users -> tokenReturn('user', $_COOKIE['id']);
            if ($token[0]['token'] == $_COOKIE['Connected']) {
                $perms = new Permissions();
                if ($perms->cando(3)) { // right  Back end access
                    $view = new View("media", "back");
                } else {
                    //http_response_code(403);
                    header("HTTP/1.1 403 No perms");
                }
            }else{
                header('Location: /login');
            }
        }
        else{
            header('Location: /login');
        }
    }
    public function user_settings()
    { 
        $users = CrudUser ::getInstance();
        $userModel = new UserModel();
        if (isset($_COOKIE['Connected']) && !empty($_COOKIE['Connected']) && isset($_COOKIE['id']) && !empty($_COOKIE['id'])) {
            $token = $users -> tokenReturn('user', $_COOKIE['id']);
            if ($token[0]['token'] == $_COOKIE['Connected']) {
                $perms = new Permissions();
                if ($perms->cando(3)) { // right  Back end access

                    if (isset($_POST['id']) && !empty($_POST['id'])) { // Secu a revoir
                        if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['role_id']) && gettype($_POST['firstname']) == 'string' && gettype($_POST['lastname']) == 'string') {
                            $userModel->setFirstname($_POST['firstname']);
                            $userModel->setLastname($_POST['lastname']);
                            $userModel->setEmail($_POST['email']);
                            $userModel->setIdUser($_POST['id']);
                            $userModel->setRole($_POST['role_id']);
                            $firstname= htmlspecialchars($userModel->getFirstname());
                            $lastname= htmlspecialchars($userModel->getLastname());
                            $tabEnvoi=['id'=>$userModel->getId(), 'email'=>$userModel->getEmail(), 'firstname'=>$firstname, 'lastname'=>$lastname, 'role_id'=>$userModel->getRole()];
                            $users->update($tabEnvoi);
                        } else {

                            $users->deleteRow('user', 'id', $_POST['id']);
                        }
                    }

                    $tabData = $users->display();
                    $view = new View("user_settings", "back");
                    $view->assign("tabData", $tabData);
                    $view->assign("perms", $perms);
                } else {
                    header("HTTP/1.1 403 No perms");
                }
            }
            else{
                header('Location: /login');
            }
        }
        else{
            header('Location: /login');
        }
    }
    public function delete()
    {   if(!empty($_POST))
        {
            //var_dump($_POST);
        }   
    }
    public function tplsettings()
    {   
        $users = CrudUser ::getInstance();
        //$userModel = new UserModel();
        if (isset($_COOKIE['Connected']) && !empty($_COOKIE['Connected']) && isset($_COOKIE['id']) && !empty($_COOKIE['id'])) {
            $token = $users -> tokenReturn('user', $_COOKIE['id']);
            if ($token[0]['token'] == $_COOKIE['Connected']) {
                $perms = new Permissions();
                if ($perms->cando(3)) { 
                    $tpl = new TplSettingsModel();
                    if ($_POST) { 
                        $tpl->setTplSettings();
                        $tpl->save('tplsettings');
                    }
                    $view = new View("tplstyle", "back");
                    $view->assign("tplform", $tpl);

                } else {
                    header("HTTP/1.1 403 No perms");
                }
            }
            else{
                header('Location: /login');
            }
        }
        else{
            header('Location: /login');
        }
    }

    public function generateSitemap(){
        $page = new PageCrud();
        $tabData = $page->display();
        $fichier = fopen("sitemap.xml", 'w+');
        fwrite($fichier, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n");
        fwrite($fichier, "<urlset xmlns=\"http://waterlily-cms.fr\"> \n");
        
        for($i=0; $i<count($tabData); $i++){
            fwrite($fichier, "<url> \n");
            fwrite($fichier, "<loc>http://waterlily-cms.fr/".$tabData[$i]['name']."</loc> \n");
            fwrite($fichier, "</url> \n");
        }
        fwrite($fichier, "</urlset> \n");
        fclose($fichier);
        $fichierRead = fopen("sitemap.xml", "r");
        $contenu = fread($fichierRead, filesize("sitemap.xml"));
        $contenu = htmlentities($contenu);
        print_r($contenu);
        
    }
}