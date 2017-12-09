import * as TYPES from '../types';
// import * as TYPES from '@zix-core/store/types';
const apiReducer = (state = {
    user: {},
    token: null
}, action) => {
    switch (action.type) {
        case TYPES.AUTH_LOGIN_USER: {
            return {...state, user: action.payload}
        }
        case TYPES.AUTH_LOGOUT_USER: {
            return {...state, user: {}, token: null}
        }
        case TYPES.AUTH_SET_TOKEN: {
            return {...state, token: action.payload}
        }

        default : {
            return state
        }
    }
};

export default apiReducer;