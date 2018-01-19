// https://vuex.vuejs.org/en/mutations.html
import * as TYPES from './types';

/* eslint-disable no-param-reassign */
export default {
    [TYPES.MAIN_SET_FETCHING](state, obj) {
        state.fetching = obj.fetching;
    },
    [TYPES.MAIN_SET_MESSAGE](state, obj) {
        state.messages[obj.type] = obj.message;
    },
    [TYPES.TOGGLE_SIDEBAR](state) {
        state.sidebar.show = !state.sidebar.show;
    },
    [TYPES.TOGGLE_SIDEBAR_CLIPPED](state) {
        state.sidebar.clipped = !state.sidebar.clipped;
    },
    [TYPES.TOGGLE_SIDEBAR_MINI_VARIANT](state) {
        state.sidebar.mini_variant = !state.sidebar.mini_variant;
    },
    [TYPES.SET_BREADCRUMBS](state, items) {
        state.breadcrumbs = items;
    }
}
