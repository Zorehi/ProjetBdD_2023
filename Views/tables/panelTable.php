<div class="panel-section panelTable" style="z-index: -1;" id="panelTable" data-status="show">
    <div class="panel-section-title">
        <h1><?= $tablename ?></h1>
    </div>
    <div>
        <div class="panel-section-list">
            <div class="panel-section-create">
                <a role="button" id="btnCreateLine" ondragstart="return false;" class="unselectable">
                    <span>
                        <i style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yT/r/i14dpO3gzZZ.png&quot;); background-position: 0px -1659px; background-size: auto; width: 16px; height: 16px; background-repeat: no-repeat; display: inline-block;"></i>
                        <span>Créer une nouvelle ligne</span>
                    </span>
                    <div class="hover"></div>
                </a>
            </div>
            <div class="panel-section-separator"></div>
            <div class="panelTable-filter">
                <div class="panelTable-filter-title">
                    <span>Filtre pour la table <?= $tablename ?></span>
                </div>
                <div class="panelTable-filter-content">
                    <?php foreach ($table->getChamps() as $champ) { ?>
                        <label for="<?= $champ ?>">
                            <div>
                                <span><?= $champ ?></span>
                            </div>
                            <div>
                                <input type="text" id="<?= $champ ?>" oninput="filter()">
                            </div>
                        </label>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
</div>