<link rel="stylesheet" type="text/css" href="../css/login.css">
<script type="text/javascript" src="../js/forgetPassword.js"></script>

<div class="login--container">
        <img class="login--logo" src="../data/img/formLogo.svg"/>
        <hr class="solid login--separator">
        <div class="login--form">
                <?php $this->includePartial("form", $user->getLoginForm());?>
        </div>
        <br><br><br>
        <a class="login--mdpoublie"> Mot de passe oublié ?</a>
        <div class="login--socials">
                <a href = "#"><img src="../data/snippets/Instagram.svg"> </a>
                <a href = "#"><img src="../data/snippets/Facebook.svg"> </a>
                <a href = "#"><img src="../data/snippets/Twitter.svg"> </a>
                <a href = "#"><img src="../data/snippets/Linkedin.svg"> </a>
        </div>
</div>
        <!-- <div class="login--img--leftcorner--container">
                <img class="login--img--leftcorner" src="../data/img/Login.svg" alt="">
        </div> -->
<div class="modal">
        <div class="modal-content">
                <span class="close-btn">&times;</span>
                <div class = "modal--inputs">
                        <form id="forgetPassword" method="post" action="">
                                <input  name="id" type="hidden" value=""><br>
                                <label for="email">Email</label>
                                <input name="email" type="text" value=""><br>
                                <input type="submit" value="Envoyer">

                        </form>
                </div>
        </div>
</div>