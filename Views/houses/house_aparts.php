<?php include ROOT."/Views/houses/panelManage.php"; ?>

<div class="globalContainer">
    <div class="scrollbar-container" id="scrollbar-house-aparts">
        <div class="card-wrapper scrollbar-content" data-transition="yes">
        <?php foreach($apartAll as $value) { 
            $tenantArray = $tenant->findByIdApartment($value['id_apartment']);
            if ($tenantArray) {
                $usersArray = $users->findById($tenantArray['id_users']);
            } else {
                $usersArray = null;
            }
        ?>
            <div class="card">
                <div class="card-head">
                    <div class="card-head-profil">
                        <a href="#" class="image-container">
                            <img class="image" src="assets/image/user-default-photo.png" alt="">
                            <div class="hover"></div>
                        </a>
                        <div class="text">
                            <a href="" class="primary"><?= $usersArray ? $usersArray['firstname'].' '.$usersArray['lastname'] : 'Personne' ?></a>
                        <?php if ($tenantArray) {
                            $fmt = IntlDateFormatter::create(
                                Locale::getDefault(),
                                IntlDateFormatter::FULL,
                                IntlDateFormatter::FULL,
                                date_default_timezone_get(),
                                IntlDateFormatter::GREGORIAN,
                                'eeee d MMMM y');
                            $date = new DateTime($tenantArray['from_date']);
                        ?>
                            <a class="secondary" data-infobulle="<?= 'Le '.$fmt->format($date) ?>"><?php
                                $fin = new DateTime('now');
                                $interval = $date->diff($fin);
                                echo $interval->format("%d j");
                                  ?></a>
                        <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-content-text">
                        <span class="primary"><?= $usersArray ? "Bonjour ! Je suis le nouveau locataire de l'appartement n°{$value['num']} de la maison {$house->getHouse_name()}" : "L'appartement n°{$value['num']} de la maison {$house->getHouse_name()} est libre"?></span>
                    </div>
                    <a href="/aparts/<?= $value['id_apartment'] ?>" class="card-content-image">
                        <img src="assets/image/apart-default-photo.png" alt="">
                    </a>
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

<script text="text/javascript">
    document.getElementById('navLeft').dataset.always = 'small';
    const id_to_select = document.getElementById(document.getElementById('id-to-select').value);
    if (id_to_select) {
        id_to_select.dataset.status = 'selected'
        id_to_select.onclick = () => { return false };
    }
    
    const scrollbar_manage_house = new ScrollBar(document.getElementById('scrollbar-manage-house'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_manage_house.init();

    const scrollbar_house_aparts = new ScrollBar(document.getElementById('scrollbar-house-aparts'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_house_aparts.init();
    
    const house_aparts = document.getElementById('house_aparts');
    house_aparts.dataset.status = 'selected';
    house_aparts.onclick = () => { return false };

    function onClickDropDown(element) {
        if (element.dataset.status == 'hidden') {
            element.dataset.status = 'shown';
        } else {
            element.dataset.status = 'hidden';
        }
        scrollbar_manage_house.refresh();
    }
</script>