<template>
    <header id="header" class="fixed-top d-flex align-items-center">
        <div
            class="container d-flex align-items-center justify-content-between"
        >
            <div class="d-flex align-items-center">
                <div>
                    <input type="checkbox" id="sidebarDefaultButton" />
                    <div class="btn btn-outline-primary me-1" type="button">
                        <i class="bi bi-list"></i>
                    </div>
                </div>
                <div id="logo">
                    <h6 class="fw-bold">Sistem Informasi & Pelayanan</h6>
                    <h6>Desa Jelutung Kec. Pemangkat</h6>
                </div>
            </div>
            <div id="navbar" class="navbar">
                <ul>
                    <dropdown-default-component
                        id="profilDesaNavbar"
                        content="Profil Desa"
                        :list-item="[
                            'Sejarah Desa',
                            'Profil Desa',
                            'Visi Misi',
                            'Pemerintah Desa',
                            'Aparatur Desa',
                            'Struktur',
                        ]"
                    />
                    <dropdown-default-component
                        id="lembagaNavbar"
                        content="Lembaga"
                        :list-item="['BPD']"
                    />
                    <dropdown-default-component
                        id="statistikNavbar"
                        content="Statistik"
                        :list-item="[
                            'Wilayah Administratif',
                            'Jenis Kelamin',
                            'Pekerjaan',
                            'Pendidikan',
                            'Agama',
                            'Kelompok Umur',
                            'Status Perkawinan',
                            'Kelas Sosial',
                            'Calon Pemilih',
                            'Kategori Umur',
                            'Peta',
                            'Status IDM',
                        ]"
                    />
                    <dropdown-default-component
                        id="produkHukumNavbar"
                        content="Produk Hukum"
                        :list-item="['Peraturan']"
                    />
                    <li class="dropdown">
                        <a class="dropdown-default-component">Login</a>
                    </li>
                </ul>
                <form class="d-flex ms-2">
                    <input
                        class="form-control me-1"
                        type="search"
                        placeholder="Cari Artikel di Website Desa Jelutung"
                    />
                    <button class="btn btn-outline-primary" type="button">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </header>
</template>

<style scoped>
@import "../../../css/components/default-page/HeaderDefaultComponent.css";
</style>
