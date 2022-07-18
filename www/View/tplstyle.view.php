<?php
    // use App\Core\TplSettings;
    // $styles = new TplSettings();
    // $customCss = $styles -> displayStyles();
?> 
<script type="text/javascript" src="../js/themeSettings.js"></script>

    <h1>Options du thème de votre CMS:</h1>
    <div class="login--form">
        <?php $this->includePartial("form", $tplsettings->getTplSettingsForm()) ?>
    </div>
<?php
// include "View/media.view.php"; 
?>


