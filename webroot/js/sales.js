var pageviews = [
    [1, randValue()],
    [2, randValue()],
    [3, 2 + randValue()],
    [4, 3 + randValue()],
    [5, 5 + randValue()],
    [6, 10 + randValue()],
    [7, 15 + randValue()],
    [8, 20 + randValue()],
    [9, 25 + randValue()],
    [10, 30 + randValue()],
    [11, 35 + randValue()],
    [12, 25 + randValue()],
    [13, 15 + randValue()],
    [14, 20 + randValue()],
    [15, 45 + randValue()],
    [16, 50 + randValue()],
    [17, 65 + randValue()],
    [18, 70 + randValue()],
    [19, 85 + randValue()],
    [20, 80 + randValue()],
    [21, 75 + randValue()],
    [22, 80 + randValue()],
    [23, 75 + randValue()],
    [24, 70 + randValue()],
    [25, 65 + randValue()],
    [26, 75 + randValue()],
    [27, 80 + randValue()],
    [28, 85 + randValue()],
    [29, 90 + randValue()],
    [30, 95 + randValue()]
];
var visitors = [
    [1, randValue() - 5],
    [2, randValue() - 5],
    [3, randValue() - 5],
    [4, 6 + randValue()],
    [5, 5 + randValue()],
    [6, 20 + randValue()],
    [7, 25 + randValue()],
    [8, 36 + randValue()],
    [9, 26 + randValue()],
    [10, 38 + randValue()],
    [11, 39 + randValue()],
    [12, 50 + randValue()],
    [13, 51 + randValue()],
    [14, 12 + randValue()],
    [15, 13 + randValue()],
    [16, 14 + randValue()],
    [17, 15 + randValue()],
    [18, 15 + randValue()],
    [19, 16 + randValue()],
    [20, 17 + randValue()],
    [21, 18 + randValue()],
    [22, 19 + randValue()],
    [23, 20 + randValue()],
    [24, 21 + randValue()],
    [25, 14 + randValue()],
    [26, 24 + randValue()],
    [27, 25 + randValue()],
    [28, 26 + randValue()],
    [29, 27 + randValue()],
    [30, 31 + randValue()]
];

var plot = $.plot($("#chart_2"), [{
        data: pageviews,
        label: "Unique Visits"
    }, {
        data: visitors,
        label: "Page Views"
    }
], {
    series: {
        lines: {
            show: true,
            lineWidth: 2,
            fill: true,
            fillColor: {
                colors: [{
                        opacity: 0.05
                    }, {
                        opacity: 0.01
                    }
                ]
            }
        },
        points: {
            show: true
        },
        shadowSize: 2
    },
    grid: {
        hoverable: true,
        clickable: true,
        tickColor: "#eee",
        borderWidth: 0
    },
    colors: ["#d12610", "#37b7f3", "#52e136"],
    xaxis: {
        ticks: 11,
        tickDecimals: 0
    },
    yaxis: {
        ticks: 11,
        tickDecimals: 0
    }
});