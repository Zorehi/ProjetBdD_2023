<?php include ROOT."/Views/aparts/panelManage.php"; ?>

<div class="globalContainer">
    <div class="panelTopFilter">
        <div>
            <div class="panelTopFilter-head">
                <div class="panelTopFilter-head-title">
                    <span class="primary">Équipement de l'appartement<span class="secondary"> · Aucun résultat</span></span>
                </div>
            </div>
            <div class="panelTopFilter-searchBy">
                <label class="panelTopFilter_search" for="search_device">
                    <div class="icon-search-container">
                        <svg fill="currentColor" class="icon-search" viewBox="0 0 16 16" width="1em" height="1em">
                            <g fill-rule="evenodd" transform="translate(-448 -544)">
                                <g fill-rule="nonzero">
                                    <path d="M10.743 2.257a6 6 0 1 1-8.485 8.486 6 6 0 0 1 8.485-8.486zm-1.06 1.06a4.5 4.5 0 1 0-6.365 6.364 4.5 4.5 0 0 0 6.364-6.363z" transform="translate(448 544)"></path>
                                    <path d="M10.39 8.75a2.94 2.94 0 0 0-.199.432c-.155.417-.23.849-.172 1.284.055.415.232.794.54 1.103a.75.75 0 0 0 1.112-1.004l-.051-.057a.39.39 0 0 1-.114-.24c-.021-.155.014-.356.09-.563.031-.081.06-.145.08-.182l.012-.022a.75.75 0 1 0-1.299-.752z" transform="translate(448 544)"></path>
                                    <path d="M9.557 11.659c.038-.018.09-.04.15-.064.207-.077.408-.112.562-.092.08.01.143.034.198.077l.041.036a.75.75 0 0 0 1.06-1.06 1.881 1.881 0 0 0-1.103-.54c-.435-.058-.867.018-1.284.175-.189.07-.336.143-.433.2a.75.75 0 0 0 .624 1.356l.066-.027.12-.061z" transform="translate(448 544)"></path>
                                    <path d="m13.463 15.142-.04-.044-3.574-4.192c-.599-.703.355-1.656 1.058-1.057l4.191 3.574.044.04c.058.059.122.137.182.24.249.425.249.96-.154 1.41l-.057.057c-.45.403-.986.403-1.411.154a1.182 1.182 0 0 1-.24-.182zm.617-.616.444-.444a.31.31 0 0 0-.063-.052c-.093-.055-.263-.055-.35.024l.208.232.207-.206.006.007-.22.257-.026-.024.033-.034.025.027-.257.22-.007-.007zm-.027-.415c-.078.088-.078.257-.023.35a.31.31 0 0 0 .051.063l.205-.204-.233-.209z" transform="translate(448 544)"></path>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <input class="input_search" type="text" id="search_device" placeholder="Rechercher par nom d'équipement" value="<?= $search ?>">
                </label>
                <div class="select-made-in-myself select">
                    <div class="select button">
                        <input data-for="select_value" type="hidden" name="order-by">
                        <span class="text primary"></span>
                        <i class="icon" style="background-image: url('http://projetbdd/assets/image/select-made-by-myself.png'); background-position: -0px -20px; background-size: auto; width: 16px; height: 16px; background-repeat: no-repeat; display: inline-block;"></i>
                        <div class="hover"></div>
                    </div>
                    <div class="pop-up-select" data-status="hidden">
                        <div class="option button show-select" data-value="ASC">
                            <span class="text primary">Ordre alphabétique</span>
                            <div class="hover"></div>
                        </div>
                        <div class="option button show-select" data-value="DSC">
                            <span class="text primary">Ordre alphabétique inversé</span>
                            <div class="hover"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panelTopFilter-filterBy">
                <div class="select-made-in-myself filter">
                    <div class="select button">
                        <input data-for="select_value" type="hidden" name="id_room">
                        <span class="text primary">Pièce</span>
                        <i class="icon" style="background-image: url('http://projetbdd/assets/image/select-made-by-myself.png'); background-position: -0px -20px; background-size: auto; width: 16px; height: 16px; background-repeat: no-repeat; display: inline-block;"></i>
                        <div class="hover"></div>
                    </div>
                    <div class="pop-up-select" data-status="hidden">
                    <?php foreach ($room->findBy(['id_apartment' => $apart->getId_apartment()]) as $value) { ?>
                        <div class="option button show-select" data-value="<?= $value['id_room'] ?>">
                            <span class="text primary"><?= $value['room_name'] ?></span>
                            <div class="hover"></div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="select-made-in-myself filter">
                    <div class="select button">
                        <input data-for="select_value" id="ok" type="hidden" name="id_device_type">
                        <span class="text primary">Type d'équipement</span>
                        <i class="icon" style="background-image: url('http://projetbdd/assets/image/select-made-by-myself.png'); background-position: -0px -20px; background-size: auto; width: 16px; height: 16px; background-repeat: no-repeat; display: inline-block;"></i>
                        <div class="hover"></div>
                    </div>
                    <div class="pop-up-select" data-status="hidden">
                    <?php foreach ($device_type->findAll() as $value) { ?>
                        <div class="option button show-select" data-value="<?= $value['id_device_type'] ?>">
                            <span class="text primary"><?= $value['type_name'] ?></span>
                            <div class="hover"></div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="select-made-in-myself filter">
                    <div class="select button">
                        <input data-for="select_value" type="hidden" name="substances_ressources">
                        <span class="text primary">Substances ou Ressources</span>
                        <i class="icon" style="background-image: url('http://projetbdd/assets/image/select-made-by-myself.png'); background-position: -0px -20px; background-size: auto; width: 16px; height: 16px; background-repeat: no-repeat; display: inline-block;"></i>
                        <div class="hover"></div>
                    </div>
                    <div class="pop-up-select" data-status="hidden">
                        <div class="option button show-select" data-value="substance">
                            <span class="text primary">Substances</span>
                            <div class="hover"></div>
                        </div>
                        <div class="option button show-select" data-value="resource">
                            <span class="text primary">Ressources</span>
                            <div class="hover"></div>
                        </div>
                    <?php foreach ($substance->findAll() as $value) { ?>
                        <div class="option button show-select" data-value="<?= "substance-".$value['id_substance'] ?>">
                            <span class="text primary"><?= $value['name'] ?></span>
                            <div class="hover"></div>
                        </div>
                    <?php } foreach ($ressource->findAll() as $value) { ?>
                        <div class="option button show-select" data-value="<?= "resource-".$value['id_resource'] ?>">
                            <span class="text primary"><?= $value['name'] ?></span>
                            <div class="hover"></div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="apart_devices">
        <div class="scrollbar-container" id="scrollbar-apart-devices">
            <div class="card-wrapper scrollbar-content" data-transition="yes">
                <div class="card card-device">

                </div>
            </div>
            <div class="scrollbar-track"></div>
            <div class="scrollbar-thumb" data-transition="yes" draggable="false" ondragstart="return false;">
                <div></div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/Select.js"></script>
<script text="text/javascript">
    document.getElementById('navLeft').dataset.always = 'small';
    const scrollbar_manage_apart = new ScrollBar(document.getElementById('scrollbar-manage-apart'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_manage_apart.init();

    const select = document.querySelector('.select-made-in-myself.select');
    new Select(select, 'select', <?= $init['order_by'] ?>);

    const filter_array = document.querySelectorAll('.select-made-in-myself.filter');
    for (const filter of filter_array) {
        const select = new Select(filter, 'filter');
        console.log(select.input.getAttribute('name'));
        switch (select.input.getAttribute('name')) {
            case 'id_room':
                const value = <?= $init['id_room'] ?>;
                if (value) select.setSelectedValue(value);
                break;
        
            default:
                break;
        }
    }

    const scrollbar_apart_edit = new ScrollBar(document.getElementById('scrollbar-apart-devices'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_apart_edit.init();
    
    const edit_apart = document.getElementById('apart_devices');
    edit_apart.dataset.status = 'selected';
    edit_apart.onclick = () => { return false };

    function onClickDropDown(element) {
        if (element.dataset.status == 'hidden') {
            element.dataset.status = 'shown';
        } else {
            element.dataset.status = 'hidden';
        }
        scrollbar_manage_apart.refresh();
    }
    
    const order_by = document.querySelector('input[name="order-by"]');
    const id_room = document.querySelector('input[name="id_room"]');
    const search_device = document.getElementById('search_device');

    search_device.addEventListener('keyup', (event) => {
        if (event.key == 'Enter') {
            history.replaceState(null, '', `aparts/<?= $apart->getId_apartment() ?>/apart_devices/?order_by=${order_by.value}&id_room=${id_room.value}&search=${search_device.value}`);

            var requete = $.ajax({
                type: 'GET',
                url: 'tables/?type='+type+'&tablename='+table,
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
    })
    
    const onFilterChange = () => {
        history.replaceState(null, '', `aparts/<?= $apart->getId_apartment() ?>/apart_devices/?order_by=${order_by.value}&id_room=${id_room.value}&search=<?= $search ?>`);
    }
    
    order_by.addEventListener('change', onFilterChange);
    id_room.addEventListener('change', onFilterChange);


</script>