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
                    <form
                        action="/api/login/"
                        v-on:submit.prevent="handleSubmit"
                        class="mb-5"
                    >
                        <div class="mb-2">
                            <input
                                type="number"
                                class="form-control"
                                placeholder="Nomor Hp"
                                required
                                v-model="form.phone_number"
                            />
                            <div class="error" v-if="errors['phone_number']">
                                <label
                                    v-for="(error, index) in errors[
                                        'phone_number'
                                    ]"
                                    :key="index"
                                >
                                    {{ " *" + error }}
                                </label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <input
                                type="password"
                                class="form-control"
                                placeholder="Kode PIN"
                                required
                                pattern="[0-9]*"
                                inputmode="numeric"
                                v-model="form.pin"
                            />
                            <div class="error" v-if="errors['pin']">
                                <label
                                    v-for="(error, index) in errors['pin']"
                                    :key="index"
                                >
                                    {{ " *" + error }}
                                </label>
                            </div>
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
<script>
export default {
    data() {
        return {
            form: {
                phone_number: "",
                pin: "",
            },
            errors: {},
        };
    },
    mounted() {},
    methods: {
        handleSubmit() {
            axios
                .post("/api/login/", this.form)
                .then((response) => {
                    if (response.data.status) {
                        this.$cookies.set(
                            "sisteminformasipelayanandesajelutung_token",
                            response.data
                        );
                        response.data["role"].forEach((role) => {
                            switch (role) {
                                case "administrator":
                                    console.log("ini admin");
                                    break;
                                case "operator":
                                    this.$router.push({ name: "OperatorHome" });
                                    break;
                                default:
                                    this.$router.push({ name: "ResidentHome" });
                            }
                        });
                    }
                })
                .catch((error) => {
                    if (error.response.data.errors == undefined) {
                        this.$noty.error(error.response.data.message);
                    } else {
                        this.errors = error.response.data.errors;
                    }
                });
        },
    },
};
</script>

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
