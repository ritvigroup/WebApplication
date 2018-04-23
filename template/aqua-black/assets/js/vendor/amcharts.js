$(function() {
// 3D Donut Chart
var chart = AmCharts.makeChart( "donutChart", {
  "type": "pie",
  "theme": "light",
  "titles": [ {
    "text": "Visitors countries",
    "size": 16
  } ],
  "dataProvider": [ {
    "country": "United States",
    "visits": 7252
  }, {
    "country": "China",
    "visits": 3882
  }, {
    "country": "Japan",
    "visits": 1809
  }, {
    "country": "Germany",
    "visits": 1322
  }, {
    "country": "United Kingdom",
    "visits": 1122
  }, {
    "country": "France",
    "visits": 414
  }, {
    "country": "India",
    "visits": 384
  }, {
    "country": "Spain",
    "visits": 211
  } ],
  "valueField": "visits",
  "titleField": "country",
  "startEffect": "elastic",
  "startDuration": 2,
  "labelRadius": 15,
  "innerRadius": "50%",
  "depth3D": 10,
  "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
  "angle": 15,
  "export": {
    "enabled": true
  }
} );
jQuery( '.chart-input1' ).off().on( 'input change', function() {
  var property = jQuery( this ).data( 'property' );
  var target = chart;
  var value = Number( this.value );
  chart.startDuration = 0;

  if ( property == 'innerRadius' ) {
    value += "%";
  }

  target[ property ] = value;
  chart.validateNow();
} );
} );
$(function() {
// 3D Cylinder Chart  


var chart = AmCharts.makeChart("cylinderChart", {
    "theme": "none",
    "type": "serial",
    "startDuration": 2,
    "dataProvider": [{
        "country": "USA",
        "visits": 4025,
        "color": "#FF0F00"
    }, {
        "country": "China",
        "visits": 1882,
        "color": "#FF6600"
    }, {
        "country": "Japan",
        "visits": 1809,
        "color": "#FF9E01"
    }, {
        "country": "Germany",
        "visits": 1322,
        "color": "#FCD202"
    }, {
        "country": "UK",
        "visits": 1122,
        "color": "#F8FF01"
    }, {
        "country": "France",
        "visits": 1114,
        "color": "#B0DE09"
    }, {
        "country": "India",
        "visits": 984,
        "color": "#04D215"
    }, {
        "country": "Spain",
        "visits": 711,
        "color": "#0D8ECF"
    }, {
        "country": "Netherlands",
        "visits": 665,
        "color": "#0D52D1"
    }, {
        "country": "Russia",
        "visits": 580,
        "color": "#2A0CD0"
    }, {
        "country": "South Korea",
        "visits": 443,
        "color": "#8A0CCF"
    }, {
        "country": "Canada",
        "visits": 441,
        "color": "#CD0D74"
    }, {
        "country": "Brazil",
        "visits": 395,
        "color": "#754DEB"
    }, {
        "country": "Italy",
        "visits": 386,
        "color": "#DDDDDD"
    }, {
        "country": "Taiwan",
        "visits": 338,
        "color": "#333333"
    }],
    "valueAxes": [{
        "position": "left",
        "axisAlpha":0,
        "gridAlpha":0         
    }],
    "graphs": [{
        "balloonText": "[[category]]: <b>[[value]]</b>",
        "colorField": "color",
        "fillAlphas": 0.85,
        "lineAlpha": 0.1,
        "type": "column",
        "topRadius":1,
        "valueField": "visits"
    }],
    "depth3D": 40,
    "angle": 30,
    "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
    },    
    "categoryField": "country",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha":0,
        "gridAlpha":0
        
    },
    "export": {
        "enabled": true
     }

},0);

jQuery('.chart-input2').off().on('input change',function() {
    var property    = jQuery(this).data('property');
    var target      = chart;
    chart.startDuration = 0;

    if ( property == 'topRadius') {
        target = chart.graphs[0];
    }

    target[property] = this.value;
    chart.validateNow();
});



} );
$(function() {


// 3D Column Chart

var chart = AmCharts.makeChart("ColumnChart", {
    "theme": "light",
    "type": "serial",
    "startDuration": 2,
    "dataProvider": [{
        "country": "USA",
        "visits": 4025,
        "color": "#FF0F00"
    }, {
        "country": "China",
        "visits": 1882,
        "color": "#FF6600"
    }, {
        "country": "Japan",
        "visits": 1809,
        "color": "#FF9E01"
    }, {
        "country": "Germany",
        "visits": 1322,
        "color": "#FCD202"
    }, {
        "country": "UK",
        "visits": 1122,
        "color": "#F8FF01"
    }, {
        "country": "France",
        "visits": 1114,
        "color": "#B0DE09"
    }, {
        "country": "India",
        "visits": 984,
        "color": "#04D215"
    }, {
        "country": "Spain",
        "visits": 711,
        "color": "#0D8ECF"
    }, {
        "country": "Netherlands",
        "visits": 665,
        "color": "#0D52D1"
    }, {
        "country": "Russia",
        "visits": 580,
        "color": "#2A0CD0"
    }, {
        "country": "South Korea",
        "visits": 443,
        "color": "#8A0CCF"
    }, {
        "country": "Canada",
        "visits": 441,
        "color": "#CD0D74"
    }, {
        "country": "Brazil",
        "visits": 395,
        "color": "#754DEB"
    }, {
        "country": "Italy",
        "visits": 386,
        "color": "#DDDDDD"
    }, {
        "country": "Australia",
        "visits": 384,
        "color": "#999999"
    }, {
        "country": "Taiwan",
        "visits": 338,
        "color": "#333333"
    }, {
        "country": "Poland",
        "visits": 328,
        "color": "#000000"
    }],
    "valueAxes": [{
        "position": "left",
        "title": "Visitors"
    }],
    "graphs": [{
        "balloonText": "[[category]]: <b>[[value]]</b>",
        "fillColorsField": "color",
        "fillAlphas": 1,
        "lineAlpha": 0.1,
        "type": "column",
        "valueField": "visits"
    }],
    "depth3D": 20,
    "angle": 30,
    "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
    },    
    "categoryField": "country",
    "categoryAxis": {
        "gridPosition": "start",
        "labelRotation": 90
    },
    "export": {
        "enabled": true
     }

});
jQuery('.chart-input3').off().on('input change',function() {
    var property    = jQuery(this).data('property');
    var target      = chart;
    chart.startDuration = 0;

    if ( property == 'topRadius') {
        target = chart.graphs[0];
        if ( this.value == 0 ) {
          this.value = undefined;
        }
    }

    target[property] = this.value;
    chart.validateNow();
});

});
    // Bar Chart   

  var chart = AmCharts.makeChart( "chartdiv", {
  "type": "serial",
  "addClassNames": true,
  "theme": "light",
  "autoMargins": false,
  "marginLeft": 30,
  "marginRight": 8,
  "marginTop": 10,
  "marginBottom": 26,
  "balloon": {
    "adjustBorderColor": false,
    "horizontalPadding": 10,
    "verticalPadding": 8,
    "color": "#ffffff"
  },

  "dataProvider": [ {
    "year": 2009,
    "income": 20,
    "expenses": 20
  }, {
    "year": 2010,
    "income": 22,
    "expenses": 22
  }, {
    "year": 2011,
    "income": 30,
    "expenses": 30
  }, {
    "year": 2012,
    "income": 35,
    "expenses": 35
  }, {
    "year": 2013,
    "income": 40,
    "expenses": 40
  }, {
    "year": 2014,
    "income": 45,
    "expenses": 45
  }, {
    "year": 2015,
    "income": 50,
    "expenses": 50,
    "dashLengthColumn": 5    
  }, {
    "year": 2016,
    "income": 55,
    "expenses": 32.9,
    "dashLengthColumn": 5,
    "alpha": 0.2,
    "additional": "(projection)"
  } ],
  "valueAxes": [ {
    "axisAlpha": 0,
    "position": "left"
  } ],
  "startDuration": 1,
  "graphs": [ {
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
    "fillAlphas": 1,
    "title": "Income",
    "type": "column",
    "valueField": "income",
    "dashLengthField": "dashLengthColumn"
  }, {
    "id": "graph2",
    "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
    "bullet": "round",
    "lineThickness": 3,
    "bulletSize": 7,
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "useLineColorForBulletBorder": true,
    "bulletBorderThickness": 3,
    "fillAlphas": 0,
    "lineAlpha": 1,
    "title": "Expenses",
    "valueField": "expenses",
    "dashLengthField": "dashLengthLine"
  } ],
  "categoryField": "year",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
    "tickLength": 0
  },
  "export": {
    "enabled": true
  }
} );




//Duration on Value Axis 

var chart = AmCharts.makeChart("chartValueAxis", {
    "type": "serial",
    "theme": "light",
    "legend": {
        "equalWidths": false,
        "useGraphSettings": true,
        "valueAlign": "left",
        "valueWidth": 120
    },
    "dataProvider": [{
        "date": "2012-01-01",
        "distance": 227,
        "townName": "New York",
        "townName2": "New York",
        "townSize": 25,
        "latitude": 40.71,
        "duration": 408
    }, {
        "date": "2012-01-02",
        "distance": 371,
        "townName": "Washington",
        "townSize": 14,
        "latitude": 38.89,
        "duration": 482
    }, {
        "date": "2012-01-03",
        "distance": 433,
        "townName": "Wilmington",
        "townSize": 6,
        "latitude": 34.22,
        "duration": 562
    }, {
        "date": "2012-01-04",
        "distance": 345,
        "townName": "Jacksonville",
        "townSize": 7,
        "latitude": 30.35,
        "duration": 379
    }, {
        "date": "2012-01-05",
        "distance": 480,
        "townName": "Miami",
        "townName2": "Miami",
        "townSize": 10,
        "latitude": 25.83,
        "duration": 501
    }, {
        "date": "2012-01-06",
        "distance": 386,
        "townName": "Tallahassee",
        "townSize": 7,
        "latitude": 30.46,
        "duration": 443
    }, {
        "date": "2012-01-07",
        "distance": 348,
        "townName": "New Orleans",
        "townSize": 10,
        "latitude": 29.94,
        "duration": 405
    }, {
        "date": "2012-01-08",
        "distance": 238,
        "townName": "Houston",
        "townName2": "Houston",
        "townSize": 16,
        "latitude": 29.76,
        "duration": 309
    }, {
        "date": "2012-01-09",
        "distance": 218,
        "townName": "Dalas",
        "townSize": 17,
        "latitude": 32.8,
        "duration": 287
    }, {
        "date": "2012-01-10",
        "distance": 349,
        "townName": "Oklahoma City",
        "townSize": 11,
        "latitude": 35.49,
        "duration": 485
    }, {
        "date": "2012-01-11",
        "distance": 603,
        "townName": "Kansas City",
        "townSize": 10,
        "latitude": 39.1,
        "duration": 890
    }, {
        "date": "2012-01-12",
        "distance": 534,
        "townName": "Denver",
        "townName2": "Denver",
        "townSize": 18,
        "latitude": 39.74,
        "duration": 810
    }, {
        "date": "2012-01-13",
        "townName": "Salt Lake City",
        "townSize": 12,
        "distance": 425,
        "duration": 670,
        "latitude": 40.75,
        "dashLength": 8,
        "alpha": 0.4
    }, {
        "date": "2012-01-14",
        "latitude": 36.1,
        "duration": 470,
        "townName": "Las Vegas",
        "townName2": "Las Vegas"
    }, {
        "date": "2012-01-15"
    }, {
        "date": "2012-01-16"
    }, {
        "date": "2012-01-17"
    }, {
        "date": "2012-01-18"
    }, {
        "date": "2012-01-19"
    }],
    "valueAxes": [{
        "id": "distanceAxis",
        "axisAlpha": 0,
        "gridAlpha": 0,
        "position": "left",
        "title": "distance"
    }, {
        "id": "latitudeAxis",
        "axisAlpha": 0,
        "gridAlpha": 0,
        "labelsEnabled": false,
        "position": "right"
    }, {
        "id": "durationAxis",
        "duration": "mm",
        "durationUnits": {
            "hh": "h ",
            "mm": "min"
        },
        "axisAlpha": 0,
        "gridAlpha": 0,
        "inside": true,
        "position": "right",
        "title": "duration"
    }],
    "graphs": [{
        "alphaField": "alpha",
        "balloonText": "[[value]] miles",
        "dashLengthField": "dashLength",
        "fillAlphas": 0.7,
        "legendPeriodValueText": "total: [[value.sum]] mi",
        "legendValueText": "[[value]] mi",
        "title": "distance",
        "type": "column",
        "valueField": "distance",
        "valueAxis": "distanceAxis"
    }, {
        "balloonText": "latitude:[[value]]",
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "useLineColorForBulletBorder": true,
        "bulletColor": "#FFFFFF",
        "bulletSizeField": "townSize",
        "dashLengthField": "dashLength",
        "descriptionField": "townName",
        "labelPosition": "right",
        "labelText": "[[townName2]]",
        "legendValueText": "[[description]]/[[value]]",
        "title": "latitude/city",
        "fillAlphas": 0,
        "valueField": "latitude",
        "valueAxis": "latitudeAxis"
    }, {
        "bullet": "square",
        "bulletBorderAlpha": 1,
        "bulletBorderThickness": 1,
        "dashLengthField": "dashLength",
        "legendValueText": "[[value]]",
        "title": "duration",
        "fillAlphas": 0,
        "valueField": "duration",
        "valueAxis": "durationAxis"
    }],
    "chartCursor": {
        "categoryBalloonDateFormat": "DD",
        "cursorAlpha": 0.1,
        "cursorColor":"#000000",
         "fullWidth":true,
        "valueBalloonsEnabled": false,
        "zoomable": false
    },
    "dataDateFormat": "YYYY-MM-DD",
    "categoryField": "date",
    "categoryAxis": {
        "dateFormats": [{
            "period": "DD",
            "format": "DD"
        }, {
            "period": "WW",
            "format": "MMM DD"
        }, {
            "period": "MM",
            "format": "MMM"
        }, {
            "period": "YYYY",
            "format": "YYYY"
        }],
        "parseDates": true,
        "autoGridCount": false,
        "axisColor": "#555555",
        "gridAlpha": 0.1,
        "gridColor": "#FFFFFF",
        "gridCount": 50
    },
    "export": {
        "enabled": true
     }
});




//  Gantt chart

AmCharts.useUTC = true;
var chart = AmCharts.makeChart( "ganttChart", {
    "type": "gantt",
    "theme": "light",
    "marginRight": 70,
    "period": "hh",
    "dataDateFormat":"YYYY-MM-DD",
    "balloonDateFormat": "JJ:NN",
    "columnWidth": 0.5,
    "valueAxis": {
        "type": "date",
        "minimum": 7,
        "maximum": 31
    },
    "brightnessStep": 10,
    "graph": {
        "fillAlphas": 1,
        "balloonText": "<b>[[task]]</b>: [[open]] [[value]]"
    },
    "rotate": true,
    "categoryField": "category",
    "segmentsField": "segments",
    "colorField": "color",
    "startDate": "2015-01-01",
    "startField": "start",
    "endField": "end",
    "durationField": "duration",
    "dataProvider": [ {
        "category": "John",
        "segments": [ {
            "start": 7,
            "duration": 2,
            "color": "#46615e",
            "task": "Task #1"
        }, {
            "duration": 2,
            "color": "#727d6f",
            "task": "Task #2"
        }, {
            "duration": 2,
            "color": "#8dc49f",
            "task": "Task #3"
        } ]
    }, {
        "category": "Smith",
        "segments": [ {
            "start": 10,
            "duration": 2,
            "color": "#727d6f",
            "task": "Task #2"
        }, {
            "duration": 1,
            "color": "#8dc49f",
            "task": "Task #3"
        }, {
            "duration": 4,
            "color": "#46615e",
            "task": "Task #1"
        } ]
    }, {
        "category": "Ben",
        "segments": [ {
            "start": 12,
            "duration": 2,
            "color": "#727d6f",
            "task": "Task #2"
        }, {
            "start": 16,
            "duration": 2,
            "color": "#FFE4C4",
            "task": "Task #4"
        } ]
    }, {
        "category": "Mike",
        "segments": [ {
            "start": 9,
            "duration": 6,
            "color": "#46615e",
            "task": "Task #1"
        }, {
            "duration": 4,
            "color": "#727d6f",
            "task": "Task #2"
        } ]
    }, {
        "category": "Lenny",
        "segments": [ {
            "start": 8,
            "duration": 1,
            "color": "#8dc49f",
            "task": "Task #3"
        }, {
            "duration": 4,
            "color": "#46615e",
            "task": "Task #1"
        } ]
    }, {
        "category": "Scott",
        "segments": [ {
            "start": 15,
            "duration": 3,
            "color": "#727d6f",
            "task": "Task #2"
        } ]
    }, {
        "category": "Julia",
        "segments": [ {
            "start": 9,
            "duration": 2,
            "color": "#46615e",
            "task": "Task #1"
        }, {
            "duration": 1,
            "color": "#727d6f",
            "task": "Task #2"
        }, {
            "duration": 8,
            "color": "#8dc49f",
            "task": "Task #3"
        } ]
    }, {
        "category": "Bob",
        "segments": [ {
            "start": 9,
            "duration": 8,
            "color": "#727d6f",
            "task": "Task #2"
        }, {
            "duration": 7,
            "color": "#8dc49f",
            "task": "Task #3"
        } ]
    }, {
        "category": "Kendra",
        "segments": [ {
            "start": 11,
            "duration": 8,
            "color": "#727d6f",
            "task": "Task #2"
        }, {
            "start": 16,
            "duration": 2,
            "color": "#FFE4C4",
            "task": "Task #4"
        } ]
    }, {
        "category": "Tom",
        "segments": [ {
            "start": 9,
            "duration": 4,
            "color": "#46615e",
            "task": "Task #1"
        }, {
            "duration": 3,
            "color": "#727d6f",
            "task": "Task #2"
        }, {
            "duration": 5,
            "color": "#8dc49f",
            "task": "Task #3"
        } ]
    }, {
        "category": "Kyle",
        "segments": [ {
            "start": 6,
            "duration": 3,
            "color": "#727d6f",
            "task": "Task #2"
        } ]
    }, {
        "category": "Anita",
        "segments": [ {
            "start": 12,
            "duration": 2,
            "color": "#727d6f",
            "task": "Task #2"
        }, {
            "start": 16,
            "duration": 2,
            "color": "#FFE4C4",
            "task": "Task #4"
        } ]
    }, {
        "category": "Jack",
        "segments": [ {
            "start": 8,
            "duration": 10,
            "color": "#46615e",
            "task": "Task #1"
        }, {
            "duration": 2,
            "color": "#727d6f",
            "task": "Task #2"
        } ]
    }, {
        "category": "Kim",
        "segments": [ {
            "start": 12,
            "duration": 2,
            "color": "#727d6f",
            "task": "Task #2"
        }, {
            "duration": 3,
            "color": "#8dc49f",
            "task": "Task #3"
        } ]
    }, {
        "category": "Aaron",
        "segments": [ {
            "start": 18,
            "duration": 2,
            "color": "#727d6f",
            "task": "Task #2"
        }, {
            "duration": 2,
            "color": "#FFE4C4",
            "task": "Task #4"
        } ]
    }, {
        "category": "Alan",
        "segments": [ {
            "start": 17,
            "duration": 2,
            "color": "#46615e",
            "task": "Task #1"
        }, {
            "duration": 2,
            "color": "#727d6f",
            "task": "Task #2"
        }, {
            "duration": 2,
            "color": "#8dc49f",
            "task": "Task #3"
        } ]
    }, {
        "category": "Ruth",
        "segments": [ {
            "start": 13,
            "duration": 2,
            "color": "#727d6f",
            "task": "Task #2"
        }, {
            "duration": 1,
            "color": "#8dc49f",
            "task": "Task #3"
        }, {
            "duration": 4,
            "color": "#46615e",
            "task": "Task #1"
        } ]
    }, {
        "category": "Simon",
        "segments": [ {
            "start": 10,
            "duration": 3,
            "color": "#727d6f",
            "task": "Task #2"
        }, {
            "start": 17,
            "duration": 4,
            "color": "#FFE4C4",
            "task": "Task #4"
        } ]
    } ],
    "valueScrollbar": {
        "autoGridCount":true
    },
    "chartCursor": {
        "cursorColor":"#55bb76",
        "valueBalloonsEnabled": false,
        "cursorAlpha": 0,
        "valueLineAlpha":0.5,
        "valueLineBalloonEnabled": true,
        "valueLineEnabled": true,
        "zoomable":false,
        "valueZoomable":true
    },
    "export": {
        "enabled": true
     }
} );



// Simple Pie Chart

var chart = AmCharts.makeChart( "simplePieChart", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [ {
    "country": "Lithuania",
    "litres": 501.9
  }, {
    "country": "Czech Republic",
    "litres": 301.9
  }, {
    "country": "Ireland",
    "litres": 201.1
  }, {
    "country": "Germany",
    "litres": 165.8
  }, {
    "country": "Australia",
    "litres": 139.9
  }, {
    "country": "Austria",
    "litres": 128.3
  }, {
    "country": "UK",
    "litres": 99
  }, {
    "country": "Belgium",
    "litres": 60
  }, {
    "country": "The Netherlands",
    "litres": 50
  } ],
  "valueField": "litres",
  "titleField": "country",
   "balloon":{
   "fixedPosition":true
  },
  "export": {
    "enabled": true
  }
} );



//Bar and line chart mix

var chart = AmCharts.makeChart("Bar-line", {
    "type": "serial",
    "theme": "light",  
    "handDrawn":true,
    "handDrawScatter":3,
    "legend": {
        "useGraphSettings": true,
        "markerSize":12,
        "valueWidth":0,
        "verticalGap":0
    },
    "dataProvider": [{
        "year": 2005,
        "income": 23.5,
        "expenses": 18.1
    }, {
        "year": 2006,
        "income": 26.2,
        "expenses": 22.8
    }, {
        "year": 2007,
        "income": 30.1,
        "expenses": 23.9
    }, {
        "year": 2008,
        "income": 29.5,
        "expenses": 25.1
    }, {
        "year": 2009,
        "income": 24.6,
        "expenses": 25
    }],
    "valueAxes": [{
        "minorGridAlpha": 0.08,
        "minorGridEnabled": true,
        "position": "top",
        "axisAlpha":0
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b></span>",
        "title": "Income",
        "type": "column",
        "fillAlphas": 0.8,
         
        "valueField": "income"
    }, {
        "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b></span>",
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "useLineColorForBulletBorder": true,
        "fillAlphas": 0,
        "lineThickness": 2,
        "lineAlpha": 1,
        "bulletSize": 7,
        "title": "Expenses",
        "valueField": "expenses"
    }],
    "rotate": true,
    "categoryField": "year",
    "categoryAxis": {
        "gridPosition": "start"
    },
    "export": {
        "enabled": true
     }

});


// Pyramid Chart
var chart = AmCharts.makeChart( "pyramidChart", {
  "type": "funnel",
  "theme": "light",
  "dataProvider": [ {
    "title": "Website visits",
    "value": 300
  }, {
    "title": "Downloads",
    "value": 123
  }, {
    "title": "Requested price list",
    "value": 98
  }, {
    "title": "Contaced for more info",
    "value": 72
  }, {
    "title": "Purchased",
    "value": 35
  }, {
    "title": "Contacted for support",
    "value": 15
  }, {
    "title": "Purchased additional products",
    "value": 8
  } ],
  "balloon": {
    "fixedPosition": true
  },
  "valueField": "value",
  "titleField": "title",
  "marginRight": 240,
  "marginLeft": 50,
  "startX": -500,
  "rotate": true,
  "labelPosition": "right",
  "balloonText": "[[title]]: [[value]]n[[description]]",
  "export": {
    "enabled": true
  }
} );

// Polar Chart

var chart = AmCharts.makeChart( "polarChart", {
  "type": "radar",
  "theme": "light",
  "dataProvider": [ {
    "direction": "N",
    "value": 8
  }, {
    "direction": "NE",
    "value": 9
  }, {
    "direction": "E",
    "value": 4.5
  }, {
    "direction": "SE",
    "value": 3.5
  }, {
    "direction": "S",
    "value": 9.2
  }, {
    "direction": "SW",
    "value": 8.4
  }, {
    "direction": "W",
    "value": 11.1
  }, {
    "direction": "NW",
    "value": 10
  } ],
  "valueAxes": [ {
    "gridType": "circles",
    "minimum": 0,
    "autoGridCount": false,
    "axisAlpha": 0.2,
    "fillAlpha": 0.05,
    "fillColor": "#FFFFFF",
    "gridAlpha": 0.08,
    "guides": [ {
      "angle": 225,
      "fillAlpha": 0.3,
      "fillColor": "#0066CC",
      "tickLength": 0,
      "toAngle": 315,
      "toValue": 14,
      "value": 0,
      "lineAlpha": 0,

    }, {
      "angle": 45,
      "fillAlpha": 0.3,
      "fillColor": "#CC3333",
      "tickLength": 0,
      "toAngle": 135,
      "toValue": 14,
      "value": 0,
      "lineAlpha": 0,
    } ],
    "position": "left"
  } ],
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: [[value]] m/s",
    "bullet": "round",
    "fillAlphas": 0.3,
    "valueField": "value"
  } ],
  "categoryField": "direction",
  "export": {
    "enabled": true
  }
} );



// Intraday Data Stock Chart


var chartData = generateChartData();

function generateChartData() {
  var chartData = [];
  var firstDate = new Date( 2012, 0, 1 );
  firstDate.setDate( firstDate.getDate() - 1000 );
  firstDate.setHours( 0, 0, 0, 0 );

  for ( var i = 0; i < 1000; i++ ) {
    var newDate = new Date( firstDate );
    newDate.setHours( 0, i, 0, 0 );

    var a = Math.round( Math.random() * ( 40 + i ) ) + 100 + i;
    var b = Math.round( Math.random() * 100000000 );

    chartData.push( {
      date: newDate,
      value: a,
      volume: b
    } );
  }
  return chartData;
}

var chart = AmCharts.makeChart( "stockChart", {
  "type": "stock",
  "theme": "light",

  "categoryAxesSettings": {
    "minPeriod": "mm"
  },

  "dataSets": [ {
    "color": "#b0de09",
    "fieldMappings": [ {
      "fromField": "value",
      "toField": "value"
    }, {
      "fromField": "volume",
      "toField": "volume"
    } ],

    "dataProvider": chartData,
    "categoryField": "date"
  } ],

  "panels": [ {
    "showCategoryAxis": false,
    "title": "Value",
    "percentHeight": 70,

    "stockGraphs": [ {
      "id": "g1",
      "valueField": "value",
      "type": "smoothedLine",
      "lineThickness": 2,
      "bullet": "round"
    } ],


    "stockLegend": {
      "valueTextRegular": " ",
      "markerType": "none"
    }
  }, {
    "title": "Volume",
    "percentHeight": 30,
    "stockGraphs": [ {
      "valueField": "volume",
      "type": "column",
      "cornerRadiusTop": 2,
      "fillAlphas": 1
    } ],

    "stockLegend": {
      "valueTextRegular": " ",
      "markerType": "none"
    }
  } ],

  "chartScrollbarSettings": {
    "graph": "g1",
    "usePeriod": "10mm",
    "position": "top"
  },

  "chartCursorSettings": {
    "valueBalloonsEnabled": true
  },

  "periodSelector": {
    "position": "top",
    "dateFormat": "YYYY-MM-DD JJ:NN",
    "inputFieldWidth": 150,
    "periods": [ {
      "period": "hh",
      "count": 1,
      "label": "1 hour",
      "selected": true
    }, {
      "period": "hh",
      "count": 2,
      "label": "2 hours"
    }, {
      "period": "hh",
      "count": 5,
      "label": "5 hour"
    }, {
      "period": "hh",
      "count": 12,
      "label": "12 hours"
    }, {
      "period": "MAX",
      "label": "MAX"
    } ]
  },

  "panelsSettings": {
    "usePrefixes": true
  },

  "export": {
    "enabled": true,
    "position": "bottom-right"
  }
} );


/*----------Flight routes map------------*/

// svg path for target icon
var targetSVG = "M9,0C4.029,0,0,4.029,0,9s4.029,9,9,9s9-4.029,9-9S13.971,0,9,0z M9,15.93 c-3.83,0-6.93-3.1-6.93-6.93S5.17,2.07,9,2.07s6.93,3.1,6.93,6.93S12.83,15.93,9,15.93 M12.5,9c0,1.933-1.567,3.5-3.5,3.5S5.5,10.933,5.5,9S7.067,5.5,9,5.5 S12.5,7.067,12.5,9z";
// svg path for plane icon
var planeSVG = "M19.671,8.11l-2.777,2.777l-3.837-0.861c0.362-0.505,0.916-1.683,0.464-2.135c-0.518-0.517-1.979,0.278-2.305,0.604l-0.913,0.913L7.614,8.804l-2.021,2.021l2.232,1.061l-0.082,0.082l1.701,1.701l0.688-0.687l3.164,1.504L9.571,18.21H6.413l-1.137,1.138l3.6,0.948l1.83,1.83l0.947,3.598l1.137-1.137V21.43l3.725-3.725l1.504,3.164l-0.687,0.687l1.702,1.701l0.081-0.081l1.062,2.231l2.02-2.02l-0.604-2.689l0.912-0.912c0.326-0.326,1.121-1.789,0.604-2.306c-0.452-0.452-1.63,0.101-2.135,0.464l-0.861-3.838l2.777-2.777c0.947-0.947,3.599-4.862,2.62-5.839C24.533,4.512,20.618,7.163,19.671,8.11z";

window.map = AmCharts.makeChart( "flightRoutes", {
  type: "map",
  "theme": "light",
  dataProvider: {
    map: "worldLow",
    linkToObject: "london",
    images: [ {
        id: "london",
        color: "#000000",
        svgPath: targetSVG,
        title: "London",
        latitude: 51.5002,
        longitude: -0.1262,
        scale: 1.5,
        zoomLevel: 2.74,
        zoomLongitude: -20.1341,
        zoomLatitude: 49.1712,

        lines: [ {
          latitudes: [ 51.5002, 50.4422 ],
          longitudes: [ -0.1262, 30.5367 ]
        }, {
          latitudes: [ 51.5002, 46.9480 ],
          longitudes: [ -0.1262, 7.4481 ]
        }, {
          latitudes: [ 51.5002, 59.3328 ],
          longitudes: [ -0.1262, 18.0645 ]
        }, {
          latitudes: [ 51.5002, 40.4167 ],
          longitudes: [ -0.1262, -3.7033 ]
        }, {
          latitudes: [ 51.5002, 46.0514 ],
          longitudes: [ -0.1262, 14.5060 ]
        }, {
          latitudes: [ 51.5002, 48.2116 ],
          longitudes: [ -0.1262, 17.1547 ]
        }, {
          latitudes: [ 51.5002, 44.8048 ],
          longitudes: [ -0.1262, 20.4781 ]
        }, {
          latitudes: [ 51.5002, 55.7558 ],
          longitudes: [ -0.1262, 37.6176 ]
        }, {
          latitudes: [ 51.5002, 38.7072 ],
          longitudes: [ -0.1262, -9.1355 ]
        }, {
          latitudes: [ 51.5002, 54.6896 ],
          longitudes: [ -0.1262, 25.2799 ]
        }, {
          latitudes: [ 51.5002, 64.1353 ],
          longitudes: [ -0.1262, -21.8952 ]
        }, {
          latitudes: [ 51.5002, 40.4300 ],
          longitudes: [ -0.1262, -74.0000 ]
        } ],

        images: [ {
          label: "Flights from London",
          svgPath: planeSVG,
          left: 100,
          top: 45,
          labelShiftY: 5,
          color: "#CC0000",
          labelColor: "#CC0000",
          labelRollOverColor: "#CC0000",
          labelFontSize: 20
        }, {
          label: "show flights from Vilnius",
          left: 106,
          top: 70,
          labelColor: "#000000",
          labelRollOverColor: "#CC0000",
          labelFontSize: 11,
          linkToObject: "vilnius"
        } ]
      },

      {
        id: "vilnius",
        color: "#000000",
        svgPath: targetSVG,
        title: "Vilnius",
        latitude: 54.6896,
        longitude: 25.2799,
        scale: 1.5,
        zoomLevel: 4.92,
        zoomLongitude: 15.4492,
        zoomLatitude: 50.2631,

        lines: [ {
          latitudes: [ 54.6896, 50.8371 ],
          longitudes: [ 25.2799, 4.3676 ]
        }, {
          latitudes: [ 54.6896, 59.9138 ],
          longitudes: [ 25.2799, 10.7387 ]
        }, {
          latitudes: [ 54.6896, 40.4167 ],
          longitudes: [ 25.2799, -3.7033 ]
        }, {
          latitudes: [ 54.6896, 50.0878 ],
          longitudes: [ 25.2799, 14.4205 ]
        }, {
          latitudes: [ 54.6896, 48.2116 ],
          longitudes: [ 25.2799, 17.1547 ]
        }, {
          latitudes: [ 54.6896, 44.8048 ],
          longitudes: [ 25.2799, 20.4781 ]
        }, {
          latitudes: [ 54.6896, 55.7558 ],
          longitudes: [ 25.2799, 37.6176 ]
        }, {
          latitudes: [ 54.6896, 37.9792 ],
          longitudes: [ 25.2799, 23.7166 ]
        }, {
          latitudes: [ 54.6896, 54.6896 ],
          longitudes: [ 25.2799, 25.2799 ]
        }, {
          latitudes: [ 54.6896, 51.5002 ],
          longitudes: [ 25.2799, -0.1262 ]
        }, {
          latitudes: [ 54.6896, 53.3441 ],
          longitudes: [ 25.2799, -6.2675 ]
        } ],

        images: [ {
          label: "Flights from Vilnius",
          svgPath: planeSVG,
          left: 100,
          top: 45,
          labelShiftY: 5,
          color: "#CC0000",
          labelColor: "#CC0000",
          labelRollOverColor: "#CC0000",
          labelFontSize: 20
        }, {
          label: "show flights from London",
          left: 106,
          top: 70,
          labelColor: "#000000",
          labelRollOverColor: "#CC0000",
          labelFontSize: 11,
          linkToObject: "london"
        } ]
      }, {
        svgPath: targetSVG,
        title: "Brussels",
        latitude: 50.8371,
        longitude: 4.3676
      }, {
        svgPath: targetSVG,
        title: "Prague",
        latitude: 50.0878,
        longitude: 14.4205
      }, {
        svgPath: targetSVG,
        title: "Athens",
        latitude: 37.9792,
        longitude: 23.7166
      }, {
        svgPath: targetSVG,
        title: "Reykjavik",
        latitude: 64.1353,
        longitude: -21.8952
      }, {
        svgPath: targetSVG,
        title: "Dublin",
        latitude: 53.3441,
        longitude: -6.2675
      }, {
        svgPath: targetSVG,
        title: "Oslo",
        latitude: 59.9138,
        longitude: 10.7387
      }, {
        svgPath: targetSVG,
        title: "Lisbon",
        latitude: 38.7072,
        longitude: -9.1355
      }, {
        svgPath: targetSVG,
        title: "Moscow",
        latitude: 55.7558,
        longitude: 37.6176
      }, {
        svgPath: targetSVG,
        title: "Belgrade",
        latitude: 44.8048,
        longitude: 20.4781
      }, {
        svgPath: targetSVG,
        title: "Bratislava",
        latitude: 48.2116,
        longitude: 17.1547
      }, {
        svgPath: targetSVG,
        title: "Ljubljana",
        latitude: 46.0514,
        longitude: 14.5060
      }, {
        svgPath: targetSVG,
        title: "Madrid",
        latitude: 40.4167,
        longitude: -3.7033
      }, {
        svgPath: targetSVG,
        title: "Stockholm",
        latitude: 59.3328,
        longitude: 18.0645
      }, {
        svgPath: targetSVG,
        title: "Bern",
        latitude: 46.9480,
        longitude: 7.4481
      }, {
        svgPath: targetSVG,
        title: "Kiev",
        latitude: 50.4422,
        longitude: 30.5367
      }, {
        svgPath: targetSVG,
        title: "Paris",
        latitude: 48.8567,
        longitude: 2.3510
      }, {
        svgPath: targetSVG,
        title: "New York",
        latitude: 40.43,
        longitude: -74
      }
    ]
  },

  areasSettings: {
    unlistedAreasColor: "#FFCC00"
  },

  imagesSettings: {
    color: "#CC0000",
    rollOverColor: "#CC0000",
    selectedColor: "#000000"
  },

  linesSettings: {
    color: "#CC0000",
    alpha: 0.4
  },
   
  balloon:{
   drop:true
  },


  backgroundZoomsToTop: true,
  linesAboveImages: true,

  "export": {
    "enabled": true
  }
} );


//--------------------------Date Based Data------------------------------------//


var chart = AmCharts.makeChart("DateBasedData", {
    "type": "serial",
    "theme": "light",
    "marginRight": 40,
    "marginLeft": 40,
    "autoMarginOffset": 20,
    "mouseWheelZoomEnabled":true,
    "dataDateFormat": "YYYY-MM-DD",
    "valueAxes": [{
        "id": "v1",
        "axisAlpha": 0,
        "position": "left",
        "ignoreAxisWidth":true
    }],
    "balloon": {
        "borderThickness": 1,
        "shadowAlpha": 0
    },
    "graphs": [{
        "id": "g1",
        "balloon":{
          "drop":true,
          "adjustBorderColor":false,
          "color":"#ffffff"
        },
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "bulletSize": 5,
        "hideBulletsCount": 50,
        "lineThickness": 2,
        "title": "red line",
        "useLineColorForBulletBorder": true,
        "valueField": "value",
        "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
    }],
    "chartScrollbar": {
        "graph": "g1",
        "oppositeAxis":false,
        "offset":30,
        "scrollbarHeight": 80,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#888888",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0,
        "selectedGraphLineAlpha": 1,
        "autoGridCount":true,
        "color":"#AAAAAA"
    },
    "chartCursor": {
        "pan": true,
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "cursorAlpha":1,
        "cursorColor":"#258cbb",
        "limitToGraph":"g1",
        "valueLineAlpha":0.2
    },
    "valueScrollbar":{
      "oppositeAxis":false,
      "offset":50,
      "scrollbarHeight":10
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true,
        "dashLength": 1,
        "minorGridEnabled": true
    },
    "export": {
        "enabled": true
    },
    "dataProvider": [{
        "date": "2012-07-27",
        "value": 13
    }, {
        "date": "2012-07-28",
        "value": 11
    }, {
        "date": "2012-07-29",
        "value": 15
    }, {
        "date": "2012-07-30",
        "value": 16
    }, {
        "date": "2012-07-31",
        "value": 18
    }, {
        "date": "2012-08-01",
        "value": 13
    }, {
        "date": "2012-08-02",
        "value": 22
    }, {
        "date": "2012-08-03",
        "value": 23
    }, {
        "date": "2012-08-04",
        "value": 20
    }, {
        "date": "2012-08-05",
        "value": 17
    }, {
        "date": "2012-08-06",
        "value": 16
    }, {
        "date": "2012-08-07",
        "value": 18
    }, {
        "date": "2012-08-08",
        "value": 21
    }, {
        "date": "2012-08-09",
        "value": 26
    }, {
        "date": "2012-08-10",
        "value": 24
    }, {
        "date": "2012-08-11",
        "value": 29
    }, {
        "date": "2012-08-12",
        "value": 32
    }, {
        "date": "2012-08-13",
        "value": 18
    }, {
        "date": "2012-08-14",
        "value": 24
    }, {
        "date": "2012-08-15",
        "value": 22
    }, {
        "date": "2012-08-16",
        "value": 18
    }, {
        "date": "2012-08-17",
        "value": 19
    }, {
        "date": "2012-08-18",
        "value": 14
    }, {
        "date": "2012-08-19",
        "value": 15
    }, {
        "date": "2012-08-20",
        "value": 12
    }, {
        "date": "2012-08-21",
        "value": 8
    }, {
        "date": "2012-08-22",
        "value": 9
    }, {
        "date": "2012-08-23",
        "value": 8
    }, {
        "date": "2012-08-24",
        "value": 7
    }, {
        "date": "2012-08-25",
        "value": 5
    }, {
        "date": "2012-08-26",
        "value": 11
    }, {
        "date": "2012-08-27",
        "value": 13
    }, {
        "date": "2012-08-28",
        "value": 18
    }, {
        "date": "2012-08-29",
        "value": 20
    }, {
        "date": "2012-08-30",
        "value": 29
    }, {
        "date": "2012-08-31",
        "value": 33
    }, {
        "date": "2012-09-01",
        "value": 42
    }, {
        "date": "2012-09-02",
        "value": 35
    }, {
        "date": "2012-09-03",
        "value": 31
    }, {
        "date": "2012-09-04",
        "value": 47
    }, {
        "date": "2012-09-05",
        "value": 52
    }, {
        "date": "2012-09-06",
        "value": 46
    }, {
        "date": "2012-09-07",
        "value": 41
    }, {
        "date": "2012-09-08",
        "value": 43
    }, {
        "date": "2012-09-09",
        "value": 40
    }, {
        "date": "2012-09-10",
        "value": 39
    }, {
        "date": "2012-09-11",
        "value": 34
    }, {
        "date": "2012-09-12",
        "value": 29
    }, {
        "date": "2012-09-13",
        "value": 34
    }, {
        "date": "2012-09-14",
        "value": 37
    }, {
        "date": "2012-09-15",
        "value": 42
    }, {
        "date": "2012-09-16",
        "value": 49
    }, {
        "date": "2012-09-17",
        "value": 46
    }, {
        "date": "2012-09-18",
        "value": 47
    }, {
        "date": "2012-09-19",
        "value": 55
    }, {
        "date": "2012-09-20",
        "value": 59
    }, {
        "date": "2012-09-21",
        "value": 58
    }, {
        "date": "2012-09-22",
        "value": 57
    }, {
        "date": "2012-09-23",
        "value": 61
    }, {
        "date": "2012-09-24",
        "value": 59
    }, {
        "date": "2012-09-25",
        "value": 67
    }, {
        "date": "2012-09-26",
        "value": 65
    }, {
        "date": "2012-09-27",
        "value": 61
    }, {
        "date": "2012-09-28",
        "value": 66
    }, {
        "date": "2012-09-29",
        "value": 69
    }, {
        "date": "2012-09-30",
        "value": 71
    }, {
        "date": "2012-10-01",
        "value": 67
    }, {
        "date": "2012-10-02",
        "value": 63
    }, {
        "date": "2012-10-03",
        "value": 46
    }, {
        "date": "2012-10-04",
        "value": 32
    }, {
        "date": "2012-10-05",
        "value": 21
    }, {
        "date": "2012-10-06",
        "value": 18
    }, {
        "date": "2012-10-07",
        "value": 21
    }, {
        "date": "2012-10-08",
        "value": 28
    }, {
        "date": "2012-10-09",
        "value": 27
    }, {
        "date": "2012-10-10",
        "value": 36
    }, {
        "date": "2012-10-11",
        "value": 33
    }, {
        "date": "2012-10-12",
        "value": 31
    }, {
        "date": "2012-10-13",
        "value": 30
    }, {
        "date": "2012-10-14",
        "value": 34
    }, {
        "date": "2012-10-15",
        "value": 38
    }, {
        "date": "2012-10-16",
        "value": 37
    }, {
        "date": "2012-10-17",
        "value": 44
    }, {
        "date": "2012-10-18",
        "value": 49
    }, {
        "date": "2012-10-19",
        "value": 53
    }, {
        "date": "2012-10-20",
        "value": 57
    }, {
        "date": "2012-10-21",
        "value": 60
    }, {
        "date": "2012-10-22",
        "value": 61
    }, {
        "date": "2012-10-23",
        "value": 69
    }, {
        "date": "2012-10-24",
        "value": 67
    }, {
        "date": "2012-10-25",
        "value": 72
    }, {
        "date": "2012-10-26",
        "value": 77
    }, {
        "date": "2012-10-27",
        "value": 75
    }, {
        "date": "2012-10-28",
        "value": 70
    }, {
        "date": "2012-10-29",
        "value": 72
    }, {
        "date": "2012-10-30",
        "value": 70
    }, {
        "date": "2012-10-31",
        "value": 72
    }, {
        "date": "2012-11-01",
        "value": 73
    }, {
        "date": "2012-11-02",
        "value": 67
    }, {
        "date": "2012-11-03",
        "value": 68
    }, {
        "date": "2012-11-04",
        "value": 65
    }, {
        "date": "2012-11-05",
        "value": 71
    }, {
        "date": "2012-11-06",
        "value": 75
    }, {
        "date": "2012-11-07",
        "value": 74
    }, {
        "date": "2012-11-08",
        "value": 71
    }, {
        "date": "2012-11-09",
        "value": 76
    }, {
        "date": "2012-11-10",
        "value": 77
    }, {
        "date": "2012-11-11",
        "value": 81
    }, {
        "date": "2012-11-12",
        "value": 83
    }, {
        "date": "2012-11-13",
        "value": 80
    }, {
        "date": "2012-11-14",
        "value": 81
    }, {
        "date": "2012-11-15",
        "value": 87
    }, {
        "date": "2012-11-16",
        "value": 82
    }, {
        "date": "2012-11-17",
        "value": 86
    }, {
        "date": "2012-11-18",
        "value": 80
    }, {
        "date": "2012-11-19",
        "value": 87
    }, {
        "date": "2012-11-20",
        "value": 83
    }, {
        "date": "2012-11-21",
        "value": 85
    }, {
        "date": "2012-11-22",
        "value": 84
    }, {
        "date": "2012-11-23",
        "value": 82
    }, {
        "date": "2012-11-24",
        "value": 73
    }, {
        "date": "2012-11-25",
        "value": 71
    }, {
        "date": "2012-11-26",
        "value": 75
    }, {
        "date": "2012-11-27",
        "value": 79
    }, {
        "date": "2012-11-28",
        "value": 70
    }, {
        "date": "2012-11-29",
        "value": 73
    }, {
        "date": "2012-11-30",
        "value": 61
    }, {
        "date": "2012-12-01",
        "value": 62
    }, {
        "date": "2012-12-02",
        "value": 66
    }, {
        "date": "2012-12-03",
        "value": 65
    }, {
        "date": "2012-12-04",
        "value": 73
    }, {
        "date": "2012-12-05",
        "value": 79
    }, {
        "date": "2012-12-06",
        "value": 78
    }, {
        "date": "2012-12-07",
        "value": 78
    }, {
        "date": "2012-12-08",
        "value": 78
    }, {
        "date": "2012-12-09",
        "value": 74
    }, {
        "date": "2012-12-10",
        "value": 73
    }, {
        "date": "2012-12-11",
        "value": 75
    }, {
        "date": "2012-12-12",
        "value": 70
    }, {
        "date": "2012-12-13",
        "value": 77
    }, {
        "date": "2012-12-14",
        "value": 67
    }, {
        "date": "2012-12-15",
        "value": 62
    }, {
        "date": "2012-12-16",
        "value": 64
    }, {
        "date": "2012-12-17",
        "value": 61
    }, {
        "date": "2012-12-18",
        "value": 59
    }, {
        "date": "2012-12-19",
        "value": 53
    }, {
        "date": "2012-12-20",
        "value": 54
    }, {
        "date": "2012-12-21",
        "value": 56
    }, {
        "date": "2012-12-22",
        "value": 59
    }, {
        "date": "2012-12-23",
        "value": 58
    }, {
        "date": "2012-12-24",
        "value": 55
    }, {
        "date": "2012-12-25",
        "value": 52
    }, {
        "date": "2012-12-26",
        "value": 54
    }, {
        "date": "2012-12-27",
        "value": 50
    }, {
        "date": "2012-12-28",
        "value": 50
    }, {
        "date": "2012-12-29",
        "value": 51
    }, {
        "date": "2012-12-30",
        "value": 52
    }, {
        "date": "2012-12-31",
        "value": 58
    }, {
        "date": "2013-01-01",
        "value": 60
    }, {
        "date": "2013-01-02",
        "value": 67
    }, {
        "date": "2013-01-03",
        "value": 64
    }, {
        "date": "2013-01-04",
        "value": 66
    }, {
        "date": "2013-01-05",
        "value": 60
    }, {
        "date": "2013-01-06",
        "value": 63
    }, {
        "date": "2013-01-07",
        "value": 61
    }, {
        "date": "2013-01-08",
        "value": 60
    }, {
        "date": "2013-01-09",
        "value": 65
    }, {
        "date": "2013-01-10",
        "value": 75
    }, {
        "date": "2013-01-11",
        "value": 77
    }, {
        "date": "2013-01-12",
        "value": 78
    }, {
        "date": "2013-01-13",
        "value": 70
    }, {
        "date": "2013-01-14",
        "value": 70
    }, {
        "date": "2013-01-15",
        "value": 73
    }, {
        "date": "2013-01-16",
        "value": 71
    }, {
        "date": "2013-01-17",
        "value": 74
    }, {
        "date": "2013-01-18",
        "value": 78
    }, {
        "date": "2013-01-19",
        "value": 85
    }, {
        "date": "2013-01-20",
        "value": 82
    }, {
        "date": "2013-01-21",
        "value": 83
    }, {
        "date": "2013-01-22",
        "value": 88
    }, {
        "date": "2013-01-23",
        "value": 85
    }, {
        "date": "2013-01-24",
        "value": 85
    }, {
        "date": "2013-01-25",
        "value": 80
    }, {
        "date": "2013-01-26",
        "value": 87
    }, {
        "date": "2013-01-27",
        "value": 84
    }, {
        "date": "2013-01-28",
        "value": 83
    }, {
        "date": "2013-01-29",
        "value": 84
    }, {
        "date": "2013-01-30",
        "value": 81
    }]
});

chart.addListener("rendered", zoomChart);

zoomChart();

function zoomChart() {
    chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
}


// Line Changing Color
var chart = AmCharts.makeChart("LineChangingColor", {
    "type": "serial",
    "theme": "light",
    "marginRight": 80,
    "dataProvider": [{
        "lineColor": "#b7e021",
        "date": "2012-01-01",
        "duration": 408
    }, {
        "date": "2012-01-02",
        "duration": 482
    }, {
        "date": "2012-01-03",
        "duration": 562
    }, {
        "date": "2012-01-04",
        "duration": 379
    }, {
        "lineColor": "#fbd51a",
        "date": "2012-01-05",
        "duration": 501
    }, {
        "date": "2012-01-06",
        "duration": 443
    }, {
        "date": "2012-01-07",
        "duration": 405
    }, {
        "date": "2012-01-08",
        "duration": 309,
        "lineColor": "#2498d2"
    }, {
        "date": "2012-01-09",
        "duration": 287
    }, {
        "date": "2012-01-10",
        "duration": 485
    }, {
        "date": "2012-01-11",
        "duration": 890
    }, {
        "date": "2012-01-12",
        "duration": 810
    }],
    "balloon": {
        "cornerRadius": 6,
        "horizontalPadding": 15,
        "verticalPadding": 10
    },
    "valueAxes": [{
        "duration": "mm",
        "durationUnits": {
            "hh": "h ",
            "mm": "min"
        },
        "axisAlpha": 0
    }],
    "graphs": [{
        "bullet": "square",
        "bulletBorderAlpha": 1,
        "bulletBorderThickness": 1,
        "fillAlphas": 0.3,
        "fillColorsField": "lineColor",
        "legendValueText": "[[value]]",
        "lineColorField": "lineColor",
        "title": "duration",
        "valueField": "duration"
    }],
    "chartScrollbar": {

    },
    "chartCursor": {
        "categoryBalloonDateFormat": "YYYY MMM DD",
        "cursorAlpha": 0,
        "fullWidth": true
    },
    "dataDateFormat": "YYYY-MM-DD",
    "categoryField": "date",
    "categoryAxis": {
        "dateFormats": [{
            "period": "DD",
            "format": "DD"
        }, {
            "period": "WW",
            "format": "MMM DD"
        }, {
            "period": "MM",
            "format": "MMM"
        }, {
            "period": "YYYY",
            "format": "YYYY"
        }],
        "parseDates": true,
        "autoGridCount": false,
        "axisColor": "#555555",
        "gridAlpha": 0,
        "gridCount": 50
    },
    "export": {
        "enabled": true        
    }
});



chart.addListener("dataUpdated", zoomChart1);
zoomChart1();
function zoomChart1() {
    chart.zoomToDates(new Date(2012, 0, 3), new Date(2012, 0, 11));
}


// Trend Lines 


var chart = AmCharts.makeChart("trendLines", {
    "type": "serial",
    "theme": "light",
    "marginRight":80,
    "autoMarginOffset":20,
    "dataDateFormat": "YYYY-MM-DD HH:NN",
    "dataProvider": [{
        "date": "2012-01-01",
        "value": 8
    }, {
        "date": "2012-01-01",
        "value": 8
    }, {
        "date": "2012-01-02",
        "color":"#CC0000",
        "value": 10
    }, {
        "date": "2012-01-03",
        "value": 12
    }, {
        "date": "2012-01-04",
        "value": 14
    }, {
        "date": "2012-01-05",
        "value": 11
    }, {
        "date": "2012-01-06",
        "value": 6
    }, {
        "date": "2012-01-07",
        "value": 7
    }, {
        "date": "2012-01-08",
        "value": 9
    }, {
        "date": "2012-01-09",
        "value": 13
    }, {
        "date": "2012-01-10",
        "value": 15
    }, {
        "date": "2012-01-11",
        "color":"#CC0000",
        "value": 19
    }, {
        "date": "2012-01-12",
        "value": 21
    }, {
        "date": "2012-01-13",
        "value": 22
    }, {
        "date": "2012-01-14",
        "value": 20
    }, {
        "date": "2012-01-15",
        "value": 18
    }, {
        "date": "2012-01-16",
        "value": 14
    }, {
        "date": "2012-01-17",
        "color":"#CC0000",
        "value": 16
    }, {
        "date": "2012-01-18",
        "value": 18
    }, {
        "date": "2012-01-19",
        "value": 17
    }, {
        "date": "2012-01-20",
        "value": 15
    }, {
        "date": "2012-01-21",
        "value": 12
    }, {
        "date": "2012-01-22",
        "color":"#CC0000",
        "value": 10
    }, {
        "date": "2012-01-23",
        "value": 8
    }],
    "valueAxes": [{
        "axisAlpha": 0,
        "guides": [{
            "fillAlpha": 0.1,
            "fillColor": "#888888",
            "lineAlpha": 0,
            "toValue": 16,
            "value": 10
        }],
        "position": "left",
        "tickLength": 0
    }],
    "graphs": [{
        "balloonText": "[[category]]<br><b><span style='font-size:14px;'>value:[[value]]</span></b>",
        "bullet": "round",
        "dashLength": 3,
        "colorField":"color",
        "valueField": "value"
    }],
    "trendLines": [{
        "finalDate": "2012-01-11 12",
        "finalValue": 19,
        "initialDate": "2012-01-02 12",
        "initialValue": 10,
        "lineColor": "#CC0000"
    }, {
        "finalDate": "2012-01-22 12",
        "finalValue": 10,
        "initialDate": "2012-01-17 12",
        "initialValue": 16,
        "lineColor": "#CC0000"
    }],
    "chartScrollbar": {
        "scrollbarHeight":2,
        "offset":-1,
        "backgroundAlpha":0.1,
        "backgroundColor":"#888888",
        "selectedBackgroundColor":"#67b7dc",
        "selectedBackgroundAlpha":1
    },
    "chartCursor": {
        "fullWidth":true,
        "valueLineEabled":true,
        "valueLineBalloonEnabled":true,
        "valueLineAlpha":0.5,
        "cursorAlpha":0
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true,
        "axisAlpha": 0,
        "gridAlpha": 0.1,
        "minorGridAlpha": 0.1,
        "minorGridEnabled": true
    },
    "export": {
        "enabled": true
     }
});

chart.addListener("dataUpdated", zoomChart4);

function zoomChart4(){
    chart.zoomToDates(new Date(2012, 0, 2), new Date(2012, 0, 13));
}
