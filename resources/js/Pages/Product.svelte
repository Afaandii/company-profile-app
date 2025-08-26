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

<!-- Navbar -->
<Navigasi />

<section>
    <!-- Bg Title -->
    <div class="relative">
        <div class="produk relative z-10"></div>
        <div class="absolute inset-0 bg-black opacity-75 z-20"></div>
        <div
            class="absolute inset-0 z-30 flex items-center justify-center text-white"
            data-aos="fade-down"
        >
            <h1 class="text-5xl font-bold mt-16 font-poppins">Produk Kami</h1>
        </div>
    </div>

    <div class="w-full h-full mt-16 mb-16">
        <div class="container">
            <!-- title -->
            <div class="flex flex-col justify-center items-center mb-5">
                <div class="lg:w-[55%]">
                    <h4
                        class="text-center font-semibold font-montserrat text-[23px] mb-3 text-[#1f2122]"
                        data-aos="fade-up"
                    >
                        Produk Kami
                    </h4>
                    <h2
                        class="text-center font-poppins font-bold text-black lg:text-[35px]"
                        data-aos="fade-up"
                        data-aos-delay="200"
                    >
                        Kami Memberikan Produk Dengan Kemasan Terbaik.
                    </h2>
                </div>
            </div>

            <!-- card -->
            <div class="row g-4">
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
                                    href="/show-product"
                                    class="inline-block mt-4 px-10 py-2 bg-[#1e3a8a] text-white font-semibold rounded-full hover:bg-blue-400 transition duration-300 no-underline"
                                >
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                {/each}
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<Footer />

<style>
    .produk {
        background-image: url("storage/image/biji-coklat.png");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        width: 100%;
        height: 60vh;
    }
</style>
