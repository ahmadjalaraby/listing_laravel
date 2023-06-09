import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
import { ZiggyVue } from 'ziggy'
import { InertiaProgress } from '@inertiajs/progress'
import '../css/app.css'

InertiaProgress.init({
  delay: 0,
  color: '#4Ba563',
  includeCSS: true,
  showSpinner: true,
})

createInertiaApp({
  progress: true,

  // Docs
  // resolve: name => {
  //   const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
  //   let page = pages[`./Pages/${name}.vue`]
  //   page.default.layout = page.default.layout || MainLayout
  //   return page
  // },

  // Course
  resolve: async (name) => {
    const pages = import.meta.glob('./Pages/**/*.vue')
    const page = await pages[`./Pages/${name}.vue`]()
    page.default.layout = page.default.layout || MainLayout
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .mount(el)
  },
})