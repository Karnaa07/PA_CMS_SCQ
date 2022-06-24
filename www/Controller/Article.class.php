<?php
namespace App\Controller;

use App\Core\CleanWords;
use App\Core\Sql;
use App\Core\Verificator;
use App\Core\View;
use App\Model\Article as ArticleModel;  // Alias de class User dans Model/User.class.php
use App\Core\Mail;

class Article
{
    public function addArticle(){
        $article = new ArticleModel();
        if(!empty($_POST)){
        $result = Verificator::checkForm($article->getArticleForm(), $_POST);
        $article->setArticle();

        }
        $view = new View("addArticle","front"); // On crée une page de vue en appelant le partial Login avec un template front (front.tpl.php)    
        $view->assign("article", $article);
    }
}

