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
            news = data;
            console.log(news);
        }
    });
</script>

<section class="w-full h-auto mb-14">
    <div class="hero-show w-screen">
        <Navigasi />
        <div
            class="h-full w-full bg-black/80 flex flex-col justify-center items-center"
        >
            <h1
                class="text-3xl text-gray-300 font-bold font-poppins text-center"
                data-aos="fade-down"
            >
                Detail Berita
            </h1>
            <h4
                class="text-center font-bold text-gray-300 font-poppins text-2xl lg:text-4xl mt-3 mb-3"
                data-aos="fade-up"
            >
                {news ? news.title : ""}
            </h4>
        </div>
    </div>

    <div class="container">
        {#if news}
            <div class="row">
                <div class=" col-12">
                    <img
                        src={"/storage/" + news.image}
                        alt="poto news"
                        class="rounded-md object-cover w-full h-auto"
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
        {:else}
            <div class="row">
                <div class="col-12">
                    <div
                        class="w-full h-64 bg-gray-300 rounded-md animate-pulse"
                    ></div>
                </div>
                <div class="col-12 mt-4 space-y-2">
                    <div
                        class="w-full h-4 bg-gray-300 rounded animate-pulse"
                    ></div>
                    <div
                        class="w-5/6 h-4 bg-gray-300 rounded animate-pulse"
                    ></div>
                    <div
                        class="w-4/6 h-4 bg-gray-300 rounded animate-pulse"
                    ></div>
                    <div
                        class="w-3/6 h-4 bg-gray-300 rounded animate-pulse"
                    ></div>
                </div>
            </div>
        {/if}
    </div>
</section>

<!-- footer -->
<Footer />
