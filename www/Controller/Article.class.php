<?php
namespace App\Controller;

use App\Core\CleanWords;
use App\Core\Sql;
use App\Core\Verificator;
use App\Core\View;
use App\Core\Permissions;
use App\Model\Article as ArticleModel;  // Alias de class User dans Model/User.class.php
use App\Core\Mail;
use App\Core\Crud;

class Article
{
    public function addArticle(){
        $perms = new Permissions();
        if($perms->cando(3) && $perms->cando(8)){ // right Back end access and create articles
            $article = new ArticleModel();
            if(!empty($_POST)){
            $result = Verificator::checkForm($article->getArticleForm(), $_POST);
            $article->setArticle();
            $article->save("article"); 
            }
            $view = new View("addArticle","front"); // On crée une page de vue en appelant le partial Login avec un template front (front.tpl.php)    
            $view->assign("article", $article);
        } else {
            //http_response_code(403);
            header("HTTP/1.1 403 No perms");
        }
    }
    public function articles()
    {   
         
        $article = new Crud();
        $displayArticles = $article->getArticles();
        $view = new View("articles","back");
        $view->assign("article", $displayArticles);      
    }
}

