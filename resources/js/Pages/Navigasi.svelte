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

<!-- <nav
    class="navbar navbar-expand-lg fixed-top bg-black opacity-20 z-10"
    id="navbar"
>
    <div class="container-fluid z-50">
        <a class="navbar-brand text-white" href="#">Navbar</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a
                    class="nav-link active text-white"
                    aria-current="page"
                    href="/">Beranda</a
                >
                <a class="nav-link text-white" href="/about-us">Tentang Kami</a>
                <a class="nav-link text-white" href="/news">Berita</a>
                <a class="nav-link text-white" href="/produk">Produk</a>
            </div>
        </div>
    </div>
</nav> -->

<nav
    class="fixed top-0 left-0 w-full navbar-expand-lg h-auto z-50 transition-all duration-500"
    id="navbar"
>
    <div class="flex justify-evenly align-items-center">
        <div class="w-20 my-auto">
            <a href="/">
                <img src="storage/image/logo-footer.png" alt="user.jpg" />
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
</nav>
