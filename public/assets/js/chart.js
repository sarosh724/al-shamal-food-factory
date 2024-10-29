window.highChartConfig = {
    chart: {
        type: 'column'
    },
    title: {
        text: '',
    },
    subtitle: {
        text: '',
    },
    credits: {
        enabled: false
    },
    legend: {
        enabled: false
    },
    exporting: {
        enabled: false
    },
    lang: {
        decimalPoint: '.',
        thousandsSep: ','
    }
};

function lineChart(div_id, series_name, title = "", subtitle = "",  chart_data, categories, colors = []) {
    Highcharts.chart(div_id, {
        chart: {
            type: 'spline'
        },
        title: {
            text: title,
            align: 'left'
        },
        subtitle: {
            text: subtitle,
            align: 'left'
        },
        colors: colors,
        xAxis: {
            title: {
                text: '',
                style: {
                    color: '#646566',
                    fontSize: '12px',
                    fontFamily: 'Roboto',
                }
            },
            categories: categories,
            crosshair: true,
            accessibility: {
                description: 'Categories'
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Amount',
                style: {
                    color: '#646566',
                    fontSize: '12px',
                    fontFamily: 'Roboto',
                }
            },
        },
        tooltip: {
            valuePrefix: 'Rs.',
            pointFormat: '<span style="color:{series.color}; text-transform: capitalize;">{series.name}</span>: <b>{point.y}</b>',

            // pointFormat: `{series.name} {point.y}`
        },
        exporting: {
            enabled: true
        },
        legend: {
            layout: 'horizontal',
            align: 'center',
            horizontalAlign: 'middle',
            title: {
                text: '',
            },
            itemStyle: {
                textTransform: 'capitalize'
            },
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: chart_data,
    });
}
