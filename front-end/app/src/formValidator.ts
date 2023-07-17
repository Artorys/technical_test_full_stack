import {reactive,ref} from "vue"

const formValidator = ()=>{
    const errors = ref([])
    const message = ref("")

    const has = (field : any)=> errors.value.find((err)=> err.path[0] == field)
    const any = () => Object.keys(errors.value).length > 0;
    const record = (data : any) => (errors.value = data);
    const clear = (field? : any) => {
        if (field) {
          errors.value = errors.value.filter((error) => error.path[0] !== field);
        } else {
          errors.value = [];
        }
      };

    return reactive({has,any,record,clear,message})
}

export default formValidator()
