<template>
    <div class="container-fluid cont-auth">
        <div class="container">
            <div class="card-auth">
                <div class="col-desc">
                    <div class="mb-4">
                        <img :src="'/img/apple-white-touch-icon.png'" alt="" />
                    </div>
                    <div class="header-auth mb-4">
                        <h3>Layanan Mandiri</h3>
                        <h3>Desa Jelutung</h3>
                    </div>
                    <div>
                        <p>Kecamatan Pemangkat</p>
                        <p>Kabupaten Sambas</p>
                        <p class="mb-4">Jl. Jelutung Kodepos 79453</p>
                        <p>
                            Silakan ajukan permohonan akun untuk mendapatkan
                            kode PIN anda
                        </p>
                    </div>
                </div>
                <div class="col-auth">
                    <div class="header-auth mb-4">
                        <h3>Masuk Ke Aplikasi</h3>
                    </div>
                    <form class="mb-5">
                        <input
                            type="number"
                            class="form-control mb-2"
                            placeholder="Nomor Hp"
                            required
                        />
                        <input
                            type="number"
                            class="form-control mb-2"
                            placeholder="Kode PIN"
                            required
                        />
                        <div class="mb-2 form-check d-flex">
                            <input
                                type="checkbox"
                                class="form-check-input me-2"
                                id="exampleCheck1"
                            />
                            <label class="form-check-label text-start"
                                >Tampilkan PIN</label
                            >
                        </div>
                        <button type="submit" class="btn login">MASUK</button>
                    </form>
                    <button type="button" class="btn auth mb-4">
                        LUPA PIN
                    </button>
                    <button type="button" class="btn auth">
                        PERMOHONAN AKUN
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.cont-auth {
    display: flex;
    align-items: center;
    height: 100vh;
    background-image: url(/img/hero.jpg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}
.cont-auth img {
    height: 4rem;
}
.card-auth {
    display: grid;
    grid-template-columns: 50% 50%;
    width: 100%;
    height: 600px;
}
.col-auth .header-auth h3 {
    color: #4e72df;
}
.header-auth h3 {
    font-weight: bold;
    text-transform: uppercase;
    color: #ffff;
}
.col-desc {
    background-color: #4e72dfc5;
    padding: 70px 30px 70px 30px;
    display: flex;
    flex-direction: column;
    text-align: center;
    color: #ffff;
}
.col-desc p {
    margin: 0px;
    padding: 0px;
}
.col-auth {
    background: rgba(255, 255, 255, 0.783);
    padding: 70px 30px 70px 30px;
    display: flex;
    flex-direction: column;
    text-align: center;
}
.col-auth input {
    text-align: center;
}
.col-auth button.login {
    width: 100%;
    color: white;
    background: #4e72df;
    font-weight: bold;
}
.col-auth button.auth {
    width: 100%;
    color: #4e72df;
    border: 1px solid #4e72df;
    font-weight: bold;
}
@media (max-width: 800px) {
    .cont-auth img {
        height: 2rem;
    }
    .cont-auth form {
        margin-bottom: 30px;
    }
    .cont-auth .mb-4 {
        margin-bottom: 10px !important;
    }
    .card-auth {
        grid-template-columns: unset;
    }
    .col-desc {
        padding: 10px;
    }
    .cont-auth p,
    .cont-auth label {
        font-size: 12px;
    }
    .header-auth h3 {
        font-size: 14px;
    }
    .col-auth {
        padding: 10px;
    }
}
</style>
