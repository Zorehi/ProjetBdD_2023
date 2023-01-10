<div class="globalContainer main">
    <div class="scrollbar-container" id="scrollbar-analytics">
        <div class="card-wrapper scrollbar-content" data-transition="yes">
            <div class="card card-analytics">
                <div class="card-content">
                    <figure class="highcharts-figure">
                        <div id="pie-chart-container"></div>
                    </figure>
                </div>
            </div>
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

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    document.getElementById('Analytics').dataset.status = 'selected';

    const scrollbar_analytics = new ScrollBar(document.getElementById('scrollbar-analytics'), { offsetContainer: -16, offsetContent: 0});
    scrollbar_analytics.init();

    Highcharts.chart('pie-chart-container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Pourcentage de chaque genre inscrit sur le site'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Utilisateurs',
            colorByPoint: true,
            data: <?= json_encode($dataGender) ?>
        }]
    });

    Highcharts.chart('basic-column-container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Nombre d\'utilisateurs par tranche d\'âge'
        },
        legend: {
            enabled: false
        },
        xAxis: {
            categories: [
                '18-24',
                '24-45',
                '45-65',
                '65+'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Nombres d\'utilisateurs'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Utilisateurs',
            data: <?= json_encode($dataRangeF) ?>
        }]
    });

    scrollbar_analytics.refresh();
</script>