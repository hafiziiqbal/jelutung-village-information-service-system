<template>
    <section id="menuDefault">
        <div class="container-fluid">
            <div class="container">
                <ul class="desktop-menu-default">
                    <li>
                        <div class="list-menu-default">
                            <a> Artikel </a>
                        </div>
                    </li>
                    <li>
                        <div class="list-menu-default">
                            <a> Peta Desa </a>
                        </div>
                    </li>
                    <li>
                        <div class="list-menu-default">
                            <a> Lapak Desa </a>
                        </div>
                    </li>
                    <li>
                        <div class="list-menu-default">
                            <a> Pengumuman Desa </a>
                        </div>
                    </li>
                    <li>
                        <div class="list-menu-default">
                            <a> Lowongan Pekerjaan </a>
                        </div>
                    </li>
                    <li>
                        <div class="list-menu-default">
                            <a> Pembangunan Desa</a>
                        </div>
                    </li>
                    <li>
                        <div class="list-menu-default">
                            <a>Pengaduan</a>
                        </div>
                    </li>
                    <li>
                        <div class="list-menu-default">
                            <a>layanan Mandiri</a>
                        </div>
                    </li>
                </ul>

                <div class="mobile-menu-default">
                    <div class="bar-menu-item-mobile">
                        <div class="row">
                            <div class="col fw-bold">
                                <img
                                    v-bind:src="'img/i-mb-services.png'"
                                    width="24"
                                />
                                Pelayanan Desa
                            </div>
                            <div class="col fw-bold">
                                <img
                                    v-bind:src="'img/i-mb-information.png'"
                                    width="24"
                                />
                                Informasi Desa
                            </div>
                        </div>
                    </div>

                    <div class="menu-items mt-3">
                        <ul>
                            <li>
                                <img v-bind:src="'img/i-mb-article.png'" />
                                <br />
                                Artikel
                            </li>
                            <li>
                                <img v-bind:src="'img/i-mb-map.png'" />
                                <br />
                                Peta Desa
                            </li>
                            <li>
                                <img v-bind:src="'img/i-mb-sell.png'" />
                                <br />
                                Lapak Desa
                            </li>
                            <li>
                                <img v-bind:src="'img/i-mb-anouncement.png'" />
                                <br />
                                Pengumuman Desa
                            </li>
                        </ul>
                    </div>

                    <div class="hero-card swiper">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide">
                                <div class="text-container">
                                    <label
                                        >Selamat Datang di Sistem Informasi
                                        Pelayanan Desa Jelutung, Kecamatan
                                        Pemangkat, Kabupaten Sambas, Provinsi
                                        Kalimantan Barat</label
                                    >
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-container">
                                    <label
                                        >Menyediakan Pelayanan Administrasi
                                        Online Bagi Masyarakat Desa Jelutung
                                    </label>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-container">
                                    <label
                                        >Silahkan Tinggalkan Pesan/Komentar pada
                                        Bagian Bawah Artikel Yang Kami Sajikan
                                    </label>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-container">
                                    <label
                                        >Terima Kasih Atas Kunjungan Anda
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-items">
                        <ul>
                            <li>
                                <img v-bind:src="'img/i-mb-job-search.png'" />
                                <br />
                                Lowongan Pekerjaan
                            </li>
                            <li>
                                <img v-bind:src="'img/i-mb-construction.png'" />
                                <br />
                                Pembangunan Desa
                            </li>
                            <li>
                                <img v-bind:src="'img/i-mb-call-center.png'" />
                                <br />
                                Pengaduan
                            </li>
                            <li>
                                <img
                                    v-bind:src="'img/i-mb-personal-services.png'"
                                />
                                <br />
                                Layanan Mandiri
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    methods: {
        swiperHeroMobile() {
            new Swiper(".hero-card", {
                speed: 400,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                slidesPerView: "1",
            });
        },
    },
    mounted() {
        this.swiperHeroMobile();
    },
};
</script>

<style scoped>
@import "../../../css/components/default-page/MenuDefaultComponent.css";
</style>
