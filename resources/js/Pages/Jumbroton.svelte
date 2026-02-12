<section class="brand-section w-100 h-auto bg-[#1f2122] md:w-full">
    <div class="container" data-aos="fade-up">
        <div class="col">
            <div class="col-md-12">
                <div class="company-des lg:w-[750px] pt-5">
                    <h5
                        class="font-poppins text-[15px] text-[#d2691e] font-bold"
                        data-aos="fade-up"
                        data-aos-delay="100"
                    >
                        Dipercaya oleh
                    </h5>
                    <h3
                        class="font-montserrat text-white lg:text-[2rem] mt-2"
                        data-aos="fade-up"
                        data-aos-delay="200"
                    >
                        Ratusan pengguna & toko telah memilih Alamon Go!
                    </h3>
                </div>
            </div>
            <div class=" col-md-12" data-aos="fade-up" data-aos-delay="200">
                <div class="brand-carousel">
                    <div class="logo-track">
                        <div class="logo-items mr-10">
                        <img src="/storage/image/logo1.png" alt="client1" />
                        <img src="/storage/image/logo2.png" alt="client2" />
                        <img src="/storage/image/logo3.png" alt="client3" />
                        <img src="/storage/image/logo4.png" alt="client4" />
                        <img src="/storage/image/logo5.png" alt="client5" />
                        <img src="/storage/image/logo6.png" alt="client6" />
                        <img src="/storage/image/logo7.png" alt="client7" />
                        <img src="/storage/image/logo8.png" alt="client8" />
                        <img src="/storage/image/logo9.png" alt="client9" />
                    </div>
                        <!-- Duplikat untuk infinite effect -->
                        <div class="logo-items">
                            <img src="/storage/image/logo1.png" alt="client1" />
                            <img src="/storage/image/logo2.png" alt="client2" />
                            <img src="/storage/image/logo3.png" alt="client3" />
                            <img src="/storage/image/logo4.png" alt="client4" />
                            <img src="/storage/image/logo5.png" alt="client5" />
                            <img src="/storage/image/logo6.png" alt="client6" />
                            <img src="/storage/image/logo7.png" alt="client7" />
                            <img src="/storage/image/logo8.png" alt="client8" />
                            <img src="/storage/image/logo9.png" alt="client9" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* ANIMASI SLIDE */
    @keyframes slide {
        0% {
            transform: translateX(0%);
        }
        100% {
            transform: translateX(-50%);
        }
    }

    .brand-carousel {
        overflow: hidden;
        position: relative;
        padding: 30px 0;
    }

    .logo-track {
        display: flex;
        animation: slide 25s linear infinite;
        width: max-content;
    }

    .logo-items {
        display: flex;
        gap: 40px;
        align-items: center;
    }

    .logo-items img {
        width: 100px;
        height: 100px;
        object-fit: contain;
    }
</style>
