
var myChartObject = document.getElementById('myChart');

var chart = new Chart(myChartObject, {
  type: 'line',
  data: {
    labels: ["2016-12-25", , "2016-12-26", "2016-12-30"],
    datasets: [{
      label: "Total User Count",
      borderColor: 'rgba(255,0,0,0.5)',
      backgroundColor: 'rgba(0,0,0,0.0)',
      data: []
    }]
  },
  options: {
    scales: {
      x: {
        type: 'time',
        time: {
          unit: 'day'
        }
      }
    }
  }
});



/*setTimeout(() => {

  chart.data = {
    labels: ["1", "2", "3"],
    datasets: [{
      label: "Total User Count",
      borderColor: 'rgba(255,0,0,0.5)',
      backgroundColor: 'rgba(0,0,0,0.0)',
      data: [10, 209, 100000]
    }]
  }
  chart.update();
}, 1000);*/


function loadUserDashboardChart() {
  var functionsOnSuccess = [
    [updateTotalUserCountChart, ['response']],
  ];
  ajaxSetup();
  ajax('/get_user_dashboard_chart', 'GET', functionsOnSuccess);
}






function updateTotalUserCountChart(response) {
  chart.data = {
    labels: response[0],
    datasets: [
    {
      label: "Total User Count",
      borderColor: '#FF7921',
      backgroundColor: 'rgba(0,0,0,0.0)',
      data: response[1]
    },
    
    {
      label: "MONTHLY ACTIVE USERS",
      borderColor: '#3fa7d6',
      backgroundColor: 'rgba(0,0,0,0.0)',
      data: response[2]
    },



    {
      label: "WEEKLY ACTIVE USERS",
      borderColor: '#59CD90',
      backgroundColor: 'rgba(0,0,0,0.0)',
      data: response[3]
    },


    {
      label: "DAILY ACTIVE USERS",
      borderColor: '#F52F57',
      backgroundColor: 'rgba(0,0,0,0.0)',
      data: response[4]
    },

    ]
  }
  $('#chart-parent').removeClass("skeleton");
  console.log(response);
  chart.update();
}

var rowCounter = 0;
function loadUserDashboardRows() {
  hideContentShowSkeletons('user_activity', 'user_activity_skeletons');
  var functionsOnSuccess = [
    [displayUserDashboardRows, ['response']],
  ];

  ajax('/get_user_dashboard_rows/'+rowCounter, 'GET', functionsOnSuccess);
  ajaxSetup();
}

function loadMoreDashboardRows() {
  $('#user_activity_skeletons').removeClass('d-none rounded');
  var functionsOnSuccess = [
    [displayUserDashboardRows, ['response']],
  ];
  ajaxSetup();
  ajax('/get_user_dashboard_rows/'+rowCounter, 'GET', functionsOnSuccess);
}

function displayUserDashboardRows(response) {
  
  rowCounter = response[1];
  if (rowCounter == 5) {
    showTable();
    showContentHideSkeletons('user_activity', 'user_activity_skeletons', response[0]);
  } else {
    $('#user_activity_skeletons').addClass('d-none rounded');
    $('#user_activity').append(response[0]);

  }
}

function showTable() {
  $('#user_table').removeClass("d-none");
}

loadUserDashboardChart();
loadUserDashboardRows('total');
loadUserDashboardRows();
loadActiveUsers('monthly');
loadActiveUsers('weekly');
loadActiveUsers('daily');
loadTotalUserCount();