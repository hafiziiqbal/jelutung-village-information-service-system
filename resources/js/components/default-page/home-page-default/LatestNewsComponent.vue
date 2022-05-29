<template>
    <div>
        <div v-if="mobileDevice === false" class="latest-news">
            <div class="latest-news-header" v-text="'Berita Terkini'"></div>
            <ul>
                <li v-for="article in latestArticle" :key="article.id">
                    <div class="card">
                        <div
                            class="latest-news-card-image"
                            :style="{
                                backgroundImage:
                                    'url(/storage/img/article/' +
                                    article.image +
                                    ')',
                                backgroundSize: 'cover',
                                backgroundPosition: 'center',
                                backgroundRepeat: 'no-repeat',
                            }"
                        ></div>
                        <div class="latest-news-card-header">
                            <router-link :to="article.url">
                                <label v-text="article.title"></label>
                            </router-link>
                            <p>
                                <i class="bi bi-calendar-minus-fill"></i>
                                {{ article.date + " " + article.time }}
                                <i class="bi bi-person-fill"></i>
                                {{ article.writer }}
                            </p>
                        </div>
                        <div class="latest-news-card-content">
                            {{ article.content }}...
                        </div>
                        <div class="latest-news-card-info">
                            <label
                                ><i class="bi bi-eye-fill"></i>
                                {{ article.view }} Kali di lihat</label
                            >
                            <label
                                ><i class="bi bi-chat-left-dots-fill"></i>
                                {{ article.comment }} Komentar</label
                            >
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div v-if="mobileDevice === true" class="mb-latest-news">
            <div class="mb-latest-news-header" v-text="'Berita Terkini'"></div>
            <div class="mb-latest-news-cont swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide width-auto">
                        <div style="width: 120px; height: 10px"></div>
                    </div>
                    <div
                        v-for="article in latestArticle"
                        :key="article.id"
                        class="swiper-slide width-auto"
                    >
                        <router-link :to="article.url">
                            <div class="mb-latest-news-item">
                                <div
                                    class="mb-latest-news-card-image"
                                    :style="{
                                        backgroundImage:
                                            'url(/storage/img/article/' +
                                            article.image +
                                            ')',
                                        backgroundSize: 'cover',
                                        backgroundPosition: 'center',
                                        backgroundRepeat: 'no-repeat',
                                    }"
                                ></div>
                                <div class="mb-latest-news-item-header">
                                    {{ article.title }}
                                </div>
                                <div class="mb-latest-news-card-info">
                                    <label>
                                        <span
                                            ><i class="bi bi-eye-fill"></i
                                        ></span>

                                        {{ article.view }} Kali di lihat</label
                                    >
                                    <label>
                                        <span
                                            ><i
                                                class="bi bi-chat-left-dots-fill"
                                            ></i
                                        ></span>
                                        {{ article.comment }} Komentar</label
                                    >
                                </div>
                                <div class="mb-latest-news-button">
                                    Selengkapnya...
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            latestArticle: [],
            mobileDevice: "",
        };
    },
    methods: {
        sliderLatestNews() {
            this.$nextTick(() => {
                new Swiper(".mb-latest-news-cont ", {
                    slidesPerView: "auto",
                });
            });
        },

        detectMobileDevice() {
            let mediaQuery = "(max-width:600px)";
            this.mobileDevice = window.matchMedia(mediaQuery).matches;
        },
        getLatestArticle() {
            axios.get("/api/latest-article").then((response) => {
                this.latestArticle = response.data;
            });
        },
    },

    mounted() {
        this.getLatestArticle();
        this.sliderLatestNews();
        this.detectMobileDevice();
    },
};
</script>

<style scoped>
@import "../../../../css/components/default-page/home-page-default/LatestNewsComponent.css";
</style>
