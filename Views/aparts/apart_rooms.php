<?php include ROOT . "/Views/aparts/panelManage.php"; ?>

<div class="globalContainer">
    <div class="scrollbar-container" id="scrollbar-apart-rooms">
        <div class="card-wrapper scrollbar-content" data-transition="yes">
            <?php foreach ($tableroom as $value) { ?>
                <div class="card">
                    <div class="card-head">
                        <div class="card-head-profil">
                            <div class="image-container">
                                <img class="image" src="assets/image/user-default-photo.png" alt="">
                                <div class="hover"></div>
                            </div>
                            <div class="text">
                                <span class="primary">Vous</span>
                                <span class="secondary">
                                    <a data-infobulle="<?= date('d-m-Y')?>">Aujourd'hui</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-content-text">
                            <span class="primary">Ajout de la pièce <?= $value['room_name'] ?> pour cet appartement</span>
                        </div>
                        <div class="card-content-image">
                            <img src="assets/image/<?= $value['image_url'] ?>" alt="">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="scrollbar-track"></div>
        <div class="scrollbar-thumb" data-transition="yes" draggable="false" ondragstart="return false;">
            <div></div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.2/color-thief.umd.min.js"></script>
<script text="text/javascript">
    document.getElementById('navLeft').dataset.always = 'small';
    const id_to_select = document.getElementById(document.getElementById('id-to-select').value);
    if (id_to_select) {
        id_to_select.dataset.status = 'selected'
        id_to_select.onclick = () => { return false };
    }
    
    const scrollbar_manage_apart = new ScrollBar(document.getElementById('scrollbar-manage-apart'), {
        offsetContainer: -16,
        offsetContent: 0
    });
    scrollbar_manage_apart.init();

    const scrollbar_apart_rooms = new ScrollBar(document.getElementById('scrollbar-apart-rooms'), {
        offsetContainer: -16,
        offsetContent: 0
    });
    scrollbar_apart_rooms.init();

    const apart_rooms = document.getElementById('apart_rooms');
    apart_rooms.dataset.status = 'selected';
    apart_rooms.onclick = () => {
        return false
    };

    function onClickDropDown(element) {
        if (element.dataset.status == 'hidden') {
            element.dataset.status = 'shown';
        } else {
            element.dataset.status = 'hidden';
        }
        scrollbar_manage_apart.refresh();
    }

    const img_array = document.querySelectorAll('.card-content-image img');
    const colorThief = new ColorThief();
    for (const img of img_array) {
        if (img.clientWidth != img.parentElement.clientWidth) {
            img.onload = function () {
                if (img.clientWidth != img.parentElement.clientWidth) {
                    const color = colorThief.getColor(this);
                    this.parentElement.style.backgroundColor = `rgb(${color.join(', ')})`;
                }
                scrollbar_apart_rooms.refresh();
            }
            if (img.complete) {
                img.dispatchEvent(new Event('load'));
            }
        }
    }

    function make_tenant(id_apartment) {
        const url = `aparts/make_tenant`;
        const datas = new FormData();
        datas.append('id_apartment', id_apartment);

        $.ajax({
            type: 'POST',
            url: url,
            data: datas,
            timeout: 120000, //2 Minutes
            contentType: false,
            processData: false
        })
        .done(() => {
            document.location.href = '/aparts/'+id_apartment;
        })
        .fail((error) => {
            alert('Impossible de devenir locataire sur cette appartement');
        });
    }

</script>