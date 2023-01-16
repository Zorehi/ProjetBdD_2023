<?php include ROOT."/Views/aparts/panelManage.php"; ?>

<div class="globalContainer">
    <div class="scrollbar-container" id="scrollbar-aparts-emit">
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
    
    const scrollbar_manage_apart = new ScrollBar(document.getElementById('scrollbar-manage-apart'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_manage_apart.init();

    const scrollbar_aparts_emit = new ScrollBar(document.getElementById('scrollbar-aparts-emit'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_aparts_emit.init();
    
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

    Highcharts.chart('basic-column-container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            styledMode: true,
            type: 'column'
        },
        title: {
            text: 'Emission de l\'appartement'
        },
        legend: {
            enabled: false
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

    scrollbar_aparts_emit.refresh();

</script>