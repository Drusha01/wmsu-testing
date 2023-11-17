<!-- Include Bootstrap CSS  for dashboard -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Include Chart.js library  dashboard-->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<style>
    .chart-container {
        display: inline-block;
        margin-right: 10px;
    }
</style>

<div>
    <x-loading-indicator/>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
        <!-- Insert Section -->
        
        <div class="container">
            <div class="row">
            <div class="col-sm-4">
                <!-- Total CET examinee Chart -->
                <div class="card rounded-4 border-0 shadow text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Total Applicants</h6>
                    </div>
                    <div class="chart-container">
                        <canvas id="cet-chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <!-- Total Appointments Chart -->
                <div class="card rounded-4 border-0 shadow text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Total Appointments</h6>
                    </div>
                    <div class="chart-container">
                        <canvas id="appointments-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>


            <br>

          <!-- Total Test Takers Chart -->
          <div class="row g-4">
              <div class="col-sm-12 col-xl-8">
                  <div class="card rounded-4 border-0 shadow text-center rounded p-4">
                      <div class="d-flex align-items-center justify-content-between mb-4">
                          <h6 class="mb-0">Total Test Takers</h6>
                      </div>
                      <div class="chart-container">
                          <canvas id="test-takers-chart"></canvas>
                      </div>
                  </div>
              </div>
              <div class="col-sm-12 col-xl-4">
                  <div class="card rounded-4 border-0 shadow rounded h-100 p-4">
                      <h6 class="mb-4">Accounts</h6>
                      <div class="chart-container">
                          <canvas id="pie-chart"></canvas>
                      </div>
                  </div>
              </div>
          </div>

          <br>

          <!-- Status of Examinations and Recent Exam Applicants Charts -->
          <div class="row g-4">
              <div class="col-sm-12 col-xl-5">
                  <div class="card rounded-4 border-0 shadow h-100 p-4">
                      <h6 class="mb-4">Status of Examinations</h6>
                      <div class="chart-container">
                          <canvas id="examinations-doughnut-chart"></canvas>
                      </div>
                  </div>
              </div>
              <div class="col-xl-7">
                  <div class="col-sm-12 col-xl-auto pb-3">
                      <div class="card rounded-4 border-0 shadow p-4 w-100">
                          <h6 class="mb-4">Recent Exam Applicants</h6>
                          <!-- Your PHP code for displaying recent exam applicants here -->
                      </div>
                  </div>
                  <div class="col-sm-12 col-xl-auto">
                      <div class="card rounded-4 border-0 shadow p-4 w-100">
                          <div class="d-flex align-items-center justify-content-between mb-4">
                              <h6 class="mb-0">Total Appointments For this Week</h6>
                              <span><?php echo date('M d, Y', strtotime("-7 day")); echo ' - ' ;echo date("F d, Y");?></span>
                          </div>
                          <div class="chart-container">
                              <canvas id="appointments-bar-chart"></canvas>
                          </div>
                      </div>
                  </div>
              </div>
          </div>


        <!-- End Inserted Section -->
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</div>

<!-- SCRIPT FOR CHART 1 -->
<script>
        // Data for Total Applicants
        const totalApplicantsData = {
            labels: ['CET', 'NAT', 'EAT', 'GSAT', 'LSAT'],
            datasets: [{
                label: 'Total Applicants',
                data: [4000, 2321, 700, 202, 53],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(153, 102, 255, 0.6)'
                ],
            }]
        };

        // Data for Total Appointments
        const totalAppointmentsData = {
            labels: ['Pending', 'Completed'],
            datasets: [{
                label: 'Total Appointments',
                data: [212, 21],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(75, 192, 192, 0.6)'
                ],
            }]
        };

        // Create Total Applicants Chart
        const cetChartCanvas = document.getElementById('cet-chart');
        const cetChart = new Chart(cetChartCanvas, {
            type: 'bar',
            data: totalApplicantsData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Create Total Appointments Chart
        const appointmentsChartCanvas = document.getElementById('appointments-chart');
        const appointmentsChart = new Chart(appointmentsChartCanvas, {
            type: 'bar',
            data: totalAppointmentsData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>





<script>

// <!-- SCRIPT FOR CHART 2 -->
    var testTakersData = {
        labels: ["CET", "NAT", "EAT", "GSAT", "LSAT"],
        datasets: [
            {
                label: "Total Test Takers",
                data: [4000, 2321, 700, 202, 53], // Replace with actual data
                backgroundColor: ["#990000", "#6610f2", "#6f42c1", "#e83e8c", "#fd7e14"],
            },
        ],
    };

    var testTakersChart = new Chart(document.getElementById("test-takers-chart").getContext("2d"), {
        type: "bar",
        data: testTakersData,
    });

    <!-- Accounts Pie Chart data -->
    var accountsData = {
        labels: ["Active", "Inactive"],
        datasets: [
            {
                data: [212, 21], // Replace with actual data
                backgroundColor: ["#990000", "#2845"],
            },
        ],
    };

    var pieChart = new Chart(document.getElementById("pie-chart").getContext("2d"), {
        type: "pie",
        data: accountsData,
    });
</script>

<!-- SCRIPT FOR CHART 3 -->
<script>
  var examinationsData = {
      labels: ["Available", "Unavailable"],
      datasets: [
          {
              data: [70, 30], // Replace with actual data
              backgroundColor: ["#990000", "#6c757d"],
          },
      ],
  };

  var examinationsDoughnutChart = new Chart(document.getElementById("examinations-doughnut-chart").getContext("2d"), {
      type: "doughnut",
      data: examinationsData,
  });

  <!-- Bar Chart data for Total Appointments -->
  var appointmentsData = {
      labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
      datasets: [
          {
              label: "Total Appointments",
              data: [32, 42, 38, 49, 55, 46, 31], // Replace with actual data
              backgroundColor: "#990000",
          },
      ],
  };

  var appointmentsBarChart = new Chart(document.getElementById("appointments-bar-chart").getContext("2d"), {
      type: "bar",
      data: appointmentsData,
  });
</script>









