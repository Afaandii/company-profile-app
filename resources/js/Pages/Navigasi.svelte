<script>
    window.addEventListener("scroll", function () {
        const navbar = document.getElementById("navbar");
        if (window.scrollY > 10) {
            navbar.classList.add("bg-black/80");
        } else {
            if (
                !document.getElementById("navbarNav").classList.contains("show")
            ) {
                navbar.classList.remove("bg-black/80");
            }
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
        const toggler = document.querySelector("#navbar .navbar-toggler");
        const nav = document.getElementById("navbarNav");
        const navbar = document.getElementById("navbar");

        const iconHamburger = `
      <svg width="40" height="40" viewBox="0 0 30 30" fill="none"
           xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
        <path d="M4 7h22M4 15h22M4 23h22"
              stroke="white" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10"/>
      </svg>`;

        const iconClose = `
      <svg width="40" height="40" viewBox="0 0 30 30" fill="none"
           xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
        <path d="M6 6L24 24M24 6L6 24"
              stroke="white" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10"/>
      </svg>`;

        function setIcon(isOpen) {
            toggler.innerHTML = isOpen ? iconClose : iconHamburger;
        }

        // Set awal: hamburger
        setIcon(false);

        // Toggle ikon mengikuti status collapse + background hitam
        nav.addEventListener("show.bs.collapse", () => {
            setIcon(true);
            navbar.classList.add("bg-black/80");
        });

        nav.addEventListener("hide.bs.collapse", () => {
            setIcon(false);
            if (window.scrollY <= 10) {
                navbar.classList.remove("bg-black/80");
            }
        });
    });
</script>

<nav class="navbar navbar-expand-lg w-full fixed-top" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand ml-0 lg:ml-20" href="/">
            <img
                src="/storage/image/logo-footer.png"
                alt="logo"
                class="w-24 lg:w-20"
            />
        </a>

        <button
            class="navbar-toggler p-0 border-0 bg-transparent"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
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
                        href="/login"
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
