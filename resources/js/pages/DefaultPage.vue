<template>
    <div>
        <sidebar-default-component></sidebar-default-component>
        <header-default-component></header-default-component>
        <hero-default-component></hero-default-component>
        <menu-default-component></menu-default-component>
        <bottom-tab-bar-component></bottom-tab-bar-component>
        <div class="main container-fluid">
            <home-default-component></home-default-component>
        </div>
    </div>
</template>
<style scoped>
@media (max-width: 992px) {
    .container-fluid {
        margin: 0;
        padding: 0;
    }
}
</style>