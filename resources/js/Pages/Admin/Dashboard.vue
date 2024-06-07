<template>
    <AdminLayout>
        <div
            class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5"
        >
            <DataStatsOne
                :total-bills="totalBills"
                :total-profit="totalProfit"
                :total-products="totalProducts"
                :total-users="totalUsers"
            />
        </div>

        <div
            class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5"
        >
            <ChartOne :user-data="userData" :bill-data="billData" />

            <ChartTwo />

            <ChartThree />
        </div>
    </AdminLayout>
</template>

<script setup>
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
import AdminLayout from "./Components/AdminLayout.vue";
import DataStatsOne from "./components/DataStats/DataStatsOne.vue";
import ChartOne from "./components/Charts/ChartOne.vue";
import ChartThree from "./components/Charts/ChartThree.vue";
import ChartTwo from "./components/Charts/ChartTwo.vue";
// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
});
const props = defineProps({
    totalBills: Number,
    totalProfit: Number,
    totalProducts: Number,
    totalUsers: Number,
    userData: Array,
    billData: Array,
});
</script>
