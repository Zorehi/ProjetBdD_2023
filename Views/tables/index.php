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
    const scrollbar_1 = new ScrollBar(scrollbarContainer, { offsetContainer: -20, offsetContent: 20});
    scrollbar_1.init();
    document.getElementById('navLeft').dataset.always = 'small';
    document.getElementById('Database').dataset.status = 'selected';
    document.querySelector('[data-status=selected]').dataset.status = 'unselected';

    const filterElement = {};
    const panelTableFfilterContent = document.getElementsByClassName('panelTable-filter-content')[0];
    for (const label of panelTableFfilterContent.children) {
        filterElement[label.getAttribute('for')] = label.querySelector('#'+label.getAttribute('for'));
    }

    function filter() {
        const table_rows = scrollbar_1.sbContent.querySelectorAll('.table-row');

        for (const table_row of table_rows) {
            const divs = table_row.querySelectorAll('div');

            for (const div of divs) {
                if (div.textContent.toLocaleLowerCase().includes(filterElement[div.dataset.label].value.toLocaleLowerCase())) {
                    table_row.style.display = 'flex';
                } else {
                    table_row.style.display = 'none';
                    break;
                }
            }
        }

        scrollbar_1.refresh();
    }

</script>