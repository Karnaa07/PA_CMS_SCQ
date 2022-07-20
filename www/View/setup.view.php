<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Install Settigns</title>
        <meta name="description" content="Installer">
    </head>
    <body>
        <form class="instaler--form" method="POST" action="">
            <h1> Options du site: </h1>
                <label for="dbHost">BDD Host : </label>
                <input value="database" required type="text" placeholder="Hôte" name="dbHost"><br>
                <label for="dbUserName">BDD Username : </label>
                <input value="root" required type="text" placeholder="DB UserName" name="dbUserName"><br>
                <label for="dbPwd">BDD Password : </label>
                <input  value="password" required type="password" placeholder="DB Password" name="dbPwd"><br>
                <label for="dbName">BDD Name : </label>
                <input  required type="text" placeholder="DB Name" name="dbName"><br>
                <label for="dbPrefix">BDD Prefix : </label>
                <input required type="text" value="waterlily_" name="dbPrefix"><br>
                <label for="dbPort">BDD Port : </label>
                <input required type="text" value="3306" name="dbPort"><br>
                <label for="siteName">Website name : </label>
                <input value="monSite" type="text" name="siteName" placeholder="Nom du site"><br>
                <label for="siteUrl">Website url : </label>
                <input value="http://51.75.200.94" type="text" name="siteUrl" placeholder="Nom du site"><br>
            <hr>
            <h1> Compte Admin </h1>
                <label for="adminLastName">Nom</label>
                <input type="text" name="lastname" placeholder=""><br>
                <label for="adminFirstName">Prénom</label>
                <input type="text" name="firstname" placeholder=""><br>
                <label for="adminMail">Email</label>
                <input type="text" name="email" placeholder=""><br>
                <label for="adminMDP">Mot de Passe</label>
                <input type="password" name="password" placeholder=""><br>
                <label for="contry">Pays</label>
                <input type="text" name="contry" placeholder=""><br>
            <input type="submit">
        </form>
    </body>
</html>