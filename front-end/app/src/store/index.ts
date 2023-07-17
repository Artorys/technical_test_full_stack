import type { IAppliance } from "@/api/interfaces/IAppliance"
import { createStore } from "vuex"

export const store = createStore({
  state () {
    return {
      isClosed : false,
      }
    },
  mutations: {
    toggle (state) {
      state.isClosed = !state.isClosed
      return state.isClosed
    },
    }
})
export default store