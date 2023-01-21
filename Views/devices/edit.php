<?php include ROOT."/Views/devices/panelManage.php"; ?>

<div class="globalContainer">
    <div class="scrollbar-container" id="scrollbar-device-edit">
        <div class="card-wrapper scrollbar-content" data-transition="yes">
            <div class="card house_edit">
                <div class="card-head">
                    <span class="card-head-title">Configurer l'appareil</span>
                </div>
                <div class="card-content">
                    <form action="" method="POST" class="card-edit">
                        <ul>
                            <li class="card-edit-row">
                                <div class="card-edit-content" data-index="0">
                                    <span class="card-edit-content-title">Nom de l'appareil</span>
                                    <div class="image-container" onclick="onClickModify(this.parentElement)">
                                        <i class="image"></i>
                                    </div>
                                </div>
                                <div class="card-edit-content" data-index="1">
                                    <span class="card-edit-content-title">Nom de l'appareil</span>
                                    <div class="card-edit-list-input">
                                        <label for="device_name" class="form-label-input" data-status="empty">
                                            <span>Nom</span>
                                            <input type="text" id="device_name" name="device_name" onchange="onChangeEvent(this)" value="<?= $device->getDevice_name() ?>">
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
                                    <span class="card-edit-content-title">Description de l'appareil</span>
                                    <div class="image-container" onclick="onClickModify(this.parentElement)">
                                        <i class="image"></i>
                                    </div>
                                </div>
                                <div class="card-edit-content" data-index="1">
                                    <span class="card-edit-content-title">Description de l'appareil</span>
                                    <div class="card-edit-list-input">
                                        <label for="description_device" class="form-label-input" data-status="empty">
                                            <span>Description</span>
                                            <input type="text" id="description_device" name="description_device" maxlength="50" onchange="onChangeEvent(this)" value="<?= $device->getDescription_device() ?>">
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
                                        <span class="card-edit-content-title">Position de l'appareil</span>
                                        <div class="image-container" onclick="onClickModify(this.parentElement)">
                                            <i class="image"></i>
                                        </div>
                                </div>
                                <div class="card-edit-content" data-index="1">
                                    <span class="card-edit-content-title">Position de l'appareil</span>
                                    <div class="card-edit-list-input">
                                        <label for="num" class="form-label-input" data-status="empty">
                                            <span>Position de l'appareil</span>
                                            <input type="text" id="description_place" name="description_place" maxlength="30" onchange="onChangeEvent(this)" value="<?= $device->getDescription_place() ?>">
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
                        <?php foreach($array_cons as $value) {?>
                            <li class="card-edit-row">
                                <div class="card-edit-content" data-index="0">
                                    <span class="card-edit-content-title">Consommation par heure de <?= $res->findbyID($value['id_resource'])["name"]?></span>
                                    <div class="image-container" onclick="onClickModify(this.parentElement)">
                                        <i class="image"></i>
                                    </div>
                                </div>
                                <div class="card-edit-content" data-index="1">
                                    <span class="card-edit-content-title">Consommation par heure de <?= $res->findbyID($value['id_resource'])["name"]?></span>
                                    <div class="card-edit-list-input">
                                        <label for="consumption" class="form-label-input" data-status="empty">
                                            <span>Consommation</span>
                                            <input type="text" id="consumption" name="consumption[<?= $value["id_resource"]?>]" onchange="onChangeEvent(this)" value="<?= $value["consumption_per_hour"] ?>">
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
                        <?php } foreach($array_emis as $value) {?>
                            <li class="card-edit-row">
                                <div class="card-edit-content" data-index="0">
                                    <span class="card-edit-content-title">Emission par heure de <?= $sub->findbyID($value['id_substance'])["name"]?></span>
                                    <div class="image-container" onclick="onClickModify(this.parentElement)">
                                        <i class="image"></i>
                                    </div>
                                </div>
                                <div class="card-edit-content" data-index="1">
                                    <span class="card-edit-content-title">Emission par heure de <?= $sub->findbyID($value['id_substance'])["name"]?></span>
                                    <div class="card-edit-list-input">
                                        <label for="emission" class="form-label-input" data-status="empty">
                                            <span>Emission</span>
                                            <input type="text" id="emission" name="emission[<?= $value["id_substance"]?>]" onchange="onChangeEvent(this)" value="<?= $value["emission_per_hour"] ?>">
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
                        <?php } ?>
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
    const scrollbar_manage_device = new ScrollBar(document.getElementById('scrollbar-manage-device'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_manage_device.init();

    const scrollbar_device_edit = new ScrollBar(document.getElementById('scrollbar-device-edit'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_device_edit.init();
    
    const edit_device = document.getElementById('edit_device');
    edit_device.dataset.status = 'selected';
    edit_device.onclick = () => { return false };

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
        scrollbar_manage_device.refresh();
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
        scrollbar_device_edit.refresh();
    }

    function onClickCancel(element) {
        element.parentElement.dataset.status = '';
        scrollbar_device_edit.refresh();
    }

</script>