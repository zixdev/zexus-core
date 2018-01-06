// https://vuex.vuejs.org/en/actions.html
import * as TYPES from './types';

export default {

    setFetching({commit}, obj = {fetching: true}) {
        commit(TYPES.MAIN_SET_FETCHING, obj);
    },

    setMessage({commit}, obj) {
        commit(TYPES.MAIN_SET_MESSAGE, obj);
    },

    resetMessages({commit}) {
        commit(TYPES.MAIN_SET_MESSAGE, {type: 'success', message: ''});
        commit(TYPES.MAIN_SET_MESSAGE, {type: 'error', message: []});
        commit(TYPES.MAIN_SET_MESSAGE, {type: 'warning', message: ''});
        commit(TYPES.MAIN_SET_MESSAGE, {type: 'validation', message: {}});
    },

    toggleSidebar({commit}) {
        commit(TYPES.TOGGLE_SIDEBAR);
    },


    setBreadCrumbs({commit}, items) {
        let routes = ['dashboard.index'];
        items.map(item => routes.push(item));
        // TODO:: add logic here
        // each item in items must be object
        // item = {
        //     display_text: '',
        //     route_name: '',
        //     route_path: '',
        // };
        commit(TYPES.SET_BREADCRUMBS, routes);
    }
}
