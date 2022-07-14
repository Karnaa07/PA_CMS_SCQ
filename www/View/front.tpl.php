<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Template FRONT</title>
    <meta name="description" content="Description de ma page">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="../css/tpl.front.css" rel="stylesheet">

</head>
<header>
<nav>
    <?php //Logo en php dans src ?>
    <div class="tplfront--navbar">
        <img class="tplfront--logo" src="../data/img/Logo.svg">
        <ul class="tplfront--list">
            <?php  ?>
            <li><a href="#">Accueuil</a></li>
            <li><a href="#">Notre Formation</a></li>
            <li><a href="#">A Propos</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Contact</a></li>
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