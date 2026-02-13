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

    function formatDate(dateString) {
        const options = {
            year: "numeric",
            month: "long",
            day: "numeric",
            hour: "2-digit",
            minute: "2-digit",
        };
        return new Date(dateString).toLocaleDateString("id-ID", options);
    }

    onMount(async () => {
        if (id) {
            const res = await fetch(
                `/api/show-news/${id}`,
            );
            const data = await res.json();
            news = data;
            console.log(news);
        }
    });
</script>

<section class="w-full min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
    <!-- navigasi bar -->
    <div class="hero-show w-screen">
        <Navigasi />
        <div
            class="h-full w-full bg-black/80 flex flex-col justify-center items-center"
        >
            <h1
                class="text-3xl text-gray-400 font-bold font-poppins text-center"
                data-aos="fade-down"
            >
                Detail Berita
            </h1>
            <h4
                class="text-center font-bold text-gray-400 font-poppins text-2xl lg:text-4xl mt-3 mb-3"
                data-aos="fade-up"
            >
                {news ? news.title : ""}
            </h4>
        </div>
    </div>
    <!-- navigasi bar end -->

    <div class="container mx-auto px-4 relative z-10 pb-20">
        {#if news}
            <div class="max-w-4xl mx-auto">
                <!-- Featured Image Card -->
                <div
                    class="bg-white rounded-xl shadow-2xl overflow-hidden mb-8"
                    data-aos="fade-up"
                    data-aos-delay="100"
                >
                    <div class="relative">
                        <img
                            src={"/storage/" + news.image}
                            alt="Gambar berita"
                            class="w-full h-full md:h-96 object-cover"
                        />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"
                        ></div>
                    </div>
                </div>

                <!-- Content Card -->
                <div
                    class="bg-white rounded-2xl shadow-xl p-8 md:p-12"
                    data-aos="fade-up"
                    data-aos-delay="200"
                >
                    <!-- Article Meta -->
                    <div
                        class="flex flex-wrap items-center justify-between pb-6 border-b border-gray-100"
                    >
                        <div class="flex items-center space-x-4 mb-4 md:mb-0">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center"
                            >
                                <svg
                                    class="w-6 h-6 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"
                                    ></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-600 text-sm">
                                    Dipublikasikan
                                </p>
                                <p class="font-semibold text-gray-800">
                                    {formatDate(news.created_at || new Date())}
                                </p>
                            </div>
                        </div>

                        <!-- Share Buttons -->
                        <div class="flex items-center space-x-3">
                            <span class="text-gray-500 text-sm font-medium"
                                >Bagikan:</span
                            >
                            <button
                                aria-label="twitter"
                                class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-full transition-colors duration-200"
                            >
                                <svg
                                    class="w-4 h-4"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"
                                    />
                                </svg>
                            </button>
                            <button
                                aria-label="facebook"
                                class="p-2 bg-blue-600 hover:bg-blue-700 text-white rounded-full transition-colors duration-200"
                            >
                                <svg
                                    class="w-4 h-4"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"
                                    />
                                </svg>
                            </button>
                            <button
                                aria-label="instagram"
                                class="p-2 bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 hover:opacity-90 text-white rounded-full transition-colors duration-200"
                            >
                                <svg
                                    class="w-4 h-4"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5a4.25 4.25 0 0 0 4.25-4.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5zm8 2.25a.75.75 0 0 1 .75.75v1a.75.75 0 0 1-1.5 0v-1a.75.75 0 0 1 .75-.75zM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm0 1.5a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7z"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Article Content -->
                    <div class="prose prose-lg max-w-none">
                        <div class="text-gray-700 leading-relaxed text-lg">
                            {stripHtmlTags(news.content)}
                        </div>
                    </div>

                    <!-- Tags Section -->
                    <div class="mt-10 pt-8 border-t border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            Tag Terkait
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="px-3 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full"
                                >#berita</span
                            >
                            <span
                                class="px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full"
                                >#terbaru</span
                            >
                            <span
                                class="px-3 py-1 bg-purple-100 text-purple-800 text-sm font-medium rounded-full"
                                >#info</span
                            >
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div
                        class="mt-10 flex flex-col sm:flex-row justify-between items-center gap-4"
                    >
                        <a
                            href="/news"
                            class="w-full text-decoration-none sm:w-auto flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl transition-colors duration-200"
                        >
                            <svg
                                class="w-5 h-5 mr-2"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 19l-7-7 7-7"
                                ></path>
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        {:else}
            <!-- Enhanced Loading State -->
            <div class="max-w-4xl mx-auto">
                <div
                    class="bg-white rounded-2xl shadow-xl overflow-hidden mb-8"
                    data-aos="fade-up"
                >
                    <div
                        class="w-full h-64 md:h-96 bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200 animate-pulse"
                    ></div>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-xl p-8 md:p-12"
                    data-aos="fade-up"
                    data-aos-delay="100"
                >
                    <div class="animate-pulse">
                        <div class="flex items-center space-x-4 mb-8">
                            <div
                                class="w-12 h-12 bg-gray-300 rounded-full"
                            ></div>
                            <div class="space-y-2">
                                <div class="w-24 h-3 bg-gray-300 rounded"></div>
                                <div class="w-32 h-4 bg-gray-300 rounded"></div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="w-full h-4 bg-gray-300 rounded"></div>
                            <div class="w-5/6 h-4 bg-gray-300 rounded"></div>
                            <div class="w-4/6 h-4 bg-gray-300 rounded"></div>
                            <div class="w-full h-4 bg-gray-300 rounded"></div>
                            <div class="w-3/4 h-4 bg-gray-300 rounded"></div>
                            <div class="w-5/6 h-4 bg-gray-300 rounded"></div>
                        </div>
                    </div>
                </div>
            </div>
        {/if}
    </div>
</section>

<Footer />
