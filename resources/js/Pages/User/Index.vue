<script setup>
import { computed } from "vue";
import { Link, router } from "@inertiajs/vue3";
import UserLayouts from "./Layouts/UserLayouts.vue";
import Hero from "./Layouts/Hero.vue";
import Products from "../User/Components/Products.vue";
import BannerSection from "../User/Components/BannerSection.vue";
import Blog from "../User/Components/Blog.vue";
//products list
const props = defineProps({
    products: Array,
});
const hotProducts = computed(() => {
    return props.products.filter((product) => product.hot === 1);
});
const saleProducts = computed(() => {
    return props.products.filter((product) => product.price_old > 0);
});
</script>
<template>
    <UserLayouts>
        <!-- here section  -->
        <Hero></Hero>
        <!-- end -->
        <div class="bg-white">
            <section
                class="max-w-2xl px-4 mx-auto mt-24 mb-16 py sm:px-6 sm:py lg:max-w-7xl lg:px-8"
            >
                <h2
                    class="mb-8 text-2xl font-bold tracking-tight text-gray-900"
                >
                    Sale Products
                </h2>

                <!-- product list component -->
                <Products :products="saleProducts"></Products>
                <div class="flex justify-center mt-5">
                    <Link
                        :href="route('products.index')"
                        class="mt-8 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                    >
                        View All Products</Link
                    >
                </div>
                <!-- end -->
            </section>

            <section
                class="max-w-2xl px-4 mx-auto mb-24 py sm:px-6 sm:py lg:max-w-7xl lg:px-8"
            >
                <h2
                    class="mb-8 text-2xl font-bold tracking-tight text-gray-900"
                >
                    Hot Products
                </h2>

                <!-- product list component -->
                <Products :products="hotProducts"></Products>

                <!-- end -->
            </section>

            <BannerSection></BannerSection>
            <section
                class="max-w-2xl px-4 pt-16 mx-auto sm:px-6 sm:py-16 lg:max-w-7xl lg:px-8"
            >
                <h2
                    class="mb-8 text-2xl font-bold tracking-tight text-gray-900"
                >
                    List of products
                </h2>

                <!-- product list component -->
                <Products :products="products"></Products>

                <!-- end -->
                <div class="flex justify-center mt-5">
                    <Link
                        :href="route('products.index')"
                        class="mt-8 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                    >
                        View All Products</Link
                    >
                </div>
            </section>
            <Blog></Blog>
        </div>
    </UserLayouts>
</template>
