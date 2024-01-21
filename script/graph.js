$(document).ready(function() {
    var responseData;
    var startDatePicker = new Pikaday({
        field: document.getElementById('startDate'),
        format: 'YYYY-MM-DD',
        yearRange: [2000, moment().year()]
    });

    var endDatePicker = new Pikaday({
        field: document.getElementById('endDate'),
        format: 'YYYY-MM-DD',
        yearRange: [2000, moment().year()]
    });

    $.ajax({
        type: 'GET',   
        url: 'php/graph.php',
        dataType: 'json',
        success: function(data) {
            console.log('Success:', data);
            responseData = splitData(data);
            
            renderChart(responseData);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Error:', textStatus, errorThrown);
        }
    });


    document.getElementById('filterButton').addEventListener('click', function() {
        filterData(responseData);
    });

    document.getElementById('showAllButton').addEventListener('click', function() {
        renderChart(responseData);
    });
});

function filterData(data) { 
    var startDate = moment($('#startDate').val()).format('YYYY-MM-DD');
    var endDate = moment($('#endDate').val()).format('YYYY-MM-DD');

    var offArray = data[0];
    var reqArray = data[1];
    var finOffArray = data[2];
    var finReqArray = data[3];

    var filteredData = [
        offArray.filter(item => item.time >= startDate && item.time <= endDate),
        reqArray.filter(item => item.time >= startDate && item.time <= endDate),
        finOffArray.filter(item => item.time >= startDate && item.time <= endDate),
        finReqArray.filter(item => item.time >= startDate && item.time <= endDate)
    ];
    renderChart(filteredData);
}

function renderChart(data) {
    var numreq = countOccurrences(data, 'req');
    var numoff = countOccurrences(data, 'off');
    var numfinishedreq = countOccurrences(data, 'fin_req');
    var numfinishedoff = countOccurrences(data, 'fin_off');

    var ctx = document.getElementById('myChart').getContext('2d');

    // svisimo tou proigoumenou graph se periptosi kainourgiou
    Chart.helpers.each(Chart.instances, function (instance) {
        instance.destroy();
    });

    var chart = new Chart(ctx, {    //dimiourgia graph
        type: 'bar',
        data: {
            labels: ['requests', 'offers', 'finished requests', 'finished offers'],
            datasets: [{
                data: [numreq, numoff, numfinishedreq, numfinishedoff],
                backgroundColor: ['rgba(55, 179, 150)', 'rgba(55, 115, 179)', 'rgba(236, 66, 245)', 'rgba(87, 40, 89)'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                },
                x: {
                    ticks: {
                        color: 'green'
                        
                    }
                }
            }
        }
    });
}

function countOccurrences(data, category) {
    let offCount = data[0].length;
    let reqCount = data[1].length;
    let finOffCount = data[2].length;
    let finReqCount = data[3].length;

    let counts = {
        off: offCount,
        req: reqCount,
        fin_off: finOffCount,
        fin_req: finReqCount
    };

    return counts[category];
}

function splitData(data) {
    var offArray = data.off;
    var reqArray = data.req;
    var finOffArray = data.fin_off;
    var finReqArray = data.fin_req;

    return [offArray, reqArray, finOffArray, finReqArray];
}