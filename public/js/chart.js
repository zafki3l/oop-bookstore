const ctx = document.getElementById('myChart');

fetch('/oop-bookstore/actions/staff/salesReport/monthly.salesReport.php')
    .then((response) => response.json())
    .then(data  => {
        createChart(data, 'bar')
    });

function createChart(chartData, type) {
    new Chart(ctx, {
        type: type,
        data: {
            labels: chartData.map(row => + row.month),
            datasets: [{
                label: 'Sales Report of Month',
                data: chartData.map(row => row.income),
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}