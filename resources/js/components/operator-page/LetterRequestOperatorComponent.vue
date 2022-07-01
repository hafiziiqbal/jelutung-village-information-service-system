<template>
  <div class="m-4 letter-request-operator">
    <div class="header mb-3" v-text="'Permintaan Surat'"></div>
    <div class="letter-request-operator-content">
      <table
        id="table_letter_request"
        class="table table-striped display nowrap"
        style="width: 100%"
        cellspacing="0"
      >
        <thead>
          <tr>
            <th>No</th>
            <th>Pemohon</th>
            <th>Nama Surat</th>
            <th>Waktu Mohon</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      letterRequest: "",
    };
  },
  created() {
    $(document).ready(function () {
      $("#table_letter_request").DataTable({
        responsive: true,
        ajax: {
          url: "/api/letter-service/",
          dataSrc: "",
        },
        columns: [
          {
            data: null,
            sortable: false,
            render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            },
          },
          { data: "name" },
          { data: "letter_name" },
          { data: "created_at" },
          {
            data: "",
            defaultContent:
              "<button class='btn btn-primary'>Verifikasi</button> <button class='btn btn-success'>Edit</button> <button class='btn btn-danger'>Tolak</button>",
          },
        ],
      });
    });
  },
  mounted() {},
  methods: {
    getLetterRequest() {
      axios.get("/api/letter-service/").then((response) => {
        this.letterRequest = response.data;
      });
    },
  },
};
</script>

<style scoped>
.letter-request-operator .header {
  font-size: 22px;
  text-transform: uppercase;
  font-weight: bold;
  color: #3e64d3;
}

@media (max-width: 500px) {
  .letter-request-operator-content * {
    font-size: 10px !important;
  }
  .letter-request-operator .header {
    text-align: center;
    font-size: 20px;
  }
}
</style>