<?php include ROOT."/Views/houses/panelManage.php"; ?>

<div class="globalContainer">

</div>

<script text="text/javascript">
    document.getElementById('navLeft').dataset.always = 'small';
    const scrollbar_manage_house = new ScrollBar(document.getElementById('scrollbar-manage-house'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_manage_house.init();
    
    const house_emit = document.getElementById('house_emit');
    house_emit.dataset.status = 'selected';
    house_emit.onclick = () => { return false };

    function onClickDropDown(element) {
        if (element.dataset.status == 'hidden') {
            element.dataset.status = 'shown';
        } else {
            element.dataset.status = 'hidden';
        }
        scrollbar_manage_house.refresh();
    }
</script>