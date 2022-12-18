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
                <?php foreach ($lines as $line) { ?>
                    <li class="table-row">
                        <div class="table-row-info" onclick="modify(this)">
                        <?php foreach (array_keys($table::$info_tables) as $champ) { ?>
                            <div class="value <?= $champ ?>" data-label="<?= $champ ?>"><?= $line[$champ] ?></div>
                        <?php } ?>
                        </div>
                        <button type="button" class="btn-delete" value="<?= $line[$table->getIdName()] ?>" onclick="deleteRow('<?= $tablename ?>', this.value, this.parentElement)">
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
        <div class="modify-row" id="modify-row" data-status="hidden">
            <form method="POST" id="formModify">
                <input type="hidden" id="formType" name="type" value="update">
                <div class="modify-wrapper">
                <?php foreach ($table::$info_tables as $key => $champ) { ?>
                    <label class="modify-label" for="<?= $key.'_1' ?>">
                        <span class="text"><?= $key ?></span>
                        <?php if ($champ['elementHTML'] == 'input') { ?>
                            <input class="input" type="<?= $champ['inputType'] ?>" id="<?= $key.'_1' ?>" name="<?= $key ?>" <?= isset($champ['pattern']) ? 'pattern="'.$champ['pattern'].'"' : '' ?> <?= $champ['is_disabled'] ?>>
                        <?php } else if ($champ['elementHTML'] == 'select') { ?>
                            <select class="select" name="<?= $key ?>" id="<?= $key.'_1' ?>">
                            <?php foreach($champ['values'] as $champ2) { ?>
                                <option value="<?= $champ2[$champ['name_id']] ?>"><?= $champ2[$champ['name_id']] . ' - ' . $champ2[$champ['name']] ?></option>
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

<script text="text/javascript">
    const scrollbarContainer = document.getElementById('scrollbar-2');
    const scrollbar_2 = new ScrollBar(scrollbarContainer, { offsetContainer: -20, offsetContent: 20});
    scrollbar_2.init();
    document.getElementById('navLeft').dataset.always = 'small';
    document.querySelector('[data-status=selected]').dataset.status = 'unselected';
    
    const filterElement = {};
    const panelTableFfilterContent = document.getElementsByClassName('panelTable-filter-content')[0];
    for (const label of panelTableFfilterContent.children) {
        filterElement[label.getAttribute('for')] = label.querySelector('#'+label.getAttribute('for'));
    }
    
    function deleteRow(table, id, row) {
        const datas = new FormData();
        datas.append('deleteID', id);
        datas.append('type', 'delete');
        
        row.remove();
        
        scrollbar_2.refresh();
        
        $.ajax({
            type: 'POST',
            url: 'tables/?name='+table,
            data: datas,
            dataType: 'json',
            timeout: 120000, //2 Minutes
            cache: false,
            contentType: false,
            processData: false,
        });
    }
    
    function filter() {
        const table_rows = scrollbar_2.sbContent.querySelectorAll('.table-row-info');
        
        for (const table_row of table_rows) {
            const divs = table_row.querySelectorAll('div');
            
            for (const div of divs) {
                console.log(filterElement[div.dataset.label].value);
                if (div.textContent.toLocaleLowerCase().includes(filterElement[div.dataset.label].value.toLocaleLowerCase())) {
                    table_row.parentElement.style.display = 'flex';
                } else {
                    table_row.parentElement.style.display = 'none';
                    break;
                }
            }
        }
        
        scrollbar_2.refresh(true);
    }
    
    const btnCreateLine = document.getElementById('btnCreateLine');
    const modify_row = document.getElementById('modify-row');
    const table_cloud = document.getElementById('table-cloud');
    const input_form_type = document.getElementById('formType');
    const responsive_table = document.getElementsByClassName('responsive-table')[0];
    const modify = (element, is_new = false) => {
        modify_row.dataset.status = 'modifying';
        table_cloud.dataset.status = 'shown';
        
        if (is_new) {
            input_form_type.value = 'create';
        } else {
            input_form_type.value = 'update';
            const div_value_array = element.querySelectorAll('div.value');
            let value_array = {};
            for (const div_value of div_value_array) {
                value_array[div_value.dataset.label] = div_value.textContent;
            }
            const input_array = modify_row.querySelectorAll('input.input');
            for (let index = 0; index < input_array.length; index++) {
                input_array[index].value = value_array[input_array[index].getAttribute('name')];
            }
            const select_array = modify_row.querySelectorAll('select.select');
            for (let index = 0; index < select_array.length; index++) {
                select_array[index].value = value_array[select_array[index].getAttribute('name')];
            }
        }
    }

    const cancel = (event) => {
        modify_row.dataset.status = 'hidden';
        table_cloud.dataset.status = 'hidden';
        deleteValue();
    }
    
    function deleteValue() {
        const input_array = modify_row.querySelectorAll('input.input');
        for (const input of input_array) {
            input.value = '';
        }
        const select_array = modify_row.querySelectorAll('select.select');
        for (const select of select_array) {
            select.selectedIndex = 0;
        }
    }

    const form = document.getElementById('formModify');
    function submitForm() {
        const array_input = form.querySelectorAll('[disabled]');
        for (const input of array_input) {
            if (input_form_type.value != 'create') {
                input.disabled = false;
            }
        }
        form.submit();
    }

</script>