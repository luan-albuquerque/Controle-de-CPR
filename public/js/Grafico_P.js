 Chart.defaults.global.legend.display = false;
var ctx = document.getElementById('primary_myChart');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['Janneiro', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: '',
            backgroundColor: '#4f5050',
            borderColor: 'rgb(246, 203, 9)',
            data: [30.80, 25.50, 5.52, 2.36, 20.45, 30.70, 45.80],
            
        }]
    },

    // Configuration options go here
    options: {
       
        
    }
});