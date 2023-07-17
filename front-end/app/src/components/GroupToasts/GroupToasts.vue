<script setup lang="ts">
import ToastView from '../Toast/ToastView.vue';
import toastsUtil from "../../utils/Toast/toastsUtil"
import ToastLoad from "../ToastLoad/ToastLoad.vue"

</script>
<template>
    <div class="toast_box">
        <ToastView v-for="(toast, key, index) in toastsUtil.toastList" :key="index" :type="toast.type" :message="toast.message"></ToastView>
        <ToastLoad></ToastLoad>
    </div>
</template>
<style scoped>
    .toast_box{
        z-index: -1;
        position:fixed;
        display: flex;
        flex-flow: column-reverse;
        justify-content: flex-end;
        align-items: flex-end;
        width : 100vw;
        height: 100vh;
    }
</style>