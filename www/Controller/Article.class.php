<?php
namespace App\Controller;

use App\Core\CleanWords;
use App\Core\Sql;
use App\Core\Verificator;
use App\Core\View;
use App\Core\CrudUsers;
use App\Model\Article as ArticleModel;  // Alias de class User dans Model/User.class.php
use App\Core\Mail;

class Article
{
    public function addArticle(){
        $article = new ArticleModel();
        if(!empty($_POST)){
        $result = Verificator::checkForm($article->getArticleForm(), $_POST);
        $article->setArticle();
         //var_dump($article);
        $article->save("article"); 

        }
        $view = new View("addArticle","front"); // On crée une page de vue en appelant le partial Login avec un template front (front.tpl.php)    
        $view->assign("article", $article);
    }
    public function articles()
    {   
         
        $article = new CrudUsers();
        $displayArticles = $article->getArticles();
        $view = new View("articles","back");
        $view->assign("article", $displayArticles);      
    }
}
