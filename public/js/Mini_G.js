      Chart.pluginService.register({
  beforeRender: function(chart) {
    if (chart.config.options.showAllTooltips) {
      chart.pluginTooltips = [];
      chart.config.data.datasets.forEach(function(dataset, i) {
        chart.getDatasetMeta(i).data.forEach(function(sector, j) {
          chart.pluginTooltips.push(new Chart.Tooltip({
            _chart: chart.chart,
            _chartInstance: chart,
            _data: chart.data,
            _options: chart.options.tooltips,
            _active: [sector]
          }, chart));
        });
      });
      chart.options.tooltips.enabled = false;
    }
  },
  afterDraw: function(chart, easing) {
    if (chart.config.options.showAllTooltips) {
      if (!chart.allTooltipsOnce) {
        if (easing !== 1)
          return;
        chart.allTooltipsOnce = true;
      }


      chart.options.tooltips.enabled = true;
      Chart.helpers.each(chart.pluginTooltips, function(tooltip) {
        tooltip.initialize();
        tooltip.update();
        tooltip.pivot();
        tooltip.transition(easing).draw();
      });
      chart.options.tooltips.enabled = false;
    }
  }
});
      Chart.defaults.global.legend.display = false;
      var ctx = document.getElementById('mini_myChart');
       var chart = new Chart(ctx, {
    // The type of chart we want to create
      type: 'doughnut',

    // The data for our dataset
    data: {
        labels: ['Registros','Fornecedores','Serviços'],
        datasets: [{
            
            borderAlign:'center',
            backgroundColor: ['#656565','#585858','#3e3e3e'],
            borderColor: '#fff',
            data: [10,3,5],
            
        }]
    },

    // Configuration options go here
    options: {
      

        showAllTooltips: true,
        
    }
});