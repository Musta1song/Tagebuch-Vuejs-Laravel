import { createWebHistory, createRouter } from "vue-router";
import MyDiary from './components/MyDiary.vue';
import NewEntry from './components/NewEntry.vue'
const routes =  [
  {
    path: "/",
    alias: "/",
    component:  MyDiary
  },

  {
    path: "/NeuerEintrag",
    name: "add",
    component: NewEntry
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;