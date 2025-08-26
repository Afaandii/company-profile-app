<script>
    export let id;
    import Footer from "./Footer.svelte";
    import Navigasi from "./Navigasi.svelte";
    import { onMount } from "svelte";

    let product = null;

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
            product = data;
        }
        console.log(product);
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

<!-- Section Produk -->
<section class="w-full min-h-[100vh] flex items-center py-auto">
    {#if product}
        <div
            class="container-fluid mx-auto p-4 md:px-0 flex flex-col md:flex-row items-start gap-14"
        >
            <!-- Gambar produk -->
            <div
                class="bg-white rounded-xl"
                style="box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.1), 0 4px 6px -1px rgba(0, 0, 0, 0.1);"
            >
                <img
                    src={`/storage/${product.image_product}`}
                    alt="gambar produk"
                    class="w-[360px] md:w-[426px] rounded-xl object-contain"
                />
            </div>

            <!-- Card Deskripsi Produk -->
            <div class="lg:w-[70%]">
                <div
                    class="bg-white rounded-xl p-6"
                    style="box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.1), 0 4px 6px -1px rgba(0, 0, 0, 0.1);"
                >
                    <!-- Judul & Harga -->
                    <h2 class="text-2xl md:text-3xl font-bold mb-2">
                        {product.name}
                    </h2>
                    <p class="text-xl text-gray-800 font-semibold mb-4">
                        {product.price}
                    </p>

                    <!-- Tombol -->
                    <div class="flex items-center gap-4 mb-6">
                        <a
                            href="/"
                            class="bg-blue-500 text-white px-5 py-3 rounded-full font-medium text-decoration-none hover:bg-orange-500 transition"
                            >Pesan Sekarang!</a
                        >
                    </div>

                    <!-- Deskripsi Produk -->
                    <div>
                        <h3 class="text-lg font-semibold mb-2">
                            Deskripsi Produk
                        </h3>
                        <p class="text-gray-700 leading-relaxed">
                            {stripHtmlTags(product.description)}
                        </p>
                        <a
                            href="/"
                            class="text-blue-600 font-medium mt-2 inline-block hover:underline"
                        >
                            Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    {/if}
</section>

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
