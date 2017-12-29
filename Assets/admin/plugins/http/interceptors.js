import {isArray} from "lodash";

export default (http, store, router) => {
    // https://github.com/mzabriskie/axios#interceptors
    http.interceptors.response.use(
        response => {
            store.dispatch('setFetching', {fetching: false});
            // if res msg
            if (response.data.message) {
                store.dispatch('setMessage', {type: 'success', message: response.data.message})
            }
            return response;
        },
        /**
         * This is a central point to handle all
         * error messages generated by HTTP
         * requests
         */
        (error) => {
            const {response} = error;

            /**
             * Error messages are sent in arrays
             */
            if (isArray(response.data) && response.data.messages) {
                store.dispatch('setMessage', {type: 'error', message: response.data.messages});
                /**
                 * Laravel generated validation errors are sent in an object
                 */
            } else if (response.data.errors) {
                store.dispatch('setMessage', {type: 'validation', message: response.data.errors})
            } else {
                store.dispatch('setMessage', {type: 'error', message: 'Internal Server Error'});
            }

            if ([403].indexOf(response.status) > -1) {
                store.dispatch('setMessage', {type: 'error', message: "You're not allowed to do this action"});
            }

            if ([404].indexOf(response.status) > -1) {
                store.dispatch('setMessage', {type: 'error', message: 'Please Check your connection'});
            }

            store.dispatch('setFetching', {fetching: false});

            return Promise.reject(error)
        }
    )
}
