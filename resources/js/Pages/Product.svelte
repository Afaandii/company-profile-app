<script>
    import Footer from "./Footer.svelte";
    import Navigasi from "./Navigasi.svelte";
</script>

<Navigasi />
<section>
    <!-- Bg Title -->
    <div class="relative">
        <div class="produk relative z-10"></div>
        <div class="absolute inset-0 bg-black opacity-75 z-20"></div>
        <div
            class="absolute inset-0 z-30 flex items-center justify-center text-white"
        >
            <h1 class="text-5xl font-bold mt-16 font-poppins">Produk Kami</h1>
        </div>
    </div>

    <div>Ini Isi Produk</div>

    <Footer />
</section>

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
