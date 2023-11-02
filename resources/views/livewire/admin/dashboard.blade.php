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
                                <h6 class="mb-0">Total CET Applied</h6>
                            </div>
                            <div class="chart-container">
                                <canvas id="cet-chart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <!-- Total EAT Chart (middle) -->
                        <div class="card rounded-4 border-0 shadow text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Total EAT applied</h6>
                            </div>
                            <div class="chart-container">
                                <canvas id="eat-chart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <!-- Total NAT Chart -->
                        <div class="card rounded-4 border-0 shadow text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Total NAT applied</h6>
                            </div>
                            <div class="chart-container">
                                <canvas id="nat-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <!-- Total GSAT Chart -->
                        <div class="card rounded-4 border-0 shadow text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Total GSAT applied</h6>
                            </div>
                            <div class="chart-container">
                                <canvas id="gsat-chart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <!-- Total LSAT Chart -->
                        <div class="card rounded-4 border-0 shadow text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Total LSAT applied</h6>
                            </div>
                            <div class="chart-container">
                                <canvas id="lsat-chart"></canvas>
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
            </div>

            <br>

            <!-- Revenue and Accounts Charts -->
            <div class="row g-4">
                <div class="col-sm-12 col-xl-8">
                    <div class="card rounded-4 border-0 shadow text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Revenue</h6>
                        </div>
                        <div class="chart-container">
                            <canvas id="salse-revenue"></canvas>
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

            <!-- Status of Subscriptions and Recent Customers Subscribed Charts -->
            <div class="row g-4">
                <div class="col-sm-12 col-xl-5">
                    <div class="card rounded-4 border-0 shadow h-100 p-4">
                        <h6 class="mb-4">Status of Subscriptions</h6>
                        <div class="chart-container">
                            <canvas id="doughnut-chart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="col-sm-12 col-xl-auto pb-3">
                        <div class="card rounded-4 border-0 shadow p-4 w-100">
                            <h6 class="mb-4">Recent Customers Subscribed</h6>
                            <!-- Your PHP code for the table here -->
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-auto">
                        <div class="card rounded-4 border-0 shadow p-4 w-100">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Total Walk-In For this Week</h6>
                                <span><?php echo date('M d, Y', strtotime("-7 day")); echo ' - ' ;echo date("F d, Y");?></span>
                            </div>
                            <div class="chart-container">
                                <canvas id="bar-chart"></canvas>
                            </div>
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
  // Chart data (replace with your actual data)
  var cetData = {
    labels: ["Successfully Applied", "Unsuccessfully Applied"],
    datasets: [
      {
        data: [5012, 130], // Replace with your data
        backgroundColor: ["#007bff", "#990000"],
      },
    ],
  };

  var eatData = {
    labels: ["Successfully Applied", "Unsuccessfully Applied"],
    datasets: [
      {
        data: [60, 20], // Replace with your data
        backgroundColor: ["#007bff", "#990000"],
      },
    ],
  };

  var natData = {
    labels: ["Successfully Applied", "Unsuccessfully Applied"],
    datasets: [
      {
        data: [70, 10], // Replace with your data
        backgroundColor: ["#007bff", "#990000"],
      },
    ],
  };

  var gsatData = {
    labels: ["Successfully Applied", "Unsuccessfully Applied"],
    datasets: [
      {
        data: [80, 20], // Replace with your data
        backgroundColor: ["#007bff", "#990000"],
      },
    ],
  };

  var lsatData = {
    labels: ["Successfully Applied", "Unsuccessfully Applied"],
    datasets: [
      {
        data: [90, 10], // Replace with your data
        backgroundColor: ["#007bff", "#990000"],
      },
    ],
  };

  var appointmentsData = {
    labels: ["Successfully Applied", "Unsuccessfully Applied"],
    datasets: [
      {
        data: [60, 40], // Replace with your data
        backgroundColor: ["#007bff", "#990000"],
      },
    ],
  };


  var cetChart = new Chart(document.getElementById("cet-chart").getContext("2d"), {
    type: "doughnut",
    data: cetData,
  });

  var eatChart = new Chart(document.getElementById("eat-chart").getContext("2d"), {
    type: "doughnut",
    data: eatData,
  });

  var natChart = new Chart(document.getElementById("nat-chart").getContext("2d"), {
    type: "doughnut",
    data: natData,
  });

  var gsatChart = new Chart(document.getElementById("gsat-chart").getContext("2d"), {
    type: "doughnut",
    data: gsatData,
  });

  var lsatChart = new Chart(document.getElementById("lsat-chart").getContext("2d"), {
    type: "doughnut",
    data: lsatData,
  });

  var appointmentsChart = new Chart(document.getElementById("appointments-chart").getContext("2d"), {
    type: "doughnut",
    data: appointmentsData,
  });
</script>

<!-- SCRIPT FOR CHART 2 -->
<script>
  // Revenue Chart data (replace with your actual data)
  var revenueData = {
    labels: ["January", "February", "March", "April", "May", "June"],
    datasets: [
      {
        label: "Revenue",
        data: [1000, 1200, 900, 1500, 1400, 1800], // Replace with your data
        borderColor: "#007bff",
        borderWidth: 2,
      },
    ],
  };

  var revenueChart = new Chart(document.getElementById("salse-revenue").getContext("2d"), {
    type: "line",
    data: revenueData,
  });

  // Accounts Chart data (replace with your actual data)
  var accountsData = {
    labels: ["Income", "Expenses", "Profit"],
    datasets: [
      {
        data: [3000, 2000, 1000], // Replace with your data
        backgroundColor: ["#007bff", "#ffc107", "#28a745"],
      },
    ],
  };

  var accountsChart = new Chart(document.getElementById("pie-chart").getContext("2d"), {
    type: "pie",
    data: accountsData,
  });

  // Status of Subscriptions Chart data (replace with your actual data)
  var doughnutData = {
    labels: ["Active", "Inactive"],
    datasets: [
      {
        data: [40, 60], // Replace with your data
        backgroundColor: ["#007bff", "#ced4da"],
      },
    ],
  };

  var doughnutChart = new Chart(document.getElementById("doughnut-chart").getContext("2d"), {
    type: "doughnut",
    data: doughnutData,
  });

  // Recent Customers Subscribed and Walk-In Chart scripts are not provided here, as you'll need to integrate your PHP code for those charts based on your specific data source.

</script>

<!-- SCRIPT FOR CHART 3 -->
<script>
  // Total Walk-In Chart data (replace with your actual data)
  var barChartData = {
    labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
    datasets: [
      {
        label: "Walk-Ins",
        data: [10, 15, 12, 20, 18, 25, 22], // Replace with your data
        backgroundColor: "#007bff",
      },
    ],
  };

  var barChart = new Chart(document.getElementById("bar-chart").getContext("2d"), {
    type: "bar",
    data: barChartData,
  });
</script>









