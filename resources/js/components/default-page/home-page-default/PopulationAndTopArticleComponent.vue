<template>
    <div class="mb-container-fluid">
        <!-- Population Data & Top Article -->
        <div class="row mt-3">
            <!-- Population Data -->
            <div class="col-6">
                <div class="card">
                    <div
                        class="card-header"
                        v-text="'Data Penduduk Desa Jelutung'"
                    ></div>
                    <div class="card-content">
                        <div class="population-data">
                            <div class="population-item">
                                <div class="d-flex align-items-center">
                                    <img
                                        v-bind:src="'img/i-man.png'"
                                        width="32"
                                    />
                                    <label
                                        class="ms-2"
                                        v-text="'LAKI-LAKI : '"
                                    ></label>
                                </div>
                                <span
                                    data-purecounter-start="0"
                                    data-purecounter-end="1200"
                                    data-purecounter-duration="1"
                                    class="purecounter"
                                ></span>
                            </div>

                            <div class="population-item">
                                <div class="d-flex align-items-center">
                                    <img
                                        v-bind:src="'img/i-woman.png'"
                                        width="32"
                                    />
                                    <label
                                        class="ms-2"
                                        v-text="'PEREMPUAN : '"
                                    ></label>
                                </div>
                                <span
                                    data-purecounter-start="0"
                                    data-purecounter-end="1070"
                                    data-purecounter-duration="1"
                                    class="purecounter"
                                ></span>
                            </div>

                            <div class="population-item">
                                <div class="d-flex align-items-center">
                                    <img
                                        v-bind:src="'img/i-people.png'"
                                        width="32"
                                    />
                                    <label
                                        class="ms-2"
                                        v-text="'TOTAL JIWA : '"
                                    ></label>
                                </div>
                                <span
                                    data-purecounter-start="0"
                                    data-purecounter-end="2270"
                                    data-purecounter-duration="1"
                                    class="purecounter"
                                ></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top Article -->
            <div class="col-6">
                <div class="card">
                    <div
                        class="card-header"
                        v-text="
                            topArticle.length < 10
                                ? 'Artikel Poluler'
                                : '10 Artikel Populer'
                        "
                    ></div>
                    <div class="card-content">
                        <div class="top-article swiper">
                            <div class="swiper-wrapper align-items-center">
                                <div
                                    class="swiper-slide"
                                    v-for="article in topArticle"
                                    :key="article.id"
                                >
                                    <router-link :to="article.url">
                                        <div
                                            class="img-top-article"
                                            :style="{
                                                backgroundImage:
                                                    'url(/storage/img/article/' +
                                                    article.image +
                                                    ')',
                                                backgroundSize: 'cover',
                                                backgroundPosition: 'center',
                                                backgroundRepeat: 'no-repeat',
                                            }"
                                        >
                                            <div class="text-top-article">
                                                JelutungNews - Artikel terkait
                                                <span
                                                    v-text="article.title"
                                                ></span>
                                                dapat dibaca disini...
                                            </div>
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script
            type="application/javascript"
            defer
            src="vendor/purecounter/purecounter.js"
        ></script>
    </div>
</template>

<script>
export default {
    data() {
        return {
            topArticle: [],
        };
    },
    methods: {
        getTopArticle() {
            axios.get("/api/top-article").then((response) => {
                this.topArticle = response.data;

                if (response.status == 200) {
                    setTimeout(function () {
                        new Swiper(".top-article ", {
                            speed: 400,
                            loop: true,
                            autoplay: {
                                delay: 5000,
                                disableOnInteraction: false,
                            },
                            slidesPerView: "1",
                        });
                    }, 3000);
                }
            });
        },
    },

    mounted() {
        this.getTopArticle();
    },
};
</script>

<style scoped>
@import "../../../../css/components/default-page/home-page-default/PopulationAndTopArticleComponent.css";
</style>
