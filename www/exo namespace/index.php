<?php

namespace App;

require "SecurityUser.class.php";
require "SecurityPage.class.php";

use App\User\Security as Secu;
use App\Page\Security;

//App\App\User\Security
// Chemin absolu ou chemin relatif
//new \App\User\Security();
//new User\Security();


new Security();
new Secu();