(function($) {
    "use strict";
    var sparklineCharts = function() {
        $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 52], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#e35b5a',
            fillColor: "transparent"
        });

        $("#sparkline2").sparkline([32, 11, 25, 37, 41, 32, 34, 42], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#e35b5a',
            fillColor: "transparent"
        });

        $("#sparkline3").sparkline([34, 22, 24, 41, 10, 18, 16, 8], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#e35b5a',
            fillColor: "transparent"
        });
    };

    var sparkResize;

    $(window).resize(function(e) {
        clearTimeout(sparkResize);
        sparkResize = setTimeout(sparklineCharts, 500);
    });

    sparklineCharts();



    var chartData = [{
        "year": "2000",
        "cars": 1691,
        "motorcycles": 737

    }, {
        "year": "2001",
        "cars": 1098,
        "motorcycles": 680,
        "bicycles": 910
    }, {
        "year": "2002",
        "cars": 975,
        "motorcycles": 664,
        "bicycles": 670
    }, {
        "year": "2003",
        "cars": 1246,
        "motorcycles": 648,
        "bicycles": 930
    }, {
        "year": "2004",
        "cars": 1218,
        "motorcycles": 637,
        "bicycles": 1010
    }, {
        "year": "2005",
        "cars": 1913,
        "motorcycles": 133,
        "bicycles": 1770
    }, {
        "year": "2006",
        "cars": 1299,
        "motorcycles": 621,
        "bicycles": 820
    }, {
        "year": "2007",
        "cars": 1110,
        "motorcycles": 10,
        "bicycles": 1050
    }, {
        "year": "2008",
        "cars": 765,
        "motorcycles": 232,
        "bicycles": 650
    }, {
        "year": "2009",
        "cars": 1145,
        "motorcycles": 219,
        "bicycles": 780
    }, {
        "year": "2010",
        "cars": 1163,
        "motorcycles": 201,
        "bicycles": 700
    }, {
        "year": "2011",
        "cars": 1780,
        "motorcycles": 85,
        "bicycles": 1470
    }, {
        "year": "2012",
        "cars": 1580,
        "motorcycles": 285
    }];

    var chart = AmCharts.makeChart("chartdiv3", {
        "type": "serial",
        "theme": "dark",

        "fontFamily": "Lato",
        "autoMargins": true,
        "addClassNames": true,
        "zoomOutText": "",
        "defs": {
            "filter": [{
                    "x": "-50%",
                    "y": "-50%",
                    "width": "0",
                    "height": "0",
                    "id": "blur",
                    "feGaussianBlur": {
                        "in": "SourceGraphic",
                        "stdDeviation": "50"
                    }
                },
                {
                    "id": "shadow",
                    "width": "150%",
                    "height": "150%",
                    "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": "2",
                        "dy": "2"
                    },
                    "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": "10"
                    },
                    "feColorMatrix": {
                        "result": "blurOut",
                        "type": "matrix",
                        "values": "0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 .2 0"
                    },
                    "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                    }
                }
            ]
        },
        "fontSize": 15,
        "pathToImages": "../amcharts/images/",
        "dataProvider": chartData,
        "dataDateFormat": "YYYY",
        "marginTop": 0,
        "marginRight": 1,
        "marginLeft": 0,
        "autoMarginOffset": 5,
        "categoryField": "year",
        "categoryAxis": {
            "gridAlpha": 0.07,
            "axisColor": "#DADADA",
            "startOnAxis": true,
            "tickLength": 0,
            "parseDates": true,
            "minPeriod": "YYYY"
        },

        "valueAxes": [{
            "ignoreAxisWidth": true,
            "stackType": "regular",
            "gridAlpha": 0.07,
            "axisAlpha": 0,
            "inside": true
        }],
        "graphs": [{
                "id": "g1",
                "type": "line",
                "title": "Cars",
                "valueField": "cars",
                "fillColors": [
                    "#0066e3",
                    "#802ea9"
                ],
                "lineAlpha": 0,
                "fillAlphas": 0.8,
                "showBalloon": false
            },
            {
                "id": "g2",
                "type": "line",
                "title": "Motorcycles",
                "valueField": "motorcycles",
                "lineAlpha": 0,
                "fillAlphas": 0.8,
                "lineColor": "#5bb5ea",
                "showBalloon": false
            },
            {
                "id": "g3",
                "title": "Bicycles",
                "valueField": "bicycles",
                "lineAlpha": 0.5,
                "lineColor": "#14a4ce",
                "bullet": "round",
                "dashLength": 2,
                "bulletBorderAlpha": 1,
                "bulletAlpha": 1,
                "bulletSize": 15,
                "stackable": false,
                "bulletColor": "#57c7e7",
                "bulletBorderColor": "#14a4ce",
                "bulletBorderThickness": 3,
                "balloonText": "<div style='margin-bottom:30px;text-shadow: 2px 2px rgba(0, 0, 0, 0.1); font-weight:200;font-size:30px; color:#14a4ce'>[[value]]</div>"
            }
        ],
        "chartCursor": {
            "cursorAlpha": 1,
            "zoomable": false,
            "cursorColor": "#fff",
            "categoryBalloonColor": "#57c7e7",
            "fullWidth": true,
            "categoryBalloonDateFormat": "YYYY",
            "balloonPointerOrientation": "vertical"
        },
        "balloon": {
            "borderAlpha": 0,
            "fillAlpha": 0,
            "shadowAlpha": 0,
            "offsetX": 40,
            "offsetY": -50
        }
    });

    // we zoom chart in order to have better blur (form side to side)
    chart.addListener("dataUpdated", zoomChart);

    function zoomChart() {
        chart.zoomToIndexes(1, chartData.length - 2);
    }

    //  All Issues Table
    $('#allIssuesTable').DataTable({
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

    // Close Issues Table
    $('#closeIssuesTable').DataTable({
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

    // Open Issues Table
    $('#openIssuesTable').DataTable({
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

    // Datatables Responsive after tab change
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust()
            .responsive.recalc();
    });

})(jQuery);