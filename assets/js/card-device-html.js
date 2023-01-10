function card_device_html(device) {
    return `<div class='card card-device'>
        <div class='card-head'>
            <div class="card-device-profil">
                <img src="" alt="" height="60px" width="60px">
                <div class="text">
                    <div class="primary">${device['device_name']}</div>
                    <div class="secondary">Type d'équipement : ${device['type_name']}</div>
                </div>
            </div>
            <div class="btn-wrapper">
                <button class="btn btn-turn-on" type="button">
                    <div class="text">
                        <span class="primary">Allumer</span>
                    </div>
                    <div class="hover"></div>
                </button>
                <a href="/devices/${device['id_device']}/edit" class="btn btn-edit" type="button">
                    <div class="text">
                        <span class="primary">Modifier</span>
                    </div>
                    <div class="hover"></div>
                </a>
                <button class="btn btn-delete" type="button">
                    <div class="icon-container">
                        <i class="icon" style="background-image: url('http://projetbdd/assets/image/bin.png');background-position: 0px 0px; background-size: 20px 20px;"></i>
                    </div>
                    <div class="hover"></div>
                </button>
            </div>
        </div>
        <div class="card-content">
            <div class="device-info-row">
                <div class="icon-container">
                    <i class="icon" style="background-image: url('http://projetbdd/assets/image/localisation.png');background-position: 0px 0px; background-size: auto;"></i>
                </div>
                <div class="text">
                    <span class="secondary">${device['room_name']}</span>
                    <span class="secondary">${device['description_place']}</span>
                </div>
            </div>
            <div class="device-info-row">
                <div class="icon-container">
                    <i class="icon"></i>
                </div>
                <div class="text">
                    <span class="secondary">Consomation : 60 W/h</span>
                </div>
            </div>
            <div class="device-info-row">
                <div class="icon-container">
                    <i class="icon"></i>
                </div>
                <div class="text">
                    <span class="secondary">Emission : 10g CO2/h</span>
                </div>
            </div>
        </div>
    </div>`;
}
