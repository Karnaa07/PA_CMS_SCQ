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
                        $unicity=$page->getOneBy('page',["name"=>$_POST['name']]);
                        if ($unicity==null) {
                            $result = Verificator::checkForm($page->getPageForm(), $_POST);
                            if(count($result)<1){
                                $page->setPage();
                                // var_dump($page);
                                $page->save("page");
                                $nomFichier = $_POST['name'];
                                $nomFichier= trim($nomFichier);
                                var_dump('namepage',$nomFichier);
                                $nomFichier = str_replace("'","_",$nomFichier);
                                $nomFichier = str_replace(" ","_",$nomFichier);
                                $fichier = fopen("View/$nomFichier.view.php", 'a+');
                                $route = fopen('routes.yml', 'a+');
                                $controller = fopen('Controller/Front.class.php', 'r+');
                                fwrite($route, "/$nomFichier: \n");
                                fwrite($route, " controller: front \n");
                                fwrite($route, " action: $nomFichier \n");
                                fseek($controller, -1, SEEK_END);
                                fwrite($controller, 'public function '. $nomFichier.'(){$view = new View("'.$nomFichier.'", "front");}}');
                            }
                            else{
                                echo $result[0];
                            }
                            
                        }
                        else{
                            echo "cette page existe déja";
                        }
                        
                    }
                    $view = new View("addPage", "back"); // On crée une page de vue en appelant le partial Login avec un template front (front.tpl.php)
                    $view->assign("page", $page);
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
                            $id =$_POST['idPage'];
                            $name = $page->namePage('page',$id);
                            $namePage = $name[0]['name'];
                            $namePage = str_replace("'","_",$namePage);
                            $namePage = str_replace(" ","_",$namePage);
                            $page->deleteRow('page', 'idPage', $_POST['idPage']);
                            unlink("View/$namePage.View.php");
                            $ptr = fopen("routes.yml", "r");
                            $contenu = fread($ptr, filesize("routes.yml"));
                            /* On a plus besoin du pointeur */
                            fclose($ptr);
                            $contenu = explode(PHP_EOL, $contenu);
                            $nomRoute = '/'.$namePage.': '; 
                            for($i=0; $i<count($contenu); $i++){
                                if($nomRoute == $contenu[$i]){
                                    unset($contenu[$i]);
                                    $i++;
                                    unset($contenu[$i]);
                                    $i++;
                                    unset($contenu[$i]);
                                }
                            }
                            $contenu = array_values($contenu); /* Ré-indexe l'array */
    
                            /* Puis on reconstruit le tout et on l'écrit */
                            $contenu = implode(PHP_EOL, $contenu);
                            $ptr = fopen("routes.yml", "w");
                            fwrite($ptr, $contenu);

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
                header('Location : login');
            }
        }else{
            header('Location : login');
        }
    }
}