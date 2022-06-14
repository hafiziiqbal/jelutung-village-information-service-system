<template>
    <div class="m-4 add-letter-template">
        <div class="header mb-3" v-text="'Tambah Template Surat'"></div>
        <form>
            <div class="mb-3">
                <label class="form-label" v-text="'Nama Surat'"></label>
                <input
                    class="form-control"
                    placeholder="Masukan Nama Surat Disini"
                    name="letterName"
                />
            </div>
            <div class="mb-3">
                <label class="form-label" v-text="'Kategori Surat'"></label>
                <select class="form-select" name="letterCategory">
                    <option
                        v-for="letterCategory in letterCategories"
                        :key="letterCategory.id"
                        :value="letterCategory.id"
                    >
                        {{ letterCategory.name }}
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" v-text="'Diperuntukkan Bagi'"></label>
                <div class="d-flex">
                    <div class="form-check me-3">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="forWho"
                            value="pribadi"
                            checked
                        />
                        <label class="form-check-label" v-text="'Diri Sendiri'">
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="forWho"
                            value="orang-lain"
                        />
                        <label
                            class="form-check-label"
                            v-text="'Orang Lain'"
                        ></label>
                    </div>
                </div>
            </div>

            <div id="addInputCont" class="mb-3"></div>

            <button type="button" class="btn btn-dark" v-on:click="addInput">
                Tambah Input <i class="ms-1 bi bi-plus-circle"></i>
            </button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            letterCategories: "",
            incrementNumber: 0,
        };
    },
    mounted() {
        this.getLetterCategory();
    },
    methods: {
        addInput() {
            this.incrementNumber = ++this.incrementNumber;
            let addInputCont = document.querySelector("#addInputCont");
            let inputCard = document.createElement("div");
            let closeBtn = document.createElement("i");
            let inputRow = document.createElement("div");
            let inputCol1 = document.createElement("div");
            let inputCol2 = document.createElement("div");
            let inputForm = document.createElement("input");
            let inputSelect = document.createElement("select");
            let jenis = ["Teks", "Teks Panjang", "Angka", "Gambar"];

            inputCard.className = "input-card mb-3";
            closeBtn.className = "bi bi-x-circle";
            closeBtn.onclick = function () {
                this.parentElement.remove();
            };
            inputRow.className = "row";
            inputCol1.className = "col-6";
            inputCol2.className = "col-6";
            inputForm.className = "form-control";
            inputForm.name = "input[" + this.incrementNumber + "][inputName]";
            inputForm.placeholder = "Masukan Nama Input";
            inputSelect.className = "form-select";
            inputSelect.name = "input[" + this.incrementNumber + "][inputType]";

            addInputCont.appendChild(inputCard);
            inputCard.appendChild(closeBtn);
            inputCard.appendChild(inputRow);
            inputRow.appendChild(inputCol1);
            inputRow.appendChild(inputCol2);
            inputCol1.appendChild(inputForm);
            inputCol2.appendChild(inputSelect);

            jenis.forEach((item) => {
                let inputOption = document.createElement("option");
                inputOption.value = item;
                inputOption.innerHTML = item;
                inputSelect.appendChild(inputOption);
            });
        },

        getLetterCategory() {
            axios.get("/api/letter-category/").then((response) => {
                this.letterCategories = response.data;
            });
        },
    },
};
</script>

<style scoped>
.add-letter-template .header {
    font-size: 22px;
    text-transform: uppercase;
    font-weight: bold;
    color: #3e64d3;
}

.add-letter-template .form-label {
    margin: 0px !important;
    font-size: 13px;
    font-style: italic;
}
</style>
