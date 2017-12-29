import axios from 'axios'
import interceptors from './interceptors'

// allow use http client without Vue instance
export const http = axios.create({
    baseURL: '/api/'
})

/**
 * Helper method to set the header with the token
 */
http.defaults.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
http.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
http.defaults.headers.common.Authorization = `Bearer ${window.Auth.token}`;

// receive store and data by options
// https://vuejs.org/v2/guide/plugins.html
export default function install(Vue, { store, router }) {
    interceptors(http, store, router)
    // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/defineProperty
    Object.defineProperty(Vue.prototype, '$http', {
        get() {
            store.dispatch('setFetching', { fetching: false });
            store.dispatch('resetMessages');
            return http
        }
    })
}
