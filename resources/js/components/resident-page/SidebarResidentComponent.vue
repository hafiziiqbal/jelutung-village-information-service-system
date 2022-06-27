<template>
    <div>
        <ul class="operator-sidebar">
            <router-link :to="{ name: 'Home' }" class="operator-sidebar-brand">
                <img
                    :src="'/img/apple-white-touch-icon.png'"
                    style="height: 2rem"
                    alt=""
                />
                <h6 class="fw-bold text-light">PENDUDUK</h6>
            </router-link>

            <li class="nav-item">
                <router-link :to="{ name: 'ResidentHome' }" class="nav-link">
                    <div>
                        <i class="bi bi-speedometer"></i>
                        <span v-text="'Dashboard'"></span>
                    </div>
                </router-link>
            </li>
            <hr class="sidebar-divider" />

            <div class="sidebar-heading">Pelayanan Surat</div>
            <li class="nav-item">
                <div>
                    <router-link
                        :to="{ name: 'LetterService' }"
                        class="nav-link"
                    >
                        <div>
                            <i class="bi bi-file-earmark-diff-fill"></i>
                            <span v-text="'Permintaan Surat'"></span>
                        </div>
                    </router-link>
                </div>
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

        <!-- <script
            type="application/javascript"
            defer
            src="js/bootstrap.bundle.min.js"
        ></script> -->
    </div>
</template>

<script>
export default {
    data() {
        return {};
    },
    mounted() {},
    methods: {
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
