(function($) {
    "use strict";
    var data2 = [
        [gd(2012, 1, 1), 7],
        [gd(2012, 1, 2), 6],
        [gd(2012, 1, 3), 4],
        [gd(2012, 1, 4), 8],
        [gd(2012, 1, 5), 9],
        [gd(2012, 1, 6), 7],
        [gd(2012, 1, 7), 5],
        [gd(2012, 1, 8), 4],
        [gd(2012, 1, 9), 7],
        [gd(2012, 1, 10), 8],
        [gd(2012, 1, 11), 9],
        [gd(2012, 1, 12), 6],
        [gd(2012, 1, 13), 4],
        [gd(2012, 1, 14), 5],
        [gd(2012, 1, 15), 11],
        [gd(2012, 1, 16), 8],
        [gd(2012, 1, 17), 8],
        [gd(2012, 1, 18), 11],
        [gd(2012, 1, 19), 11],
        [gd(2012, 1, 20), 6],
        [gd(2012, 1, 21), 6],
        [gd(2012, 1, 22), 8],
        [gd(2012, 1, 23), 11],
        [gd(2012, 1, 24), 13],
        [gd(2012, 1, 25), 7],
        [gd(2012, 1, 26), 9],
        [gd(2012, 1, 27), 9],
        [gd(2012, 1, 28), 8],
        [gd(2012, 1, 29), 5],
        [gd(2012, 1, 30), 8],
        [gd(2012, 1, 31), 15]
    ];

    var data3 = [
        [gd(2012, 1, 1), 700],
        [gd(2012, 1, 2), 400],
        [gd(2012, 1, 3), 600],
        [gd(2012, 1, 4), 500],
        [gd(2012, 1, 5), 400],
        [gd(2012, 1, 6), 356],
        [gd(2012, 1, 7), 800],
        [gd(2012, 1, 8), 489],
        [gd(2012, 1, 9), 367],
        [gd(2012, 1, 10), 776],
        [gd(2012, 1, 11), 689],
        [gd(2012, 1, 12), 600],
        [gd(2012, 1, 13), 400],
        [gd(2012, 1, 14), 500],
        [gd(2012, 1, 15), 700],
        [gd(2012, 1, 16), 586],
        [gd(2012, 1, 17), 245],
        [gd(2012, 1, 18), 788],
        [gd(2012, 1, 19), 888],
        [gd(2012, 1, 20), 688],
        [gd(2012, 1, 21), 787],
        [gd(2012, 1, 22), 344],
        [gd(2012, 1, 23), 999],
        [gd(2012, 1, 24), 567],
        [gd(2012, 1, 25), 686],
        [gd(2012, 1, 26), 566],
        [gd(2012, 1, 27), 888],
        [gd(2012, 1, 28), 700],
        [gd(2012, 1, 29), 178],
        [gd(2012, 1, 30), 455],
        [gd(2012, 1, 31), 893]
    ];


    var dataset = [{
        label: "Number of orders",
        data: data3,
        color: "#57c7e7",
        bars: {
            show: true,
            align: "center",
            barWidth: 24 * 60 * 60 * 600,
            lineWidth: 0
        }

    }, {
        label: "Payments",
        data: data2,
        yaxis: 2,
        color: "#2a2a2a",
        lines: {
            lineWidth: 1,
            show: true,
            fill: true,
            fillColor: {
                colors: [{
                    opacity: 0.2
                }, {
                    opacity: 0.4
                }]
            }
        },
        splines: {
            show: false,
            tension: 0.6,
            lineWidth: 1,
            fill: 0.1
        },
    }];


    var options = {
        xaxis: {
            mode: "time",
            tickSize: [3, "day"],
            tickLength: 0,
            axisLabel: "Date",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Arial',
            axisLabelPadding: 10,
            color: "#d5d5d5"
        },
        yaxes: [{
            position: "left",
            max: 1070,
            color: "#d5d5d5",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Arial',
            axisLabelPadding: 3
        }, {
            position: "right",
            clolor: "#d5d5d5",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: ' Arial',
            axisLabelPadding: 67
        }],
        legend: {
            noColumns: 1,
            labelBoxBorderColor: "#000000",
            position: "nw"
        },
        grid: {
            hoverable: false,
            borderWidth: 0
        }
    };

    function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
    }

    var previousPoint = null,
        previousLabel = null;

    $.plot($("#flot-dashboard-chart"), dataset, options);



    $('#SalaryTable').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            text: 'copy',
            extend: "copy",
            className: 'btn dark btn-outline'
        }, {
            text: 'csv',
            extend: "csv",
            className: 'btn aqua btn-outline'
        }, {
            text: 'excel',
            extend: "excel",
            className: 'btn aqua btn-outline'
        }, {
            text: 'pdf',
            extend: "pdf",
            className: 'btn yellow  btn-outline'
        }, {
            text: 'print',
            extend: "print",
            className: 'btn purple  btn-outline'
        }]
    });

})(jQuery);