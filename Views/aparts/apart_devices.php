<?php include ROOT."/Views/aparts/panelManage.php"; ?>

<div class="globalContainer">
    <div class="scrollbar-container" id="scrollbar-apart-devices">
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
    const scrollbar_manage_apart = new ScrollBar(document.getElementById('scrollbar-manage-apart'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_manage_apart.init();

    const scrollbar_apart_edit = new ScrollBar(document.getElementById('scrollbar-apart-devices'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_apart_edit.init();
    
    const edit_apart = document.getElementById('apart_devices');
    edit_apart.dataset.status = 'selected';
    edit_apart.onclick = () => { return false };

    function onClickDropDown(element) {
        if (element.dataset.status == 'hidden') {
            element.dataset.status = 'shown';
        } else {
            element.dataset.status = 'hidden';
        }
        scrollbar_manage_apart.refresh();
    }

</script>