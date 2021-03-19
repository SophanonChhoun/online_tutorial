const monthNames = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN",
    "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"
];

var data = $('#monthly').data('data')
var graph_data = [];
for (var year in data) {
    graph_data[year] = [];

    Object.keys(data[year]).sort().forEach(function(key) {
        graph_data[year].push([monthNames[parseInt(key) - 1], data[year][key]])
    });
}
// data =  Object.entries(data).map(([k, v]) => ([Number(k), v]));
// var graph_data = [];
// data.forEach((ele) => {
//     var d =  Object.entries(ele[1]).map(([k, v]) => ([Number(k), v]));
//     var temp = [];
//     d.forEach((el) => {
//          temp.push([monthNames[el[0]], el[1]]);
//     });
//     graph_data[ele[0]]= temp;
// })

var Dashboard = function() {

    return {

        initCharts: function(year) {
            if (!jQuery.plot) {
                return;
            }

            function showChartTooltip(x, y, xValue, yValue) {
                $('<div id="tooltip" class="chart-tooltip">' + yValue + '<\/div>').css({
                    position: 'absolute',
                    display: 'none',
                    top: y - 40,
                    left: x - 40,
                    border: '0px solid #ccc',
                    padding: '2px 6px',
                    'background-color': '#fff'
                }).appendTo("body").fadeIn(200);
            }

            if ($('#site_activities').length != 0) {
                //site activities
                var previousPoint2 = null;
                $('#site_activities_loading').hide();
                $('#site_activities_content').show();

                var data1 = graph_data[year]


                var plot_statistics = $.plot($("#site_activities"),

                    [{
                        data: data1,
                        lines: {
                            fill: 0.2,
                            lineWidth: 0,
                        },
                        color: ['#BAD9F5']
                    }, {
                        data: data1,
                        points: {
                            show: true,
                            fill: true,
                            radius: 4,
                            fillColor: "#9ACAE6",
                            lineWidth: 2
                        },
                        color: '#9ACAE6',
                        shadowSize: 1
                    }, {
                        data: data1,
                        lines: {
                            show: true,
                            fill: false,
                            lineWidth: 3
                        },
                        color: '#9ACAE6',
                        shadowSize: 0
                    }],

                    {
                        xaxis: {
                            tickLength: 0,
                            tickDecimals: 0,
                            mode: "categories",
                            min: 0,
                            font: {
                                lineHeight: 18,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        yaxis: {
                            ticks: 5,
                            tickDecimals: 0,
                            tickColor: "#eee",
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#eee",
                            borderColor: "#eee",
                            borderWidth: 1
                        }
                    });

                $("#site_activities").bind("plothover", function(event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));
                    if (item) {
                        if (previousPoint2 != item.dataIndex) {
                            previousPoint2 = item.dataIndex;
                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);
                            showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1]);
                        }
                    }
                });

                $('#site_activities').bind("mouseleave", function() {
                    $("#tooltip").remove();
                });
            }
        },

        init: function(year) {
            this.initCharts(year);
        }
    };
}();

var d = new Date();
var year = d.getFullYear();

if (App.isAngularJsApp() === false) {
    jQuery(document).ready(function() {
        Dashboard.init(year); // init metronic core componets
    });
}

$('.changeYear').on('click', function () {
    var year = $(this).attr("id");
    Dashboard.init(year); // init metronic core componets
})

