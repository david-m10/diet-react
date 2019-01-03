import * as actionTypes from './actionTypes';
import axios from 'axios';

export const fetchDishesSuccess = (dishes) => {
    return {
        type: actionTypes.FETCH_DISHES_SUCCESS,
        dishes
    };
};

export const fetchDishesFail = (error) => {
    return {
        type: actionTypes.FETCH_DISHES_FAIL,
        error
    };
};

export const fetchDishesStart = () => {
    return {
        type: actionTypes.FETCH_DISHES_START
    };
};

export const fetchDishes = () => {
    return dispatch => {
        dispatch(fetchDishesStart());
        axios
            .get('/api/dishes')
            .then(res => {
                const fetchedDishes = [];

                for (const key of res.data) {
                    fetchedDishes.push({
                        ...key,
                    });
                }
                dispatch(fetchDishesSuccess(fetchedDishes));
            })
            .catch(err => {
                dispatch(fetchDishesFail(err));
            });
    };
};