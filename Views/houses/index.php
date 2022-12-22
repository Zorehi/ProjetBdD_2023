<?php include ROOT."/Views/houses/panelManage.php"; ?>

<div class="globalContainer">

</div>

<script text="text/javascript">
    document.getElementById('navLeft').dataset.always = 'small';
    const manage_house = document.getElementById('manage-house');
    const scrollbarcontainer12 = document.getElementById('scrollbar-12');
    const scrollbar_12 = new ScrollBar(scrollbarcontainer12, { offsetContainer: -16, offsetContent: 0});
    scrollbar_12.init();
    
    const Home_house = document.getElementById('Home_house');
    Home_house.dataset.status = 'selected';

    function onClickDropDown(element) {
        if (element.dataset.status == 'hidden') {
            element.dataset.status = 'shown';
        } else {
            element.dataset.status = 'hidden';
        }
        scrollbar_12.refresh();
    }
</script>