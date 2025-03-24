import ApexCharts from "apexcharts";

// ===== User Growth Chart.
const userGrowthChart = () => {
  const chartOneOptions = {
    series: [
      {
        name: "User Registered",
        data: userGrowthData, // Dynamically set data
      },
    ],
    colors: ["#465fff"],
    chart: {
      fontFamily: "Outfit, sans-serif",
      type: "bar",
      height: 180,
      toolbar: {
        show: false,
      },
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "39%",
        borderRadius: 5,
        borderRadiusApplication: "end",
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      show: true,
      width: 4,
      colors: ["transparent"],
    },
    xaxis: {
      categories: userGrowthLabels, // Dynamically set labels
      axisBorder: {
        show: false,
      },
      axisTicks: {
        show: false,
      },
    },
    legend: {
      show: true,
      position: "top",
      horizontalAlign: "left",
      fontFamily: "Outfit",

      markers: {
        radius: 99,
      },
    },
    yaxis: {
      title: false,
    },
    grid: {
      yaxis: {
        lines: {
          show: true,
        },
      },
    },
    fill: {
      opacity: 1,
    },

    tooltip: {
      x: {
        show: false,
      },
      y: {
        formatter: function (val) {
          return val;
        },
      },
    },
  };

  const chartSelector = document.querySelectorAll("#user-growth-chart");

  if (chartSelector.length) {
    const chartFour = new ApexCharts(
      document.querySelector("#user-growth-chart"),
      chartOneOptions,
    );
    chartFour.render();
  }
};

userGrowthChart();

export default userGrowthChart;
