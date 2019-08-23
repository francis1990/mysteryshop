
//morris area chart

$(function () {


    //morris bar chart
    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '15',
            b: 93.89
        }, {
            y: '7',
            b: 93.3

        }, {
            y: '10',
            b: 92.61

        }, {
            y: '9',
            b: 91.15
        }, {
            y: '5',
            b: 91.02
        }, {
            y: '21',
            b: 90.93
        }, {
            y: '17',
            b: 88.05
        }, {
            y: '20',
            b: 87.93
        }, {
            y: '8',
            b: 87.72
        },{
            y: '23',
            b: 87.3
        },{
            y: '4',
            b: 85.06
        }],
        xkey: 'y',
        ykeys: ['b'],
        labels: ['Group A'],
        hideHover: 'auto',
        resize: true,
        barSizeRatio: 0.50
    });

});
