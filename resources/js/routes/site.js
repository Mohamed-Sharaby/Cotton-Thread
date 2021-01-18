import Home from '../components/site/home/Main.vue';
import SignIn from '../components/site/auth/SignIn.vue';

export const routes =[
    { path: '/', component: Home, name: "Home",},
    { path: '/sign-in', component: SignIn, name: "SignIn", meta:{guest: true}},
];