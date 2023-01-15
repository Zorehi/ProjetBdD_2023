<?php include ROOT."/Views/aparts/panelManage.php"; ?>

<div class="globalContainer">
    <div class="scrollbar-container" id="scrollbar-apart-index">
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
    const id_to_select = document.getElementById(document.getElementById('id-to-select').value);
    if (id_to_select) {
        id_to_select.dataset.status = 'selected'
        id_to_select.onclick = () => { return false };
    }
    
    const scrollbar_manage_apart = new ScrollBar(document.getElementById('scrollbar-manage-apart'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_manage_apart.init();

    const scrollbar_apart_index = new ScrollBar(document.getElementById('scrollbar-apart-index'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_apart_index.init();
    
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

    function make_tenant(id_apartment) {
        const url = `aparts/make_tenant`;
        const datas = new FormData();
        datas.append('id_apartment', id_apartment);

        $.ajax({
            type: 'POST',
            url: url,
            data: datas,
            timeout: 120000, //2 Minutes
            contentType: false,
            processData: false
        })
        .done(() => {
            document.location.href = '/aparts/'+id_apartment;
        })
        .fail((error) => {
            alert('Impossible de devenir locataire sur cette appartement');
        });
    }
</script>