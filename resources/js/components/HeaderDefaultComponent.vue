<template>
    <header id="header" class="fixed-top d-flex align-items-center">
        <div
            class="container d-flex align-items-center justify-content-between"
        >
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-primary me-1" type="button">
                    <i class="bi bi-list"></i>
                </button>
                <div id="logo">
                    <h6 class="fw-bold text-primary">
                        Sistem Informasi & Pelayanan
                    </h6>
                    <h6>Desa Jelutung Kec. Pemangkat</h6>
                </div>
            </div>
            <div id="navbar" class="navbar">
                <ul>
                    <navbar-default-component
                        id="profilDesa"
                        content="Profil Desa"
                    />
                    <navbar-default-component id="lembaga" content="Lembaga" />
                    <navbar-default-component
                        id="statistik"
                        content="Statistik"
                    />
                    <navbar-default-component
                        id="produkHukum"
                        content="Produk Hukum"
                    />
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
