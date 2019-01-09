import React from 'react';
import ReactDOM from 'react-dom';
import {Provider} from 'react-redux';
import configureStore, {history} from './configureStore';

import App from './components/App';
import registerServiceWorker from './registerServiceWorker';

const store = configureStore();
const render = () => {
    ReactDOM.render(
        <Provider store={store}>
            <App history={history}/>
        </Provider>,
        document.getElementById('root')
    )
};

render();


// Hot reloading
if (module.hot) {
    // Reload components
    module.hot.accept('./components/App', () => {
        render()
    })
}

registerServiceWorker();
