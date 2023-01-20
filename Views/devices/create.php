<div class="panel-section panel-create">
    <div class="panel-section-title">
        <h1>Créer un appareil</h1>
    </div>
    <div class="panel-section-list">
        <form action="" id="form-add-devices" hidden></form>
        <form class="create-form" id="create-device" action="" method="POST">
            <div class="create-label-wrapper" data-status="active">
                <div class="create-label-list scrollbar-container" id="scrollbar-devices-create">
                    <div class="scrollbar-content" data-transition="yes">
                        <label for="device_name" class="form-label-input" data-status="empty">
                            <span>Nom de l'appareil</span>
                            <input type="text" id="device_name" name="device_name" onchange="onChangeEvent(this)" required>
                        </label>
                        <label for="description_device" class="form-label-input" data-status="empty">
                            <span>Description de l'appareil</span>
                            <input type="text" id="description_device" name="description_device" maxlength="50"  onchange="onChangeEvent(this)" required>
                        </label>
                        <label for="description_place" class="form-label-input" data-status="empty">
                            <span>Lieu où se trouve l'appareil</span>
                            <input type="text" id="description_place" name="description_place" maxlength="30" onchange="onChangeEvent(this)" required>
                        </label>
                        <label for="id_room" class="form-label-input select" data-status="empty">
                            <span>Piece où se trouve l'appareil</span>
                            <select id="id_room" name="id_room" onchange="onChangeEvent(this)" required>
                            <?php foreach ($room->findBy(["id_apartment"=>$id]) as $value) { ?>
                                <option value="<?= $value['id_room'] ?>"><?= $value['room_name'] ?></option>
                            <?php } ?>
                            </select>
                        </label>
                        <label for="id_device_type" class="form-label-input select" data-status="empty">
                            <span>Type d'appareil</span>
                            <select id="id_device_type" name="id_device_type" onchange="onChangeEvent(this)" required>
                            <?php foreach ($device_type->findAll() as $value) { ?>
                                <option value="<?= $value['id_device_type'] ?>"><?= $value['type_name'] ?></option>
                            <?php } ?>
                            </select>
                        </label>
                        <div id="form-resources-substances">

                        </div>
                    </div>
                    <div class="scrollbar-track"></div>
                    <div class="scrollbar-thumb" data-transition="yes" draggable="false" ondragstart="return false;">
                        <div></div>
                    </div>
                </div>
            </div>
            <div class="create-btn-container">
                <button id="create-btn-devices" class="create-btn">
                    <span>Créer</span>
                    <div class="hover"></div>
                </button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    document.getElementById('navLeft').dataset.always = 'small';
    
    const scrollbar_devices_create = new ScrollBar(document.getElementById('scrollbar-devices-create'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_devices_create.init();
    
    const create_device = document.getElementById('create-device');
    const select_array = create_device.querySelectorAll('select');
    for (const select of select_array) {
        select.value = '';

    }
    
    function onChangeEvent(element) {
        if (element.value != "") {
            element.parentElement.dataset.status = 'not-empty';
        } else {
            element.parentElement.dataset.status = 'empty';
        }
    }

    const id_device_type_select = document.getElementById('id_device_type');
    id_device_type_select.addEventListener('change', (event) => {
        retrieveInfo(id_device_type_select.value);
    });
    const form_resources_substances = scrollbar_devices_create.sbContent.querySelector('#form-resources-substances');

    function retrieveInfo(id_device_type) {
        // url à demandé à Cyril
        const url = `devices/retrieveResSub/`;
        $.ajax({
            type: 'GET',
            url: url,
            data: {
                'id_device_type': id_device_type
            },
            timeout: 120000, //2 Minutes
            dataType: 'json'
        })
        .done((response) => {
            form_resources_substances.innerHTML = '';
            for(const value of response.resources){
                form_resources_substances.innerHTML += display(value, 'id_resource');
            }
            for(const value of response.substances){
                form_resources_substances.innerHTML += display(value, 'id_substance');
            }
            scrollbar_devices_create.refresh();
        })
        .fail((error) => {
            alert('Erreur lors de la récupératioini des ressources et substances du type d\'appareil');
        });
    }



    function display(line, id_name) {
        return `<label for="${line['name']}" class="form-label-input" data-status="empty">
                    <span>${id_name == 'id_resource' ? 'Consommation' : 'Emission'} par heure : ${line['name']}</span>
                    <input type="text" id="${line['name']}" name="${id_name == 'id_resource' ? 'consumption_resources' : 'emission_substances'}[${line[id_name]}]" onchange="onChangeEvent(this)" required>
                </label>`;
    }
</script>