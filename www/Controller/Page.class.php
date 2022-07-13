<?php
namespace App\Controller;

use App\Core\CleanWords;
use App\Core\Sql;
use App\Core\Verificator;
use App\Core\View;
use App\Model\Page as PageModel;  
use App\Core\Mail;
use App\Core\Permissions;

use App\Core\MysqlBuilder;
use App\Core\CrudPages as PageCrud;
use App\Core\Crud as CrudUser;



class Page
{
    public function addPage(){
        $users = CrudUser :: getInstance();
        if (isset($_COOKIE['Connected']) && !empty($_COOKIE['Connected']) && isset($_COOKIE['id']) && !empty($_COOKIE['id'])) {
            $token = $users -> tokenReturn('user', $_COOKIE['id']);
            if ($token[0]['token'] == $_COOKIE['Connected']) {
                $perms = new Permissions();
                if ($perms->cando(3) && $perms->cando(13)) { // Create Page right and Back end access
                    $page = new PageModel();
                    if (!empty($_POST)) {
                        $result = Verificator::checkForm($page->getPageForm(), $_POST);
                        $page->setPage();
                        // var_dump($page);
                        $page->save("page");
                    }
                    $view = new View("addPage", "front"); // On crée une page de vue en appelant le partial Login avec un template front (front.tpl.php)
                    $view->assign("page", $page);
                } else {
                    //http_response_code(403);
                    header("HTTP/1.1 403 No perms");
                }
            }else{
                header('Location : /login');
            }
        }else{
            header('Location : /login');
        }
    }

    public function pages_settings()
    {   
        $users = CrudUser :: getInstance();
        if (isset($_COOKIE['Connected']) && !empty($_COOKIE['Connected']) && isset($_COOKIE['id']) && !empty($_COOKIE['id'])) {
            $token = $users -> tokenReturn('user', $_COOKIE['id']);
            var_dump($token);
            if ($token[0]['token'] == $_COOKIE['Connected']) {
                $perms = new Permissions();
                if ($perms->cando(3)) {
                    $page = new PageCrud();
                    if ($_POST) { // Secu a revoir
                        if ($_POST['name']) {
                            $page->update($_POST);
                        } else {
                            $page->deleteRow('page', 'idPage', $_POST['idPage']);
                        }
                    }
                    $tabData = $page->display();
                    $view = new View("pages_settings", "back");
                    $view->assign("tabData", $tabData);
                 } else {
                    //http_response_code(403);
                    header("HTTP/1.1 403 No perms");
                }
            }else{
                header('Location : /login');
            }
        }else{
            header('Location : /login');
        }
    }
}