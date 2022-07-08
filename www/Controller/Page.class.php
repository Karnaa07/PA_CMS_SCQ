<?php
namespace App\Controller;

use App\Core\CleanWords;
use App\Core\Sql;
use App\Core\Verificator;
use App\Core\View;
use App\Model\Page as PageModel;  
use App\Core\Mail;
use App\Core\Permissions;

class Page
{
    public function addPage(){
        $perms = new Permissions();
        if($perms->cando(3)){ // Create Page right
            $page = new PageModel();
            if(!empty($_POST)){
                $result = Verificator::checkForm($page->getPageForm(), $_POST);
                $page->setPage();
                //var_dump($page);
                $page->save("page");
            }
            $view = new View("addPage","front"); // On crée une page de vue en appelant le partial Login avec un template front (front.tpl.php)    
            $view->assign("page", $page);
        }
        else{
            header("HTTP/1.1 403 No perms");
        }
    }

    public function pages_settings()
    {    
        $page = new PageModel();
        //$tabData = $page->Crud();
        $view = new View("pages_settings","back");
        //$view->assign("tabData", $tabData);      
    }
}