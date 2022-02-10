google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart1);
google.charts.setOnLoadCallback(drawChart2);
google.charts.setOnLoadCallback(drawStuff);

function drawChart1() {

    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work', 20],
        ['Eat', 2],
        ['Commute', 2],
        ['Watch TV', 2],
        ['Smoke weed', 10],
        ['Sleep', 7]
    ]);

    var options = {
        title: 'Gastos:'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
}

function drawChart2() {

    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work', 11],
        ['Eat', 2],
        ['Commute', 2],
        ['Watch TV', 2],
        ['Sleep', 7]
    ]);

    var options = {
        title: 'Inregsos:'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

    chart.draw(data, options);
}



function drawStuff() {

    var button = document.getElementById('change-chart');
    var chartDiv = document.getElementById('chart_div');

    var data = google.visualization.arrayToDataTable([
        ['Galaxy', 'Distance', 'Brightness'],
        ['Canis Major Dwarf', 8000, 23.3],
        ['Sagittarius Dwarf', 24000, 4.5],
        ['Ursa Major II Dwarf', 30000, 14.3],
        ['Lg. Magellanic Cloud', 50000, 0.9],
        ['Bootes I', 60000, 13.1]
    ]);

    var materialOptions = {
        width: 900,
        chart: {
            title: 'Nearby galaxies',
            subtitle: 'distance on the left, brightness on the right'
        },
        series: {
            0: {
                axis: 'distance'
            }, // Bind series 0 to an axis named 'distance'.
            1: {
                axis: 'brightness'
            } // Bind series 1 to an axis named 'brightness'.
        },
        axes: {
            y: {
                distance: {
                    label: 'parsecs'
                }, // Left y-axis.
                brightness: {
                    side: 'right',
                    label: 'apparent magnitude'
                } // Right y-axis.
            }
        }
    };

    var classicOptions = {
        width: 900,
        series: {
            0: {
                targetAxisIndex: 0
            },
            1: {
                targetAxisIndex: 1
            }
        },
        title: 'Nearby galaxies - distance on the left, brightness on the right',
        vAxes: {
            // Adds titles to each axis.
            0: {
                title: 'parsecs'
            },
            1: {
                title: 'apparent magnitude'
            }
        }
    };

    function drawMaterialChart() {
        var materialChart = new google.charts.Bar(chartDiv);
        materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
        button.innerText = 'Change to Classic';
        button.onclick = drawClassicChart;
    }

    function drawClassicChart() {
        var classicChart = new google.visualization.ColumnChart(chartDiv);
        classicChart.draw(data, classicOptions);
        button.innerText = 'Change to Material';
        button.onclick = drawMaterialChart;
    }

    drawMaterialChart();
};