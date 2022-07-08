<?php
namespace App\Controller;

use App\Core\CleanWords;
use App\Core\Sql;
use App\Core\Verificator;
use App\Core\View;
use App\Model\Page as PageModel;  
use App\Core\Mail;

class Page
{
    public function addPage(){
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

    public function pages_settings()
    {    
        $page = new PageModel();
        //$tabData = $page->Crud();
        $view = new View("pages_settings","back");
        //$view->assign("tabData", $tabData);      
    }
}