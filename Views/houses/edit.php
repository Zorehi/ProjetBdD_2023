<?php include ROOT . "/Views/houses/panelManage.php"; ?>

<div class="globalContainer">
    <div class="scrollbar-container" id="scrollbar-house-edit">
        <div class="card-wrapper scrollbar-content" data-transition="yes">
            <div class="card house_edit">
                <div class="card-head">
                    <span class="card-head-title">Configurer la maison</span>
                </div>
                <div class="card-content">
                    <form action="" method="POST" class="card-edit">
                        <ul>
                            <li class="card-edit-row">
                                <div class="card-edit-content" data-index="0">
                                    <span class="card-edit-content-title">Nom de la maison</span>
                                    <div class="image-container" onclick="onClickModify(this.parentElement)">
                                        <i class="image"></i>
                                    </div>
                                </div>
                                <div class="card-edit-content" data-index="1">
                                    <span class="card-edit-content-title">Nom de la maison</span>
                                    <div class="card-edit-list-input">
                                        <label for="house_name" class="form-label-input" data-status="empty">
                                            <span>Nom</span>
                                            <input type="text" id="house_name" name="house_name" onchange="onChangeEvent(this)" value="<?= $house->getHouse_name() ?>">
                                        </label>
                                    </div>
                                    <div class="card-edit-btn-container">
                                        <button type="button" class="btn-cancel" onclick="onClickCancel(this.parentElement.parentElement)">Annuler</button>
                                        <button class="btn-confirm">
                                            <span>Confirmer</span>
                                            <div class="hover"></div>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-separator"></div>
                            </li>
                            <li class="card-edit-row">
                                <div class="card-edit-content" data-index="0">
                                    <span class="card-edit-content-title">Degrée d'isolation</span>
                                    <div class="image-container" onclick="onClickModify(this.parentElement)">
                                        <i class="image"></i>
                                    </div>
                                </div>
                                <div class="card-edit-content" data-index="1">
                                    <span class="card-edit-content-title">Degrée d'isolation</span>
                                    <div class="card-edit-list-input">
                                        <label for="isolation_degree" class="form-label-input" data-status="empty">
                                            <span>Degrée</span>
                                            <input type="text" id="isolation_degree" name="isolation_degree" onchange="onChangeEvent(this)" value="<?= $house->getIsolation_degree() ?>">
                                        </label>
                                    </div>
                                    <div class="card-edit-btn-container">
                                        <button type="button" class="btn-cancel" onclick="onClickCancel(this.parentElement.parentElement)">Annuler</button>
                                        <button class="btn-confirm">
                                            <span>Confirmer</span>
                                            <div class="hover"></div>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-separator"></div>
                            </li>
                            <li class="card-edit-row">
                                <div class="card-edit-content" data-index="0">
                                    <span class="card-edit-content-title">Evaluation de base eco-immeuble</span>
                                    <div class="image-container" onclick="onClickModify(this.parentElement)">
                                        <i class="image"></i>
                                    </div>
                                </div>
                                <div class="card-edit-content" data-index="1">
                                    <span class="card-edit-content-title">Evaluation de base eco-immeuble</span>
                                    <div class="card-edit-list-input">
                                        <label for="eval_eco" class="form-label-input" data-status="empty">
                                            <span>Evaluation de base</span>
                                            <input type="text" id="eval_eco" name="eval_eco" onchange="onChangeEvent(this)" value="<?= $house->getEval_eco() ?>">
                                        </label>
                                    </div>
                                    <div class="card-edit-btn-container">
                                        <button type="button" class="btn-cancel" onclick="onClickCancel(this.parentElement.parentElement)">Annuler</button>
                                        <button class="btn-confirm">
                                            <span>Confirmer</span>
                                            <div class="hover"></div>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-separator"></div>
                            </li>
                            <li class="card-edit-row">
                                <div class="card-edit-content" data-index="0">
                                    <span class="card-edit-content-title">Degrée de citoyennetée</span>
                                    <div class="image-container" onclick="onClickModify(this.parentElement)">
                                        <i class="image"></i>
                                    </div>
                                </div>
                                <div class="card-edit-content" data-index="1">
                                    <span class="card-edit-content-title">Degrée de citoyennetée</span>
                                    <div class="card-edit-list-input">
                                        <label for="citizen_degree" class="form-label-input" data-status="empty">
                                            <span>Degrée</span>
                                            <input type="text" id="citizen_degree" name="citizen_degree" onchange="onChangeEvent(this)" value="<?= $house->getCitizen_degree() ?>">
                                        </label>
                                    </div>
                                    <div class="card-edit-btn-container">
                                        <button type="button" class="btn-cancel" onclick="onClickCancel(this.parentElement.parentElement)">Annuler</button>
                                        <button class="btn-confirm">
                                            <span>Confirmer</span>
                                            <div class="hover"></div>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-separator"></div>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
        <div class="scrollbar-track"></div>
        <div class="scrollbar-thumb" data-transition="yes" draggable="false" ondragstart="return false;">
            <div></div>
        </div>
    </div>
</div>

<script text="text/javascript">
    document.getElementById('navLeft').dataset.always = 'small';
    const id_to_select = document.getElementById(document.getElementById('id-to-select').value);
    if (id_to_select) {
        id_to_select.dataset.status = 'selected'
        id_to_select.onclick = () => {
            return false
        };
    }

    const scrollbar_manage_house = new ScrollBar(document.getElementById('scrollbar-manage-house'), {
        offsetContainer: -16,
        offsetContent: 0
    });
    scrollbar_manage_house.init();

    const scrollbar_house_edit = new ScrollBar(document.getElementById('scrollbar-house-edit'), {
        offsetContainer: -16,
        offsetContent: 0
    });
    scrollbar_house_edit.init();

    const edit_house = document.getElementById('edit_house');
    edit_house.dataset.status = 'selected';
    edit_house.onclick = () => {
        return false
    };

    const input_array = document.querySelectorAll('.form-label-input input');
    for (const input of input_array) {
        input.dispatchEvent(new Event('change'));
    }

    function onClickDropDown(element) {
        if (element.dataset.status == 'hidden') {
            element.dataset.status = 'shown';
        } else {
            element.dataset.status = 'hidden';
        }
        scrollbar_manage_house.refresh();
    }

    function onChangeEvent(element) {
        if (element.value != "") {
            element.parentElement.dataset.status = 'not-empty';
        } else {
            element.parentElement.dataset.status = 'empty';
        }
    }

    function onClickModify(element) {
        element.parentElement.dataset.status = 'modifying';
        scrollbar_house_edit.refresh();
    }

    function onClickCancel(element) {
        element.parentElement.dataset.status = '';
        scrollbar_house_edit.refresh();
    }
</script>