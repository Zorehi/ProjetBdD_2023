<?php include ROOT."/Views/aparts/panelManage.php"; ?>

<div class="globalContainer">
    <div class="scrollbar-container" id="scrollbar-apart-edit">
        <div class="card-wrapper scrollbar-content" data-transition="yes">
            <div class="card house_edit">
                <div class="card-head">
                    <span class="card-head-title">Configurer l'appartement</span>
                </div>
                <div class="card-content">
                    <form action="" method="POST" class="card-edit">
                        <ul>
                            <li class="card-edit-row">
                                <div class="card-edit-content" data-index="0">
                                    <span class="card-edit-content-title">Numéro de l'appartement</span>
                                    <div class="image-container" onclick="onClickModify(this.parentElement)">
                                        <i class="image"></i>
                                    </div>
                                </div>
                                <div class="card-edit-content" data-index="1">
                                    <span class="card-edit-content-title">Numéro de l'appartement</span>
                                    <div class="card-edit-list-input">
                                        <label for="num" class="form-label-input" data-status="empty">
                                            <span>Numéro</span>
                                            <input type="text" id="num" name="num" onchange="onChangeEvent(this)" value="<?= $apart->getNum() ?>">
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
                                    <span class="card-edit-content-title">Nombre d'habitant</span>
                                    <div class="image-container" onclick="onClickModify(this.parentElement)">
                                        <i class="image"></i>
                                    </div>
                                </div>
                                <div class="card-edit-content" data-index="1">
                                    <span class="card-edit-content-title">Nombre d'habitant</span>
                                    <div class="card-edit-list-input">
                                        <label for="hab" class="form-label-input" data-status="empty">
                                            <span>Nombre d'habitant</span>
                                            <input type="text" id="hab" name="hab" onchange="onChangeEvent(this)" value="<?= $apart->getHab() ?>">
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
                                <!-- <div class="card-separator"></div> -->
                                <div class="card-separator"></div>
                            </li>
                            <li class="card-edit-row">
                            <div class="card-edit-content" data-index="0">
                                    <span class="card-edit-content-title">Degré de Sécurité</span>
                                    <div class="image-container" onclick="onClickModify(this.parentElement)">
                                        <i class="image"></i>
                                    </div>
                                </div>
                                <div class="card-edit-content" data-index="1">
                                    <span class="card-edit-content-title">Degré de sécurité</span>
                                    <div class="card-edit-list-input">
                                        <label for="num" class="form-label-input" data-status="empty">
                                            <span>Degré de sécurité</span>
                                            <input type="text" id="id_security_degree" name="id_security_degree" onchange="onChangeEvent(this)" value="<?= $apart->getId_security_degree() ?>">
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
        id_to_select.onclick = () => { return false };
    }

    const scrollbar_manage_apart = new ScrollBar(document.getElementById('scrollbar-manage-apart'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_manage_apart.init();

    const scrollbar_apart_edit = new ScrollBar(document.getElementById('scrollbar-apart-edit'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_apart_edit.init();
    
    const edit_apart = document.getElementById('edit_apart');
    edit_apart.dataset.status = 'selected';
    edit_apart.onclick = () => { return false };

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
        scrollbar_manage_apart.refresh();
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
    }

    function onClickCancel(element) {
        element.parentElement.dataset.status = '';
    }

</script>