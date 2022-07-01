<template>
  <div>
    <ul class="operator-sidebar">
      <router-link :to="{ name: 'Home' }" class="operator-sidebar-brand">
        <img
          :src="'/img/apple-white-touch-icon.png'"
          style="height: 2rem"
          alt=""
        />
        <h6 class="fw-bold text-light">OPERATOR</h6>
      </router-link>

      <li class="nav-item">
        <router-link :to="'operator'" class="nav-link">
          <div>
            <i class="bi bi-speedometer"></i>
            <span v-text="'Dashboard'"></span>
          </div>
        </router-link>
      </li>
      <hr class="sidebar-divider" />

      <div class="sidebar-heading">Kelola Surat</div>
      <li class="nav-item">
        <a
          class="nav-link dropdown collapsed"
          data-bs-toggle="collapse"
          href="#collapseTemplate"
          role="button"
          aria-expanded="false"
          aria-controls="collapseTemplate"
        >
          <div>
            <i class="bi bi-file-earmark-diff-fill"></i>
            <span v-text="'Template Surat'"></span>
          </div>
          <i class="bi bi-chevron-right"></i>
        </a>
        <div class="collapse" id="collapseTemplate">
          <div class="dropdown-sidebar">
            <router-link :to="'operator'">
              <span>Daftar Template</span>
            </router-link>
            <router-link :to="{ name: 'CreateLetterTemplate' }">
              <span>Tambah Template</span>
            </router-link>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <router-link :to="{ name: 'LetterRequestOperator' }" class="nav-link">
          <div>
            <i class="bi bi-file-earmark-zip-fill"></i>
            <span v-text="'Permintaan Surat'"></span>
          </div>
        </router-link>
      </li>

      <li class="nav-item">
        <router-link :to="{ name: 'OperatorHome' }" class="nav-link">
          <div>
            <i class="bi bi-file-earmark-zip-fill"></i>
            <span v-text="'Arsip Surat Online'"></span>
          </div>
        </router-link>
      </li>

      <hr class="sidebar-divider" />
      <li class="nav-item">
        <div class="logout">
          <button
            type="button"
            class="btn btn-danger"
            v-on:click="destroyCookie"
          >
            <i class="bi bi-door-open-fill"></i>
            <span v-text="'Logout'"></span>
          </button>
        </div>
      </li>
    </ul>

    <script
      type="application/javascript"
      defer
      src="js/bootstrap.bundle.min.js"
    ></script>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  created() {
    this.hideCollapseTemplate();
  },
  methods: {
    hideCollapseTemplate() {
      let aLink = document.querySelectorAll(".dropdown-sidebar a");
      let collapseTemplate = document.querySelector("#collapseTemplate");
      for (let i = 0; i < aLink.length; i++) {
        aLink[i].addEventListener("click", () => {
          collapseTemplate.classList.remove("show");
        });
      }
    },
    destroyCookie() {
      this.$cookies.remove("sisteminformasipelayanandesajelutung_token");
      this.$router.push({ name: "Home" });
    },
  },
};
</script>
<style scoped>
@import "../../../css/components/operator-page/SidebarOperatorComponent.css";
</style>
