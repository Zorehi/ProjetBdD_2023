<?php include ROOT."/Views/houses/panelManage.php"; ?>

<div class="globalContainer">
    <div class="scrollbar-container" id="scrollbar-house-aparts">
        <div class="card-wrapper scrollbar-content" data-transition="yes">
            <div class="card">
                <div class="card-head">
                    <div class="card-head-profil">
                        <div class="image-container">
                            <img class="image" src="assets/image/user-default-photo.png" alt="">
                            <div class="hover"></div>
                        </div>
                        <div class="text">
                            <span class="primary">Quelqu'un</span>
                            <span class="secondary">
                                <a data-infobulle="le Mercredi 28 décembre 2022">1 j</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-content-text">
                        <span class="primary">Bonjour ! Je suis le nouveau locataire de l'appartement n°{} de la maison {}</span>
                    </div>
                    <div class="card-content-image">
                        <img src="assets/image/apart-default-photo.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="scrollbar-track"></div>
        <div class="scrollbar-thumb" data-transition="yes" draggable="false" ondragstart="return false;">
            <div></div>
        </div>
    </div>
</div>

<script text="text/javascript">
    document.getElementById('navLeft').dataset.always = 'small';
    const scrollbar_manage_house = new ScrollBar(document.getElementById('scrollbar-manage-house'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_manage_house.init();

    const scrollbar_house_aparts = new ScrollBar(document.getElementById('scrollbar-house-aparts'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_house_aparts.init();
    
    const Home_house = document.getElementById('Home_house');
    Home_house.dataset.status = 'selected';
    Home_house.onclick = () => { return false };

    function onClickDropDown(element) {
        if (element.dataset.status == 'hidden') {
            element.dataset.status = 'shown';
        } else {
            element.dataset.status = 'hidden';
        }
        scrollbar_manage_house.refresh();
    }
</script>