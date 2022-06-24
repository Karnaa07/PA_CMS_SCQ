<?php //Partial permettant de créer des formulaires rapidement ?>
<form method="<?= $data["config"]["method"]??"POST" ?>"  action="<?= $data["config"]["action"]??"" ?>">

    <?php foreach ($data["inputs"] as $name=>$input) :
    if ($input["type"]==="textarea"):?>
    <textarea 
        name="<?= $name?>" 
        rows = "5" 
        cols = "33"
        placeholder="<?= $input["placeholder"]??"" ?>"
        id="<?= $input["id"]??"" ?>"
        class="<?= $input["class"]??"" ?>" >
    </textarea><br>
    <?php elseif($input["type"]==="select"):?>
    <select name="<?= $name?>" id="<?= $input["id"]??"" ?>">
        <option value="">--Please choose an option--</option>
        <?php foreach ($input["option"] as $option):?>
        <option value="<?= $option ?>"><?= $option ?></option>
        <?php endforeach;?>
    </select>
    <?php else: ?>
    <input
        type="<?= $input["type"]??"text" ?>"
        name="<?= $name?>"
        placeholder="<?= $input["placeholder"]??"" ?>"
        id="<?= $input["id"]??"" ?>"
        class="<?= $input["class"]??"" ?>"
        <?= empty($input["required"])?"":'required="required"' ?>
    ><br>

    <?php endif;endforeach;?>

    <input type="submit" value="<?= $data["config"]["submit"]??"Valider" ?>">
</form>
