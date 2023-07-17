import type { IToast } from "@/interfaces/IToast"
import { reactive, ref } from "vue"

function toastsUtil(){

    const toastList = ref([{} as IToast])
    const toastLoad = ref({} as IToastLoad)

    const addToasts = (toastObj : IToast)=>{
        toastList.value.push(toastObj)
    }

    const setToastLoadTrue = ()=>{
        toastLoad.value.isLoad = true
    }
    const setToastLoadFalse = () => {
        toastLoad.value.isLoad = false
    }

    return reactive({addToasts,setToastLoadTrue,setToastLoadFalse,toastList,toastLoad})
}
export default toastsUtil()