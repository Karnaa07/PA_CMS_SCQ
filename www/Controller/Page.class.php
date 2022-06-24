<?php
namespace App\Controller;

use App\Core\CleanWords;
use App\Core\Sql;
use App\Core\Verificator;
use App\Core\View;
use App\Core\MysqlBuilder;
use App\Core\CrudPages as PageCrud;
use App\Model\Page as PageModel; 

class Page
{
    public function addPage(){
        $page = new PageModel();
        if(!empty($_POST)){
            $result = Verificator::checkForm($page->getPageForm(), $_POST);
            $page->setPage();
            var_dump($page);
            $page->save();
        }
        $view = new View("addPage","front"); // On crée une page de vue en appelant le partial Login avec un template front (front.tpl.php)    
        $view->assign("page", $page);
    }

    public function pages_settings()
    {    
        $page = new PageCrud();
        if($_POST) // Secu a revoir
        {
            $page->updatePages($_POST);
        }

        $tabData = $page->displayPages();
        $view = new View("pages_settings","back");
        $view->assign("tabData", $tabData);      
    }
}