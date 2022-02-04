<form method="<?= $data["config"]["method"]??"POST" ?>"  action="<?= $data["config"]["action"]??"" ?>">

    <?php foreach ($data["inputs"] as $name=>$input) :?>

    <input
            type="<?= $input["type"]??"text" ?>"
            name="<?= $name?>"
            placeholder="<?= $input["placeholder"]??"" ?>"
            id="<?= $input["id"]??"" ?>"
            class="<?= $input["class"]??"" ?>"
            <?= empty($input["required"])?"":'required="required"' ?>
    ><br>

    <?php endforeach;?>

    <input type="submit" value="<?= $data["config"]["submit"]??"Valider" ?>">
</form>
