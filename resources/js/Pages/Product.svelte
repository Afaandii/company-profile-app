<script>
    import Footer from "./Footer.svelte";
    import Navigasi from "./Navigasi.svelte";
    import { onMount } from "svelte";

    let productList = [];

    onMount(async () => {
        const res = await fetch("http://localhost:8000/api/produk");
        const data = await res.json();
        productList = data;
        console.log(productList);
    });
</script>

<section class="w-full h-full mb-16">
    <div class="hero-show w-screen">
        <Navigasi />
        <div
            class="h-full w-full bg-black/80 flex flex-col justify-center items-center pt-10"
        >
            <h4
                class="text-2xl text-gray-400 font-bold font-poppins text-center"
                data-aos="fade-down"
            >
                Produk Kami
            </h4>
            <h2
                class="w-[380px] lg:w-[850px] text-center font-montserrat font-bold text-gray-400 text-xl lg:text-4xl pt-2"
                data-aos="fade-up"
                data-aos-delay="200"
            >
                Kami Memberikan Produk Dengan Kemasan Dan Kualitas Terbaik.
            </h2>
        </div>
    </div>
    <div class="container">
        <!-- title -->
        <div class="flex flex-col justify-center items-center mb-5">
            <div class="lg:w-[55%]"></div>
        </div>

        <!-- card -->
        <div class="row g-4">
            {#if productList.length > 0}
                {#each productList as product}
                    <div class="col-12 col-lg-4 d-flex" data-aos="fade-up">
                        <div
                            class="flex flex-col rounded-xl border border-gray-200 overflow-hidden shadow-sm text-center w-full"
                        >
                            <!-- Gambar -->
                            <div class="px-6 pt-6">
                                <img
                                    src={"/storage/" + product.image_product}
                                    alt="poto.png"
                                    class="w-full h-full object-cover rounded-xl"
                                />
                            </div>

                            <!-- Konten -->
                            <div class="bg-[#f3fdfd] px-6 py-4">
                                <p class="text-gray-500 text-base">
                                    {product.category.name}
                                </p>
                                <h2 class="text-2xl font-bold text-[#0f172a]">
                                    {product.name}
                                </h2>
                                <p
                                    class="text-cyan-500 text-xl font-semibold mt-2"
                                >
                                    {product.price}
                                </p>

                                <a
                                    href={`/show-product/${product.id}`}
                                    class="inline-block mt-4 px-10 py-2 bg-[#1e3a8a] text-white font-semibold rounded-full hover:bg-blue-400 transition duration-300 no-underline"
                                >
                                    Read More
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
    </div>
</section>

<!-- Footer -->
<Footer />
