<script setup>
import UserLayouts from "./Layouts/UserLayouts.vue";
import { ref, watch } from "vue";
import {
    Dialog,
    DialogPanel,
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
import { XMarkIcon } from "@heroicons/vue/24/outline";
import {
    ChevronDownIcon,
    FunnelIcon,
    MinusIcon,
    PlusIcon,
    Squares2X2Icon,
} from "@heroicons/vue/20/solid";
import Products from "../User/Components/Products.vue";
import SecondaryButtonVue from "@/Components/SecondaryButton.vue";
import { router, useForm } from "@inertiajs/vue3";
const sortOptions = [
    { name: "Most Popular", href: "#", current: true },
    { name: "Best Rating", href: "#", current: false },
    { name: "Newest", href: "#", current: false },
    { name: "Price: Low to High", href: "#", current: false },
    { name: "Price: High to Low", href: "#", current: false },
];

const filterPrices = useForm({
    prices: [0, 100000],
});
//method for price filter
const priceFilter = () => {
    filterPrices
        .transform((data) => ({
            ...data,
            prices: {
                from: filterPrices.prices[0],
                to: filterPrices.prices[1],
            },
        }))
        .get("products", {
            preserveState: true,
            replace: true,
        });
};

const mobileFiltersOpen = ref(false);

const props = defineProps({
    products: Array,
    brands: Array,
    categories: Array,
});

//filter brands and categories
const selectedBrands = ref([]);
const selectedCategories = ref([]);

watch(selectedBrands, () => {
    updateFilteredProducts();
});
watch(selectedCategories, () => {
    updateFilteredProducts();
});

function updateFilteredProducts() {
    router.get(
        "products",
        {
            brands: selectedBrands.value,
            categories: selectedCategories.value,
        },
        {
            preserveState: true,
            replace: true,
        }
    );
}
</script>
<template>
    <UserLayouts>
        <div class="bg-white">
            <div>
                <!-- Mobile filter dialog -->
                <TransitionRoot as="template" :show="mobileFiltersOpen">
                    <Dialog
                        as="div"
                        class="relative z-40 lg:hidden"
                        @close="mobileFiltersOpen = false"
                    >
                        <TransitionChild
                            as="template"
                            enter="transition-opacity ease-linear duration-300"
                            enter-from="opacity-0"
                            enter-to="opacity-100"
                            leave="transition-opacity ease-linear duration-300"
                            leave-from="opacity-100"
                            leave-to="opacity-0"
                        >
                            <div class="fixed inset-0 bg-black bg-opacity-25" />
                        </TransitionChild>

                        <div class="fixed inset-0 z-40 flex">
                            <TransitionChild
                                as="template"
                                enter="transition ease-in-out duration-300 transform"
                                enter-from="translate-x-full"
                                enter-to="translate-x-0"
                                leave="transition ease-in-out duration-300 transform"
                                leave-from="translate-x-0"
                                leave-to="translate-x-full"
                            >
                                <DialogPanel
                                    class="relative flex flex-col w-full h-full max-w-xs py-4 pb-12 ml-auto overflow-y-auto bg-white shadow-xl"
                                >
                                    <div
                                        class="flex items-center justify-between px-4"
                                    >
                                        <h2
                                            class="text-lg font-medium text-gray-900"
                                        >
                                            Filters
                                        </h2>
                                        <button
                                            type="button"
                                            class="flex items-center justify-center w-10 h-10 p-2 -mr-2 text-gray-400 bg-white rounded-md"
                                            @click="mobileFiltersOpen = false"
                                        >
                                            <span class="sr-only"
                                                >Close menu</span
                                            >
                                            <XMarkIcon
                                                class="w-6 h-6"
                                                aria-hidden="true"
                                            />
                                        </button>
                                    </div>

                                    <!-- Filters -->
                                    <form class="mt-4 border-t border-gray-200">
                                        <h3 class="sr-only">Categories</h3>
                                        <ul
                                            role="list"
                                            class="px-2 py-3 font-medium text-gray-900"
                                        >
                                            <li
                                                v-for="category in subCategories"
                                                :key="category.name"
                                            >
                                                <a
                                                    :href="category.href"
                                                    class="block px-2 py-3"
                                                    >{{ category.name }}</a
                                                >
                                            </li>
                                        </ul>

                                        <Disclosure
                                            as="div"
                                            v-for="section in filters"
                                            :key="section.id"
                                            class="px-4 py-6 border-t border-gray-200"
                                            v-slot="{ open }"
                                        >
                                            <h3 class="flow-root -mx-2 -my-3">
                                                <DisclosureButton
                                                    class="flex items-center justify-between w-full px-2 py-3 text-gray-400 bg-white hover:text-gray-500"
                                                >
                                                    <span
                                                        class="font-medium text-gray-900"
                                                        >{{
                                                            section.name
                                                        }}</span
                                                    >
                                                    <span
                                                        class="flex items-center ml-6"
                                                    >
                                                        <PlusIcon
                                                            v-if="!open"
                                                            class="w-5 h-5"
                                                            aria-hidden="true"
                                                        />
                                                        <MinusIcon
                                                            v-else
                                                            class="w-5 h-5"
                                                            aria-hidden="true"
                                                        />
                                                    </span>
                                                </DisclosureButton>
                                            </h3>
                                            <DisclosurePanel class="pt-6">
                                                <div class="space-y-6">
                                                    <div
                                                        v-for="(
                                                            option, optionIdx
                                                        ) in section.options"
                                                        :key="option.value"
                                                        class="flex items-center"
                                                    >
                                                        <input
                                                            :id="`filter-mobile-${section.id}-${optionIdx}`"
                                                            :name="`${section.id}[]`"
                                                            :value="
                                                                option.value
                                                            "
                                                            type="checkbox"
                                                            :checked="
                                                                option.checked
                                                            "
                                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                                        />
                                                        <label
                                                            :for="`filter-mobile-${section.id}-${optionIdx}`"
                                                            class="flex-1 min-w-0 ml-3 text-gray-500"
                                                            >{{
                                                                option.label
                                                            }}</label
                                                        >
                                                    </div>
                                                </div>
                                            </DisclosurePanel>
                                        </Disclosure>
                                    </form>
                                </DialogPanel>
                            </TransitionChild>
                        </div>
                    </Dialog>
                </TransitionRoot>

                <main class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div
                        class="flex items-baseline justify-between pt-24 pb-6 border-b border-gray-200"
                    >
                        <h1
                            class="text-4xl font-bold tracking-tight text-gray-900"
                        >
                            New Arrivals
                        </h1>

                        <div class="flex items-center">
                            <Menu
                                as="div"
                                class="relative inline-block text-left"
                            >
                                <div>
                                    <MenuButton
                                        class="inline-flex justify-center text-sm font-medium text-gray-700 group hover:text-gray-900"
                                    >
                                        Sort
                                        <ChevronDownIcon
                                            class="flex-shrink-0 w-5 h-5 ml-1 -mr-1 text-gray-400 group-hover:text-gray-500"
                                            aria-hidden="true"
                                        />
                                    </MenuButton>
                                </div>

                                <transition
                                    enter-active-class="transition duration-100 ease-out"
                                    enter-from-class="transform scale-95 opacity-0"
                                    enter-to-class="transform scale-100 opacity-100"
                                    leave-active-class="transition duration-75 ease-in"
                                    leave-from-class="transform scale-100 opacity-100"
                                    leave-to-class="transform scale-95 opacity-0"
                                >
                                    <MenuItems
                                        class="absolute right-0 z-10 w-40 mt-2 origin-top-right bg-white rounded-md shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    >
                                        <div class="py-1">
                                            <MenuItem
                                                v-for="option in sortOptions"
                                                :key="option.name"
                                                v-slot="{ active }"
                                            >
                                                <a
                                                    :href="option.href"
                                                    :class="[
                                                        option.current
                                                            ? 'font-medium text-gray-900'
                                                            : 'text-gray-500',
                                                        active
                                                            ? 'bg-gray-100'
                                                            : '',
                                                        'block px-4 py-2 text-sm',
                                                    ]"
                                                    >{{ option.name }}</a
                                                >
                                            </MenuItem>
                                        </div>
                                    </MenuItems>
                                </transition>
                            </Menu>

                            <button
                                type="button"
                                class="p-2 ml-5 -m-2 text-gray-400 hover:text-gray-500 sm:ml-7"
                            >
                                <span class="sr-only">View grid</span>
                                <Squares2X2Icon
                                    class="w-5 h-5"
                                    aria-hidden="true"
                                />
                            </button>
                            <button
                                type="button"
                                class="p-2 ml-4 -m-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden"
                                @click="mobileFiltersOpen = true"
                            >
                                <span class="sr-only">Filters</span>
                                <FunnelIcon
                                    class="w-5 h-5"
                                    aria-hidden="true"
                                />
                            </button>
                        </div>
                    </div>

                    <section
                        aria-labelledby="products-heading"
                        class="pt-6 pb-24"
                    >
                        <h2 id="products-heading" class="sr-only">Products</h2>

                        <div
                            class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4"
                        >
                            <!-- Filters -->
                            <form class="hidden lg:block">
                                <h3 class="sr-only">Prices</h3>
                                <!-- price filter -->
                                <div
                                    class="flex items-center justify-between space-x-3"
                                >
                                    <div class="basis-1/3">
                                        <label
                                            for="filters-price-from"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        >
                                            From
                                        </label>

                                        <input
                                            type="number"
                                            id="filters-price-from"
                                            placeholder="Min price"
                                            v-model="filterPrices.prices[0]"
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                        />
                                    </div>
                                    <div class="basis-1/3">
                                        <label
                                            for="filters-price-to"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        >
                                            To
                                        </label>

                                        <input
                                            type="number"
                                            id="filters-price-to"
                                            v-model="filterPrices.prices[1]"
                                            placeholder="Max price"
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                        />
                                    </div>
                                    <SecondaryButtonVue
                                        class="self-end"
                                        @click="priceFilter()"
                                    >
                                        Filter
                                    </SecondaryButtonVue>
                                </div>

                                <!-- end -->

                                <Disclosure
                                    as="div"
                                    class="py-6 border-b border-gray-200"
                                    v-slot="{ open }"
                                >
                                    <h3 class="flow-root -my-3">
                                        <DisclosureButton
                                            class="flex items-center justify-between w-full py-3 text-sm text-gray-400 bg-white hover:text-gray-500"
                                        >
                                            <span
                                                class="font-medium text-gray-900"
                                                >Brands</span
                                            >
                                            <span
                                                class="flex items-center ml-6"
                                            >
                                                <PlusIcon
                                                    v-if="!open"
                                                    class="w-5 h-5"
                                                    aria-hidden="true"
                                                />
                                                <MinusIcon
                                                    v-else
                                                    class="w-5 h-5"
                                                    aria-hidden="true"
                                                />
                                            </span>
                                        </DisclosureButton>
                                    </h3>
                                    <DisclosurePanel class="pt-6">
                                        <div class="space-y-4">
                                            <div
                                                v-for="brand in brands"
                                                :key="brand.id"
                                                class="flex items-center"
                                            >
                                                <input
                                                    :id="`filter-${brand.id}`"
                                                    :value="brand.id"
                                                    type="checkbox"
                                                    v-model="selectedBrands"
                                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                                />
                                                <label
                                                    :for="`filter-${brand.id}`"
                                                    class="ml-3 text-sm text-gray-600"
                                                    >{{ brand.name }}</label
                                                >
                                            </div>
                                        </div>
                                    </DisclosurePanel>
                                </Disclosure>

                                <!-- category filter -->

                                <Disclosure
                                    as="div"
                                    class="py-6 border-b border-gray-200"
                                    v-slot="{ open }"
                                >
                                    <h3 class="flow-root -my-3">
                                        <DisclosureButton
                                            class="flex items-center justify-between w-full py-3 text-sm text-gray-400 bg-white hover:text-gray-500"
                                        >
                                            <span
                                                class="font-medium text-gray-900"
                                                >Categories</span
                                            >
                                            <span
                                                class="flex items-center ml-6"
                                            >
                                                <PlusIcon
                                                    v-if="!open"
                                                    class="w-5 h-5"
                                                    aria-hidden="true"
                                                />
                                                <MinusIcon
                                                    v-else
                                                    class="w-5 h-5"
                                                    aria-hidden="true"
                                                />
                                            </span>
                                        </DisclosureButton>
                                    </h3>
                                    <DisclosurePanel class="pt-6">
                                        <div class="space-y-4">
                                            <div
                                                v-for="category in categories"
                                                :key="category.id"
                                                class="flex items-center"
                                            >
                                                <input
                                                    :id="`filter-${category.id}`"
                                                    :value="category.id"
                                                    type="checkbox"
                                                    v-model="selectedCategories"
                                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                                />
                                                <label
                                                    :for="`filter-${category.id}`"
                                                    class="ml-3 text-sm text-gray-600"
                                                    >{{ category.name }}</label
                                                >
                                            </div>
                                        </div>
                                    </DisclosurePanel>
                                </Disclosure>
                                <!-- end -->
                            </form>

                            <!-- Product grid -->
                            <div class="lg:col-span-3">
                                <!-- Your content -->
                                <Products :products="products.data"></Products>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </UserLayouts>
</template>
