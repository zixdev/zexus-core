import {combineReducers} from "redux";
import app from './app';
import api from './api';
import auth from './auth';


export default combineReducers({
    app,
    api,
    auth
});