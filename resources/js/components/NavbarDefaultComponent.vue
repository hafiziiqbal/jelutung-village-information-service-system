<template>
    <li>
        <button v-bind:id="id" class="navbar-default-component">
            {{ content }}
        </button>
    </li>
</template>

<script>
export default {
    props: ["id", "content"],
};
</script>
