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
          :disabled="
            disabled[letterFormInput.name.toLowerCase().replaceAll(' ', '_')]
          "
          v-model="
            form.input[letterFormInput.name.toLowerCase().replaceAll(' ', '_')]
          "
        />
        <input
          v-if="letterFormInput.type.toLowerCase() == 'angka'"
          class="form-control"
          :onKeyDown="
            letterFormInput.name.toLowerCase().includes('nik') ||
            letterFormInput.name
              .toLowerCase()
              .includes('nomor induk kependudukan')
              ? 'return false'
              : 'return true'
          "
          type="number"
          v-model="
            form.input[letterFormInput.name.toLowerCase().replaceAll(' ', '_')]
          "
        />

        <input
          v-if="letterFormInput.type.toLowerCase() == 'tanggal'"
          class="form-control"
          type="date"
          :disabled="
            disabled[letterFormInput.name.toLowerCase().replaceAll(' ', '_')]
          "
          v-model="
            form.input[letterFormInput.name.toLowerCase().replaceAll(' ', '_')]
          "
        />
        <input
          v-if="letterFormInput.type.toLowerCase() == 'gambar'"
          class="form-control input-file"
          type="file"
          :name="letterFormInput.name.toLowerCase().replaceAll(' ', '_')"
          v-on:change="uploadImage"
        />
        <div
          class="d-flex"
          v-if="letterFormInput.type.toLowerCase() == 'pilihan'"
        >
          <div
            class="form-check me-3"
            v-for="(option, index) in letterFormInput.options.split(';')"
            :key="index"
          >
            <input
              class="form-check-input"
              type="radio"
              :value="option"
              :disabled="
                disabled[
                  letterFormInput.name.toLowerCase().replaceAll(' ', '_')
                ]
              "
              v-model="
                form.input[
                  letterFormInput.name.toLowerCase().replaceAll(' ', '_')
                ]
              "
            />
            <label class="form-check-label" v-text="option"> </label>
          </div>
        </div>

        <!-- error -->
        <div
          class="error"
          v-if="
            (letterFormInput.type.toLowerCase() != 'gambar' &&
              form.input[
                letterFormInput.name.toLowerCase().replaceAll(' ', '_')
              ] == null) ||
            form.input[
              letterFormInput.name.toLowerCase().replaceAll(' ', '_')
            ] == ''
          "
        >
          <span>{{ letterFormInput.name + " harus diisi" }}</span>
        </div>

        <div
          :id="letterFormInput.name.toLowerCase().replaceAll(' ', '_')"
          class="error"
          v-if="letterFormInput.type.toLowerCase() == 'gambar'"
        >
          {{ letterFormInput.name + " harus diisi" }}
        </div>
      </div>

      <div v-if="letterFormInputs != ''">
        <button
          id="submitBtn"
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
      errors: {},
      idLetterFormInput: "",
      letterByCategory: "",
      letterCategories: null,
      letterFormInputs: "",
      disabled: {},
    };
  },
  mounted() {
    this.getLetterCategory();
  },
  methods: {
    ifNikExist() {
      let nik = document.getElementById("nik");
      if (nik) {
        console.log("masuk");
        document
          .getElementById("nik")
          .setAttribute("onKeyDown", "return false");
      } else {
        console.log("tidak masuk");
      }
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
    getLetterFormInput(id) {
      this.form.letter_id = id;
      this.letterFormInputs = "";
      let user = this.$cookies.get("sisteminformasipelayanandesajelutung_token")
        .result.user;
      axios.get("/api/letter-service/" + id).then((response) => {
        this.letterFormInputs = response.data;
        for (let i = 0; i < this.letterFormInputs.length; i++) {
          // name
          if (
            this.letterFormInputs[i].name
              .toLowerCase()
              .includes("nama pemohon") ||
            this.letterFormInputs[i].name
              .toLowerCase()
              .includes("nama lengkap") ||
            this.letterFormInputs[i].name == "nama"
          ) {
            this.form.input[
              this.letterFormInputs[i].name.toLowerCase().replaceAll(" ", "_")
            ] = user.name;
            this.disabled[
              this.letterFormInputs[i].name.toLowerCase().replaceAll(" ", "_")
            ] = "0";
          }

          // nik
          if (
            this.letterFormInputs[i].name.toLowerCase().includes("nik") ||
            this.letterFormInputs[i].name
              .toLowerCase()
              .includes("nomor induk kependudukan")
          ) {
            this.form.input[
              this.letterFormInputs[i].name.toLowerCase().replaceAll(" ", "_")
            ] = user.nik;
          }

          // jenis kelamin
          if (
            this.letterFormInputs[i].name
              .toLowerCase()
              .includes("jenis kelamin") ||
            this.letterFormInputs[i].name.toLowerCase().includes("kelamin")
          ) {
            this.form.input[
              this.letterFormInputs[i].name.toLowerCase().replaceAll(" ", "_")
            ] = user.gender;
            this.disabled[
              this.letterFormInputs[i].name.toLowerCase().replaceAll(" ", "_")
            ] = "0";
          }

          // tempat lahir
          if (
            this.letterFormInputs[i].name.toLowerCase().includes("tempat lahir")
          ) {
            this.form.input[
              this.letterFormInputs[i].name.toLowerCase().replaceAll(" ", "_")
            ] = user.birthplace;
            this.disabled[
              this.letterFormInputs[i].name.toLowerCase().replaceAll(" ", "_")
            ] = "0";
          }

          // tanggal lahir
          if (
            this.letterFormInputs[i].name
              .toLowerCase()
              .includes("tanggal lahir")
          ) {
            this.form.input[
              this.letterFormInputs[i].name.toLowerCase().replaceAll(" ", "_")
            ] = user.birthday;
            this.disabled[
              this.letterFormInputs[i].name.toLowerCase().replaceAll(" ", "_")
            ] = "0";
          }

          // agama
          if (
            this.letterFormInputs[i].name.toLowerCase().includes("agama") &&
            !this.letterFormInputs[i].name
              .toLowerCase()
              .includes("orang tua") &&
            !this.letterFormInputs[i].name.toLowerCase().includes("wali")
          ) {
            this.form.input[
              this.letterFormInputs[i].name.toLowerCase().replaceAll(" ", "_")
            ] = user.religion;
            this.disabled[
              this.letterFormInputs[i].name.toLowerCase().replaceAll(" ", "_")
            ] = "0";
          }

          // warga negara
          if (
            this.letterFormInputs[i].name
              .toLowerCase()
              .includes("warga negara") ||
            this.letterFormInputs[i].name
              .toLowerCase()
              .includes("kewarganegaraan")
          ) {
            this.form.input[
              this.letterFormInputs[i].name.toLowerCase().replaceAll(" ", "_")
            ] = user.citizenship;
            this.disabled[
              this.letterFormInputs[i].name.toLowerCase().replaceAll(" ", "_")
            ] = "0";
          }
        }
      });
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
