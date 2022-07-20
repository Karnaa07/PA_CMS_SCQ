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
use App\Core\CrudArticle as ArticleCrud;
use App\Core\CrudPages;


class Article
{
    public function addArticle(){
        $users = CrudUser ::getInstance();
        if (isset($_COOKIE['Connected']) && !empty($_COOKIE['Connected']) && isset($_COOKIE['id']) && !empty($_COOKIE['id'])) {
            $token = $users -> tokenReturn('user', $_COOKIE['id']);
            if ($token[0]['token'] == $_COOKIE['Connected']) {
                $perms = new Permissions();
                if ($perms->cando(3) && $perms->cando(8)) { // right Back end access and create articles
                    $article = new ArticleModel();
                    
                    if (!empty($_POST)) {
                        $result = Verificator::checkForm($article->getArticleForm(), $_POST);
                        $article->setArticle();
                        $article->save('article');
                    }
                    $pageid = new CrudPages();
                    $pages = $pageid->display();
                    //var_dump($pages);
                    $view = new View("addArticle", "back"); // On crée une page de vue en appelant le partial Login avec un template front (front.tpl.php)
                    $view->assign("article", $article);
                    $view->assign("pageid", $pages);       

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
    public function articles()
    {   
        $users = CrudUser :: getInstance();
        if (isset($_COOKIE['Connected']) && !empty($_COOKIE['Connected']) && isset($_COOKIE['id']) && !empty($_COOKIE['id'])) {
            $token = $users -> tokenReturn('user', $_COOKIE['id']);
            // var_dump($token);
            if ($token[0]['token'] == $_COOKIE['Connected']) {
                $perms = new Permissions();
                if ($perms->cando(3)) {
                    $article = new ArticleCrud();
                    if (isset($_POST['idArticle'])) { 
                        if ($_POST['title']&& $_POST['content']&& $_POST['idPage'] && $_POST['idCategory']){
                            $article->update($_POST);
                        }else{
                        $id= $_POST['idArticle'];
                        $article->deleteRow('article', 'idArticle', $id);
                        }
                    }
                    $tabData = $article->getArticles();
                    $view = new View("articles", "back");
                    $view->assign("article", $tabData);
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
}

