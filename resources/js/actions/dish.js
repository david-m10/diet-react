import * as actionTypes from './actionTypes';
import axios from 'axios';

export const fetchDishSuccess = (dish) => {
    return {
        type: actionTypes.FETCH_DISH_SUCCESS,
        dish
    };
};

export const fetchDishFail = (error) => {
    return {
        type: actionTypes.FETCH_DISH_FAIL,
        error
    };
};

export const fetchDishStart = () => {
    return {
        type: actionTypes.FETCH_DISH_START
    };
};

export const fetchDish = (id) => {
    return dispatch => {
        dispatch(fetchDishStart());
        console.log(id);
        axios
            .get(`/api/dishes/${id}`)
            .then(res => {
                console.log(res.data);
                dispatch(fetchDishSuccess(res.data));
            })
            .catch(err => {
                dispatch(fetchDishFail(err));
            });
    };
};