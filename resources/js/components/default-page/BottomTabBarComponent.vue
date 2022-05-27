<template>
    <div id="bottomTabBar">
        <div class="container-fluid">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col">
                        <img v-bind:src="'img/i-outline-home.png'" width="28" />
                        <br />
                        Home
                    </div>
                    <div class="col">
                        <img
                            v-bind:src="'img/i-outline-comment.png'"
                            width="28"
                        />
                        <br />
                        Komentar Terkini
                    </div>
                    <div class="col">
                        <img
                            v-bind:src="'img/i-outline-save-money.png'"
                            width="28"
                        />
                        <br />
                        Anggaran Desa
                    </div>
                    <div class="col">
                        <img
                            v-bind:src="'img/i-outline-contact.png'"
                            width="28"
                        />
                        <br />
                        Kontak Darurat
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
@import "../../../css/components/default-page/BottomTabBarComponent.css";
</style>
