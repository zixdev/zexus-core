import * as TYPES from '../types';
// import * as TYPES from '@zix-core/store/types';
const appReducer = (state = {
    sidebar: true,
}, action) => {
    switch (action.type) {
        case TYPES.APP_TOGGLE_SIDEBAR: {
            return {...state, sidebar: !state.sidebar}
        }
        default : {
            return state
        }
    }
};

export default appReducer;