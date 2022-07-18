<script type="text/javascript" src="../js/themeSettings.js"></script>
<?php
    // use App\Core\TplSettings;
    // $styles = new TplSettings();
    // $customCss = $styles -> displayStyles();
?> 
    <p>Couleur du thème de votre CMS:</p>
    <div class="login--form">
        <?php $this->includePartial("form", $tplsettings->getTplSettingsForm()) ?>
    </div>


