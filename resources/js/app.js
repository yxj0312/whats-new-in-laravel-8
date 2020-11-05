/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import {createApp} from 'vue'
import ExampleComponent from './components/ExampleComponent.vue'
import AnotherComponent from './components/AnotherComponent.vue'

createApp({
    components: {
        ExampleComponent, AnotherComponent
    }
}).mount('#app')