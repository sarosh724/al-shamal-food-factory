// Color for charts
colors = ['#DFE1E6', '#acf8be', '#0052CC', '#ff0000', '#33ff64'];
// Inspection Grading Graph
function GuageChart(chart_labels, chart_data, chart_size, div_id) {
    $('#' + div_id).highcharts({
        chart: {

            height: 150,
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        exporting: {
            enabled: false,
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        pane: {
            startAngle: -90,
            endAngle: 90,
            background: null,
            size: [chart_size],
            center: ['50%', '90%']
        },
        plotOptions: {
            gauge: {
                dataLabels: {
                    enabled: false
                },
                dial: {
                    baseLength: '0%',
                    baseWidth: 10,
                    radius: '100%',
                    rearLength: '0%',
                    topWidth: 1
                }
            },
        },
        // the value axis
        yAxis: {
            labels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    fontSize: '12px'
                }
            },
            tickPixelInterval: 30,
            tickPositions: chart_labels,
            minorTickLength: 10,
            min: 0,
            max: 5,
            plotBands: [{
                from: 0,
                to: 1,
                color: '#96DC50', // red
                thickness: '50%'
            }, {
                from: 1,
                to: 2,
                color: '#FFFF95', // yellow
                thickness: '50%'
            }, {
                from: 2,
                to: 3,
                color: '#FF9545', // green
                thickness: '50%'
            }, {
                from: 3,
                to: 4,
                color: '#C8BCA3', // green
                thickness: '50%'
            }, {
                from: 4,
                to: 5,
                color: '#FF4F43', // green
                thickness: '50%'
            }]
        },
        series: chart_data
    });
}

function PieChart(series_name, chart_data, div_id, title = '', height = '350px', innerSize = "100%", percent = false, legend = false, label = true) {
    Highcharts.chart(div_id, Highcharts.merge(window.highChartConfig, {
        chart: {
            type: 'pie',
            height: height
        },
        title: {
            text: title,
            style: {
                color: '#646566',
                fontSize: '15px',
                fontFamily: 'Roboto',
                fontWeight: '550'
            }
        },
        credits: {
            enabled: false
        },
        xAxis: {
            allowDecimals: false,
            type: 'category'
        },
        tooltip: {
            pointFormat: `{series.name}: <b>${percent ? `{point.y}%` : `{point.percentage:.1f}%`}</b>`
        },
        legend: {
            enabled: legend,
            title: {
                text: "Percent Group",
                style: {
                    color: '#646566',
                    fontSize: '14px',
                    fontFamily: 'Roboto',
                    fontWeight: 'normal'
                }
            }
        },
        plotOptions: {
            pie: {
                innerSize: innerSize,
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: `${label ? `<b>{point.name}</b>:` : ''} {point.y} ${percent ? '%' : ''}`
                },
                showInLegend: true
            }
        },
        series: [{
            name: series_name,
            colorByPoint: true,
            data: chart_data
        }],
    }));
}

function SolidGuageChart(series_name, title, chart_data, div_id, chart_size = '140%') {

    Highcharts.chart(div_id, Highcharts.merge(window.highChartConfig, {
        credits: false,
        chart: {
            type: 'solidgauge',
            height: '300px'
        },
        yAxis: {
            minorTickInterval: null,
            tickAmount: 2,
            min: 0,
            max: chart_data['total_assets'],
            title: {
                y: -70,
                useHTML: true,
                text: title

            },
            labels: {
                y: 16
            }
        },
        pane: {
            center: ['50%', '85%'],
            size: chart_size,
            startAngle: -90,
            endAngle: 90,
            background: {
                borderRadius: 5,
                innerRadius: '60%',
                outerRadius: '100%',
                shape: 'arc'
            }
        },
        tooltip: {
            enabled: false,

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            solidgauge: {
                borderRadius: 3,
                dataLabels: {
                    y: 5,
                    borderWidth: 0,
                    useHTML: true
                }
            }
        },
        series: [{
            name: series_name,
            colorByPoint: true,
            data: chart_data['chart_data'],
            dataLabels: {
                format: '<div style="text-align:center">' +
                    '<span style="font-size:25px">' + chart_data['asset_status'] + '</span>' +
                    '<span style="font-size:18px;opacity:0.4"></span>' +
                    '</div>'
            },
        }],
    }));
}

function LineChart(series_name, title, y_axis_title, chart_data, div_id, subtitle = '', hit_url = false) {
    Highcharts.chart(div_id, {
        chart: {
            type: 'spline',
            height: '300px'
        },
        title: {
            text: title
        },
        subtitle: {
            text: subtitle
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false,
        },
        xAxis: {
            categories: chart_data['categories'],
            accessibility: {
                description: 'Inspection Dates'
            }
        },
        yAxis: {
            title: {
                text: y_axis_title
            },
            labels: {
                formatter: function () {
                    return this.value;
                }
            }
        },
        tooltip: {
            crosshairs: true,
            shared: true,
            formatter: function () {
                var points = this.points;
                var pointsLength = points.length;
                var tooltipMarkup = pointsLength ? '<span style=\'font-size: 10px\'>' + points[0].key + '</span><br/>' : '';

                for (index = 0; index < pointsLength; index++) {
                    tooltipMarkup += '<b>' + this.points[index].series.name + ': </b>' + this.points[index].point.options.status + '<br/>';
                }
                return tooltipMarkup;
            }
        },
        plotOptions: {
            series: {
                color: '#B580D1',
                cursor: 'pointer',
                point: {
                    events: {
                        click: function () {
                            if (hit_url === true) {
                                window.open(this.options.url, 'new');
                            }
                        }
                    }
                }
            },
            spline: {
                marker: {
                    radius: 4,
                    lineColor: '#666666',
                    lineWidth: 1
                }
            }
        },
        series: [{
            name: series_name,
            marker: {
                symbol: 'diamond'
            },
            data: chart_data['chart_data']
        }]
    });
}

function multiLineChart(div_id, title, data, categories, height = 450) {
    Highcharts.chart(div_id, {
        chart: {
            // type: 'spline',
            height: `${height}px`
        },
        title: {
            text: title
        },
        yAxis: {
            title: {
                text: 'Total'
            }
        },
        xAxis: {
            categories: categories,
            accessibility: {
                description: 'status change dates'
            }
        },
        exporting: {
            enabled: false,
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                // pointStart: 0
            }
        },

        series: data,
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });

}

function AssetsPieChart(series_name, chart_data, div_id) {
    Highcharts.chart(div_id, Highcharts.merge(window.highChartConfig, {
        credits: false,
        chart: {
            plotBackgroundColor: '#ffffff',
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            height: '300px'
        },
        colors: colors_array,
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:2f}</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                borderWidth: 0,
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y:2f}',
                    connectorColor: 'silver'
                },
                showInLegend: true
            }
        },
        legend: {
            align: 'center',
            itemMarginBottom: 10
        },
        series: [{
            name: series_name,
            colorByPoint: true,
            data: chart_data
        }],
    }));
}

function BarChart(series_name, chart_data, div_id, xAxisText, yAxisText, hit_url = false, height = '350px', percent = false) {
    Highcharts.chart(div_id, Highcharts.merge(window.highChartConfig, {
        // colors: colors,
        credits: false,
        chart: {
            type: 'column',
            height: height
        },
        title: {
            text: series_name,
            style: {
                color: '#646566',
                fontSize: '15px',
                fontFamily: 'Roboto',
                fontWeight: '550'
            }
        },
        xAxis: {
            allowDecimals: false,
            type: 'category',
            title: {
                text: xAxisText,
                style: {
                    color: '#646566',
                    fontSize: '12px',
                    fontFamily: 'Roboto',
                }
            }
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: yAxisText,
                style: {
                    color: '#646566',
                    fontSize: '12px',
                    fontFamily: 'Roboto',
                }
            },
            labels: {
                format: `${percent ? `{value}%` : `{value}`}`
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                lineWidth: 2,
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: `${percent ? `{point.y}%` : `{point.y}`}`
                },
                cursor: 'pointer',
                point: {
                    events: {
                        click: function () {
                            if (hit_url === true) {
                                window.open(this.options.url, 'new');
                            }
                        }
                    }
                }
            }
        },
        series: [{
            name: series_name,
            colorByPoint: true,
            data: chart_data
        }],
    }));
}

function ColumnChart(categories, title, series_data, div_id) {
    Highcharts.chart(div_id, {

        chart: {
            type: 'column',
            height: '350px'
        },

        title: {
            text: title
        },

        subtitle: {
            text: 'Resize the frame or click buttons to change appearance'
        },

        legend: {
            align: 'right',
            verticalAlign: 'middle',
            layout: 'vertical'
        },

        xAxis: {
            categories: categories,
            labels: {
                x: -10
            }
        },

        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Amount'
            }
        },
        plotOptions: {
            column: {
                stacking: 'percent',
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: series_data,
        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
            shared: true
        },
        responsive: {
            rules: [{
                condition: {
                    maxWidth: null,
                    width: null
                },
                chartOptions: {
                    legend: {
                        align: 'right',
                        verticalAlign: 'middle',
                        layout: 'vertical'
                    },
                    yAxis: {
                        labels: {
                            align: 'left',
                            x: 0,
                            y: -10
                        },
                        title: {
                            text: null
                        }
                    },
                    subtitle: {
                        text: null
                    },
                    credits: {
                        enabled: false
                    }
                }
            }]
        }
    });
}

function gauge(div_id, title, max, avg) {
    Highcharts.chart(div_id, {
        chart: {
            type: 'gauge',
            plotBorderWidth: 0,
            plotBackgroundColor: {
                stops: [
                    [0, '#FFF4C6'],
                    [0.3, '#FFFFFF'],
                    [1, '#FFF4C6']
                ]
            },
            plotBackgroundImage: null,
            height: 200
        },

        title: {
            text: title
        },

        pane: [{
            startAngle: -45,
            endAngle: 45,
            background: null,
            center: ['50%', '150%'],
            size: 300
        }],

        exporting: {
            enabled: false
        },

        tooltip: {
            enabled: true,

        },

        yAxis: [{
            min: 0,
            max: 5,
            tickInterval: 1,
            minorTickInterval: 5,
            minorTickPosition: 'outside',
            tickPosition: 'outside',
            labels: {
                rotation: 'auto',
                distance: 10
            },
            plotBands: [{
                from: 0,
                to: 1,
                color: 'green',
                innerRadius: '100%',
                outerRadius: '105%',
                thickness: '90%'
            }, {
                from: 1,
                to: 2,
                color: 'yellow',
                innerRadius: '100%',
                outerRadius: '105%'
            }, {
                from: 2,
                to: 3,
                color: '#785704',
                innerRadius: '100%',
                outerRadius: '105%'
            },
            {
                from: 3,
                to: 4,
                color: 'grey',
                innerRadius: '100%',
                outerRadius: '105%'
            },
            {
                from: 4,
                to: 5,
                color: 'red',
                innerRadius: '100%',
                outerRadius: '105%'
            }],
            title: {
                text: '<span style="font-size:10px">Max: ' + max + '<br>&nbsp;&nbsp;&nbsp;Avg: ' + avg + '</span>',
                y: -40
            }
        }],

        plotOptions: {
            gauge: {
                dataLabels: {
                    enabled: false
                },
                dial: {
                    radius: '100%'
                }
            }
        },

        series: [{
            name: 'Max',
            data: [max],
            yAxis: 0
        }, {
            name: 'Average',
            data: [avg],
            dial: {
                backgroundColor: 'grey'
            },
            yAxis: 0
        }],

        credits: {
            enabled: false
        },
    });


}

function MultiLevelBarChart(div_id, title, chart_data, type = 'column') {
    var legend_obj = {
        align: 'right',
        verticalAlign: 'top',
        x: -30,
        y: 0,
        floating: true,
        backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false
    };

    $.extend(legend_obj, chart_data['legend']);

    Highcharts.chart(div_id, Highcharts.merge(window.highChartConfig, {
        credits: false,
        chart: {
            type: type
        },
        title: {
            text: (chart_data.display_title) ? title : '',
        },
        xAxis: {
            categories: chart_data['categories']
        },
        colors: colors,
        yAxis: {
            min: 0,
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: ( // theme
                        Highcharts.defaultOptions.title.style &&
                        Highcharts.defaultOptions.title.style.color
                    ) || 'gray'
                }
            },
            title: {
                text: title
            },
        },
        legend: legend_obj,
        tooltip: {
            headerFormat: '<b>{point.x}</b><br/>',
            pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: chart_data['series_data']
    }));
}
/**
 *
 * @param {String} div_id
 * @param {String} title
 * @param {Array} series_data
 */

function PyramidChart(div_id, title, series_data) {
    Highcharts.chart(div_id, {
        chart: {
            type: 'pyramid',
            height: '350px'
        },
        title: {
            text: title,
            x: 10
        },
        exporting: {
            enabled: false,
        },
        credits: {
            enabled: false
        },
        legend: {
            enabled: false
        },
        colors: colors_array,
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b> ({point.y:,.0f})',
                    softConnector: true
                },
                center: ['50%', '50%'],
                width: '75%'
            }
        },
        series: [{
            name: series_data['name'],
            data: series_data['data']
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    plotOptions: {
                        series: {
                            dataLabels: {
                                inside: true
                            },
                            center: ['50%', '50%'],
                            width: '100%'
                        }
                    }
                }
            }]
        }
    });
}

function StatsChart(chart_data, div_id, height = '300px') {
    Highcharts.chart(div_id, Highcharts.merge(window.highChartConfig, {
        // colors: colors,
        credits: false,
        chart: {
            type: 'column',
            height: height,
            background: 'transparent'
        },
        title: {
            text: '',
        },
        xAxis: {
            allowDecimals: false,
            type: 'category',
            title: {
                enabled: false
            },
            labels: {
                enabled: true,
            },
            gridLineColor: 'red',
            gridTextColor: 'green',
            lineColor: 'transparent',
            tickColor: 'transparent',
        },
        yAxis: {
            title: {
                enabled: false
            },
            labels: {
                enabled: false
            },
            gridLineColor: 'transparent',
            gridTextColor: '#ffffff',
            lineColor: 'transparent',
            tickColor: 'transparent',
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                lineWidth: 1,
                pointWidth: 10,
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                },
                cursor: 'pointer',
                point: {
                    events: {
                        click: function () {
                            console.log(this.options.url);
                            window.open(this.options.url, 'new');
                        }
                    }
                }
            },
            column: {
                minPointLength: 2
            }
        },
        series: [{
            name: 'Total',
            colorByPoint: true,
            data: chart_data
        }],
    }));
    // Highcharts.chart(div_id, Highcharts.merge(window.highChartConfig, {
    //     chart: {
    //         type: 'column',
    //         height: height,
    //         backgroundColor: 'transparent'
    //     },
    //     title: {
    //         text: '',
    //     },
    //     credits: {
    //         enabled: false
    //     },
    //     xAxis: {
    //         allowDecimals: false,
    //         type: 'category',
    //         title: {
    //             enabled: false
    //         },
    //         labels: {
    //             enabled: false
    //         },
    //         gridLineColor: 'transparent',
    //         gridTextColor: '#ffffff',
    //         lineColor: 'transparent',
    //         tickColor: 'transparent',
    //     },
    //     yAxis: {
    //         title: {
    //             enabled: false
    //         },
    //         labels: {
    //             enabled: false
    //         },
    //         gridLineColor: 'transparent',
    //         gridTextColor: '#ffffff',
    //         lineColor: 'transparent',
    //         tickColor: 'transparent',
    //     },
    //     tooltip: {
    //         pointFormat: '{series.name}: <b>{point.y}</b>'
    //     },
    //     legend: {
    //         enabled: false
    //     },
    //     plotOptions: {
    //         pie: {
    //             allowPointSelect: true,
    //             cursor: 'pointer',
    //             dataLabels: {
    //                 enabled: true,
    //                 format: '<b>{point.name}</b>: {point.y} '
    //             }
    //         }
    //     },
    //     series: [{
    //         name: 'Total',
    //         colorByPoint: true,
    //         data: chart_data
    //     }],
    // }));
}

function BasicLineChart(chart_data, div_id, title, height = '350px') {
    Highcharts.chart(div_id, Highcharts.merge(window.highChartConfig, {
        chart: {
            type: 'line',
            height: height
        },
        title: {
            text: title,
        },
        credits: {
            enabled: false
        },
        xAxis: {
            allowDecimals: false,
            type: 'category'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} '
                }
            }
        },
        series: [{
            name: 'Total',
            colorByPoint: true,
            data: chart_data
        }],
    }));
}

function healthGauge(slug, avg, max = 5) {
    var opts = {
        angle: 0, /// The span of the gauge arc
        lineWidth: 0.35, // The line thickness
        pointer: {
            length: 0.5, // Relative to gauge radius
            strokeWidth: 0.035 // The thickness
        },
        radiusScale: 0.8,
        colorStart: '#6FADCF',   // Colors
        colorStop: '#6df5fd',    // just experiment with them
        strokeColor: '#E0E0E0',
        staticZones: [
            { strokeStyle: "#F03E3E", min: 0, max: 1 },
            { strokeStyle: "#f7742d", min: 1.1, max: 2 },
            { strokeStyle: "#FFDD00", min: 2.1, max: 3 },
            { strokeStyle: "#96e344", min: 3.1, max: 4 },
            { strokeStyle: "#30B32D", min: 4.1, max: 5 }
        ],
        generateGradient: true,
        highDpiSupport: true,
        // staticLabels: {
        //     font: "10px sans-serif",  // Specifies font
        //     labels: [0, 1, 2, 3, 4, 5],  // Print labels at these values
        //     color: "#000000",  // Optional: Label text color
        //     fractionDigits: 0  // Optional: Numerical precision. 0=round off.
        // },
    };

    var target = document.getElementById(slug); // your canvas element
    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
    gauge.maxValue = max; // set max gauge value
    gauge.minValue = 0;
    gauge.setMinValue(0);  // set min value
    gauge.set(avg);
    gauge.animationSpeed = 50;
}

function overallHealthGauge(slug, health, max = 5) {
    var opts = {
        angle: 0, /// The span of the gauge arc
        lineWidth: 0.42, // The line thickness
        pointer: {
            length: 0.5, // Relative to gauge radius
            strokeWidth: 0.035 // The thickness
        },
        radiusScale: 0.9,
        colorStart: '#6FADCF',   // Colors
        colorStop: '#6df5fd',    // just experiment with them
        strokeColor: '#E0E0E0',
        staticZones: [
            { strokeStyle: "#F03E3E", min: 0, max: 1 },
            { strokeStyle: "#f7742d", min: 1.1, max: 2 },
            { strokeStyle: "#FFDD00", min: 2.1, max: 3 },
            { strokeStyle: "#96e344", min: 3.1, max: 4 },
            { strokeStyle: "#30B32D", min: 4.1, max: 5 }
        ],
        generateGradient: true,
        highDpiSupport: true,
        // staticLabels: {
        //     font: "10px sans-serif",  // Specifies font
        //     labels: [0, 20, 40, 60, 80, 100],  // Print labels at these values
        //     color: "#000000",  // Optional: Label text color
        //     fractionDigits: 0  // Optional: Numerical precision. 0=round off.
        // },
    };

    var target = document.getElementById(slug); // your canvas element
    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
    gauge.maxValue = max; // set max gauge value
    gauge.minValue = 0;
    gauge.setMinValue(0);  // set min value
    gauge.set(health);
    gauge.animationSpeed = 50;
}

function splitPackedBubbleChart(div, title, data) {
    Highcharts.chart(div, {
        chart: {
            type: 'packedbubble',
            height: '100%'
        },
        title: {
            text: title,
            align: 'left'
        },
        tooltip: {
            useHTML: true,
            pointFormat: '<b>{point.name} (No. of assets):</b> {point.value}'
        },
        plotOptions: {
            series: {
                cursor: 'pointer',
                point: {
                    events: {
                        click: function () {
                            if (this.formatPrefix == 'parentNode') {
                                console.log
                                window.open(this.series.data[0].parent_url, '_blank');
                            } else {
                                window.open(this.options.child_url, '_blank');
                            }
                        }
                    }
                }
            },
            packedbubble: {
                layoutAlgorithm: {
                    gravitationalConstant: 0.0625,
                    splitSeries: true,
                    seriesInteraction: false,
                    dragBetweenSeries: true,
                    parentNodeLimit: true
                },
                dataLabels: {
                    enabled: true,
                    format: '{point.name}',
                    style: {
                        color: 'black',
                        textOutline: 'none',
                        fontWeight: 'normal'
                    }
                }
            }
        },
        series: data
    });
}

function AreaChart(div_id, chart_data, dates, xAxisText, yAxisText, title = '', subtitle = '') {
    Highcharts.chart(div_id, {
        chart: {
            type: 'area'
        },
        accessibility: {
            description: ''
        },
        title: {
            text: title
        },
        subtitle: {
            text: subtitle
        },
        xAxis: {
            title: {
                text: xAxisText
            },
            allowDecimals: false,
            categories: dates
        },
        yAxis: {
            title: {
                text: yAxisText
            }
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name} inspections =  <b>{point.y:,.0f}</b><br/>'
        },
        plotOptions: {
            area: {
                marker: {
                    enabled: false,
                    symbol: 'circle',
                    radius: 2,
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                }
            }
        },
        series: chart_data
    });
}

function AssetRiskGaugeChart(title, div_id, value, min = 1, max = 5, height = "160px") {
    const gaugeOptions = {
        chart: {
            type: 'solidgauge',
            height: height
        },
        // title: title,
        title: {
            text: title,
            style: {
                color: '#646566',
                fontSize: '15px',
                fontFamily: 'Roboto',
                fontWeight: '550'
            }
        },
        pane: {
            center: ['50%', '85%'],
            size: '180px',
            startAngle: -90,
            endAngle: 90,
            background: {
                backgroundColor: "#F5F3F3FF" || '#fafafa',
                borderColor: "transparent",
                borderRadius: 5,
                innerRadius: '60%',
                outerRadius: '100%',
                shape: 'arc'
            }
        },
        exporting: {
            enabled: false
        },
        tooltip: {
            enabled: true
        },
        // the value axis
        yAxis: {
            stops: [
                [0.1, '#DF5353'], // green
                [0.5, '#DDDF0D'], // yellow
                [0.9, '#55BF3B'] // red
            ],
            lineWidth: 0,
            tickWidth: 0,
            minorTickInterval: null,
            tickAmount: 2,
            title: {
                y: -55
            },
            labels: {
                y: 16,
                style: {
                    color: "#696969"
                }
            }
        },
        plotOptions: {
            solidgauge: {
                borderRadius: 3,
                dataLabels: {
                    y: 5,
                    borderWidth: 0,
                    useHTML: true
                }
            }
        }
    };

    Highcharts.chart(div_id, Highcharts.merge(gaugeOptions, {
            yAxis: {
                min: min,
                max: max,
                // title: {
                //     text: title,
                //     style: {
                //         color: '#646566',
                //         fontSize: '15px',
                //         fontFamily: 'Roboto',
                //         fontWeight: '550'
                //     }
                // }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Risk Score',
                data: [value],
                dataLabels: {
                    format:
                        '<div style="text-align:center">' +
                        '<span style="font-size:32px; color: #646566; font-family: Roboto">{y}</span><br/>' +
                        '</div>'
                },
                tooltip: {
                    valueSuffix: ''
                }
            }]
        }));
}

function donutChart(series_name, chart_data, div_id, title = '', percent = false,legend_title='') {
    Highcharts.chart(div_id, Highcharts.merge(window.highChartConfig, {
        chart: {
            type: 'pie',
            height: '350px',
            events: {
                load: function () {
                    var chart = this;
                    var total = chart_data.reduce(function (acc, point) {
                        return acc + point.y;
                    }, 0);

                    var centerText = '<div style="text-align:center;">' +
                        '<span style="font-size:14px; font-weight: bold">' + total + '</span><br>' +
                        '<span style="font-size:11px;">Issues </span><br>' +
                        '</div>';

                    chart.renderer.label(centerText, chart.plotWidth / 2 + chart.plotLeft - 20, chart.plotHeight / 2 + chart.plotTop - 20, 'rect', 0, 0, true)
                        .attr({
                            zIndex: 5
                        })
                        .css({
                            color: '#333',
                            fontSize: '14px',
                            textAlign: 'center'
                        })
                        .add();
                }
            }
        },
        title: {
            text: title,
        },
        xAxis: {
            allowDecimals: true,
            type: 'category'
        },
        plotOptions: {
            pie: {
                innerSize: '50%',
                depth: 45,
                dataLabels: {
                    enabled: true,
                    format: '{point.y} ({point.percentage:.2f}%)'
                }
            }
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b> ({point.percentage:.2f}%)'
        },
        legend: {
            enabled: true,
            title: {
                text: legend_title,
            }
        },
        series: [{
            name: series_name,
            data: chart_data,
            showInLegend: true,
            colors: chart_data.map(item => item.color)
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        align: 'center',
                        verticalAlign: 'bottom',
                        layout: 'horizontal'
                    }
                }
            }]
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        }
    }));
}

function BarChartV2(series_name, chart_data, div_id, xAxisText, yAxisText, hit_url = false, height = '350px') {
    Highcharts.chart(div_id, Highcharts.merge(window.highChartConfig, {
        credits: false,
        chart: {
            type: 'column',
            height: height
        },
        title: {
            text: series_name,
        },
        xAxis: {
            allowDecimals: false,
            type: 'category',
            title: {
                text: xAxisText
            }
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: yAxisText
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            column: {
                colorByPoint: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                },
                point: {
                    events: {
                        click: function () {
                            if (hit_url === true) {
                                window.open(this.options.url, 'new');
                            }
                        }
                    }
                }
            }
        },
        series: [{
            name: series_name,
            data: chart_data.map(function(item, index) {
                return {
                    name: item.name,
                    y: item.y,
                    color: getColorByValue(item.y, chart_data)
                };
            })
        }],
    }));
}

function getColorByValue(value, data) {
    // Calculate the color based on the value and range of data
    var min = Math.min.apply(null, data.map(function(item) { return item.y; })); // Corrected to use 'item.y' instead of 'item[1]'
    var max = Math.max.apply(null, data.map(function(item) { return item.y; })); // Corrected to use 'item.y' instead of 'item[1]'
    var normalizedValue = (value - min) / (max - min);
    var red = Math.round(255 * normalizedValue);
    var green = Math.round(255 * (1 - normalizedValue));
    return 'rgb(' + red + ',' + green + ',0)'; // Ranges from red to green
}


function bubbleChart(title, div_id, chart_data, point_format) {
    Highcharts.chart(div_id, {
        chart: {
            type: 'bubble',
            plotBorderWidth: 1,
            zoomType: 'xy'
        },
        title: {
            text: title
        },
        xAxis: {
            gridLineWidth: 1,
            title: {
                text: 'Health Statuses'
            },
            categories: chart_data.categories
        },
        yAxis: {
            startOnTick: false,
            endOnTick: false,
            title: {
                text: 'Number Of Assets'
            }
        },
        tooltip: {
            useHTML: true,
            headerFormat: '<table>',
            pointFormat: point_format,
            footerFormat: '</table>',
            followPointer: true
        },
        series: [{
            data: chart_data.data,
            colorByPoint: true
        }]
    });
}

function srm_5_guage_chart(div_id, title, data = []) {
    Highcharts.chart(div_id, {

        chart: {
            type: 'gauge',
            plotBorderWidth: null,
            plotShadow: false,
            height: 200,
            width: 400,
            // margin: [15, 15, 0, 0],
            // spacingTop: 35,
            // spacingBottom: 35,
            // spacingLeft: 0,
            // spacingRight: 0,

            borderWidth: 0,
            borderRadius: 0,
            plotBackgroundColor: 'transparent',
            // style: {
            //     'float': position
            // }
        },

        exporting: { enabled: false },
        legend: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        title: {
            text: title
        },

        pane: {
            center: ['50%', '100%'],
            size: '200%',
            startAngle: -90,
            endAngle: 89.9,
            background: {
                borderWidth: 0,
                innerRadius: '73%',
                outerRadius: '100%',
            }
        },

        plotOptions: {
            gauge: {
                dial: {
                    radius: '75%'
                }
            }
        },

        // the value axis
        yAxis: {
            min: 0,
            max: 5,
            lineWidth: 0,
            tickWidth: 0,
            minorTickInterval: null,
            tickInterval: 1,
            labels: {
                step: 1,
                rotation: 'auto',
                y: 7,
                style: {
                    fontFamily: 'Open Sans, sans-serif'
                }
            },
            plotBands: [{
                from: 0,
                to: 1,
                color: '#55BF3B', // green
                thickness: 20,
                borderRadius: '50%'
            }, {
                from: 1,
                to: 2,
                color: '#0000ff', // blue
                thickness: 20,
                borderRadius: '50%'
            }, {
                from: 2,
                to: 3,
                color: 'orange', // orange
                thickness: 20
            },
            {
                from: 3,
                to: 4,
                color: 'pink', // pink
                thickness: 20
            },
            {
                from: 4,
                to: 5,
                color: 'red', // red
                thickness: 20
            }]
        },

        series: [{
            name: 'Grade',
            data: data,
            dataLabels: {
                borderWidth: 0
            },
        }]
    });
}
