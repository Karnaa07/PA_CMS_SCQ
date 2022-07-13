<?php
namespace App\Controller;

use App\Core\CleanWords;
use App\Core\Sql;
use App\Core\Verificator;
use App\Core\View;
use App\Core\Permissions;
use App\Model\Article as ArticleModel;  // Alias de class User dans Model/User.class.php
use App\Core\Mail;
use App\Core\Crud as CrudUser;

class Article
{
    public function addArticle(){
        $users = CrudUser ::getInstance();
        if (isset($_COOKIE['Connected']) && !empty($_COOKIE['Connected']) && isset($_COOKIE['id']) && !empty($_COOKIE['id'])) {
            $token = $users -> tokenReturn('user', $_COOKIE['id']);
            if ($token[0]['token'] == $_COOKIE['Connected']) {
                $perms = new Permissions();
                if ($perms->cando(3) && $perms->cando(8)) { // right Back end access and create articles
                    if (!empty($_POST)) {
                        $article = new ArticleModel();
                        $result = Verificator::checkForm($article->getArticleForm(), $_POST);
                        $article->setArticle();
                    }
                    $view = new View("addArticle", "front"); // On crée une page de vue en appelant le partial Login avec un template front (front.tpl.php)
                    $view->assign("article", $article);
                } else {
                    //http_response_code(403);
                    header("HTTP/1.1 403 No perms");
                }
            }else{
                header('Location : login');
            }
        }else{
            header('Location : login');
        }
    }
}

