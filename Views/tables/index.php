<?php include ROOT."/Views/tables/panelTable.php"; ?>

<div class="globalContainer">
    <div class="table" id="<?= $tablename ?>">
        <ul class="responsive-table">
            <li class="table-header">
                <?php foreach (array_keys($table::$info_tables) as $champ) { ?>
                    <div class="<?= $champ ?>"><?= $champ ?></div>
                <?php } ?>
            </li>
            <div class="scrollbar-container" id="scrollbar-2">
                <div class="scrollbar-content" data-transition="yes">
                <?php foreach ($lines as $line) {
                    if ($table->getType() == 'Associations') {
                        $valeur_id = [];
                        foreach ($table->getIdNames() as $valeur) {
                            $valeur_id[] = $line[$valeur];
                        }
                        $liste_id = implode('|', $valeur_id);
                    } else {
                        $liste_id = $line[$table->getIdName()];
                    }
                    ?>
                    <li class="table-row">
                        <div class="table-row-info" onclick="modify(this)">
                        <?php foreach (array_keys($table::$info_tables) as $champ) { ?>
                            <div class="value <?= $champ ?>" data-label="<?= $champ ?>"><?= $line[$champ] ?></div>
                        <?php } ?>
                        </div>
                        <button type="submit" class="btn-delete" name="deleteID" value="<?= $liste_id ?>" onclick="deleteRow('<?= $table->getType() ?>', '<?= $tablename ?>', this.value, this.parentElement)">
                            <img src="assets/image/bin.png" height="16px" width="16px" alt="">
                        </button>
                    </li>
                <?php } ?>
                </div>
                <div class="scrollbar-track"></div>
                <div class="scrollbar-thumb" data-transition="yes" draggable="false" ondragstart="return false;">
                    <div></div>
                </div>
            </div>
        </ul>

        <div class="table-cloud" id="table-cloud" data-status="hidden"></div>
        
        <div class="modify-card" id="modify-row" data-status="hidden">
            <form method="POST" id="formModify">
                <input type="hidden" id="formType" name="type" value="update">
            <?php if ($table->getType() == 'Associations') foreach ($table->getIdnames() as $key => $champ) { ?>
                <input type="hidden" name="old_id[<?= $champ ?>]">
            <?php } ?>
                <div class="modify-wrapper">
                <?php foreach ($table::$info_tables as $key => $champ) { ?>
                    <label class="modify-label" for="<?= $key.'_1' ?>">
                        <span class="text"><?= $key ?></span>
                        <?php if ($champ['elementHTML'] == 'input') { ?>
                            <input class="input" type="<?= $champ['inputType'] ?>" id="<?= $key.'_1' ?>" name="<?= $key ?>" <?= isset($champ['pattern']) ? 'pattern="'.$champ['pattern'].'"' : '' ?> <?= $champ['is_disabled'] ?>>
                        <?php } else if ($champ['elementHTML'] == 'select') { ?>
                            <select class="select" name="<?= $key ?>" id="<?= $key.'_1' ?>">
                            <?php foreach($champ['values'] as $champ2) { ?>
                                <option value="<?= $champ2[$key] ?>"><?= $champ2[$key] . ' - ' . $champ2[$champ['name']] ?></option>
                            <?php } ?>
                            </select>
                        <?php } else if ($champ['elementHTML'] == 'boolean') { ?>
                            <select class="select" name="<?= $key ?>" id="<?= $key.'_1' ?>">
                                <option value="0">False</option>
                                <option value="1">True</option>
                            </select>
                        <?php } ?>
                    </label>
                <?php } ?>
                </div>
                <div class="modify-btn-container">
                    <button class="modify-btn-save" type="button" onclick="submitForm()">Enregistrer</button>
                    <button class="modify-btn-cancel" type="button" onclick="cancel()">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/js/tableController.js"></script>
