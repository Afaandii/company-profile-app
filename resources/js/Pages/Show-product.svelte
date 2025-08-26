<script>
    export let id;
    import Footer from "./Footer.svelte";
    import Navigasi from "./Navigasi.svelte";
    import { onMount } from "svelte";

    let product = null;
    let relatedProducts = [];

    function stripHtmlTags(html) {
        const div = document.createElement("div");
        div.innerHTML = html;
        return div.textContent || div.innerText || "";
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

<!-- Navigasi -->
<Navigasi />

<div class="relative">
    <div class="news relative z-10"></div>
    <div class="absolute inset-0 bg-black opacity-75 z-20"></div>
    <div
        class="absolute inset-0 z-30 mt-20 flex items-center justify-center text-white"
        data-aos="fade-down"
    >
        <h1 class="text-5xl font-bold font-poppins text-center">
            Detail Product
        </h1>
    </div>
</div>

<!-- Detail Produk -->
<section class="w-full min-h-[100vh] flex items-center py-auto">
    {#if product}
        <div
            class="container-fluid mx-auto p-4 md:px-0 flex flex-col md:flex-row items-start gap-14"
        >
            <!-- Gambar produk -->
            <div
                class="bg-white rounded-xl"
                style="box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.1), 0 4px 6px -1px rgba(0, 0, 0, 0.1);"
                data-aos="fade-up"
            >
                <img
                    src={`/storage/${product.image_product}`}
                    alt={product.name}
                    class="w-[360px] md:w-[426px] rounded-xl object-contain"
                    data-aos="fade-up"
                    data-aos-delay="200"
                />
            </div>

            <!-- Card Deskripsi Produk -->
            <div class="lg:w-[70%]" data-aos="fade-up">
                <div
                    class="bg-white rounded-xl p-6"
                    style="box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.1), 0 4px 6px -1px rgba(0, 0, 0, 0.1);"
                >
                    <h2
                        class="text-2xl md:text-3xl font-bold mb-2"
                        data-aos="fade-right"
                    >
                        {product.name}
                    </h2>
                    <p
                        class="text-xl text-gray-800 font-semibold mb-4"
                        data-aos="fade-right"
                        data-aos-delay="200"
                    >
                        Rp {product.price}
                    </p>

                    <div class="flex items-center gap-4 mb-6">
                        <a
                            href="/"
                            class="bg-blue-500 text-decoration-none text-white px-5 py-3 rounded-full font-medium hover:bg-orange-500 transition"
                            data-aos="fade-right"
                            data-aos-delay="300">Pesan Sekarang!</a
                        >
                    </div>

                    <div data-aos="fade-right" data-aos-delay="400">
                        <h3 class="text-lg font-semibold mb-2">
                            Deskripsi Produk
                        </h3>
                        <p class="text-gray-700 leading-relaxed">
                            {stripHtmlTags(product.description)}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    {/if}
</section>

<!-- Produk Serupa -->
{#if relatedProducts.length > 0}
    <section class="container mx-auto px-4 py-10">
        <h2 class="text-2xl font-bold mb-6">Produk Serupa</h2>
        <div
            class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6"
        >
            {#each relatedProducts as item}
                <div
                    class="bg-white rounded-xl flex flex-col items-center text-center hover:shadow-lg transition"
                    style="box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.1), 0 4px 6px -1px rgba(0, 0, 0, 0.1);"
                    data-aos="fade-up"
                >
                    <img
                        src={`/storage/${item.image_product}`}
                        alt={item.name}
                        class="w-full h-full object-contain mb-3"
                        data-aos="fade-right"
                        data-aos-delay="200"
                    />
                    <div class="p-3">
                        <h3
                            class="font-semibold text-sm line-clamp-2 mb-1"
                            data-aos="fade-right"
                            data-aos-delay="300"
                        >
                            {item.name}
                        </h3>
                        <p
                            class="text-gray-800 font-bold mb-2"
                            data-aos="fade-right"
                            data-aos-delay="400"
                        >
                            Rp {item.price}
                        </p>
                        <button
                            class="bg-blue-500 text-white px-3 py-2 rounded-full text-sm hover:bg-orange-500"
                            data-aos="fade-right"
                            data-aos-delay="450"
                        >
                            + Tambah
                        </button>
                    </div>
                </div>
            {/each}
        </div>
    </section>
{/if}

<!-- Footer -->
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
