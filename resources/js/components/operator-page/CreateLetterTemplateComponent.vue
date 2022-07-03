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
        <input type="file" id="actual-btn" hidden @change="uploadObjectDoc" />
        <label for="actual-btn" class="btn btn-success"
          >Unggah Template Docx</label
        >
        <span id="file-chosen">Tidak Ada File</span>
        <div class="error" v-if="errors.docFile">
          {{ "*" + errors.docFile[0] }}
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
      form: {
        name: "",
        docFile: "",
      },
      errors: {},
    };
  },
  mounted() {
    this.getLetterCategory();
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
    getLetterCategory() {
      axios.get("/api/letter-category/").then((response) => {
        this.letterCategories = response.data;
        this.is_data_fetched_category = true;
      });
    },

    handleSubmit() {
      // console.log(JSON.parse(JSON.stringify()));
      let formData = new FormData();
      Object.entries(this.form).forEach(([key, value]) => {
        formData.append(key, value);
      });
      formData.append("letterCategory", this.letterCategory.id);
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
