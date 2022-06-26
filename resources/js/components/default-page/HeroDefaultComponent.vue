<template>
    <section id="hero">
        <div class="container-fluid">
            <div class="container d-flex align-items-center">
                <div
                    style="width: 100%"
                    class="d-flex flex-column justify-content-between"
                >
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <div>
                                <h2>PEMERINTAH DESA JELUTUNG</h2>
                                <p>
                                    Kecamatan Pemangkat, Kabupaten Sambas,
                                    Provinsi Kalbar
                                </p>
                                <router-link
                                    :to="{ name: 'ResidentHome' }"
                                    class="btn btn-primary mt-3 fw-bold fs-5"
                                    >Pelayanan Desa</router-link
                                >
                            </div>
                        </div>
                        <div
                            class="col d-flex flex-column align-items-end justify-content-center"
                        >
                            <label class="fs-3">{{ fullDate }}</label>
                            <h1>
                                {{ time }}
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="running-text">
                    <marquee
                        direction=""
                        onmouseover="this.stop();"
                        onmouseout="this.start();"
                    >
                        <div class="holder d-flex">
                            <div class="text-container me-5">
                                <label
                                    >Selamat Datang di Sistem Informasi
                                    Pelayanan Desa Jelutung, Kecamatan
                                    Pemangkat, Kabupaten Sambas, Provinsi
                                    Kalimantan Barat</label
                                >
                            </div>
                            <div class="text-container me-5">
                                <label
                                    >Menyediakan Pelayanan Administrasi Online
                                    Bagi Masyarakat Desa Jelutung
                                </label>
                            </div>
                            <div class="text-container me-5">
                                <label
                                    >Silahkan Tinggalkan Pesan/Komentar pada
                                    Bagian Bawah Artikel Yang Kami Sajikan
                                </label>
                            </div>
                            <div class="text-container me-5">
                                <label>Terima Kasih Atas Kunjungan Anda </label>
                            </div>
                        </div>
                    </marquee>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            time: "",
            fullDate: "",
        };
    },
    methods: {
        currentTime() {
            let indoDay = [
                "Minggu",
                "Senin",
                "Selasa",
                "Rabu",
                "Kamis",
                "Jum'at",
                "Sabtu",
            ];
            let indoMonth = [
                "Januari",
                "Februari",
                "Maret",
                "April",
                "Mei",
                "Juni",
                "Juli",
                "Agustus",
                "September",
                "Oktober",
                "November",
                "Desember",
            ];
            const current = new Date();
            const day = indoDay[current.getDay()];
            const month = indoMonth[current.getMonth()];
            const year =
                current.getYear() < 1000
                    ? current.getYear() + 1900
                    : current.getYear();
            const time =
                current.getHours() +
                ":" +
                (current.getMinutes() < 10
                    ? "0" + current.getMinutes()
                    : current.getMinutes());
            this.time = time;
            this.fullDate =
                day + "," + current.getDate() + " " + month + " " + year;
        },
    },
    mounted() {
        this.currentTime();
        setInterval(this.currentTime, 40000);
    },
};
</script>

<style scoped>
@import "../../../css/components/default-page/HeroDefaultComponent.css";
</style>
