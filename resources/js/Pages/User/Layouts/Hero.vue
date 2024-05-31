<template>
    <div
        class="relative h-screen overflow-hidden text-white bg-gradient-to-r from-purple-600 to-blue-600"
    >
        <div class="absolute inset-0">
            <img
                src="https://images.unsplash.com/photo-1522252234503-e356532cafd5?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw2fHxjb2RlfGVufDB8MHx8fDE2OTQwOTg0MTZ8MA&ixlib=rb-4.0.3&q=80&w=1080"
                alt="Background Image"
                class="object-cover object-center w-full h-full"
            />
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>

        <div
            class="relative z-10 flex flex-col items-center justify-center h-full text-center"
        >
            <h1 class="mb-4 text-5xl font-bold leading-tight">
                Welcome to Our Awesome Website
            </h1>
            <p class="mb-8 text-lg text-gray-300">
                Discover amazing features and services that await you.
            </p>
            <a
                href="#"
                class="px-6 py-2 text-lg font-semibold text-white transition duration-300 ease-in-out transform bg-blue-800 rounded-full hover:bg-blue-700 hover:scale-105 hover:shadow-lg"
                >Get Started</a
            >
        </div>
    </div>
</template>

<script setup>
import { onMounted } from "vue";
import { initCarousels } from "flowbite";

onMounted(() => {
    initCarousels();
});
</script>
