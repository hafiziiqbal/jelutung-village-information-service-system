<template>
    <div class="d-flex operator">
        <sidebar-operator-component></sidebar-operator-component>
        <div class="content-wrapper">
            <div class="content">
                <navbar-operator-component></navbar-operator-component>
            </div>
        </div>
    </div>
</template>

<style scoped>
.operator .content-wrapper {
    width: 100%;
    background-color: #f8f9fc;
    overflow-x: hidden;
    display: flex;
    flex-direction: column !important;
}
.operator .content {
    height: 100vh;
}
</style>
