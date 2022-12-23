<?php include ROOT."/Views/houses/panelManage.php"; ?>

<div class="globalContainer">
    <div class="card">
        <div class="card-head">
            <span class="card-head-title"></span>
        </div>
        <div class="card-content">
            <ul class="card-edit">
                <li class="card-edit-row">
                    <div class="card-edit-content">
                        <span>Nom de la maison</span>
                    </div>
                    <div class="card-edit-wrapper">
                        <div class="card-edit-title">
                            <span>Nom de la maison</span>
                        </div>
                        <div class="card-edit-input">
                            <label for="house_name" class="create-label" data-status="empty">
                                <span>Nom</span>
                                <input type="text" id="house_name" name="house_name" onchange="onChangeEvent(this)">
                            </label>
                        </div>
                    </div>
                    <div class="card-separator"></div>
                </li>
                <li class="card-edit-row">
                    <div class="card-edit-content">
                        <span>Localisation</span>
                    </div>
                    <div class="card-edit-wrapper">
                        <div class="card-edit-title">
                            <span>Localisation</span>
                        </div>
                        <div class="card-edit-input">
                            <label for="house_number" class="create-label" data-status="empty">
                                <span>Numéro</span>
                                <input type="text" id="house_number" name="house_number" onchange="onChangeEvent(this)">
                            </label>
                            <label for="streer" class="create-label" data-status="empty">
                                <span>Rue</span>
                                <input type="text" id="streer" name="streer" onchange="onChangeEvent(this)">
                            </label>
                            <label for="city_name" class="create-label" data-status="empty">
                                <span>Ville</span>
                                <input type="text" id="city" name="city" onchange="onChangeEvent(this)">
                            </label>
                            <label for="postcode" class="create-label" data-status="empty">
                                <span>Code postal</span>
                                <input type="text" id="postcode" name="postcode" onchange="onChangeEvent(this)">
                            </label>
                        </div>
                    </div>
                    <div class="card-separator"></div>
                </li>
                <li class="card-edit-row">

                </li>
            </ul>
        </div>
    </div>
</div>

<script text="text/javascript">
    document.getElementById('navLeft').dataset.always = 'small';
    const manage_house = document.getElementById('manage-house');
    const scrollbarcontainer12 = document.getElementById('scrollbar-12');
    const scrollbar_12 = new ScrollBar(scrollbarcontainer12, { offsetContainer: -16, offsetContent: 0});
    scrollbar_12.init();
    
    const Home_house = document.getElementById('edit_house');
    Home_house.dataset.status = 'selected';

    function onClickDropDown(element) {
        if (element.dataset.status == 'hidden') {
            element.dataset.status = 'shown';
        } else {
            element.dataset.status = 'hidden';
        }
        scrollbar_12.refresh();
    }
</script>