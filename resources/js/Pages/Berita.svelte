<script>
    import { onMount } from "svelte";

    let newsList = [];
    let latestNews = null;
    let otherNews = [];

    onMount(async () => {
        const res = await fetch("http://localhost:8000/api/berita");
        const data = await res.json();
        newsList = data;

        if (newsList.length > 0) {
            latestNews = newsList[0];
            otherNews = newsList.slice(1);
        }
        console.log(latestNews);
    });
</script>

<section
    class="w-full min-h-[50vh] lg:w-full lg:h-[100vh] flex justify-center items-center overflow-hidden"
>
    <div class="mx-auto bg-white p-3 w-[95%] rounded-xl shadow-sm">
        <div
            class="flex flex-col lg:flex-row w-full lg:justify-between lg:items-center"
        >
            <!-- first news -->
            <div
                class="bg-white w-full lg:w-[720px] h-[540px] lg:h-[540px] rounded-2xl flex flex-col items-center justify-center shadow-sm overflow-hidden mb-10 lg:mb-0"
            >
                <div class="self-start ml-4 lg:ml-8 mt-2 lg:mb-3">
                    <h1
                        class="font-poppins text-left font-bold text-[35px] md:text-4xl"
                        data-aos="fade-up"
                    >
                        Berita Terbaru
                    </h1>
                </div>
                {#if latestNews}
                    <div class="w-[350px] lg:w-[660px]">
                        <img
                            src={"/storage/" + latestNews.image}
                            class="w-full h-[250px] lg:h-[350px] rounded-2xl"
                            alt="foto.png"
                            data-aos="fade-up"
                            data-aos-delay="100"
                        />
                        <div class="card-body p-2 mt-2">
                            <h1
                                class="card-title"
                                data-aos="fade-up"
                                data-aos-delay="150"
                            >
                                {latestNews.title}
                            </h1>
                            <a
                                href={`/show-news/${latestNews.id}`}
                                class="text-red-500 z-10 text-[16px] no-underline relative group inline-block hover:text-blue-800"
                                data-aos="fade-up"
                                data-aos-delay="200"
                            >
                                Lebih Lanjut
                                <span
                                    class="absolute left-0 bottom-0 w-0 h-[2px] bg-orange-500 transition-all duration-500 group-hover:w-[80px] z-0"
                                ></span>
                            </a>
                        </div>
                    </div>
                {/if}
            </div>

            <!-- side news -->
            <div
                class="bg-white w-full h-[500px] lg:w-[420px] lg:h-[540px] flex flex-col items-center justify-center rounded-xl shadow-sm lg:gap-2 sm:gap-5"
            >
                <div
                    class="self-start ml-4 lg:ml-5 flex gap-5 lg:gap-20 items-center justify-center"
                >
                    <h1
                        class="font-poppins text-left font-bold text-[25px] lg:text-[30px]"
                        data-aos="fade-left"
                    >
                        Berita Lainnya
                    </h1>
                    <a
                        href="/news"
                        class="no-underline text-red-500 relative inline-block hover:text-blue-500 group text-[16px]"
                        data-aos="fade-left"
                        data-aos-delay="150"
                        >See More
                        <span
                            class="absolute left-0 bottom-0 w-0 h-[2px] bg-orange-500 transition-all duration-500 group-hover:w-[80px] z-0"
                        ></span>
                    </a>
                </div>
                {#each otherNews as news}
                    <div class="border rounded-lg p-3" data-aos="fade-left">
                        <div class="w-full lg:w-[350px]">
                            <div class="row g-0">
                                <div class="col-md-4 col-6">
                                    <img
                                        src={"/storage/" + news.image}
                                        class="rounded-lg h-[75px] lg:h-[75px]"
                                        alt="foto.png"
                                        data-aos="fade-left"
                                        data-aos-delay="200"
                                    />
                                </div>
                                <div class="col-md-8 col-6">
                                    <div class="card-body p-0 lg:ml-2">
                                        <h1
                                            class="card-title text-[12px] lg:text-[18px]"
                                            data-aos="fade-left"
                                            data-aos-delay="200"
                                        >
                                            {news.title}
                                        </h1>
                                        <a
                                            href={`/show-news/${news.id}`}
                                            class="no-underline relative inline-block group text-red-500 hover:text-blue-800"
                                            data-aos="fade-left"
                                            data-aos-delay="250"
                                            >Lebih Lanjut
                                            <span
                                                class="absolute left-0 bottom-0 w-0 h-[2px] bg-orange-500 transition-all duration-500 group-hover:w-[80px] z-0"
                                            ></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {/each}
            </div>
        </div>
    </div>
</section>
