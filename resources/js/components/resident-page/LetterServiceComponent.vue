<template>
    <div class="m-4 letter-service">
        <div class="header mb-3" v-text="'Pelayanan Surat'"></div>
        <label class="form-label" v-text="'Pilih Kategori Surat'"></label>
        <ul class="letter-service-grid mb-3">
            <li
                class="letter-category-card"
                v-for="(letterCategory, index) in letterCategories"
                :key="index"
                v-on:click="getLetterByCategory(letterCategory.id)"
            >
                {{ letterCategory.name }}
            </li>
        </ul>
        <label class="form-label" v-text="'Pilih Surat'"></label>
        <select class="form-select" v-if="letterByCategory == ''"></select>
        <v-select
            class="mb-3"
            placeholder="Pilih salah satu surat"
            v-if="letterByCategory != ''"
            :options="letterByCategory"
            label="name"
            v-model="idLetterFormInput"
            @input="getLetterFormInput(idLetterFormInput.id)"
        ></v-select>
        <form action="/api/letter-service/" v-on:submit.prevent="handleSubmit">
            <div
                class="mb-3"
                v-for="(letterFormInput, index) in letterFormInputs"
                :key="index"
            >
                <label class="form-label" v-text="letterFormInput.name"></label>
                <input
                    v-if="letterFormInput.type.toLowerCase() == 'teks'"
                    class="form-control"
                    v-model="
                        form.input[
                            letterFormInput.name
                                .toLowerCase()
                                .replaceAll(' ', '_')
                        ]
                    "
                />
                <input
                    v-if="letterFormInput.type.toLowerCase() == 'angka'"
                    class="form-control"
                    type="number"
                    v-model="
                        form.input[
                            letterFormInput.name
                                .toLowerCase()
                                .replaceAll(' ', '_')
                        ]
                    "
                />
                <input
                    v-if="letterFormInput.type.toLowerCase() == 'tanggal'"
                    class="form-control"
                    type="date"
                    v-model="
                        form.input[
                            letterFormInput.name
                                .toLowerCase()
                                .replaceAll(' ', '_')
                        ]
                    "
                />
                <div
                    class="d-flex"
                    v-if="letterFormInput.type.toLowerCase() == 'pilihan'"
                >
                    <div
                        class="form-check me-3"
                        v-for="(option, index) in letterFormInput.options.split(
                            ';'
                        )"
                        :key="index"
                    >
                        <input
                            class="form-check-input"
                            type="radio"
                            :value="option"
                            v-model="
                                form.input[
                                    letterFormInput.name
                                        .toLowerCase()
                                        .replaceAll(' ', '_')
                                ]
                            "
                        />
                        <label class="form-check-label" v-text="option">
                        </label>
                    </div>
                </div>
                <div v-for="(error, index) in errors" :key="index">
                    <div
                        class="error"
                        v-if="
                            index ==
                            'input.' +
                                letterFormInput.name
                                    .toLowerCase()
                                    .replaceAll(' ', '_')
                        "
                    >
                        {{ "*" + error }}
                    </div>
                </div>
            </div>

            <div v-if="letterFormInputs != ''">
                <button
                    type="submin"
                    class="btn btn-primary"
                    style="width: 100%"
                >
                    Ajukan Surat
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                input: {},
                letter_id: "",
            },
            errors: "",
            idLetterFormInput: "",
            letterByCategory: "",
            letterCategories: null,
            letterFormInputs: "",
        };
    },
    mounted() {
        this.getLetterCategory();
    },
    methods: {
        getLetterCategory() {
            axios.get("/api/letter-category/").then((response) => {
                this.letterCategories = response.data;
            });
        },
        getLetterByCategory(id) {
            this.letterByCategory = "";
            this.letterFormInputs = "";
            axios
                .get("/api/letter-service/letter-name/" + id)
                .then((response) => {
                    this.letterByCategory = response.data;
                });
        },
        getLetterFormInput(id) {
            this.form.letter_id = id;
            this.letterFormInputs = "";
            axios.get("/api/letter-service/" + id).then((response) => {
                this.letterFormInputs = response.data;
            });
        },
        handleSubmit() {
            axios
                .post("/api/letter-service/", this.form)
                .then((response) => {
                    // if (response.data.status) {
                    //     this.$noty.success(response.data.message);
                    // }
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                });
        },
    },
};
</script>

<style scoped>
.letter-service .header {
    font-size: 22px;
    text-transform: uppercase;
    font-weight: bold;
    color: #3e64d3;
}
.letter-service .letter-service-grid {
    display: grid;
    grid-template-columns: auto auto auto auto;
    padding: 0px;
    gap: 12px;
}
.letter-service .letter-category-card {
    background-color: rgb(54, 93, 205);
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-size: 10px;
    font-weight: bold;
    border-radius: 5px;
    padding: 9px;
    cursor: pointer;
}

.letter-service .form-label {
    font-size: 13px;
    font-style: italic;
    margin-bottom: 1px;
    text-transform: capitalize;
}

@media (max-width: 400px) {
    .letter-service .letter-service-grid {
        grid-template-columns: auto auto;
    }
    * {
        font-size: 12px;
    }
    .letter-service .form-label {
        font-size: 12px;
    }
    .m-4 {
        margin: 0.5rem !important;
    }
}
</style>
