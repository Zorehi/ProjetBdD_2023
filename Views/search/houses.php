<?php include ROOT."/Views/search/panelSearch.php"; ?>

<div class="globalContainer">
    <div class="scrollbar-container" id="scrollbar-search-houses">
        <div class="card-wrapper scrollbar-content" data-transition="yes">
        <?php foreach ($house_array as $value) { ?>
            <div class="card">
                <div class="card-search">
                    <div class="card-list-row">
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
    const filter_houses = document.getElementById('filter-houses');
    filter_houses.dataset.status = 'selected';
    filter_houses.onclick = () => { return false };

    const scrollbar_search_houses = new ScrollBar(document.getElementById('scrollbar-search-houses'), { offsetContainer: -32, offsetContent: 0});
    scrollbar_search_houses.init();
</script>