<script>
    import Footer from "./Footer.svelte";
    import Navigasi from "./Navigasi.svelte";
</script>

<Navigasi />

<!-- <div class="relative">
    <div class="hero relative z-10"></div>
    <div class="absolute inset-0 bg-black/60 z-20"></div>
    <div
        class="absolute inset-0 z-30 flex items-center justify-center text-white"
    >
        <h1 class="text-4xl font-bold">Teks di atas hero</h1>
    </div>
</div> -->
<div class="bg-[#1f2122] lg:h-[50vh] h-[30vh] flex items-center justify-center">
    <h1 class="text-5xl text-white text-center font-poppins mt-20 font-bold">
        Tentang Kami
    </h1>
</div>
<section class="mt-14 mb-24 w-full lg:h-[100vh]">
    <div
        class="container bg-white rounded-3xl"
        style="box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.1), 0 4px 6px -1px rgba(0, 0, 0, 0.1);"
    >
        <h1 class="font-poppins text-center font-semibold pt-3">
            PT ALAMON GO Industri Ltd.
        </h1>

        <hr class="h-[2x] bg-black w-full p-0" />

        <div class="row p-20">
            <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                <img
                    src="storage/image/logos-bg.png"
                    alt="logos"
                    class="w-full lg:w-[80%] rounded-2xl"
                />
            </div>
            <div class="col-12 col-lg-6">
                <p class="font-montserrat">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Cumque velit nam explicabo esse, fuga facilis, numquam
                    inventore, accusantium rerum ad expedita nihil animi debitis
                    iure error magni. Tempora, quo perspiciatis. Lorem ipsum
                    dolor sit amet consectetur adipisicing elit. Perferendis
                    officia corrupti deleniti magnam veritatis quas dolore, illo
                    ut voluptatum reiciendis ipsa nulla ducimus placeat culpa
                    molestias nobis assumenda voluptatem reprehenderit!
                    Doloribus laboriosam aliquam deleniti ipsa sed labore
                    blanditiis voluptatum provident nesciunt animi ut, dolorum
                    enim aliquid maxime accusantium at veritatis exercitationem
                    quae? Omnis accusamus optio molestiae incidunt eaque atque
                    quos. Animi dicta iste placeat, tempora quibusdam molestias
                    asperiores natus nam quidem odio dolores nobis, recusandae
                    reprehenderit doloremque ipsa pariatur laboriosam.
                </p>
            </div>
        </div>
    </div>
</section>

<Footer />
