import './assets/main.css'

import { createApp, defineAsyncComponent } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import FormView from "./components/Form/FormView.vue"

const app = createApp(App)

app.use(router)
app.use(store)

app.mount('#app')
