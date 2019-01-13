import {combineReducers} from 'redux';
import {connectRouter} from 'connected-react-router';
import dishesReducer from './reducers/dishes';
import dishReducer from './reducers/dish';
import filtersReducer from './reducers/filters/filters';

export default (history) => combineReducers({
    router: connectRouter(history),
    dishes: dishesReducer,
    dish: dishReducer,
    filters: filtersReducer,
})