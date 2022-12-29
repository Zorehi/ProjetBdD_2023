<?php include ROOT."/Views/aparts/panelManage.php"; ?>

<div class="globalContainer">

</div>

<script text="text/javascript">
    document.getElementById('navLeft').dataset.always = 'small';
    const scrollbar_manage_apart = new ScrollBar(document.getElementById('scrollbar-manage-apart'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_manage_apart.init();
    
    const apart_emit = document.getElementById('apart_emit');
    apart_emit.dataset.status = 'selected';
    apart_emit.onclick = () => { return false };

    function onClickDropDown(element) {
        if (element.dataset.status == 'hidden') {
            element.dataset.status = 'shown';
        } else {
            element.dataset.status = 'hidden';
        }
        scrollbar_manage_apart.refresh();
    }
</script>