
<?php
    use App\Core\Permissions;
    $perms = new Permissions();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Template BACK</title>
    <meta name="description" content="Description de ma page">
    <link href="../css/tpl.back.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="../js/tpl.back.js"></script>


</head>
<body class="container">
    <!-- <div class="topBar">TEst</div> -->
    <nav class="sidebar-left">
        <img id="logo" src="../data/img/Logo.svg"> <br><br><br> 
        <ul>
            <li><a href="/dashboard"><img src="../data/snippets/Dashboard.svg">Dashboard</a></li>
            <li><a href="/media"><img src="../data/snippets/Media.svg">Media</a></li>
            <!-- <li><a href="#"><img src="../data/snippets/Plugins.svg">Plugin</a></li> manque de temps -->
            <li><a href="/pages"><img src="../data/snippets/Page.svg">Pages</a></li>
            <li><a href="/articles"><img src="../data/snippets/Articles.svg">Articles</a></li>
            <!-- <li><a href="#"><img src="../data/snippets/Categories.svg">Categories</a><li> -->
            <li><a href="/about"><img src="../data/snippets/Categories.svg">En savoir plus</a></li>
            <li><a href="/apparence"><img src="../data/snippets/apparence.svg">Apparence</a></li>
            <hr/>
            <li><a href="/user_settings"><img src="../data/snippets/Utilisateurs.svg">Utilisateurs</a></li>
            
            <li><a href="#"><img src="../data/snippets/Assistances.svg">Assistances</a></li>
            <?php if($perms->cando(12 ,"view")){ // reglages ?>
                <li><a href="#"><img src="../data/snippets/Reglage.svg">Réglages</a></li>
            <?php } else {?>
                <li class="user--noperms"><a href="#"><img src="../data/snippets/Reglage.svg">Réglages</a></li>
            <?php } ?>

        </ul>
        <br><br>

            <div id="snippet">
                <!-- <a href = "#"><img src="../data/snippets/Facebook.svg"> </a> -->
                <a href = "https://twitter.com/waterlily_off"><img src="../data/snippets/Twitter.svg"> </a>
                <!-- <a href = "https://www.instagram.com/esgiparis/?hl=fr"><img src="../data/snippets/Instagram.svg"> </a> -->
                <a href = "https://www.linkedin.com/company/waterlily-official/about/"><img src="../data/snippets/Linkedin.svg"> </a>
            </div>

    </nav>

    <section class="main-content ">
        <div id = "headerDashboard">
            <div id="searchbar"> 
                <img src="../data/snippets/Loupe.svg">
            </div>
            <div id="snippet">
                <a href = "/login"><img src="../data/snippets/Profile.svg"> </a>
                <a href = "/login"><img src="../data/snippets/Deconnexion.svg"> </a>
                <a href = "#"><img src="../data/snippets/Sombre.svg"> </a>
            </div>
            <div id="profile">
                <a href = "#"><img src="../data/snippets/UserImg.svg"></a>
            </div>
        </div>
        <div>
             <?php
                include "View/".$this->view.".view.php"; 
             ?> 
        </div>
    </section>
    <footer class="footer">

    </footer>
</body>
</html>