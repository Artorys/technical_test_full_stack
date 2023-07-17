<script setup lang="ts">
import { reactive, watch,onMounted } from "vue"
import { useStore } from "vuex"
import ApplianceHttpRequest from "../../api/ApplianceHttpRequest"
import formUtil from "../../utils/Form/formUtil"
import toastsUtil from "../../utils/Toast/toastsUtil"
import brastemp from "../../assets/brands/brastemp.png"
import lg from "../../assets/brands/lg.png"
import philco from "../../assets/brands/philco.png"
import samsung from "../../assets/brands/samsung.png"
import eletrolux from "../../assets/brands/eletrolux.png"

 const props = defineProps({
        id : Number,
        name : String,
        description : String,
        brand : String,
        voltage : String
    })

const store = useStore()

const brands = [brastemp,lg,philco,eletrolux,samsung]

const definitiveBrand = reactive({src : ""})

onMounted(()=>{
    const findBrand = brands.find((item)=> item.includes((props.brand as string).toLowerCase() as string))
    definitiveBrand.src = findBrand as string
})

watch(ApplianceHttpRequest.appliance,()=>{
    const findBrand = brands.find((item)=> item.includes((props.brand as string).toLowerCase() as string))
    definitiveBrand.src = findBrand as string
})

const toggle = () => store.commit("toggle")

</script>
<template>
    <div class="card_container">
        <div class="card_box">
            <p class="title">{{ name }}</p>    
            <p class="card_p">{{ description }}</p>
            <p class="card_p">{{ voltage }}</p>
        </div>
        <div class="card_icon_box">
            <img @click="ApplianceHttpRequest.deleteAppliance(id),toastsUtil.setToastLoadTrue()" class="icon" width="25" height="25" src="../../assets/icons/deleteIcon.png">
            <img @click="toggle(),formUtil.setFormToUpdate(props)" class="icon" width="25" height="25" src="../../assets/icons/updateIcon.svg">
        </div>
        <div class="brand_box">
            <img class="brand_img" width="100" height="20" :src="definitiveBrand.src">
        </div>  
    </div>
</template>
<style scoped>
    .card_container{
        background-color: var(--background-color-1);
        border-radius: 5px;
        width: max-content;
        min-width: 200px;
        height: max-content;
        min-height: 160px;
        padding: 1rem;
    }
    .card_box{
        width: 100%;
        height: 100%;
        background-color: var(--background-color-2);
        line-height: 2rem;
        border-radius: 10px;
        padding: 0.5rem;
        margin-block: 0.5rem;
    }
    .brand_box{
        position: relative;
        width: 100%;
        height: 100%;
    }
    .brand_img{
        position: absolute;
        bottom: 10px;
    }
    .title{
        font-size: 1rem;
        font-weight: 1000;
        color: var(--title-color);
    }
    .card_p{
        color: white;
        font-weight: 500;
        font-size: 0.7em;
    }
    .card_icon_box{
        width: 100%;
        align-items: flex-end;
        gap: 0.5rem;
        display: flex;
        flex-flow: column;

    }
    .icon{
        transition: 0.5s;
        cursor : pointer
    }
    .icon:hover{
        opacity: 0.5;
    }
</style>