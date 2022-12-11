<?php include ROOT."/Views/tables/panelTable.php"; ?>

<div class="globalContainer">
    <div class="<?= $tablename ?>">
        <ul class="responsive-table">
            <li class="table-header">
                <?php foreach ($table->getChamps() as $champ) { ?>
                    <div class="<?= $champ ?>"><?= $champ ?></div>
                <?php } ?>
            </li>
            <div class="scrollbar-container" id="scrollbar-1">
                <div class="scrollbar-content" data-transition="yes">
                    <?php for ($i = 0; $i < 30; $i++) { ?>
                    <?php foreach ($lines as $line) { ?>
                        <li class="table-row">
                            <?php foreach ($line as $key => $value) { ?>
                                <div class="<?= $key ?>" data-label="<?= $key ?>"><?= $value ?></div>
                            <?php } ?>
                        </li>
                    <?php } ?>
                    <?php } ?>
                </div>
                <div class="scrollbar-track"></div>
                <div class="scrollbar-thumb" data-transition="yes" draggable="false" ondragstart="return false;">
                    <div></div>
                </div>
            </div>
        </ul>
    </div>
</div>

<script src="js.php?file=ScrollBar.js"></script>
<script text="text/javascript">
    const scrollbarContainer = document.getElementById('scrollbar-1');
    new ScrollBar(scrollbarContainer, { offset: 20 });
    document.getElementById('navLeft').dataset.always = 'small';
    document.getElementById('Database').dataset.status = 'selected';
    document.querySelector('[data-status=selected]').dataset.status = 'unselected';
</script>