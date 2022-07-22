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
        <!-- <div class="login--img--leftcorner--container">
                <img class="login--img--leftcorner" src="../data/img/Login.svg" alt="">
        </div> -->
<div class="modal">
        <div class="modal-content">
                <span class="close-btn">&times;</span>
                <div class = "modal--inputs">
                        <form id="forgetPassword" method="post" action="">
                                <input name="id" type="hidden" value=""><br>
                                <label for="email">Email</label>
                                <input name="email" type="text" value=""><br>
                                <input type="submit" value="Envoyer">
                        </form>
                </div>
        </div>
</div>

        <h1>Login</h1>
        <?php //$this->includePartial("form", $user->getLoginForm()) a remettre plus tard?>
         

<html lang="fr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/register_login.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"> </script>
  <script src="../js/script_register.js" defer></script>
  <title>Dashboard  - Connexion</title>
</head>
<body>
  <div class="logo">
  </div>
    <div class="container">
      <div class="tab-body" data-id="connexion">
        <form>
          <div class="row">
            <input type="email" class="input" placeholder="Adresse Mail">
          </div>
          <div class="row">
            <input placeholder="Mot de Passe" type="password" class="input">
          </div>
          <a href="#" class="link">Mot de passe oublié ?</a>
          <a href="/">
          <button class="btn" type="button">Connexion</button>
          </a>
        </form>
    </div>
  </div>
  <div class="tab-footer">
    <a class="tab-link" data-ref="inscription" href="/register">Inscription</a>
    <a class="tab-link" href="#">|</a>
    <a class="tab-link active" data-ref="connexion" href="javascript:void(0)">Connexion</a>
  </div>
</body>

</html>

