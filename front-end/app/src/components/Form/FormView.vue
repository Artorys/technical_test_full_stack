<script setup lang="ts">
import formValidator from "../../formValidator"
import {applianceSchema} from "../../schemas/formSchema"
import ButtonView from "../Button/ButtonView.vue";
import ApplianceHttpRequest from "@/api/ApplianceHttpRequest";
import formUtil from "../../utils/Form/formUtil"
import toastsUtil from "@/utils/Toast/toastsUtil";


const submit = async () =>{
    const form = {
        name : formUtil.formType.name,
        description : formUtil.formType.description,
        brand : formUtil.formType.brand,
        voltage : formUtil.formType.voltage
    }
    const {error} = applianceSchema.validate(form,{abortEarly : false})
    if(!error){
        if(formUtil.formType.type == "create"){
            toastsUtil.setToastLoadTrue()
            return ApplianceHttpRequest.createAppliance(form)
        }
        if(formUtil.formType.type == "update"){
            if(formUtil.formType.id){
                toastsUtil.setToastLoadTrue()
                return ApplianceHttpRequest.updateAppliance(form,formUtil.formType.id)
            }
        }
    }
}

</script>
<template>
    <form @submit.prevent="submit()" class="box_form">
        <div class="form">
            <div class="box_input">
                <label class="label" for="name">Name</label>
                <input required v-model="formUtil.formType.name" @focus="formValidator.clear('name')" name="name" id="name" type="text">
            </div>
            <p class="error_p" v-if="formValidator.has('name')">{{formValidator.has("name")?.message}}</p>
            <div class="box_input">
                <label class="label" for="description">Description</label>
                <input v-model="formUtil.formType.description" type="text" class="input" id="description">
            </div>
            <div class="box_input">
                <label class="label" for="voltage">Voltage</label>
                <select required v-model="formUtil.formType.voltage" id="voltage">
                    <option disabled value="">Selecione uma opção</option>
                    <option value="110v">110v</option>
                    <option value="220v">220v</option>
                </select>
            </div>
            <p class="error_p" v-if="formValidator.has('voltage')">{{formValidator.has("voltage")?.voltage}}</p>
            <div class="box_input">
                <label class="label" for="brand">Brand</label>
                <select required v-model="formUtil.formType.brand"  id="brand">
                    <option disabled value="">Selecione uma opção</option>
                    <option value="Brastemp">Brastemp</option>
                    <option value="LG">LG</option>
                    <option value="Samsung">Samsung</option>
                    <option value="Eletrolux">Eletrolux</option>
                    <option value="Philco">Philco</option>
                </select>
            </div>
            <p class="error_p" v-if="formValidator.has('brand')">{{formValidator.has("brand")?.message}}</p>
        </div>
        <ButtonView v-if="formUtil.formType.type == 'create'" height="50px" content="Create Appliance"></ButtonView>
        <ButtonView v-if="formUtil.formType.type == 'update'" height="50px" content="Update Appliance"></ButtonView> 
    </form>
</template>
<style>
.box_form{
    display: flex;
    flex-flow: column;
    align-items: center;
    width: 100%;
    height: 100%;
}
.form{
    margin-top: 2rem;
    margin-left: 1rem;
    width: 100%;
    height: 100%;
    display: flex;
    flex-flow: column;
    align-items: flex-start;
    justify-content: flex-start;
    gap: 1rem;
}
.box_input{
    display: flex;
    flex-flow: column;
    gap: 0.5rem;
}
.label{
    font-weight: 700;
    color: #fff;
}
.input{

}
.error_p{
    color : red;
}
</style>