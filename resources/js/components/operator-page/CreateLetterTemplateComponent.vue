<template>
  <div class="m-4 add-letter-template">
    <div class="header mb-3" v-text="'Tambah Template Surat'"></div>
    <form action="/api/letter-template/" v-on:submit.prevent="handleSubmit">
      <div class="mb-3">
        <label class="form-label" v-text="'Nama Surat'"></label>
        <input
          class="form-control"
          placeholder="Masukan Nama Surat Disini"
          v-model="form.name"
        />
        <div class="error" v-if="errors.name">
          {{ "*" + errors.name[0] }}
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label" v-text="'Kategori Surat'"></label>
        <select
          class="form-select"
          v-if="is_data_fetched_category == false"
        ></select>
        <v-select
          v-if="is_data_fetched_category == true"
          v-model="letterCategory"
          :options="letterCategories"
          label="name"
        ></v-select>

        <div class="error" v-if="errors.letterCategory">
          {{ "*" + errors.letterCategory[0] }}
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label" v-text="'Keperluan'"></label>
        <select class="form-select" v-if="is_data_fetched == false"></select>
        <v-select
          v-if="is_data_fetched == true"
          v-model="needForLetter"
          :options="needForLetters"
          label="need"
        ></v-select>

        <div class="error" v-if="errors.needForLetter">
          {{ "*" + errors.needForLetter[0] }}
        </div>
      </div>

      <div id="addInputCont" class="mb-3">
        <div v-for="(input, index) in inputs" :key="index">
          <div class="input-card mb-3">
            <i class="bi bi-x-circle" v-on:click="deleteElement(index)"></i>
            <div class="row mb-3">
              <div class="col-6">
                <input
                  class="form-control"
                  placeholder="Masukan Nama Input"
                  v-model="input.name"
                />
                <div class="error" v-if="errors['inputs.' + index + '.name']">
                  {{ "*" + errors["inputs." + index + ".name"] }}
                </div>
              </div>
              <div class="col-6">
                <select class="form-select" v-model="input.type.typeName">
                  <option disabled value="">Pilih Tipe Input</option>
                  <option value="Teks">Teks</option>
                  <option value="Teks Panjang">Teks Panjang</option>
                  <option value="Angka">Angka</option>
                  <option value="Tanggal">Tanggal</option>
                  <option value="Gambar">Gambar</option>
                  <option value="Pilihan">Pilihan</option>
                </select>

                <div class="error" v-if="errors['inputs.' + index + '.type']">
                  {{ "*" + errors["inputs." + index + ".type"] }}
                </div>
              </div>
            </div>
            <div v-if="input.type.typeName == 'Pilihan'">
              <input
                class="form-control"
                :placeholder="'pisahkan dengan titik koma (;) dan tidak boleh spasi'"
                required
                v-model="input.type.typeOptions"
                pattern="[^\s]+"
              />
            </div>
          </div>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-6">
          <button
            type="button"
            class="btn btn-dark"
            style="width: 100%"
            v-on:click="addInput"
          >
            Tambah Input <i class="ms-1 bi bi-plus-circle"></i>
          </button>
        </div>
        <div class="col-6">
          <input type="file" id="actual-btn" hidden @change="uploadObjectDoc" />
          <label for="actual-btn" class="btn btn-success">Unggah Docx</label>
          <span id="file-chosen">Tidak Ada File</span>
          <div class="error" v-if="errors.docFile">
            {{ "*" + errors.docFile[0] }}
          </div>
        </div>
      </div>

      <div>
        <button type="submin" class="btn btn-primary" style="width: 100%">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      is_data_fetched: false,
      is_data_fetched_category: false,
      letterCategory: "",
      letterCategories: "",
      needForLetters: "",
      needForLetter: "",
      inputs: [],
      form: {
        name: "",
        docFile: "",
      },
      errors: {},
    };
  },
  mounted() {
    this.getLetterCategory();
    this.getNeedForLetter();
    this.detectDocName();
  },
  methods: {
    detectDocName() {
      const actualBtn = document.getElementById("actual-btn");
      const fileChosen = document.getElementById("file-chosen");
      actualBtn.addEventListener("change", function () {
        fileChosen.textContent = this.files[0].name;
      });
    },
    uploadObjectDoc(e) {
      let document = e.target.files[0];
      this.form.docFile = document;
    },
    deleteElement(index) {
      this.inputs.splice(index, 1);
    },
    addInput() {
      this.inputs.push({
        name: "",
        type: {
          typeName: "",
          typeOptions: "",
        },
      });
    },

    getLetterCategory() {
      axios.get("/api/letter-category/").then((response) => {
        this.letterCategories = response.data;
        this.is_data_fetched_category = true;
      });
    },

    getNeedForLetter() {
      axios.get("/api/need-for-letter/").then((response) => {
        this.needForLetters = response.data;
        this.is_data_fetched = true;
      });
    },

    handleSubmit() {
      // console.log(JSON.parse(JSON.stringify()));
      let formData = new FormData();
      Object.entries(this.form).forEach(([key, value]) => {
        formData.append(key, value);
      });

      formData.append("letterCategory", this.letterCategory.id);
      formData.append("needForLetter", this.needForLetter.id);

      for (let i = 0; i < this.inputs.length; i++) {
        formData.append("inputs[" + i + "][name]", this.inputs[i].name);

        formData.append(
          "inputs[" + i + "][type][typeName]",
          this.inputs[i].type.typeName
        );
        formData.append(
          "inputs[" + i + "][type][typeOptions]",
          this.inputs[i].type.typeOptions
        );
      }

      axios
        .post("/api/letter-template/", formData)
        .then((response) => {
          if (response.data.status) {
            this.$noty.success(response.data.message);
          }
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
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
@media (max-width: 500px) {
  .add-letter-template .header {
    text-align: center;
    font-size: 20px;
  }
  .add-letter-template form * {
    font-size: 10px !important;
  }
}
</style>
