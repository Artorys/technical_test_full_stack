<script setup lang="ts">
defineProps({
    content : String,
    type : String,
    height : String,
})

</script>
<template>
    <button :style="{height : height}" type="submit" class="default" :class={type}>{{content}}</button>
</template>
<style scoped>
    .default{
        font-weight: 700;
        padding: 0 0.5rem;
        width: max-content;
        background-color: var(--background-color-2);
        border-radius: 5px;
        color : var(--button-color);
    }
    .default:hover{
        transition: 0.5s;
        background-color: #274AB8;
    }
</style>