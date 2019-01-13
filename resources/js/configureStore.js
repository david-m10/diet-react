import {createBrowserHistory} from 'history';
import {applyMiddleware, compose, createStore} from 'redux';
import {routerMiddleware} from 'connected-react-router';
import createRootReducer from './reducers';
import thunk from 'redux-thunk';
import createDebounce from 'redux-debounced';

export const history = createBrowserHistory();

export default function configureStore(preloadedState) {
    const composeEnhancer = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;
    const store = createStore(
        createRootReducer(history), // root reducer with router state
        preloadedState,
        composeEnhancer(
            applyMiddleware(
                routerMiddleware(history), // for dispatching history actions
                thunk,
                createDebounce(),
            ),
        ),
    );

    // Hot reloading
    if (module.hot) {
        // Enable Webpack hot module replacement for reducers
        module.hot.accept('./reducers', () => {
            store.replaceReducer(createRootReducer(history));
        });
    }

    return store;
}