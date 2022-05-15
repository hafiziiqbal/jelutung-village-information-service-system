<template>
    <div>
        <div id="contSidebar" style="visibility: hidden"></div>
        <div class="sidebar" style="visibility: hidden">
            <div class="header-sidebar">
                <img
                    :src="'img/apple-touch-icon.png'"
                    style="width: 20%"
                    alt=""
                />
                <h6 class="ms-3 fw-bold text-light">
                    Sistem Informasi & Pelayanan Desa Jelutung
                </h6>
            </div>
            <ul>
                <dropdown-default-component
                    id="profilDesaSidebar"
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
                    id="lembagaSidebar"
                    content="Lembaga"
                    :list-item="['BPD']"
                />
                <dropdown-default-component
                    id="statistikSidebar"
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
                    id="produkHukumSidebar"
                    content="Produk Hukum"
                    :list-item="['Peraturan']"
                />
                <li class="dropdown">
                    <a class="dropdown-default-component">Login</a>
                </li>
            </ul>
        </div>
    </div>
</template>
