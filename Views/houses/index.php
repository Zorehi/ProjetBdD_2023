<?php include ROOT."/Views/houses/panelManage.php"; ?>

<div class="globalContainer">
    <div class="scrollbar-container" id="scrollbar-house-index">
        <div class="card-wrapper scrollbar-content" data-transition="yes">
            
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

    const scrollbar_house_index = new ScrollBar(document.getElementById('scrollbar-house-index'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_house_index.init();
    
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