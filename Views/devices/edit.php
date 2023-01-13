<?php include ROOT."/Views/devices/panelManage.php"; ?>

<div class="globalContainer">
    <div class="scrollbar-container" id="scrollbar-apart-edit">
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
                                            <input type="text" id="description_device" name="description_device" onchange="onChangeEvent(this)" value="<?= $device->getDescription_device() ?>">
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
                                            <input type="text" id="description_place" name="description_place" onchange="onChangeEvent(this)" value="<?= $device->getDescription_place() ?>">
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