import * as actionTypes from '../actions/actionTypes';
import {updateObject} from './utilities';

const initialState = {
    dish: {
        name: '',
        description: '',
    },
    loading: false,
};

const fetchDishStart = (state) => {
    return updateObject(state, {
        loading: true
    });
};

const fetchDishSuccess = (state, action) => {
    console.log(action);
    return updateObject(state, {
        dish: action.dish,
        loading: false
    });
};

const fetchDishFail = (state) => {
    return updateObject(state, {
        loading: false
    });
};

const reducer = (state = initialState, action) => {
    switch (action.type) {
        case actionTypes.FETCH_DISH_START:
            return fetchDishStart(state);
        case actionTypes.FETCH_DISH_SUCCESS:
            return fetchDishSuccess(state, action);
        case actionTypes.FETCH_DISH_FAIL:
            return fetchDishFail(state);
        default:
            return state;
    }
};

export default reducer;