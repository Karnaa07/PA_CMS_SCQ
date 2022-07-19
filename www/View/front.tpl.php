<?php
    use App\Core\TplSettings;
    $styles = new TplSettings();
    $customCss = $styles -> displayStyles();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Waterlily FRONT</title>
    <meta name="description" content="Front office de notre CMS Waterlily">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js%22%3E"></script>
    <link href="../css/tpl.front.css" rel="stylesheet">

</head>
<style>html{
	—bg-color : <?= $customCss[0]['bgcolor']; ?>;
}
</style>
<header>
<nav>
    <?php //Logo en php dans src ?>
    <div class="tplfront--navbar">
        <img class="tplfront--logo" src="../data/img/Logo.svg">
        <ul class="tplfront--list">
            <?php  for ($i=0; $i < count($tabData) ; $i++):?> 
                    <li><a href="<?= '/'.$tabData[$i]['name'] ?>"><?= $tabData[$i]['name'] ?></a></li>
                
            <?php endfor;?> 
            <li><a href="/changePassword">Changer de mot de passe</a></li>

        </ul>
    </div>
</nav>
</header>
<body>
    <?php include "View/".$this->view.".view.php"; ?>
</body>
<footer>
    <p><i class="tplfront--branding">Ce site est propulsée par Waterlily™</i></p>
</footer>
</html>