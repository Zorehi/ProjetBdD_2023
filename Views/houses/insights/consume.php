<?php include ROOT."/Views/houses/panelManage.php"; ?>

<div class="globalContainer">
    <div class="scrollbar-container" id="scrollbar-house-consume">
        <div class="card-wrapper scrollbar-content" data-transition="yes">
            <div class="card card-analytics">
                <div class="card-content">
                    <figure class="highcharts-figure">
                        <div id="basic-column-container"></div>
                    </figure>
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
    const id_to_select = document.getElementById(document.getElementById('id-to-select').value);
    if (id_to_select) {
        id_to_select.dataset.status = 'selected'
        id_to_select.onclick = () => { return false };
    }

    const scrollbar_manage_house = new ScrollBar(document.getElementById('scrollbar-manage-house'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_manage_house.init();

    const scrollbar_house_consume = new ScrollBar(document.getElementById('scrollbar-house-consume'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_house_consume.init();
    
    const house_consume = document.getElementById('house_consume');
    house_consume.dataset.status = 'selected';
    house_consume.onclick = () => { return false };

    function onClickDropDown(element) {
        if (element.dataset.status == 'hidden') {
            element.dataset.status = 'shown';
        } else {
            element.dataset.status = 'hidden';
        }
        scrollbar_manage_house.refresh();
    }

    Highcharts.chart('basic-column-container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            styledMode: true,
            type: 'column'
        },
        title: {
            text: 'Consommation de la maison'
        },
        legend: {
            enabled: true
        },
        xAxis: {
            categories: <?= json_encode($datas_date) ?>,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'kg/kg/kg/kg/h'
            }
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:.1f}</b></br>',
            shared: true,
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: <?= json_encode($datas_reorganize) ?>
    });

    scrollbar_house_consume.refresh();

</script>