
<script setup lang="ts">

defineProps({
    content : String
})
</script>
<template>
    <div class="navigator_box">
        <img class="logo" src="../../assets/logo.png" width="50" height="50" />
        <h1 class="title">
            {{ content }}
        </h1>
    </div>
</template>
<style scoped>
.navigator_box{
  display: flex;
  margin-bottom: 0.4rem;
  justify-content: center;
  align-items: flex-end;
}
.logo{
  margin-right: 0.4rem;
}
.title{
  font-size: 1rem;
  margin-top: 2rem;
}
</style>