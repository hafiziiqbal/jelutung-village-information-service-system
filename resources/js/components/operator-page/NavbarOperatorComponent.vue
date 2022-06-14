<template>
    <nav
        class="operator-navbar navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
    >
        <div class="button-sidebar-operator">
            <input
                type="checkbox"
                id="sidebarOperatorButton"
                :checked="mobileDevice"
            />
            <div class="btn btn-link" type="button">
                <i class="bi bi-list"></i>
            </div>
        </div>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown mx-1">
                <a
                    class="nav-link dropdown-toggle no-arrow"
                    id="dropdownNotification"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    <i class="bi bi-bell-fill"></i>
                    <span class="badge badge-danger badge-counter">3+</span>
                </a>
                <div
                    class="dropdown-list dropdown-menu collapse"
                    aria-labelledby="dropdownNorification"
                >
                    <h6 class="dropdown-header">Notifikasi</h6>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="me-3">
                            <div class="icon-circle bg-primary">
                                <i class="bi bi-bell-fill"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-secondary">
                                December 12, 2019
                            </div>
                            <span class=""
                                >A new monthly report is ready to
                                download!</span
                            >
                        </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="me-3">
                            <div class="icon-circle bg-primary">
                                <i class="bi bi-bell-fill"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-secondary">
                                December 12, 2019
                            </div>
                            <span class=""
                                >A new monthly report is ready to
                                download!</span
                            >
                        </div>
                    </a>
                    <a
                        class="dropdown-item text-center small text-secondary"
                        href="#"
                        >Lihat Semua Notifikasi</a
                    >
                </div>
            </li>
            <li class="nav-item dropdown mx-1">
                <a
                    class="nav-link dropdown-toggle no-arrow"
                    id="dropdownNotification"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    <i class="bi bi-envelope-fill"></i>
                    <span class="badge badge-danger badge-counter">3+</span>
                </a>
                <div
                    style=""
                    class="dropdown-list dropdown-menu collapse"
                    aria-labelledby="dropdownNorification"
                >
                    <h6 class="dropdown-header">Pesan Masuk</h6>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="me-3">
                            <div class="icon-circle bg-primary">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                        </div>
                        <div>
                            <div class="text-truncate">
                                Hi there! I am wondering if you can help me with
                                a problem I've been having.
                            </div>
                            <div class="small text-secondary">Iqbal . 58m</div>
                        </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="me-3">
                            <div class="icon-circle bg-primary">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                        </div>
                        <div>
                            <div class="text-truncate">
                                Hi there! I am wondering if you can help me with
                                a problem I've been having.
                            </div>
                            <div class="small text-secondary">Iqbal . 58m</div>
                        </div>
                    </a>
                    <a
                        class="dropdown-item text-center small text-secondary"
                        href="#"
                        >Lihat Semua Pesan</a
                    >
                </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#">
                    <span class="avatar-name me-2 text-gray-600 small"
                        >Hafizi Iqbal</span
                    >
                    <img
                        class="img-profile rounded-circle"
                        :src="'storage/img/profile/operator-avatar.svg'"
                        alt=""
                    />
                </a>
            </li>
        </ul>
    </nav>
</template>
<script>
export default {
    data() {
        return { mobileDevice: "" };
    },
    mounted() {
        this.detectMobileDevice();
    },
    methods: {
        detectMobileDevice() {
            let mediaQuery = "(max-width:500px)";
            this.mobileDevice = window.matchMedia(mediaQuery).matches;
        },
    },
};
</script>

<style scoped>
@import "../../../css/components/operator-page/NavbarOperatorComponent.css";
</style>
