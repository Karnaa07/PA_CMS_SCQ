
        <script type="text/javascript" src="../js/login.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/login.css">

        <div class="login--container">
                <img class="login--logo" src="../data/img/formLogo.svg"/>
                <hr class="solid login--separator">
                <div class="login--form">
                        <?php $this->includePartial("form", $user->getLoginForm());?>
                </div>
                <div> <p class="login--mdpoublie"> Mot de passe oublié ?</p> </div>
                <div class="login--socials">
                        <a href = "#"><img src="../data/snippets/Instagram.svg"> </a>
                        <a href = "#"><img src="../data/snippets/Facebook.svg"> </a>
                        <a href = "#"><img src="../data/snippets/Twitter.svg"> </a>
                        <a href = "#"><img src="../data/snippets/Linkedin.svg"> </a>
                </div>
        </div>
        <div class="login--img--leftcorner--container">
                <img class="login--img--leftcorner" src="../data/img/Login.svg" alt="">
        </div>
