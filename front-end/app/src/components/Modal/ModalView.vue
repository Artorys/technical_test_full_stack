<script setup lang="ts">
import { computed } from "vue";
import { useStore } from "vuex";

const store = useStore();

const isClosed = computed(() => store.state.isClosed);

const toggle = () => {
  store.commit("toggle");
};
import FormView from "../Form/FormView.vue"
import formUtil from "@/utils/Form/formUtil";
</script>

<template>
    <aside v-show="isClosed" class="modal_container">
      <img @click="toggle(),formUtil.setFormToCreate()" class="exit" width="20"   height="20" src="../../assets/icons/x.svg">
      <div class="modal_form">
        <FormView></FormView>
      </div>
    </aside>
</template>
<style>

.modal_container{
    padding: 1rem;
    position: fixed;
    background-color: var(--modal-background);
    border: solid 1px var(--background-color-2);
    border-radius: 5px;
    margin: auto auto;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    min-width: 300px;
    width: 400px;
    height:500px;  
    display: flex;  
    flex-flow: column;
    align-items: flex-end;
}
.exit{
    cursor: pointer;
}
.modal_form{
  width: 100%;
  height: 100%;
}
</style>