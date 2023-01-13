<div class="panel-section panel-create">
    <div class="panel-section-title">
        <h1>Créer un appartement</h1>
    </div>
    <div class="panel-section-list">
        <form action="" id="form-add-room" hidden></form>
        <form class="create-form" id="create-device" action="" method="POST">
            <div class="create-label-wrapper" data-status="active">
                <div class="create-label-list scrollbar-container" id="scrollbar-devices-create">
                    <div class="scrollbar-content" data-transition="yes">
                        <label for="num" class="form-label-input" data-status="empty">
                            <span>Numéro d'appartement</span>
                            <input type="text" id="num" name="num" onchange="onChangeEvent(this)" required>
                        </label>
                        <label for="citizen_degree" class="form-label-input" data-status="empty">
                            <span>Degré de citoyenneté</span>
                            <input type="text" id="citizen_degree" name="citizen_degree" onchange="onChangeEvent(this)" required>
                        </label>
                        <label for="hab" class="form-label-input" data-status="empty">
                            <span>Nombre d'habitant</span>
                            <input type="text" id="hab" name="hab" onchange="onChangeEvent(this)" required>
                        </label>
                        <label for="id_device_type" class="form-label-input select" data-status="empty">
                            <span>Degré de sécurité</span>
                            <select id="id_device_type" name="id_device_type" onchange="onChangeEvent(this)" required>
                            <?php foreach ($device_type->findAll() as $value) { ?>
                                <option value="<?= $value['id_device_type'] ?>"><?= $value['type_name'] ?></option>
                            <?php } ?>
                            </select>
                        </label>
                    </div>
                    <div class="scrollbar-track"></div>
                    <div class="scrollbar-thumb" data-transition="yes" draggable="false" ondragstart="return false;">
                        <div></div>
                    </div>
                </div>
            </div>
            <div class="create-btn-container">
                <button type="button" id="create-btn-apart" class="create-btn">
                    <span>Suivant</span>
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
    
    const create_apart = document.getElementById('create-device');
    const select_array = create_apart.querySelectorAll('select');
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


</script>