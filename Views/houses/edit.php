<?php include ROOT."/Views/houses/panelManage.php"; ?>

<div class="globalContainer">
    <div class="scrollbar-container" id="scrollbar-house-edit">
        <div class="card-wrapper scrollbar-content" data-transition="yes">
            <div class="card">
                <div class="card-head">
                    <span class="card-head-title">Configurer la maison</span>
                </div>
                <div class="card-content">
                    <form action="" class="card-edit">
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
                                    <span class="card-edit-content-title">Localisation</span>
                                    <div class="image-container" onclick="onClickModify(this.parentElement)">
                                        <i class="image"></i>
                                    </div>
                                </div>
                                <div class="card-edit-content" data-index="1">
                                    <span class="card-edit-content-title">Localisation</span>
                                    <div class="card-edit-list-input">
                                        <label for="house_number" class="form-label-input" data-status="empty">
                                            <span>Numéro</span>
                                            <input type="text" id="house_number" name="house_number" onchange="onChangeEvent(this)" value="<?= $house->getHouse_number() ?>">
                                        </label>
                                        <label for="street" class="form-label-input" data-status="empty">
                                            <span>Rue</span>
                                            <input type="text" id="street" name="street" onchange="onChangeEvent(this)" value="<?= $house->getStreet() ?>">
                                        </label>
                                        <label for="city_name" class="form-label-input" data-status="empty">
                                            <span>Ville</span>
                                            <input type="text" id="city" name="city" onchange="onChangeEvent(this)" value="<?= $city->getCity_name() ?>">
                                        </label>
                                        <label for="postcode" class="form-label-input" data-status="empty">
                                            <span>Code postal</span>
                                            <input type="text" id="postcode" name="postcode" onchange="onChangeEvent(this)" value="<?= $city->getPostcode() ?>">
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
                            </li>
                            <li class="card-edit-row">
            
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
    const manage_house = document.getElementById('manage-house');
    const scrollbarcontainer12 = document.getElementById('scrollbar-12');
    const scrollbar_12 = new ScrollBar(scrollbarcontainer12, { offsetContainer: -16, offsetContent: 0});
    scrollbar_12.init();

    const scrollbar_house_edit = new ScrollBar(document.getElementById('scrollbar-house-edit'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_house_edit.init();
    
    const Home_house = document.getElementById('edit_house');
    Home_house.dataset.status = 'selected';

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
        scrollbar_12.refresh();
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