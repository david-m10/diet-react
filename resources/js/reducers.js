import {combineReducers} from 'redux';
import {connectRouter} from 'connected-react-router';
import dishesReducer from './reducers/dishes';
import dishReducer from './reducers/dish';

export default (history) => combineReducers({
    router: connectRouter(history),
    dishes: dishesReducer,
    dish: dishReducer,
})