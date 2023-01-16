<?php include ROOT."/Views/devices/panelManage.php"; ?>

<div class="globalContainer">
    <div class="scrollbar-container" id="scrollbar-device-emit">
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
    const scrollbar_manage_device = new ScrollBar(document.getElementById('scrollbar-manage-device'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_manage_device.init();

    const scrollbar_device_emit = new ScrollBar(document.getElementById('scrollbar-device-emit'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_device_emit.init();
    
    const device_emit = document.getElementById('device_emit');
    device_emit.dataset.status = 'selected';
    device_emit.onclick = () => { return false };

    function onClickDropDown(element) {
        if (element.dataset.status == 'hidden') {
            element.dataset.status = 'shown';
        } else {
            element.dataset.status = 'hidden';
        }
        scrollbar_manage_device.refresh();
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
            text: 'Emission de l\'équipement'
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

    scrollbar_device_emit.refresh();

</script>