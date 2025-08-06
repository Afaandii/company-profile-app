<script>
    import Footer from "./Footer.svelte";
    import Navigasi from "./Navigasi.svelte";

    import { onMount } from "svelte";

    let newsList = [];

    onMount(async () => {
        const res = await fetch("http://localhost:8000/api/news");
        const data = await res.json();
        newsList = data;

        console.log(newsList);
    });
</script>

<!-- Navbar -->
<Navigasi />

<div class="relative">
    <div class="news relative z-10"></div>
    <div class="absolute inset-0 bg-black opacity-75 z-20"></div>
    <div
        class="absolute inset-0 z-30 mt-20 flex items-center justify-center text-white"
        data-aos="fade-down"
    >
        <h1 class="text-5xl font-bold font-poppins text-center">
            Berita & Blog Kami
        </h1>
    </div>
</div>

<section class="w-full h-full mt-16 mb-14">
    <div class="container">
        <div
            class="flex flex-col justify-center items-center mb-5"
            data-aos="fade-up"
        >
            <h4 class="font-semibold font-montserrat text-[#1f2122] mb-3">
                Blog Kami
            </h4>
            <h1
                class="font-bold font-poppins text-center text-[50px] text-black"
            >
                Blog & Berita Terbaru
            </h1>
        </div>
        <div class="row">
            {#each newsList as news}
                <div
                    class="col-12 col-lg-4 mb-3"
                    data-aos="fade-up"
                    data-aos-delay="0"
                >
                    <div
                        class="bg-white rounded-xl overflow-hidden hover:shadow-2xl transition-shadow duration-500 group"
                    >
                        <div class="relative overflow-hidden">
                            <img
                                src={"/storage/" + news.image}
                                alt="foto"
                                class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110"
                            />
                            <!-- Badge tanggal -->
                            <div
                                class="absolute top-3 left-3 bg-cyan-500 text-white text-sm font-medium px-3 py-1 rounded-lg flex items-center space-x-2"
                            >
                                <i class="fa-solid fa-calendar-days"></i>
                                <span>Jan 12 2025</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h5
                                class="text-xl font-semibold text-blue-900 leading-snug mb-2"
                            >
                                {news.title}
                            </h5>
                            <p class="text-gray-500 mb-4 text-sm">
                                {news.excerpt}
                            </p>
                            <a
                                href={`show-news/${news.id}`}
                                class="text-blue-800 font-semibold no-underline hover:text-red-600 transition duration-300 inline-flex items-center group"
                            >
                                Read More
                                <i
                                    class="fa-solid fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"
                                ></i>
                            </a>
                        </div>
                    </div>
                </div>
            {/each}
        </div>
        <!-- updated news -->
    </div>
</section>

<!-- footer -->

<Footer />

<style>
    .news {
        background-image: url("storage/image/biji-coklat.png");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        width: 100%;
        height: 60vh;
    }
</style>
