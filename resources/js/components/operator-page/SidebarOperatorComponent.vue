<template>
    <div>
        <div class="d-flex">
            <ul class="operator-sidebar">
                <router-link :to="'operator'" class="operator-sidebar-brand">
                    <img
                        :src="'img/apple-touch-icon.png'"
                        style="width: 20%"
                        alt=""
                    />
                    <h6 class="ms-3 fw-bold text-light">
                        Sistem Informasi & Pelayanan Desa Jelutung
                    </h6>
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
                            <router-link :to="'operator'">
                                <span>Tambah Template</span>
                            </router-link>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <router-link :to="'operator'" class="nav-link">
                        <div>
                            <i class="bi bi-file-earmark-zip-fill"></i>
                            <span v-text="'Arsip Surat Online'"></span>
                        </div>
                    </router-link>
                </li>
            </ul>
        </div>

        <script
            type="application/javascript"
            defer
            src="js/bootstrap.bundle.min.js"
        ></script>
    </div>
</template>

<style scoped>
@import "../../../css/components/operator-page/SidebarOperatorComponent.css";
</style>
