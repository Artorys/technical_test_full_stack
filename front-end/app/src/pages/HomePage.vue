<script setup lang="ts">
import ApplianceHttpRequest from "../api/ApplianceHttpRequest"
import { onMounted } from 'vue';
import ButtonView from "../components/Button/ButtonView.vue"
import ModalView from "../components/Modal/ModalView.vue"
import CardView from "../components/Card/CardView.vue"
import {RouterLink} from "vue-router"
import { useStore } from 'vuex'
import formUtil from "../utils/Form/formUtil";
import LogoView from "../components/Logo/LogoView.vue";

const store = useStore()

const state = {
    toggle : () => store.commit("toggle"),
}

onMounted(()=>{
  ApplianceHttpRequest.getAllAppliance()
})

</script> 

<template>
  <header class="header">
      <nav class="navigator">
          <RouterLink style="margin-left:2rem;" to="/">
            <img width="50" height="50" src="../assets/icons/left_arrow.svg" alt="left arrow">
          </RouterLink>
        <div class="navigator_container">
          <LogoView content="Appliances"></LogoView>
          <ButtonView @click="state.toggle(),formUtil.setFormToCreate()" height="30px" class="default" content="Register your appliances"></ButtonView>
        </div>
      </nav>
  </header>
  <main class="container_content">
    <section class="container_cards">
      <CardView v-if="ApplianceHttpRequest.appliance?.data.length > 0" v-for=" (card,index) in ApplianceHttpRequest.appliance?.data" :id="card.id" :key="index" :name="card.name" :description="card.description" :brand="card.brand" :voltage="card.voltage"></CardView>
      <div v-else class="container_empty_card">
        <LogoView :content="'Appliances list is empty'"></LogoView>
      </div>
    </section>
  </main>
  <ModalView></ModalView>
</template>
<style scoped>
.header{
  margin-top: 0.5rem;
  width: 100%;
  height: max-content;
  display: flex;
  align-items: flex-start;
}
.navigator{
  margin: 0;
  padding: 0;
  display: flex;
}
.navigator_container{
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: end;
  gap: 3rem;
}

.container_content{
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
}
.container_cards{
  background-color: var(--background-color-2);
  padding: 1rem;
  border-radius: 10px;
  display: flex;
  flex-flow: row wrap;
  justify-content: center;
  gap: 0.5rem;
  overflow-y: auto;
  width: 720px;
  height: 90%;
}
.container_empty_card{
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
