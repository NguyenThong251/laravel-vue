<script setup lang="ts">
import { ref } from "vue";
// @ts-ignore
import VueApexCharts from "vue3-apexcharts";

const props = defineProps({
    userData: Array,
    billData: Array,
});
console.log(props);
const chartData = {
    series: [
        {
            name: "User",
            data: props.userData.map((item) => item.count),
        },

        {
            name: "Bill",
            data: props.billData.map((item) => item.count),
        },
    ],
    labels: props.billData.map((item) => item.month),
};

const chart = ref(null);

const apexOptions = {
    legend: {
        show: false,
        position: "top",
        horizontalAlign: "left",
    },
    colors: ["#3C50E0", "#80CAEE"],
    chart: {
        fontFamily: "Satoshi, sans-serif",
        height: 335,
        type: "area",
        dropShadow: {
            enabled: true,
            color: "#623CEA14",
            top: 10,
            blur: 4,
            left: 0,
            opacity: 0.1,
        },

        toolbar: {
            show: false,
        },
    },
    responsive: [
        {
            breakpoint: 1024,
            options: {
                chart: {
                    height: 300,
                },
            },
        },
        {
            breakpoint: 1366,
            options: {
                chart: {
                    height: 350,
                },
            },
        },
    ],
    stroke: {
        width: [2, 2],
        curve: "straight",
    },

    labels: {
        show: false,
        position: "top",
    },
    grid: {
        xaxis: {
            lines: {
                show: true,
            },
        },
        yaxis: {
            lines: {
                show: true,
            },
        },
    },
    dataLabels: {
        enabled: false,
    },
    markers: {
        size: 4,
        colors: "#fff",
        strokeColors: ["#3056D3", "#80CAEE"],
        strokeWidth: 3,
        strokeOpacity: 0.9,
        strokeDashArray: 0,
        fillOpacity: 1,
        discrete: [],
        hover: {
            size: undefined,
            sizeOffset: 5,
        },
    },
    xaxis: {
        type: "category",
        categories: chartData.labels,
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
    },
    yaxis: {
        title: {
            style: {
                fontSize: "0px",
            },
        },
        min: 0,
        max: 10,
    },
};
</script>

<template>
    <div
        class="col-span-12 rounded-sm border border-stroke bg-white px-5 pt-7.5 pb-5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-8"
    >
        <div
            class="flex flex-wrap items-start justify-between gap-3 sm:flex-nowrap"
        >
            <div class="flex flex-wrap w-full gap-3 sm:gap-5">
                <div class="flex min-w-47.5">
                    <span
                        class="flex items-center justify-center w-full h-4 mt-1 mr-2 border rounded-full max-w-4 border-primary"
                    >
                        <span
                            class="block h-2.5 w-full max-w-2.5 rounded-full bg-primary"
                        ></span>
                    </span>
                    <div class="w-full">
                        <p class="font-semibold text-primary">Analyst Bills</p>
                    </div>
                </div>
                <div class="flex min-w-47.5">
                    <span
                        class="flex items-center justify-center w-full h-4 mt-1 mr-2 border rounded-full max-w-4 border-secondary"
                    >
                        <span
                            class="block h-2.5 w-full max-w-2.5 rounded-full bg-secondary"
                        ></span>
                    </span>
                </div>
            </div>
        </div>
        <div>
            <div id="chartOne" class="-ml-5">
                <VueApexCharts
                    type="area"
                    height="350"
                    :options="apexOptions"
                    :series="chartData.series"
                    ref="chart"
                />
            </div>
        </div>
    </div>
</template>
