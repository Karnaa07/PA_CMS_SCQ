
<?php //$this->includePartial("form", $user->getRegisterForm()) // à remettre plus tard ?> 

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
          <a href="/" class="link">Mot de passe oublié ?</a>
         <button class="btn" type="button">Connexion</button>
        </form>
    </div>
    <div class="tab-body" data-id="inscription">
      <form>
        <div class="row">
          <input type="email" class="input" placeholder="Adresse Mail">
        </div>
        <div class="row">
          <input type="password" class="input" placeholder="Mot de Passe">
        </div>
        <div class="row">
          <input type="password" class="input" placeholder="Confirmer Mot de Passe">
        </div>
        <a href ="/login">
        <button class="btn2" type="button">Inscription</button>
        </a>
      </form>
    </div>
  </div>
  <div class="tab-footer">
    <a class="tab-link active" data-ref="inscription" href="javascript:void(0)">Inscription</a>
    <a class="tab-link" href="#">|</a>
    <a class="tab-link" data-ref="connexion" href="/login">Connexion</a>
  </div>
</body>

</html>




