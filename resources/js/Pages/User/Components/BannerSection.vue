<template>
    <div class="max-w-2xl px-4 mx-auto py sm:px-6 sm:py lg:max-w-7xl lg:px-8">
        <div class="">
            <div
                class="flex items-center justify-between gap-8 mb-4 sm:mb-8 md:mb-12"
            >
                <div class="flex items-center gap-12">
                    <h2
                        class="text-2xl font-bold text-gray-800 lg:text-3xl dark:text-white"
                    >
                        Gallery
                    </h2>

                    <p
                        class="hidden max-w-screen-sm text-gray-500 dark:text-gray-300 md:block"
                    >
                        This is a section of some simple filler text, also known
                        as placeholder text. It shares some characteristics of a
                        real written text.
                    </p>
                </div>

                <a
                    href="#"
                    class="inline-block px-4 py-2 text-sm font-semibold text-center text-gray-500 transition duration-100 bg-white border rounded-lg outline-none dark:bg-gray-700 dark:border-none dark:text-gray-200 ring-indigo-300 hover:bg-gray-100 focus-visible:ring active:bg-gray-200 md:px-8 md:py-3 md:text-base"
                >
                    More
                </a>
            </div>

            <div
                class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:gap-6 xl:gap-8"
            >
                <!-- image - start -->
                <a
                    href="#"
                    class="relative flex items-end h-48 overflow-hidden bg-gray-100 rounded-lg shadow-lg group md:h-80"
                >
                    <img
                        src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?auto=format&q=75&fit=crop&w=600"
                        loading="lazy"
                        alt="Photo by Minh Pham"
                        class="absolute inset-0 object-cover object-center w-full h-full transition duration-200 group-hover:scale-110"
                    />

                    <div
                        class="absolute inset-0 opacity-50 pointer-events-none bg-gradient-to-t from-gray-800 via-transparent to-transparent"
                    ></div>

                    <span
                        class="relative inline-block mb-3 ml-4 text-sm text-white md:ml-5 md:text-lg"
                        >VR</span
                    >
                </a>
                <!-- image - end -->

                <!-- image - start -->
                <a
                    href="#"
                    class="relative flex items-end h-48 overflow-hidden bg-gray-100 rounded-lg shadow-lg group md:col-span-2 md:h-80"
                >
                    <img
                        src="https://images.unsplash.com/photo-1542759564-7ccbb6ac450a?auto=format&q=75&fit=crop&w=1000"
                        loading="lazy"
                        alt="Photo by Magicle"
                        class="absolute inset-0 object-cover object-center w-full h-full transition duration-200 group-hover:scale-110"
                    />

                    <div
                        class="absolute inset-0 opacity-50 pointer-events-none bg-gradient-to-t from-gray-800 via-transparent to-transparent"
                    ></div>

                    <span
                        class="relative inline-block mb-3 ml-4 text-sm text-white md:ml-5 md:text-lg"
                        >Tech</span
                    >
                </a>
                <!-- image - end -->

                <!-- image - start -->
                <a
                    href="#"
                    class="relative flex items-end h-48 overflow-hidden bg-gray-100 rounded-lg shadow-lg group md:col-span-2 md:h-80"
                >
                    <img
                        src="https://images.unsplash.com/photo-1610465299996-30f240ac2b1c?auto=format&q=75&fit=crop&w=1000"
                        loading="lazy"
                        alt="Photo by Martin Sanchez"
                        class="absolute inset-0 object-cover object-center w-full h-full transition duration-200 group-hover:scale-110"
                    />

                    <div
                        class="absolute inset-0 opacity-50 pointer-events-none bg-gradient-to-t from-gray-800 via-transparent to-transparent"
                    ></div>

                    <span
                        class="relative inline-block mb-3 ml-4 text-sm text-white md:ml-5 md:text-lg"
                        >Dev</span
                    >
                </a>
                <!-- image - end -->

                <!-- image - start -->
                <a
                    href="#"
                    class="relative flex items-end h-48 overflow-hidden bg-gray-100 rounded-lg shadow-lg group md:h-80"
                >
                    <img
                        src="https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&q=75&fit=crop&w=600"
                        loading="lazy"
                        alt="Photo by Lorenzo Herrera"
                        class="absolute inset-0 object-cover object-center w-full h-full transition duration-200 group-hover:scale-110"
                    />

                    <div
                        class="absolute inset-0 opacity-50 pointer-events-none bg-gradient-to-t from-gray-800 via-transparent to-transparent"
                    ></div>

                    <span
                        class="relative inline-block mb-3 ml-4 text-sm text-white md:ml-5 md:text-lg"
                        >Retro</span
                    >
                </a>
                <!-- image - end -->
            </div>
        </div>
    </div>
</template>
