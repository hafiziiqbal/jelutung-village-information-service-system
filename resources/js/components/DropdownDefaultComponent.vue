<template>
    <li class="dropdown">
        <button
            v-on:click="toggleDropdown"
            v-bind:id="id"
            class="dropdown-default-component"
        >
            {{ content }}
            <i
                v-if="id.includes('Sidebar')"
                class="ms-auto bi bi-chevron-down"
                :style="{
                    transform: 'rotate(' + isRotate + 'deg)',
                }"
            ></i>
        </button>
        <ul
            :style="{
                display: this.id.includes('Sidebar') ? isNone : 'block',
            }"
        >
            <li v-for="(item, index) in listItem" :key="index">
                <router-link :to="'/'">{{ item }}</router-link>
            </li>
        </ul>
    </li>
</template>

<script>
export default {
    props: ["id", "content", "listItem"],
    data() {
        return {
            isHidden: true,
            isNone: "none",
            isRotate: "0",
        };
    },
    methods: {
        toggleDropdown() {
            if (this.id.includes("Sidebar")) {
                this.isHidden = !this.isHidden;
                if (this.isHidden == true) {
                    this.isNone = "none";
                    this.isRotate = "0";
                } else {
                    this.isNone = "block";
                    this.isRotate = "180";
                }
            }
        },
    },
};
</script>
