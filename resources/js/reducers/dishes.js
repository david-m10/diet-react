import * as actionTypes from '../actions/actionTypes';
import {updateObject} from './utilities';

const initialState = {
    dishes: [],
    loading: false,
};

const fetchDishesStart = (state) => {
    return updateObject(state, {
        loading: true
    });
};

const fetchDishesSuccess = (state, action) => {
    return updateObject(state, {
        dishes: action.dishes,
        loading: false
    });
};

const fetchDishesFail = (state) => {
    return updateObject(state, {
        loading: false
    });
};

const reducer = (state = initialState, action) => {
    switch (action.type) {
        case actionTypes.FETCH_DISHES_START:
            return fetchDishesStart(state, action);
        case actionTypes.FETCH_DISHES_SUCCESS:
            return fetchDishesSuccess(state, action);
        case actionTypes.FETCH_DISHES_FAIL:
            return fetchDishesFail(state, action);
        default:
            return state;
    }
};

export default reducer;