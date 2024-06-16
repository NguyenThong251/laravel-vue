<script setup>
import UserLayouts from "./Layouts/UserLayouts.vue";
const props = defineProps({
    products: Object,
});
console.log(props);
const image =
    props.products.data.product_images.length > 0
        ? props.products.data.product_images[0].image
        : null;
</script>
<template>
    <UserLayouts>
        <section class="px-4 py-24 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="container px-4 mx-auto">
                <nav class="flex">
                    <ol role="list" class="flex items-center">
                        <li class="text-left">
                            <div class="-m-1">
                                <a
                                    href="#"
                                    class="p-1 text-sm font-medium text-gray-600 rounded-md focus:text-gray-900 focus:shadow hover:text-gray-800"
                                >
                                    Home
                                </a>
                            </div>
                        </li>

                        <li class="text-left">
                            <div class="flex items-center">
                                <span class="mx-2 text-gray-400">/</span>
                                <div class="-m-1">
                                    <a
                                        href="#"
                                        class="p-1 text-sm font-medium text-gray-600 rounded-md focus:text-gray-900 focus:shadow hover:text-gray-800"
                                    >
                                        Products
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li class="text-left">
                            <div class="flex items-center">
                                <span class="mx-2 text-gray-400">/</span>
                                <div class="-m-1">
                                    <a
                                        href="#"
                                        class="p-1 text-sm font-medium text-gray-600 rounded-md focus:text-gray-900 focus:shadow hover:text-gray-800"
                                        aria-current="page"
                                    >
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ol>
                </nav>

                <div
                    class="grid grid-cols-1 gap-12 mt-8 lg:col-gap-12 xl:col-gap-16 lg:mt-12 lg:grid-cols-5 lg:gap-16"
                >
                    <div class="lg:col-span-3 lg:row-end-1">
                        <div class="lg:flex lg:items-start">
                            <div class="lg:order-2 lg:ml-5">
                                <div
                                    class="max-w-xl overflow-hidden rounded-lg"
                                >
                                    <img
                                        v-if="image"
                                        class="object-cover w-full h-full max-w-full"
                                        :src="`/${image}`"
                                        :alt="products.data.title"
                                    />
                                    <img
                                        v-else
                                        class="object-cover w-full h-full max-w-full"
                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png"
                                        alt="No Image Available"
                                    />
                                </div>
                            </div>

                            <div
                                class="w-full mt-2 lg:order-1 lg:w-32 lg:flex-shrink-0"
                            >
                                <div
                                    class="flex flex-row items-start lg:flex-col"
                                >
                                    <button
                                        v-for="(image, index) in products.data
                                            .product_images"
                                        type="button"
                                        class="h-20 mb-3 overflow-hidden text-center border-2 rounded-lg flex-0 aspect-square"
                                    >
                                        <!-- border-gray-900 -->
                                        <img
                                            class="object-cover w-full h-full"
                                            :src="`/${image.image}`"
                                            :alt="`Image ${index + 1}`"
                                        />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-2 lg:row-span-2 lg:row-end-2">
                        <h1
                            class="text-2xl font-bold text-gray-900 sm: sm:text-3xl"
                        >
                            {{ products.data.title }}
                        </h1>

                        <div class="flex items-center mt-5">
                            <div class="flex items-center">
                                <svg
                                    class="block w-4 h-4 text-yellow-500 align-middle"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        class=""
                                    ></path>
                                </svg>
                                <svg
                                    class="block w-4 h-4 text-yellow-500 align-middle"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        class=""
                                    ></path>
                                </svg>
                                <svg
                                    class="block w-4 h-4 text-yellow-500 align-middle"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        class=""
                                    ></path>
                                </svg>
                                <svg
                                    class="block w-4 h-4 text-yellow-500 align-middle"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        class=""
                                    ></path>
                                </svg>
                                <svg
                                    class="block w-4 h-4 text-yellow-500 align-middle"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        class=""
                                    ></path>
                                </svg>
                            </div>
                            <p class="ml-2 text-sm font-medium text-gray-500">
                                1,209 Reviews
                            </p>
                        </div>

                        <h2 class="mt-8 text-lg font-bold text-gray-900">
                            Category
                        </h2>
                        <div
                            class="flex flex-wrap items-center gap-1 mt-3 select-none"
                        >
                            <label class="">
                                <input
                                    type="radio"
                                    name="type"
                                    value="Groud"
                                    class="sr-only peer"
                                />
                                <p
                                    class="px-6 py-2 font-bold border border-black rounded-lg peer-checked:bg-black peer-checked:text-white"
                                >
                                    {{ products.data.category.name }}
                                </p>
                            </label>
                        </div>

                        <h2 class="mt-8 text-lg font-bold text-gray-900">
                            Brand name
                        </h2>
                        <div
                            class="flex flex-wrap items-center gap-1 mt-3 select-none"
                        >
                            <label class="">
                                <input
                                    type="radio"
                                    name="subscription"
                                    value="8 Months"
                                    class="sr-only peer"
                                    checked
                                />
                                <p
                                    class="px-6 py-2 font-bold border border-black rounded-lg peer-checked:bg-black peer-checked:text-white"
                                >
                                    {{ products.data.brand.name }}
                                </p>
                            </label>
                        </div>
                        <div class="flex items-end mt-8">
                            <h1 class="text-3xl font-bold">
                                $ {{ products.data.price }}
                            </h1>
                        </div>

                        <div
                            class="flex flex-col items-center gap-10 py-4 mt-10 space-y-4 border-t border-b sm:flex-row sm:space-y-0"
                        >
                            <form class="">
                                <label
                                    for="counter-input"
                                    class="block mb-1 text-gray-900 text-mdfont-medium dark:text-white"
                                    >Choose quantity:</label
                                >
                                <div class="relative flex items-center">
                                    <button
                                        type="button"
                                        id="decrement-button"
                                        data-input-counter-decrement="counter-input"
                                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"
                                    >
                                        <svg
                                            class="w-2.5 h-2.5 text-gray-900 dark:text-white"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 18 2"
                                        >
                                            <path
                                                stroke="currentColor"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M1 1h16"
                                            />
                                        </svg>
                                    </button>
                                    <input
                                        type="text"
                                        id="counter-input"
                                        data-input-counter
                                        class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-lg font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"
                                        placeholder=""
                                        value="1"
                                        required
                                    />
                                    <button
                                        type="button"
                                        id="increment-button"
                                        data-input-counter-increment="counter-input"
                                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"
                                    >
                                        <svg
                                            class="w-2.5 h-2.5 text-gray-900 dark:text-white"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 18 18"
                                        >
                                            <path
                                                stroke="currentColor"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 1v16M1 9h16"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                            <button
                                type="button"
                                class="inline-flex items-center justify-center px-12 py-3 text-base font-bold text-center text-white transition-all duration-200 ease-in-out bg-blue-700 border-2 border-transparent rounded-md bg-none focus:shadow hover:bg-blue-800"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 mr-3 shrink-0"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                                    />
                                </svg>
                                Add to cart
                            </button>
                        </div>

                        <ul class="mt-8 space-y-2">
                            <li
                                class="flex items-center text-sm font-medium text-left text-gray-600"
                            >
                                <svg
                                    class="block w-5 h-5 mr-2 text-gray-500 align-middle"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                        class=""
                                    ></path>
                                </svg>
                                Free shipping worldwide
                            </li>

                            <li
                                class="flex items-center text-sm font-medium text-left text-gray-600"
                            >
                                <svg
                                    class="block w-5 h-5 mr-2 text-gray-500 align-middle"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"
                                        class=""
                                    ></path>
                                </svg>
                                Cancel Anytime
                            </li>
                        </ul>
                    </div>

                    <div class="lg:col-span-3">
                        <div class="border-b border-gray-300">
                            <nav class="flex gap-4">
                                <a
                                    href="#"
                                    title=""
                                    class="py-4 text-sm font-medium text-gray-900 border-b-2 border-gray-900 hover:border-gray-400 hover:text-gray-800"
                                >
                                    Description
                                </a>

                                <a
                                    href="#"
                                    title=""
                                    class="inline-flex items-center py-4 text-sm font-medium text-gray-600 border-b-2 border-transparent"
                                >
                                    Reviews
                                    <span
                                        class="block px-2 py-px ml-2 text-xs font-bold text-gray-100 bg-gray-500 rounded-full"
                                    >
                                        1,209
                                    </span>
                                </a>
                            </nav>
                        </div>

                        <div class="flow-root mt-8 sm:mt-12">
                            <h1 class="text-3xl font-bold">
                                {{ products.data.title }}
                            </h1>
                            <p class="mt-4">
                                {{ products.data.description }}
                            </p>
                            <div class="flex items-center gap-3">
                                <h1 class="mt-8 text-lg font-bold">
                                    Brand name:
                                    <span class="font-medium">{{
                                        products.data.brand.name
                                    }}</span>
                                </h1>
                            </div>
                            <div class="flex items-center gap-3">
                                <h1 class="mt-8 text-lg font-bold">
                                    Category name:
                                    <span class="font-medium">{{
                                        products.data.category.name
                                    }}</span>
                                </h1>
                            </div>
                            <div class="flex items-center gap-3">
                                <h1 class="mt-8 text-lg font-bold">
                                    Created At:
                                    <span class="font-medium">{{
                                        products.data.created_at
                                    }}</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </UserLayouts>
</template>
