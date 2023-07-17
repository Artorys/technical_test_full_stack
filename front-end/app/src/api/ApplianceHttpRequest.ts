import { reactive, ref } from "vue";
import { apiAppliance } from ".";
import type { IAppliance, IApplianceCreateOrUpdate, ILaravelResponse } from "./interfaces/IAppliance";
import toastsUtil from "../utils/Toast/toastsUtil";



function ApplianceHttpRequest(){
    const appliance = ref<ILaravelResponse>()

    const getAllAppliance = async () => {
        const appliancesAll = await apiAppliance.get<ILaravelResponse>("/")
        appliance.value = appliancesAll.data
    }

    const createAppliance = async (data : IApplianceCreateOrUpdate) => {
        const applianceResponse = await apiAppliance.post<IAppliance>("/",data)
        if(appliance.value){
            appliance.value.data.push(applianceResponse.data)
            toastsUtil.setToastLoadFalse()
            toastsUtil.addToasts({"message" : "Appliance created.",type : "success"})
        }
    }

    const updateAppliance = async (data: IApplianceCreateOrUpdate,id : number) =>{
        const apiApplianceUpdated = await apiAppliance.put<IAppliance>(`/${id}`,data)
        if(appliance.value){
            const indexForReplace = appliance.value.data.findIndex((appliance)=> apiApplianceUpdated.data.id == appliance.id)
            appliance.value.data.splice(indexForReplace,1,apiApplianceUpdated.data)
            toastsUtil.setToastLoadFalse()
            toastsUtil.addToasts({"message" : `Appliance ${id} updated.`,type : "success"})
        }

    }

    const deleteAppliance = async (id: number) => {
        if(appliance.value){
            await apiAppliance.delete(`/${id}`)
            const indexForReplace = appliance.value.data.findIndex((appliance)=> id == appliance.id)
            appliance.value.data.splice(indexForReplace,1)
            toastsUtil.setToastLoadFalse()
            toastsUtil.addToasts({"message" : `Appliance ${id} deleted.`,type : "success"})
        }
    }


    return reactive({createAppliance,getAllAppliance,updateAppliance,deleteAppliance,appliance})

}
export default ApplianceHttpRequest()