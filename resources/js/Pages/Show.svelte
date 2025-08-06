<script>
    import Footer from "./Footer.svelte";
    import Navigasi from "./Navigasi.svelte";
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
        <div class="row">
            <div class=" col-12">
                <h1
                    class="text-center font-bold font-poppins text-4xl mb-4"
                    data-aos="fade-up"
                >
                    Test Title
                </h1>
                <img
                    src="https://files.kfcku.com/uploads/media/img_0876_2.jpg"
                    alt="poto news"
                    class=" img-fluid rounded-xl"
                    data-aos="fade-right"
                    data-aos-delay="100"
                />
            </div>
            <div class="col-12">
                <p class="mt-2" data-aos="fade-right" data-aos-delay="300">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Consequuntur vero ullam earum sunt vitae repudiandae aut
                    beatae obcaecati? Suscipit necessitatibus atque rem
                    molestias repellat aliquam eius distinctio accusantium
                    consequatur ipsum? Ex cum aliquid illum repellat enim
                    voluptates. Assumenda odio impedit, placeat et at voluptate
                    est animi recusandae optio ratione, id similique nesciunt
                    sequi expedita, ea deleniti? Sunt excepturi fuga
                    accusantium.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- footer -->
<Footer />

<style>
    .news {
        background-image: url("storage/image/biji-coklat.png");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        width: 100%;
        height: 60vh;
    }
</style>
