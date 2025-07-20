<script>
    window.addEventListener("scroll", function () {
        const navbar = document.getElementById("navbar");
        if (window.scrollY > 10) {
            navbar.classList.add("bg-black/80");
        } else {
            navbar.classList.remove("bg-black/80");
        }
    });
</script>

<nav class="navbar navbar-expand-lg w-full fixed-top" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand ml-0 lg:ml-20" href="/">
            <img
                src="storage/image/logo-footer.png"
                alt="logo"
                class=" w-24 lg:w-20"
            />
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
            style="--bs-navbar-toggler-icon-bg: url('data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 30 30%27%3e%3cpath stroke=%27rgba%28255, 255, 255, 1%29%27 stroke-linecap=%27round%27 stroke-miterlimit=%2710%27 stroke-width=%272%27 d=%27M4 7h22M4 15h22M4 23h22%27/%3e%3c/svg%3e'); "
        >
            <span class="navbar-toggler-icon" style="width: 4rem; height: 4rem;"
            ></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div
                class="w-100 d-lg-flex justify-content-lg-evenly align-items-lg-center"
            >
                <ul class="navbar-nav flex-grow-1 justify-content-center gap-4">
                    <li class="nav-item">
                        <a
                            href="/"
                            class="relative inline-block text-[17px] no-underline text-white font-poppins group"
                            >Beranda
                            <span
                                class="absolute left-0 bottom-0 w-0 h-[2px] bg-orange-500 transition-all duration-300 group-hover:w-full"
                            ></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            href="/about-us"
                            class="relative inline-block text-[17px] no-underline text-white font-poppins group"
                            >Tentang Kami
                            <span
                                class="absolute left-0 bottom-0 w-0 h-[2px] bg-orange-500 transition-all duration-300 group-hover:w-full"
                            ></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            href="/news"
                            class="relative inline-block text-[17px] no-underline text-white font-poppins group"
                            >Berita
                            <span
                                class="absolute left-0 bottom-0 w-0 h-[2px] bg-orange-500 transition-all duration-300 group-hover:w-full"
                            ></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            href="/produk"
                            class="relative inline-block text-[17px] no-underline text-white font-poppins group"
                            >Produk Kami
                            <span
                                class="absolute left-0 bottom-0 w-0 h-[2px] bg-orange-500 transition-all duration-300 group-hover:w-full"
                            ></span>
                        </a>
                    </li>
                </ul>
                <div class="me-20 mt-4 mt-lg-0">
                    <a
                        href="http://localhost:8000"
                        class="relative inline-block text-[17px] no-underline text-white font-poppins group"
                    >
                        <span class="inline-flex items-center gap-2">
                            <i class="fa-regular fa-circle-user text-[23px]"
                            ></i>
                            <span>Login</span>
                        </span>
                        <span
                            class="absolute left-0 bottom-0 w-0 h-[2px] bg-orange-500 transition-all duration-300 group-hover:w-full"
                        ></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- <nav
    class="fixed top-0 left-0 w-full h-auto z-50 transition-all duration-500"
    id="navbar"
>
    <div class="flex justify-evenly align-items-center">
        <div class="w-20 my-auto">
            <a href="/">
                <img src="storage/image/logo-footer.png" alt="logo.jpg" />
            </a>
        </div>
        <div class="my-auto">
            <ul
                class="flex justify-center align-items-center gap-[2rem] my-auto"
            >
                <li>
                    <a
                        href="/"
                        class="relative inline-block text-[17px] no-underline text-white font-poppins group"
                        >Beranda
                        <span
                            class="absolute left-0 bottom-0 w-0 h-[2px] bg-orange-500 transition-all duration-300 group-hover:w-full"
                        ></span>
                    </a>
                </li>
                <li>
                    <a
                        href="/about-us"
                        class="relative inline-block text-[17px] no-underline text-white font-poppins group"
                        >Tentang Kami
                        <span
                            class="absolute left-0 bottom-0 w-0 h-[2px] bg-orange-500 transition-all duration-300 group-hover:w-full"
                        ></span>
                    </a>
                </li>
                <li>
                    <a
                        href="/news"
                        class="relative inline-block text-[17px] no-underline text-white font-poppins group"
                        >Berita
                        <span
                            class="absolute left-0 bottom-0 w-0 h-[2px] bg-orange-500 transition-all duration-300 group-hover:w-full"
                        ></span>
                    </a>
                </li>
                <li>
                    <a
                        href="/produk"
                        class="relative inline-block text-white font-poppins text-[17px] no-underline group"
                    >
                        Produk Kami
                        <span
                            class="absolute left-0 bottom-0 w-0 h-[2px] bg-orange-500 transition-all duration-300 group-hover:w-full"
                        ></span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="my-auto">
            <a
                href="http://localhost:8000"
                class="relative inline-flex items-center gap-2 text-white no-underline text-[1rem] font-poppins group"
            >
                <i class="fa-regular fa-circle-user text-[23px]"></i>
                <span>Login</span>

                <span
                    class="absolute left-0 -bottom-1 w-0 h-[2px] bg-orange-500 transition-all duration-300 group-hover:w-full"
                ></span>
            </a>
        </div>
    </div>
</nav> -->
