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

const clearDishes = (state) => {
    return updateObject(state, {
        dishes: []
    });
};

const reducer = (state = initialState, action) => {
    switch (action.type) {
        case actionTypes.FETCH_DISHES_START:
            return fetchDishesStart(state);
        case actionTypes.FETCH_DISHES_SUCCESS:
            return fetchDishesSuccess(state, action);
        case actionTypes.FETCH_DISHES_FAIL:
            return fetchDishesFail(state);
        case actionTypes.CLEAR_DISHES:
            return clearDishes(state);
        default:
            return state;
    }
};

export default reducer;