<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Install Settigns</title>
        <meta name="description" content="Installer">
    </head>
    <body>
        <form class="instaler--form" method="POST" action="installer.php">
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

            <input type="submit">
        </form>
        <hr>
    </body>
</html>