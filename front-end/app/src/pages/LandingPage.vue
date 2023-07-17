<script setup lang="ts">
import {RouterLink} from "vue-router"
</script>

<template>
  <header class="header">
    <div class="container">
        <img class="logo" src="../assets/logo.png" width="125" height="125" />
        <div>
          <nav class="navigator">
            <h1 class="title">
              Appliances
            </h1>
            <RouterLink to="/home">Let's go</RouterLink>
          </nav>
        </div>
    </div>
  </header>
</template>
<style scoped>

.header{
    width: 100%;
    height: 100%;
}

.container{
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.navigator{

    display: flex;
    flex-flow: column;
    align-items: flex-end;
}
.title{
    padding: 1rem;
}
</style>
