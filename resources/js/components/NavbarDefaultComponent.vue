<template>
    <li class="dropdown">
        <button v-bind:id="id" class="navbar-default-component">
            {{ content }}
        </button>
        <ul>
            <li>
                <router-link :to="'/'">Drop Down 1</router-link>
            </li>
            <li><router-link :to="'/'">Drop Down 1</router-link></li>
            <li><router-link :to="'/'">Drop Down 1</router-link></li>
            <li><router-link :to="'/'">Drop Down 1</router-link></li>
            <li><router-link :to="'/'">Drop Down 1</router-link></li>
            <li><router-link :to="'/'">Drop Down 1</router-link></li>
            <li><router-link :to="'/'">Drop Down 1</router-link></li>
        </ul>
    </li>
</template>

<script>
export default {
    props: ["id", "content"],
};
</script>
