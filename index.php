<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Install Settigns</title>
        <meta name="description" content="Installer">
    </head>
    <body>
        <form class="instaler--form" method="POST" action="installer.php">
            <h1> Options du site: </h1>
            
            <label for="dbHost">BDD Host : </label>
            <input required type="text" placeholder="Hôte" name="dbHost"><br>
            <label for="dbUserName">BDD Username : </label>
            <input required type="text" placeholder="DB UserName" name="dbUserName"><br>
            <label for="dbPwd">BDD Password : </label>
            <input required type="text" placeholder="DB Password" name="dbPwd"><br>
            <label for="dbName">BDD Name : </label>
            <input required type="text" placeholder="DB Name" name="dbName"><br>
            <label for="dbPrefix">BDD Prefix : </label>
            <input required type="text" value="waterlily_" name="dbPrefix"><br>
            <label for="siteName">Website name : </label>
            <input type="text" name="siteName" placeholder="Nom du site"><br>
            <hr>
            <h1> Compte Admin </h1>
            <label for="adminLastName">Nom</label>
            <input type="text" name="adminLastName" placeholder=""><br>
            <label for="adminFirstName">Prénom</label>
            <input type="text" name="adminFirstName" placeholder=""><br>
            <label for="adminMail">Email</label>
            <input type="text" name="adminMail" placeholder=""><br>
            <label for="adminMDP">Mot de Passe</label>
            <input type="text" name="adminMDP" placeholder=""><br>
            <input type="submit">
        </form>
    </body>
</html>