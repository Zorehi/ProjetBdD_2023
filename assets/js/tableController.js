const scrollbarContainer = document.getElementById('scrollbar-2');
const scrollbar_2 = new ScrollBar(scrollbarContainer, { offsetContainer: -20, offsetContent: 20});
scrollbar_2.init();
document.getElementById('navLeft').dataset.always = 'small';

const filterElement = {};
const panelTableFfilterContent = document.getElementsByClassName('panelTable-filter-content')[0];
for (const label of panelTableFfilterContent.children) {
    filterElement[label.getAttribute('for')] = label.querySelector('#'+label.getAttribute('for'));
}

/**
 * 
 * @param {String} type 
 * @param {String} table 
 * @param {String} id 
 * @param {String} row 
 */
function deleteRow(type, table, id, row) {
    const datas = new FormData();
    datas.append('deleteID', id);
    datas.append('type', 'delete');
    
    var requete = $.ajax({
        type: 'POST',
        url: 'tables/?type='+type+'&name='+table,
        data: datas,
        timeout: 120000, //2 Minutes
        contentType: false,
        processData: false
    });
    requete.done((response) => {
        row.remove();
        scrollbar_2.refresh();
    });
    requete.fail(() => {
        alert('Impossible de supprimer la ligne');
    });
}

function filter() {
    const table_rows = scrollbar_2.sbContent.querySelectorAll('.table-row-info');
    
    for (const table_row of table_rows) {
        const divs = table_row.querySelectorAll('div');
        
        for (const div of divs) {
            if (filterElement[div.dataset.label].localName == 'select') {
                if ((div.textContent.toLocaleLowerCase() == filterElement[div.dataset.label].value.toLocaleLowerCase()) || filterElement[div.dataset.label].value == '') {
                    table_row.parentElement.style.display = 'flex';
                } else {
                    table_row.parentElement.style.display = 'none';
                    break;
                }
            } else {
                if (div.textContent.toLocaleLowerCase().includes(filterElement[div.dataset.label].value.toLocaleLowerCase())) {
                    table_row.parentElement.style.display = 'flex';
                } else {
                    table_row.parentElement.style.display = 'none';
                    break;
                }
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