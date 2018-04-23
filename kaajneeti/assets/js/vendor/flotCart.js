$(function() {

    // Bar Chart   

    var barOptions = {
        series: {
            bars: {
                show: true,
                barWidth: 0.6,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.8
                    }, {
                        opacity: 0.8
                    }]
                }
            }
        },
        xaxis: {
            tickDecimals: 0
        },
        colors: ["#49b6d6"],
        grid: {
            color: "#999999",
            hoverable: true,
            clickable: true,
            tickColor: "#D4D4D4",
            borderWidth: 0
        },
        legend: {
            show: false
        },
        tooltip: true,
        tooltipOpts: {
            content: "x: %x, y: %y"
        }
    };
    var barData = {
        label: "bar",
        data: [
            [1, 34],
            [2, 25],
            [3, 19],
            [4, 34],
            [5, 32],
            [6, 44],
            [7, 34],
            [8, 25],
            [9, 19],
            [10, 34],
            [11, 32],
            [12, 25],
            [13, 19],
            [14, 34],
            [15, 32],
            [16, 44],
            [17, 34],
            [18, 25],
            [19, 19],
            [20, 34],
            [21, 32],
            [22, 44]
        ]
    };
    $.plot($("#BarChart"), [barData], barOptions);

    // Line Chart 

    var barOptions = {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.0
                    }, {
                        opacity: 0.0
                    }]
                }
            }
        },
        xaxis: {
            tickDecimals: 0
        },
        colors: ["#49b6d6"],
        grid: {
            color: "#999999",
            hoverable: true,
            clickable: true,
            tickColor: "#D4D4D4",
            borderWidth: 0
        },
        legend: {
            show: false
        },
        tooltip: true,
        tooltipOpts: {
            content: "x: %x, y: %y"
        }
    };
    var barData = {
        label: "bar",
        data: [
            [1, 34],
            [2, 22],
            [3, 19],
            [4, 12],
            [5, 32],
            [6, 54],
            [7, 23],
            [8, 57],
            [9, 12],
            [10, 24],
            [11, 44],
            [12, 64],
            [13, 21]
        ]
    };
    $.plot($("#LineChart"), [barData], barOptions);

    //Tracking Curves

    var sin = [],
        cos = [];
    for (var i = 0; i < 14; i += 0.1) {
        sin.push([i, Math.sin(i)]);
        cos.push([i, Math.cos(i)]);
    }

    plot = $.plot("#trackingCurves", [{
        data: sin,
        label: "sin(x) = -0.00"
    }, {
        data: cos,
        label: "cos(x) = -0.00"
    }], {
        series: {
            lines: {
                show: true
            }
        },
        crosshair: {
            mode: "x"
        },
        colors: ["#49b6d6", "#e35b5a"],
        grid: {
            color: "#999999",
            hoverable: true,
            clickable: true,
            autoHighlight: false,
            tickColor: "#D4D4D4",
            borderWidth: 0
        },
        yaxis: {
            min: -1.2,
            max: 1.2
        }
    });

    var legends = $("#trackingCurves .legendLabel");

    legends.each(function() {
        // fix the widths so they don't jump around
        $(this).css('width', $(this).width());
    });

    var updateLegendTimeout = null;
    var latestPosition = null;

    function updateLegend() {

        updateLegendTimeout = null;

        var pos = latestPosition;

        var axes = plot.getAxes();
        if (pos.x < axes.xaxis.min || pos.x > axes.xaxis.max ||
            pos.y < axes.yaxis.min || pos.y > axes.yaxis.max) {
            return;
        }

        var i, j, dataset = plot.getData();
        for (i = 0; i < dataset.length; ++i) {

            var series = dataset[i];

            // Find the nearest points, x-wise

            for (j = 0; j < series.data.length; ++j) {
                if (series.data[j][0] > pos.x) {
                    break;
                }
            }

            // Now Interpolate

            var y,
                p1 = series.data[j - 1],
                p2 = series.data[j];

            if (p1 == null) {
                y = p2[1];
            } else if (p2 == null) {
                y = p1[1];
            } else {
                y = p1[1] + (p2[1] - p1[1]) * (pos.x - p1[0]) / (p2[0] - p1[0]);
            }

            legends.eq(i).text(series.label.replace(/=.*/, "= " + y.toFixed(2)));
        }
    }

    $("#trackingCurves").bind("plothover", function(event, pos, item) {
        latestPosition = pos;
        if (!updateLegendTimeout) {
            updateLegendTimeout = setTimeout(updateLegend, 50);
        }
    });



    // Real-time updates

    var data = [],
        totalPoints = 300;

    function getRandomData() {

        if (data.length > 0)
            data = data.slice(1);

        // Do a random walk

        while (data.length < totalPoints) {

            var prev = data.length > 0 ? data[data.length - 1] : 50,
                y = prev + Math.random() * 10 - 5;

            if (y < 0) {
                y = 0;
            } else if (y > 100) {
                y = 100;
            }

            data.push(y);
        }

        // Zip the generated y values with the x values

        var res = [];
        for (var i = 0; i < data.length; ++i) {
            res.push([i, data[i]])
        }

        return res;
    }

    // Set up the control widget

    var updateInterval = 30;
    $("#updateInterval").val(updateInterval).change(function() {
        var v = $(this).val();
        if (v && !isNaN(+v)) {
            updateInterval = +v;
            if (updateInterval < 1) {
                updateInterval = 1;
            } else if (updateInterval > 2000) {
                updateInterval = 2000;
            }
            $(this).val("" + updateInterval);
        }
    });

    var plot = $.plot("#realTime", [getRandomData()], {
        series: {
            shadowSize: 0 // Drawing is faster without shadows
        },
        colors: ["#49b6d6"],
        grid: {
            color: "#999999",
            hoverable: true,
            clickable: true,
            tickColor: "#D4D4D4",
            borderWidth: 0
        },
        yaxis: {
            min: 0,
            max: 100
        },
        xaxis: {
            show: false
        },
        lines: {
            fill: true
        }
    });

    function update() {

        plot.setData([getRandomData()]);

        // Since the axes don't change, we don't need to call plot.setupGrid()

        plot.draw();
        setTimeout(update, updateInterval);
    }

    update();

});

var data = [{
        label: "Sales 1",
        data: 21,
        color: "#d3d3d3",
    }, {
        label: "Sales 2",
        data: 3,
        color: "#bababa",
    }, {
        label: "Sales 3",
        data: 15,
        color: "#70d2ef",
    }, {
        label: "Sales 4",
        data: 52,
        color: "#49b6d6",
    }];

    var plotObj = $.plot($("#pieChart1"), data, {
        series: {
            pie: {
                show: true
            }
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });


var data = [],
    series = Math.floor(Math.random() * 6) + 3;

for (var i = 0; i < series; i++) {
    data[i] = {
        label: "Series" + (i + 1),
        data: Math.floor(Math.random() * 100) + 1
    }
}






var pieChart2 = $("#pieChart2");

$.plot(pieChart2, data, {
    series: {
        pie: {
            innerRadius: 0.5,
            show: true
        }
    }
});

var pieChart3 = $("#pieChart3");

$.plot(pieChart3, data, {
    series: {
        pie: {
            show: true,
            radius: 1,
            label: {
                show: true,
                radius: 3 / 4,
                formatter: labelFormatter,
                background: {
                    opacity: 0.5
                }
            }
        }
    },
    legend: {
        show: false
    }
});

var pieChart4 = $("#pieChart4");

$.plot(pieChart4, data, {
    series: {
        pie: {
            show: true,
            radius: 1,
            tilt: 0.5,
            label: {
                show: true,
                radius: 1,
                formatter: labelFormatter,
                background: {
                    opacity: 0.8
                }
            },
            combine: {
                color: "#49b6d6",
                threshold: 0.1
            }
        }
    },
    legend: {
        show: false
    }
});

setCode([
    "$.plot('#pieChart4', data, {",
    "    series: {",
    "        pie: {",
    "            show: true,",
    "            radius: 1,",
    "            tilt: 0.5,",
    "            label: {",
    "                show: true,",
    "                radius: 1,",
    "                formatter: labelFormatter,",
    "                background: {",
    "                    opacity: 0.8",
    "                }",
    "            },",
    "            combine: {",
    "                color: '#999',",
    "                threshold: 0.1",
    "            }",
    "        }",
    "    },",
    "    legend: {",
    "        show: false",
    "    }",
    "});",
]);

function labelFormatter(label, series) {
    return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
}

function setCode(lines) {
    $("#code").text(lines.join("\n"));
}