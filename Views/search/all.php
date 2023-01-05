<?php include ROOT."/Views/search/panelSearch.php"; ?>

<div class="globalContainer">
    <div class="scrollbar-container" id="scrollbar-search-all">
        <div class="card-wrapper scrollbar-content" data-transition="yes">
        <?php if (count($users_array) > 0) { ?>
            <div class="card">
                <div class="card-head">
                    <span class="card-head-title">Personnes</span>
                </div>
                <div class="card-content">
                    <div class="card-search">
                        <ul class="card-list">
                        <?php foreach ($users_array as $value) { ?>
                            <li class="card-list-row">
                                <a href="#" class="image-href people">
                                    <img src="assets/image/user-default-photo.png" alt="" class="image people">
                                </a>
                                <div class="text">
                                    <a href="#" class="primary"><?= $value['firstname'].' '.$value['lastname'] ?></a>
                                </div>
                                <div class="button-container">
                                    <a href="#" class="button">
                                        <span class="text">Voir le profil</span>
                                        <div class="hover"></div>
                                    </a>
                                </div>
                            </li>
                        <?php } ?>
                        </ul>
                        <div class="card-btn-container">
                            <a href=<?= "/search/people/?q=$querry" ?> class="button">
                                <span class="text">Voir tout</span>
                                <div class="hover"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } if (count($house_array) > 0) { ?>
            <div class="card">
                <div class="card-head">
                    <span class="card-head-title">Maisons</span>
                </div>
                <div class="card-content">
                    <div class="card-search">
                        <ul class="card-list">
                        <?php foreach ($house_array as $value) { ?>
                            <li class="card-list-row">
                                <a href="<?= "/houses/{$value['id_house']}" ?>" class="image-href">
                                    <img src="assets/image/house-default-min-photo.png" alt="" class="image">
                                </a>
                                <div class="text">
                                    <a href="<?= "/houses/{$value['id_house']}" ?>" class="primary"><?= $value['house_name'] ?></a>
                                    <?php 
                                        $nbr_aparts = $apartment->countApartFromHouse($value['id_house']);
                                        $nbr_free_aparts = $apartment->countFreeApartFromHouse($value['id_house']);
                                    ?>
                                    <span class="secondary"><?= "{$nbr_aparts} appartement".($nbr_aparts > 1 ? "s" : "")." · {$nbr_free_aparts} appartement".($nbr_free_aparts > 1 ? "s" : "")." libre" ?></span>
                                </div>
                                <div class="button-container">
                                    <a href="<?= "/houses/{$value['id_house']}" ?>" class="button">
                                        <span class="text">Voir la maison</span>
                                        <div class="hover"></div>
                                    </a>
                                </div>
                            </li>
                        <?php } ?>
                        </ul>
                        <div class="card-btn-container">
                            <a href=<?= "/search/houses/?q=$querry" ?> class="button">
                                <span class="text">Voir tout</span>
                                <div class="hover"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } if (count($apartment_array) > 0) { ?>
            <div class="card">
                <div class="card-head">
                    <span class="card-head-title">Appartements</span>
                </div>
                <div class="card-content">
                    <div class="card-search">
                        <ul class="card-list">
                        <?php foreach ($apartment_array as $value) { ?>
                            <li class="card-list-row">
                                <a href="<?= "/aparts/{$value['id_apartment']}" ?>" class="image-href">
                                    <img src="assets/image/apart-default-min-photo.png" alt="" class="image">
                                </a>
                                <div class="text">
                                    <a href="<?= "/aparts/{$value['id_apartment']}" ?>" class="primary"><?= "N°{$value['num']} - {$value['house_name']}" ?></a>
                                    <?php $nbr_rooms = $room->countRoomApart($value['id_apartment']) ?>
                                    <span class="secondary"><?= "{$value['description']} · $nbr_rooms pièce".($nbr_rooms > 1 ? "s" : "") ?></span>
                                </div>
                                <div class="button-container">
                                    <a href="<?= "/aparts/{$value['id_apartment']}" ?>" class="button">
                                        <span class="text">Voir l'appartement</span>
                                        <div class="hover"></div>
                                    </a>
                                </div>
                            </li>
                        <?php } ?>
                        </ul>
                        <div class="card-btn-container">
                            <a href=<?= "/search/apartments/?q=$querry" ?> class="button">
                                <span class="text">Voir tout</span>
                                <div class="hover"></div>
                            </a>
                        </div>
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

<script text="text/javascript">
    document.getElementById('navLeft').dataset.always = 'small';
    const filter_all = document.getElementById('filter-all');
    filter_all.dataset.status = 'selected';
    filter_all.onclick = () => { return false };

    const scrollbar_search_all = new ScrollBar(document.getElementById('scrollbar-search-all'), { offsetContainer: -32, offsetContent: 0});
    scrollbar_search_all.init();
</script>