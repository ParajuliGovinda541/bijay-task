<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shark Insights</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Add FontAwesome CDN for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Define custom colors for light and dark mode */
        .dark-mode {
            background-color: #000000;
            /* Dark background */
            color: #FFD700;
            /* Yellow text */
        }
        .light-mode {
            background-color: #FEF017 ;
            /* Yellow background */
            color: #000000;
            /* White text */
        }
    </style>
</head>
<body class="transition-colors duration-300" id="theme">
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <section class="p-5">
        <header class="flex flex-col md:flex-row justify-between px-10 py-5">
            <!-- Logo Section -->
            <div class="mb-4 md:mb-0 flex justify-center md:justify-start w-full">
                <img src="{{ asset('images/image.jpeg') }}" alt="Logo" class="h-32 mx-auto md:mx-0">
            </div>

            <!-- Hamburger Icon for Mobile -->
            <div class="md:hidden flex items-center cursor-pointer" id="hamburger-menu" onclick="toggleMenu()">
                <i class="fa fa-bars fa-2xl " id="hamburger-icon" aria-label="Open menu"></i>
                <i class="fa fa-times fa-2xl  hidden" id="close-icon" aria-label="Close menu"></i>
            </div>

            <!-- Menu Section (Hidden on Mobile by default) -->
            <div class="flex flex-col md:flex-row justify-end items-center gap-4 md:gap-6 hidden md:flex w-full" id="menu">
                <a href="https://x.com/SharkPlayGR" class="">
                    <i class="fa-brands fa-twitter fa-2xl" aria-label="Twitter"></i>
                </a>
                <a href="" class="">
                    <i class="fa-solid fa-envelope fa-2xl" aria-label="Email"></i>
                </a>
                <a href="https://t.me/suyogkh" class="text-xl px-6 py-2 bg-[#b0abab] rounded-3xl font-mono leading-normal">
                    Contact Us
                </a>
            </div>
              <!-- Dark Mode Toggle Button -->
              <button id="theme-toggle" type="button"
              class="text-gray-300 hover:bg-gray-400 border-gray-300 dark:hover:bg-gray-700 dark:border-gray-700 focus:outline-none rounded-lg text-sm lg:py-0.5 lg:px-3 py-0.5 px-2">
              <p id="theme-toggle-dark-icon" class="hidden lg:text-sm">
                  <i class="fas fa-moon"></i> <!-- Font Awesome moon icon -->
              </p>
              <p id="theme-toggle-light-icon" class="hidden lg:text-sm">
                  <i class="fas fa-sun"></i> <!-- Font Awesome sun icon -->
              </p>
          </button>
        </header>

        <!-- Mobile Menu (Hidden by default) -->
        <div class="md:hidden hidden w-full" id="mobile-menu">
            <a href="https://x.com/SharkPlayGR" class="text-white flex items-center justify-between px-4 py-2">
                <i class="fa-brands fa-twitter fa-2xl" aria-label="Twitter"></i>
            </a>
            <a href="" class="text-white flex items-center justify-between px-4 py-2">
                <i class="fa-solid fa-envelope fa-2xl" aria-label="Email"></i>
            </a>
            <a href="https://t.me/suyogkh" class="text-xl px-6 py-2 bg-[#332F2F] rounded-3xl font-mono leading-normal flex items-center justify-center">
                Contact Us
            </a>

        </div>

        <hr class="h-[0.5px]">
    </section>

    <script>
        // Function to toggle the mobile menu
        function toggleMenu() {
            const menu = document.getElementById("mobile-menu");
            const hamburgerIcon = document.getElementById("hamburger-icon");
            const closeIcon = document.getElementById("close-icon");

            if (menu.classList.contains("hidden")) {
                menu.classList.remove("hidden");
                hamburgerIcon.classList.add("hidden");
                closeIcon.classList.remove("hidden");
            } else {
                menu.classList.add("hidden");
                hamburgerIcon.classList.remove("hidden");
                closeIcon.classList.add("hidden");
            }
        }
    </script>


    <script>
        // Toggle between light and dark modes
        const themeElement = document.getElementById('theme');
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
        const themeToggleBtn = document.getElementById('theme-toggle');

        // Load the previously selected theme or apply the system preference
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
            '(prefers-color-scheme: dark)').matches)) {
            themeElement.classList.add('dark-mode');
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeElement.classList.add('light-mode');
            themeToggleDarkIcon.classList.remove('hidden');
        }

        // Toggle the theme and save preference
        themeToggleBtn.addEventListener('click', function () {
            themeElement.classList.toggle('dark-mode');
            themeElement.classList.toggle('light-mode');

            // Toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // Update localStorage based on current theme
            if (themeElement.classList.contains('dark-mode')) {
                localStorage.setItem('color-theme', 'dark');
            } else {
                localStorage.setItem('color-theme', 'light');
            }
        });
    </script>

    <style>
        .marquee-container {
            display: flex;
            gap: 2rem;
            width: 100%;
            /* Ensure the container spans full width */
            overflow: hidden;
            /* Hides overflow content outside the container */
        }

        .marquee {
            font-size: 8vw;
            /* Font size scales relative to viewport width */
            white-space: nowrap;
            animation: scroll-left 24s linear infinite;
        }

        @keyframes scroll-left {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .marquee {
                font-size: 10vw;
                /* Larger font size for smaller screens */
            }
        }

        @media (max-width: 480px) {
            .marquee {
                font-size: 12vw;
                /* Even larger font size for very small screens */
            }
        }
    </style>
    <!-- styyle for marquee end -->

    <section class=" p-5 overflow-hidden flex justify-center items-center">
        <div class="marquee-container font-halyard">
            <div class="marquee uppercase  font-halyard font-bold">
                WELCOME TO SHARK INSIGHTS // WELCOME TO SHARK INSIGHTS //
            </div>
            <div class="marquee uppercase font-halyard font-bold">
                WELCOME TO SHARK INSIGHTS // WELCOME TO SHARK INSIGHTS //
            </div>
        </div>
    </section>



    <section class=" px-5 ">
        <div class="flex flex-col md:flex-row justify-between items-center md:items-end">
            <!-- Text Section -->
            <div class="pl-0 md:pl-16 text-center md:text-left">
                <p class="font-mono leading-6 font-normal text-[16px] pb-12">
                    Inspired by the principle of kaizen, we strive for continuous
                    <br> improvement in our trading strategies, blending expertise,<br> passion, and innovation to
                    maximize profits and elevate financial <br> futures.
                </p>
            </div>

            <!-- Image Section -->
            <div class="mt-10 md:mt-0">
                <img src="{{ asset('images/privatealpha.png') }}" class="h-80 mx-auto md:mx-0 pr-0 md:pr-28"
                    alt="Private Alpha">
            </div>
        </div>
    </section>
    <section class=" px-5 pb-10 mb-10">
        <div class="text-end sm:text-center md:text-left">
            <h1
                class="font-bold text-[83px] leading-[83px] pr-5 text-4xl sm:text-5xl md:text-6xl lg:text-[83px] text-right">
                COMMUNITY
            </h1>
        </div>
    </section>



    <!-- offer section` -->
    <section class="px-5  pb-10">
        <div>
            <h1 class="font-bold text-[48px] leading-[62px] py-5  text-center md:text-left">WHAT WE OFFER
            </h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10">
                <!-- Networking Card -->
                <div class="border p-5 flex flex-col justify-between">
                    <h1 class="font-bold text-lg">NETWORKING</h1>
                    <p class="mb-16 font-mono mt-5">We're offering premier networking opportunities, connecting you with
                        industry leaders, innovative startups, and whales to accelerate your growth and success.</p>
                    <div class="inline-flex bg-white w-12 h-12 justify-center items-center">
                        <img src="{{ asset('images/networking.png') }}" class="w-10" alt="Networking">
                    </div>
                </div>

                <!-- Memecoin Trading Card -->
                <div class="border p-5 flex flex-col justify-between">
                    <h1 class="font-bold text-lg">MEMECOIN TRADING</h1>
                    <p class="mb-16 font-mono mt-5">Our lab provides expert memecoin trading insights and strategies, helping
                        you navigate the market to maximize your gains and minimize risks.</p>
                    <div class="inline-flex bg-white w-12 h-12 justify-center items-center">
                        <img src="{{ asset('images/trading.png') }}" class="w-10" alt="Memecoin Trading">
                    </div>
                </div>

                <!-- Signals Card -->
                <div class="border p-5 flex flex-col justify-between">
                    <h1 class="font-bold text-lg">SIGNALS</h1>
                    <p class="mb-16 font-mono mt-5">We deliver timely and accurate trading signals with the help of connected
                        whales, giving you the edge to make informed decisions in the fast-paced memecoin market.</p>
                    <div class="inline-flex bg-white w-12 h-12 justify-center items-center">
                        <img src="{{ asset('images/signals.png') }}" class="w-10" alt="Signals">
                    </div>
                </div>

                <!-- Market Analysis Card -->
                <div class="border p-5 flex flex-col justify-between">
                    <h1 class="font-bold text-lg">MARKET ANALYSIS</h1>
                    <p class="mb-16 font-mono mt-5">We also offer in-depth market analysis, providing you with comprehensive
                        insights to stay ahead in the dynamic memecoin landscape.</p>
                    <div class="inline-flex bg-white w-12 h-12 justify-center items-center">
                        <img src="{{ asset('images/market.png') }}" class="w-10" alt="Market Analysis">
                    </div>
                </div>
            </div>

            <div class="flex justify-center items-center h-full my-5">
                <a href=""
                    class="text-[18px] px-6 py-3 border rounded-3xl font-mono font-normal leading-normal hover:bg-[#CCCCCC]">GET
                    IN TOUCH</a>
            </div>
        </div>
    </section>


    <!-- project section -->

    {{-- <section class="px-5 ">
        <h1 class=" font-bold text-[48px] leading-[62px] text-center sm:text-[40px] sm:leading-[52px]">
            MEET OUR AFFILIATED PROJECT
        </h1>
        <div class="swiper mySwiper1 py-28">
            <div class="swiper-wrapper">
                <div class="swiper-slide flex flex-col items-start text-left  relative">
                    <img src="{{ asset('images/eye.jpeg') }}" class="w-full h-full object-cover mb-5"
                        alt="AiScan">
                    <!-- Text content inside the slide -->
                    <div class="absolute bottom-4 left-0 -mb-20 px-4 sm:px-6">
                        <h1 class="text-xl font-bold mb-4 sm:text-2xl">AiScan</h1>
                        <a href=""
                            class="text-[13px] px-6 py-3 mt-10 bg-white text-black rounded-3xl font-mono font-normal leading-normal hover:bg-[#CCCCCC]">
                            TWITTER / X
                        </a>
                    </div>
                </div>
                <div class="swiper-slide flex flex-col items-start text-left  relative">
                    <img src="{{ asset('images/gaor.jpeg') }}" class="w-full h-full object-cover mb-5"
                        alt="Gaor">
                    <!-- Text content inside the slide -->
                    <div class="absolute bottom-4 left-0 -mb-20 px-4 sm:px-6">
                        <h1 class="text-xl font-bold mb-4 sm:text-2xl">Gaor</h1>
                        <a href=""
                            class="text-[13px] px-6 py-3 mt-10 bg-white text-black rounded-3xl font-mono font-normal leading-normal hover:bg-[#CCCCCC]">
                            TWITTER / X
                        </a>
                    </div>
                </div>
                <div class="swiper-slide flex flex-col items-start text-left  relative">
                    <img src="{{ asset('images/eye.jpeg') }}" class="w-full h-full object-cover mb-5"
                        alt="AiScan">
                    <!-- Text content inside the slide -->
                    <div class="absolute bottom-4 left-0 -mb-20 px-4 sm:px-6">
                        <h1 class="text-xl font-bold mb-4 sm:text-2xl">AiScan</h1>
                        <a href=""
                            class="text-[13px] px-6 py-3 mt-10 bg-white text-black rounded-3xl font-mono font-normal leading-normal hover:bg-[#CCCCCC]">
                            TWITTER / X
                        </a>
                    </div>
                </div>
                <div class="swiper-slide flex flex-col items-start text-left  relative">
                    <img src="{{ asset('images/gaor.jpeg') }}" class="w-full h-full object-cover mb-5"
                        alt="Gaor">
                    <!-- Text content inside the slide -->
                    <div class="absolute bottom-4 left-0 -mb-20 px-4 sm:px-6">
                        <h1 class="text-xl font-bold mb-4 sm:text-2xl">Gaor</h1>
                        <a href=""
                            class="text-[13px] px-6 py-3 mt-10 bg-white text-black rounded-3xl font-mono font-normal leading-normal hover:bg-[#CCCCCC]">
                            TWITTER / X
                        </a>
                    </div>
                </div>
            </div>

            <!-- Swiper navigation buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper1", {
                slidesPerView: 3, // Default for larger screens
                spaceBetween: 30,
                freeMode: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    // When the screen width is >= 640px, show 2 slides
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    // When the screen width is >= 768px, show 1 slide
                    768: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    // Adjust space for smaller screens
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    }
                }
            });
        </script>
    </section> --}}


    <!-- project section end -->




    <section class="px-4 sm:px-6 md:px-8 lg:px-16">
        <h1
            class="text-center text-[32px] sm:text-[36px] md:text-[48px] font-bold leading-[42px] my-6 sm:my-8 md:my-10">
            Want to join?
        </h1>
        <h3
            class="text-center font-mono text-[14px] sm:text-[16px] md:text-[18px] leading-6 font-normal my-6 sm:my-8 md:my-10">
            Submit your request here and DM us on X and we’ll get back to you asap!
        </h3>
        <div class="flex gap-5 justify-center items-center my-5">
            <a href="#"
                class="border px-3 border-black text-center flex items-center w-fit py-4 sm:py-5 rounded-md">
                <i class="fa-brands fa-twitter fa-2xl"></i>
            </a>
            <a href="#"
                class="border px-3 border-black text-center flex items-center w-fit py-4 sm:py-5 rounded-md">
                <i class="fa-solid fa-envelope fa-2xl"></i>
            </a>
        </div>
    </section>
    <section class="w-full sm:w-3/4 md:w-1/2 mx-auto  px-6 py-5 font-mono shadow-md my-16 border-2">
        <form action="{{ route('contact.store') }}" method="POST" class="w-full border">
            @csrf
            <!-- Name (Required) -->
            <label for="first_name" class="block text-sm font-medium text-gray-700">Name (Required)</label>
            <div class="flex flex-col sm:flex-row sm:gap-6 w-full">
                <div class="mb-4 w-full sm:w-1/2">
                    <label for="first_name" class="block  text-sm font-medium">First Name</label>
                    <input type="text" id="first_name" name="first_name"
                        class="w-full p-3 mt-1 border hover:bg-[#969696]" required>
                </div>
                <div class="mb-4 w-full sm:w-1/2">
                    <label for="last_name" class="block text-sm  font-medium">Last Name</label>
                    <input type="text" id="last_name" name="last_name"
                        class="w-full p-3 mt-1 border hover:bg-[#969696]" required>
                </div>
            </div>
            <!-- Telegram ID -->
            <div class="mb-4 w-full">
                <label for="telegram_id" class="block text-sm  font-medium">Telegram ID</label>
                <input type="text" id="telegram_id" name="telegram_id"
                    class="w-full p-3 mt-1 border hover:bg-[#969696]">
            </div>
            <!-- Why would you like to join? (Required) -->
            <div class="mb-4 w-full">
                <label for="description" class="block text-sm font-medium ">Why would you like to join?
                    (Required)</label>
                <textarea id="description" name="description" class="w-full p-3 mt-1 border hover:bg-[#969696]" required></textarea>
            </div>
            <!-- Submit Button -->
            <div class="mb-4 w-full flex justify-center">
                <button type="submit"
                    class="text-[12px] px-6 py-3 bg-white rounded-3xl font-mono font-normal leading-normal hover:bg-[#CCCCCC]">
                    GET IN TOUCH
                </button>
            </div>
        </form>
    </section>


</body>

</html>
