<template>
    <AdminLayout>
        <BrandList :brands="brands"></BrandList>
    </AdminLayout>
</template>

<script setup>
defineProps({
    brands: Array,
});
import AdminLayout from "../Components/AdminLayout.vue";
import BrandList from "./BrandList.vue";
</script>
