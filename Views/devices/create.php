<div class="panel-section panel-create">
    <div class="panel-section-title">
        <h1>Créer un appartement</h1>
    </div>
    <div class="panel-section-list">
        <form action="" id="form-add-room" hidden></form>
        <form class="create-form" id="create-appart" action="" method="POST">
            <div class="create-label-wrapper" data-status="active">
                <div class="create-label-list scrollbar-container" id="scrollbar-10">
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
                        <label for="id_security_degree" class="form-label-input select" data-status="empty">
                            <span>Degré de sécurité</span>
                            <select id="id_security_degree" name="id_security_degree" onchange="onChangeEvent(this)" required>
                            <?php foreach ($security_degree->findAll() as $value) { ?>
                                <option value="<?= $value['id_security_degree'] ?>"><?= $value['description'] ?></option>
                            <?php } ?>
                            </select>
                        </label>
                        <label for="id_apartment_type" class="form-label-input select" data-status="empty">
                            <span>Type d'appartement</span>
                            <select id="id_apartment_type" name="id_apartment_type" onchange="onChangeEvent(this)" required>
                            <?php foreach ($apartment_type->findAll() as $value) { ?>
                                <option value="<?= $value['id_apartment_type'] ?>"><?= $value['description'] ?></option>
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
            <div class="create-label-wrapper padding" data-status="after">
                <label for="id_room_type" class="form-label-input select" data-status="empty">
                    <span>Type de pièce</span>
                    <select form="form-add-room" id="id_room_type" name="id_room_type" onchange="onChangeEvent(this)" required>
                    <?php foreach ($room_type->findAll() as $value) { ?>
                        <option value="<?= $value['id_room_type'] ?>"><?= $value['description'] ?></option>
                    <?php } ?>
                    </select>
                </label>
                <label for="room_name" class="form-label-input" data-status="empty">
                    <span>Nom de la pièce</span>
                    <input form="form-add-room" type="text" id="room_name" name="room_name" onchange="onChangeEvent(this)" required>
                </label>
                <div class="create-btn-container">
                    <button type="button" id="btn-add-room" class="create-btn">
                        <span>Ajouter cette pièce</span>
                        <div class="hover"></div>
                    </button>
                </div>
                <div class="panel-section-separator"></div>
                <fieldset class="list-container" id="list-room">
                    <legend>Pièces pour cette appartement</legend>
                    <div class="scrollbar-container" id="scrollbar-11">
                        <div class="scrollbar-content" data-transition="yes">
                            <!-- Ne pas supprimer -->
                        </div>
                        <div class="scrollbar-track"></div>
                        <div class="scrollbar-thumb" data-transition="yes" draggable="false" ondragstart="return false;">
                            <div></div>
                        </div>
                    </div>
                </fieldset>
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
   // const scrollbarContainer11 = document.getElementById('scrollbar-11');
    //const scrollbar_11 = new ScrollBar(scrollbarContainer11, { offsetContainer: -16, offsetContent: 0});
   // scrollbar_11.init();
    
    const create_apart = document.getElementById('create-appart');
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