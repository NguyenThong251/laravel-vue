<script setup>
import { computed } from "vue";
import { Link, router } from "@inertiajs/vue3";

defineProps({
    products: Array,
});

const addToCart = (product) => {
    console.log(product);
    router.post(route("cart.store", product), {
        onSuccess: (page) => {
            if (page.props.flash.success) {
                Swal.fire({
                    toast: true,
                    icon: "success",
                    position: "top-end",
                    showConfirmButton: false,
                    title: page.props.flash.success,
                });
            }
        },
    });
};
// Hàm tính phần trăm giảm giá
const productDiscountPercentage = (product) => {
    if (product.price_old > 0 && product.price < product.price_old) {
        return Math.round(
            ((product.price_old - product.price) / product.price_old) * 100
        );
    }
    return 0;
};
</script>
<template>
    <div
        class="grid grid-cols-1 mt-6 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8"
    >
        <div
            v-for="product in products"
            :key="product.id"
            class="relative group"
        >
            <div
                class="relative w-full overflow-hidden bg-gray-200 rounded-md aspect-h-1 aspect-w-1 lg:aspect-none lg:h-80"
            >
                <img
                    v-if="product.product_images.length > 0"
                    :src="`/${product.product_images[0].image}`"
                    :alt="product.imageAlt"
                    class="object-cover object-center w-full h-full lg:h-full lg:w-full"
                />
                <img
                    v-else
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png"
                    :alt="product.imageAlt"
                    class="object-cover object-center w-full h-full lg:h-full lg:w-full"
                />
                <span
                    v-if="product.price_old > 0"
                    class="absolute top-0 left-0 px-2 m-2 text-sm font-medium text-center text-white bg-green-400 rounded-full"
                    >{{ productDiscountPercentage(product) }}%</span
                >
                <span
                    v-if="product.hot == 1"
                    class="absolute top-0 right-0 px-2 m-2 text-sm font-medium text-center text-white bg-red-500 rounded-full"
                    >Hot</span
                >
                <!-- add to cart icon -->
                <div
                    class="absolute inset-0 flex items-center justify-center opacity-0 cursor-pointer group-hover:opacity-100"
                >
                    <div class="p-2 bg-blue-700 rounded-full">
                        <a @click="addToCart(product)">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 text-white"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
                                />
                            </svg>
                        </a>
                    </div>
                    <div class="p-2 ml-2 bg-blue-700 rounded-full">
                        <a :href="route('products.detail', product.id)">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 text-white"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                />
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- end -->
            </div>
            <div class="flex flex-col justify-between mt-4">
                <div class="flex justify-between">
                    <h3 class="text-lg font-medium text-gray-700">
                        <span aria-hidden="true" class="" />
                        {{ product.title }}
                    </h3>
                    <p class="mt-1 text-gray-500 text-md">
                        {{ product.brand.name }}
                    </p>
                </div>
                <h3 class="font-medium text-gray-700 text-md">
                    <span aria-hidden="true" class="" />
                    {{ product.category.name }}
                </h3>

                <div class="flex items-center gap-3">
                    <p class="text-lg font-medium text-gray-900">
                        ${{ product.price }}
                    </p>
                    <del
                        v-if="product.price_old > 0"
                        class="font-medium text-gray-900 text-md"
                    >
                        ${{ product.price_old }}</del
                    >
                </div>
            </div>
        </div>
    </div>
</template>
