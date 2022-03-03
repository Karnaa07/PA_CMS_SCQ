
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