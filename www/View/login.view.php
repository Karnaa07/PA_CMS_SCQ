<link rel="stylesheet" type="text/css" href="../css/login.css">
<script type="text/javascript" src="../js/forgetPassword.js"></script>

<div class="login--container">
        <img class="login--logo" src="../data/img/formLogo.svg"/>
        <hr class="solid login--separator">
        <div class="login--form">
                <?php $this->includePartial("form", $user->getLoginForm());?>
        </div>
        <br><br><br>
        <a href="/forget" class="login--mdpoublie"> Mot de passe oublié ?</a>
        <div class="login--socials">
                <a href = "#"><img src="../data/snippets/Instagram.svg"> </a>
                <a href = "#"><img src="../data/snippets/Facebook.svg"> </a>
                <a href = "#"><img src="../data/snippets/Twitter.svg"> </a>
                <a href = "#"><img src="../data/snippets/Linkedin.svg"> </a>
        </div>
</div>
