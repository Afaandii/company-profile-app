<script>
    export let id; // dari Inertia
    import { onMount } from "svelte";
    import Footer from "./Footer.svelte";
    import Navigasi from "./Navigasi.svelte";

    let news = null;

    function stripHtmlTags(html) {
        const div = document.createElement("div");
        div.innerHTML = html;
        return div.textContent || div.innerText || "";
    }

    onMount(async () => {
        if (id) {
            const res = await fetch(
                `http://localhost:8000/api/show-news/${id}`,
            );
            const data = await res.json();
            console.log("Data dari API:", data);
            news = data;
        }
    });
</script>

<!-- navbar -->
<Navigasi />
<div class="relative">
    <div class="news relative z-10"></div>
    <div class="absolute inset-0 bg-black opacity-75 z-20"></div>
    <div
        class="absolute inset-0 z-30 mt-20 flex items-center justify-center text-white"
        data-aos="fade-down"
    >
        <h1 class="text-5xl font-bold font-poppins text-center">
            Detail Berita
        </h1>
    </div>
</div>

<section class="w-full h-auto mt-14 mb-14">
    <div class="container">
        {#if news}
            <div class="row">
                <div class=" col-12">
                    <h1
                        class="text-center font-bold font-poppins text-4xl mb-4"
                        data-aos="fade-up"
                    >
                        {news.title}
                    </h1>
                    <img
                        src={"/storage/" + news.image}
                        alt="poto news"
                        class="rounded-xl object-cover w-full h-auto"
                        data-aos="fade-right"
                        data-aos-delay="100"
                    />
                </div>
                <div class="col-12">
                    <p class="mt-2" data-aos="fade-right" data-aos-delay="300">
                        {stripHtmlTags(news.content)}
                    </p>
                </div>
            </div>
        {/if}
    </div>
</section>

<!-- footer -->
<Footer />

<style>
    .news {
        background-image: url("/storage/image/biji-coklat.png");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        width: 100%;
        height: 60vh;
    }
</style>
