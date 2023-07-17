import type { IAppliance } from "../../api/interfaces/IAppliance";
import { reactive, ref } from "vue";

function formUtil(){
    const formType = ref({} as IForm)

    const setFormToCreate = ()=>{
        formType.value.type = "create"
        formType.value.id = 0
        formType.value.name = ""
        formType.value.description = ""
        formType.value.brand = ""
        formType.value.voltage = ""
    }
    const setFormToUpdate = (data : IAppliance) =>{
        formType.value.type = "update"
        formType.value.id = data.id
        formType.value.name = data.name
        formType.value.description = data.description
        formType.value.brand = data.brand
        formType.value.voltage = data.voltage
    }
    return reactive({formType,setFormToCreate,setFormToUpdate})
}

export default formUtil()