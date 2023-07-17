<script setup lang="ts">
import { RouterView } from 'vue-router'
import GroupToasts from "./components/GroupToasts/GroupToasts.vue"
</script>

<template>
  <GroupToasts></GroupToasts>
  <RouterView />
</template>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Lilita+One&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap');
</style>
<style >

.logo {
  display: block;
}

nav {
  width: 100%;
  text-align: center;
}

h1{
  font-family: 'Mulish', sans-serif;
  font-size: 3rem;
  font-weight: 900;
  color : var(--title-color)
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
  }

}
</style>
