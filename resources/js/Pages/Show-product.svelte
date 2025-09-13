<script>
    export let id;
    import Footer from "./Footer.svelte";
    import Navigasi from "./Navigasi.svelte";
    import { onMount } from "svelte";

    let product = null;
    let relatedProducts = [];
    let quantity = 1;
    let showFullDescription = false;

    function stripHtmlTags(html) {
        const div = document.createElement("div");
        div.innerHTML = html;
        return div.textContent || div.innerText || "";
    }

    function formatPrice(price) {
        return new Intl.NumberFormat("id-ID", {
            minimumFractionDigits: 0,
        }).format(price * 1000);
    }

    function increaseQuantity() {
        quantity += 1;
    }

    function decreaseQuantity() {
        if (quantity > 1) {
            quantity -= 1;
        }
    }

    onMount(async () => {
        if (id) {
            const res = await fetch(
                `http://localhost:8000/api/show-product/${id}`,
            );
            let data = await res.json();
            product = data.product;
            relatedProducts = data.related_products;
        }
    });
</script>

<!-- Detail Produk + Produk Serupa dalam 1 Section -->
<section class="w-full min-h-[100vh] bg-gradient-to-br from-gray-50 to-blue-50">
    <!-- Navigasi -->
    <div class="hero-show w-screen">
        <Navigasi />
        <div
            class="h-full w-full bg-black/80 flex flex-col justify-center items-center"
        >
            <h1
                class="text-2xl text-gray-400 font-bold font-poppins text-center"
                data-aos="fade-down"
            >
                Detail Produk
            </h1>
            <h4
                class="text-center font-bold text-gray-400 font-montserrat text-2xl lg:text-4xl mt-2 mb-3"
                data-aos="fade-up"
            >
                {product ? product.name : ""}
            </h4>
        </div>
    </div>

    {#if product}
        <div class="container mx-auto px-4 py-12">
            <!-- Bagian Detail Produk -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 mb-16">
                <!-- Gambar Produk -->
                <div class="space-y-4" data-aos="fade-right">
                    <div
                        class="bg-white rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300"
                    >
                        <div
                            class="relative overflow-hidden rounded-xl bg-gray-100"
                        >
                            <img
                                src={`/storage/${product.image_product}`}
                                alt={product.name}
                                class="w-full h-96 object-contain hover:scale-105 transition-transform duration-500"
                            />
                            <!-- Zoom indicator -->
                            <div
                                class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full p-2"
                            >
                                <svg
                                    class="w-5 h-5 text-gray-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"
                                    ></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6" data-aos="fade-left">
                    <div class="bg-white rounded-2xl p-6 shadow-xl">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">
                            {product.name}
                        </h1>

                        <!-- Harga -->
                        <div class="mb-6">
                            <span class="text-4xl font-bold text-blue-600">
                                Rp {formatPrice(product.price)}
                            </span>
                        </div>

                        <!-- Quantity -->
                        <div class="mb-6">
                            <label
                                for="jumlah"
                                class="block text-sm font-medium text-gray-700 mb-2"
                                >Jumlah:</label
                            >
                            <div class="flex items-center gap-3">
                                <button
                                    on:click={decreaseQuantity}
                                    aria-label="Kurangi jumlah"
                                    class="w-10 h-10 rounded-full border-2 border-gray-300 flex items-center justify-center hover:border-blue-500 hover:text-blue-500 transition-colors"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M20 12H4"
                                        />
                                    </svg>
                                </button>
                                <span
                                    class="w-12 text-center font-semibold text-lg"
                                    >{quantity}</span
                                >
                                <button
                                    on:click={increaseQuantity}
                                    aria-label="Tambah jumlah"
                                    class="w-10 h-10 rounded-full border-2 border-gray-300 flex items-center justify-center hover:border-blue-500 hover:text-blue-500 transition-colors"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 4v16m8-8H4"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="space-y-3 mb-6">
                            <button
                                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-4 px-6 rounded-xl font-semibold hover:from-blue-700 hover:to-blue-800 transform hover:scale-[1.02] transition-all duration-200 shadow-lg hover:shadow-xl"
                            >
                                <div
                                    class="flex items-center justify-center gap-2"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                                        ></path>
                                    </svg>
                                    Pesan Sekarang Rp {formatPrice(
                                        product.price * quantity,
                                    )}
                                </div>
                            </button>
                            <button
                                class="w-full border-2 border-blue-600 text-blue-600 py-4 px-6 rounded-xl font-semibold hover:bg-blue-50 transition-colors"
                            >
                                <div
                                    class="flex items-center justify-center gap-2"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.293 2.293a1 1 0 01-1.414 0L1 13M7 13v4a2 2 0 002 2h6a2 2 0 002-2v-4m-6 0a2 2 0 104 0"
                                        ></path>
                                    </svg>
                                    Tambah ke Keranjang
                                </div>
                            </button>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="bg-white rounded-2xl p-6 shadow-xl">
                        <h3
                            class="text-xl font-semibold mb-4 flex items-center gap-2"
                        >
                            <svg
                                class="w-5 h-5 text-blue-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                ></path>
                            </svg>
                            Deskripsi Produk
                        </h3>
                        <div class="text-gray-700 leading-relaxed">
                            {#if showFullDescription}
                                <p>{stripHtmlTags(product.description)}</p>
                                <button
                                    on:click={() =>
                                        (showFullDescription = false)}
                                    class="text-blue-600 hover:text-blue-700 font-medium mt-2 inline-flex items-center gap-1"
                                >
                                    Lihat lebih sedikit
                                    <svg
                                        class="w-4 h-4 transform rotate-180"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 9l-7 7-7-7"
                                        ></path>
                                    </svg>
                                </button>
                            {:else}
                                <p>
                                    {stripHtmlTags(product.description).slice(
                                        0,
                                        200,
                                    )}...
                                </p>
                                <button
                                    on:click={() =>
                                        (showFullDescription = true)}
                                    class="text-blue-600 hover:text-blue-700 font-medium mt-2 inline-flex items-center gap-1"
                                >
                                    Lihat selengkapnya
                                    <svg
                                        class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 9l-7 7-7-7"
                                        ></path>
                                    </svg>
                                </button>
                            {/if}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Produk Serupa -->
            {#if relatedProducts.length > 0}
                <h2
                    class="text-2xl lg:text-3xl font-bold mb-8 text-gray-800 tracking-wide"
                    data-aos="fade-right"
                >
                    Produk Serupa
                </h2>
                <div
                    class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6"
                >
                    {#each relatedProducts as item}
                        <div
                            class="bg-white rounded-2xl shadow hover:shadow-xl transition group overflow-hidden flex flex-col"
                            data-aos="fade-right"
                        >
                            <img
                                src={`/storage/${item.image_product}`}
                                alt={item.name}
                                class="w-full h-44 object-contain p-3 group-hover:scale-105 transition-transform duration-500"
                                data-aos="fade-right"
                                data-aos-de="200"
                            />
                            <div
                                class="p-4 flex flex-col justify-between flex-1"
                            >
                                <h3
                                    class="font-semibold text-sm text-gray-800 mb-2"
                                    data-aos="fade-right"
                                    data-aos-de="300"
                                >
                                    {item.name}
                                </h3>
                                <p
                                    class="text-blue-600 font-bold mb-3"
                                    data-aos="fade-right"
                                    data-aos-de="350"
                                >
                                    Rp {formatPrice(item.price)}
                                </p>
                                <button
                                    aria-label={`Tambah ${item.name} ke keranjang`}
                                    class="bg-blue-600 text-white px-3 py-2 rounded-full text-sm font-medium hover:bg-orange-500 transition"
                                    data-aos="fade-right"
                                    data-aos-de="400"
                                >
                                    + Tambah
                                </button>
                            </div>
                        </div>
                    {/each}
                </div>
            {/if}
        </div>
    {/if}
</section>

<!-- Footer -->
<Footer />
