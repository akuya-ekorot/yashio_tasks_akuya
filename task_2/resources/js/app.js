import './bootstrap';

import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

// import components
import App from './components/App.vue';
import Post from './components/Post.vue';
import PostForm from './components/PostForm.vue';
import Posts from './components/Posts.vue';
import Categories from './components/Categories.vue';

// vue-router
const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: Posts },
        { path: '/posts/:id', component: Post },
        { path: '/categories/:id', component: Categories },
        { path: '/posts/create', component: PostForm },
        { path: '/posts/:id/edit', component: PostForm },
    ],
});

const app = createApp(App);
app.use(router);
app.mount("#app");
