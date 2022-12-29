<?php include ROOT."/Views/aparts/panelManage.php"; ?>

<div class="globalContainer">
<div class="scrollbar-container" id="scrollbar-house-aparts">
        <div class="card-wrapper scrollbar-content" data-transition="yes">
            <div class="card">

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
    const scrollbar_manage_apart = new ScrollBar(document.getElementById('scrollbar-manage-apart'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_manage_apart.init();
    
    const Home_apart = document.getElementById('Home_apart');
    Home_apart.dataset.status = 'selected';
    Home_apart.onclick = () => { return false };

    function onClickDropDown(element) {
        if (element.dataset.status == 'hidden') {
            element.dataset.status = 'shown';
        } else {
            element.dataset.status = 'hidden';
        }
        scrollbar_manage_apart.refresh();
    }
</script>