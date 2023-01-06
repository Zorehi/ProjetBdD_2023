<?php include ROOT."/Views/search/panelSearch.php"; ?>

<div class="globalContainer">
    <div class="scrollbar-container" id="scrollbar-search-apartments">
        <div class="card-wrapper scrollbar-content" data-transition="yes">
        <?php foreach ($apartment_array as $value) { ?>
            <div class="card">
                <div class="card-search">
                    <div class="card-list-row">
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
    const filter_apartments = document.getElementById('filter-apartments');
    filter_apartments.dataset.status = 'selected';
    filter_apartments.onclick = () => { return false };

    const scrollbar_search_apartments = new ScrollBar(document.getElementById('scrollbar-search-apartments'), { offsetContainer: -32, offsetContent: 0});
    scrollbar_search_apartments.init();
</script>