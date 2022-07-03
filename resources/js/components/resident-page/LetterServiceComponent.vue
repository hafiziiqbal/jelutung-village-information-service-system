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
      v-model="idFormInput"
      @input="getFormInput(idFormInput.id)"
    ></v-select>
    <form action="/api/letter-service/" v-on:submit.prevent="handleSubmit">
      <div class="mb-3" v-for="(formInput, index) in formInputs" :key="index">
        <!-- if input default or text -->
        <div v-if="formInput.type == 'default' || formInput.type == 'text'">
          <label
            class="form-label"
            v-text="formInput.name.replace(/_/g, ' ')"
          ></label>
          <input
            class="form-control"
            type="text"
            v-model="form.input[formInput.name]"
          />
        </div>

        <!-- if input date -->
        <div v-if="formInput.type == 'date'">
          <label
            class="form-label"
            v-text="formInput.name.replace(/_/g, ' ')"
          ></label>
          <input
            class="form-control"
            type="date"
            v-model="form.input[formInput.name]"
          />
        </div>

        <!-- if input date -->
        <div v-if="formInput.type == 'image'">
          <label
            class="form-label"
            v-text="formInput.name.replace(/_/g, ' ')"
          ></label>
          <input
            class="form-control"
            type="file"
            :name="formInput.name"
            v-on:change="uploadImage"
          />
        </div>

        <!-- if input options -->
        <div v-if="formInput.type == 'options_gender'">
          <label
            class="form-label"
            v-text="formInput.name.replace(/_/g, ' ')"
          ></label>
          <div class="d-flex">
            <div class="me-4">
              <input
                class="form-check-input"
                type="radio"
                value="laki-laki"
                v-model="form.input[formInput.name]"
              />
              <label class="form-check-label" v-text="'Laki-Laki'"> </label>
            </div>
            <div>
              <input
                class="form-check-input"
                type="radio"
                value="perempuan"
                v-model="form.input[formInput.name]"
              />
              <label class="form-check-label" v-text="'Perempuan'"></label>
            </div>
          </div>
        </div>

        <div
          class="error"
          v-if="
            (formInput.type != 'image' && form.input[formInput.name] == null) ||
            form.input[formInput.name] == ''
          "
        >
          <span>{{ formInput.name.replace(/_/g, " ") + " harus diisi" }}</span>
        </div>
        <div
          :id="formInput.name"
          class="error"
          v-if="formInput.type == 'image'"
        >
          {{ formInput.name.replace(/_/g, " ") + " harus diisi" }}
        </div>
      </div>

      <button
        v-if="formInputs != ''"
        class="btn btn-primary"
        style="width: 100%"
      >
        Ajukan Surat
      </button>
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
      errors: {},
      idFormInput: "",
      letterByCategory: "",
      letterCategories: null,
      formInputs: "",
    };
  },
  mounted() {
    this.getLetterCategory();
  },
  methods: {
    getFormInput(id) {
      this.form.letter_id = id;
      this.formInputs = "";
      axios.get("/api/letter-service/" + id).then((response) => {
        this.formInputs = response.data;
      });
    },
    getLetterCategory() {
      axios.get("/api/letter-category/").then((response) => {
        this.letterCategories = response.data;
      });
    },
    getLetterByCategory(id) {
      this.letterByCategory = "";
      this.letterFormInputs = "";
      axios.get("/api/letter-service/letter-name/" + id).then((response) => {
        this.letterByCategory = response.data;
      });
    },
    uploadImage(e) {
      let image = e.target.files[0];
      let name = e.target.name;
      let mime = image.name.split(".").pop();

      let errorImage = document.getElementById(name);
      switch (mime.toLowerCase()) {
        case "jpg":
          this.form.input[name] = image;
          errorImage.classList.remove("error");
          errorImage.innerHTML = "";
          break;
        case "png":
          this.form.input[name] = image;
          errorImage.classList.remove("error");
          errorImage.innerHTML = "";
          break;
        case "jpeg":
          this.form.input[name] = image;
          errorImage.classList.remove("error");
          errorImage.innerHTML = "";
          break;
        default:
          errorImage.classList.add("error");
          errorImage.innerHTML = "Gambar harus berupa jpg, png atau jpeg";
          break;
      }
    },
    handleSubmit() {
      let user_id = this.$cookies.get(
        "sisteminformasipelayanandesajelutung_token"
      ).result.user_id;
      if (document.querySelector(".error") == undefined) {
        let formData = new FormData();
        formData.append("letter_id", this.form.letter_id);
        formData.append("user_id", user_id);
        Object.entries(this.form.input).forEach(([key, value]) => {
          formData.append(key, value);
        });

        axios
          .post("/api/letter-service/", formData)
          .then((response) => {
            if (response.data.status) {
              this.$noty.success(response.data.message);
            }
          })
          .catch((error) => {
            this.errors = error.response.data.errors;
            console.log(this.errors);
          });
      } else {
        this.$noty.error("Inputan belum tepat");
      }
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
