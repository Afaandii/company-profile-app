<script>
    import Footer from "./Footer.svelte";
    import Navigasi from "./Navigasi.svelte";
    import { onMount } from "svelte";

    function formatTanggal(tanggalStr) {
        const tanggal = new Date(tanggalStr);
        return new Intl.DateTimeFormat("id-ID", {
            day: "2-digit",
            month: "long",
            year: "numeric",
        }).format(tanggal);
    }

    let newsList = [];

    onMount(async () => {
        const res = await fetch("/api/news");
        const data = await res.json();
        newsList = data;
    });
</script>

<section class="w-full h-full mb-14">
    <div class="hero-show w-screen">
        <Navigasi />
        <div
            class="h-full w-full bg-black/80 flex flex-col justify-center items-center"
        >
            <h1
                class="text-5xl text-gray-400 font-bold font-poppins text-center"
                data-aos="fade-down"
            >
                Berita & Blog Kami
            </h1>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            {#if newsList.length > 0}
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
                                <div
                                    class="absolute top-3 left-3 bg-cyan-500 text-white text-sm font-medium px-3 py-1 rounded-lg flex items-center space-x-2"
                                >
                                    <i class="fa-solid fa-calendar-days"></i>
                                    <span>{formatTanggal(news.created_at)}</span
                                    >
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
            {:else}
                {#each Array(6) as _, i}
                    <div
                        class="col-12 col-lg-4 mb-3"
                        data-aos="fade-up"
                        data-aos-delay="0"
                    >
                        <div class="bg-white rounded-xl overflow-hidden">
                            <!-- skeleton image -->
                            <div
                                class="w-full h-56 bg-gray-300 animate-pulse"
                            ></div>
                            <div class="p-4 space-y-3">
                                <div
                                    class="w-3/4 h-6 bg-gray-300 rounded animate-pulse"
                                ></div>
                                <div
                                    class="w-full h-4 bg-gray-300 rounded animate-pulse"
                                ></div>
                                <div
                                    class="w-5/6 h-4 bg-gray-300 rounded animate-pulse"
                                ></div>
                                <div
                                    class="w-24 h-5 bg-gray-300 rounded animate-pulse mt-2"
                                ></div>
                            </div>
                        </div>
                    </div>
                {/each}
            {/if}
        </div>
        <!-- updated news -->
    </div>
</section>

<!-- footer -->

<Footer />
