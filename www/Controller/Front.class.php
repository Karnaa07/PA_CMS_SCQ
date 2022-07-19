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


class Front
{
public function Seconde_Page(){$view = new View("Seconde_Page", "front");}public function Accueuil(){$view = new View("Accueuil", "front");}public function Nous_contacter(){$view = new View("Nous_contacter", "front");}}