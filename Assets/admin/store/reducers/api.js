import * as TYPES from '../types';
// import * as TYPES from '@zix-core/store/types';
const apiReducer = (state = {
    messages: { // @TODO:: add messages
        success: '',
        error: [],
        warning: '',
        validation: {}
    },
    fetching: false,
    fetched: false,
    prevent_fetching_message: false,
}, action) => {
    switch (action.type) {
        case TYPES.API_PREVENT_FETCHING_NOTIFICATION: {
            return {...state, prevent_fetching_message: true}
        }
        case TYPES.API_FETCHING: {
            return {...state, fetching: true}
        }
        case TYPES.API_FETCHED: {
            return {...state, fetched: true, fetching: false}
        }
        default : {
            return state
        }
    }
};

export default apiReducer;