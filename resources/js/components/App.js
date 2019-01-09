import React, {Component} from 'react';
import PropTypes from 'prop-types';
import {MuiThemeProvider, createMuiTheme} from '@material-ui/core/styles';
import blueGrey from '@material-ui/core/colors/blueGrey';
import {ConnectedRouter} from 'connected-react-router';
import routes from '../routes';

const theme = createMuiTheme({
    palette: {
        primary: blueGrey,
    },
});

const App = ({history}) => {
    return (
        <MuiThemeProvider theme={theme}>
            <ConnectedRouter history={history}>
                {routes}
            </ConnectedRouter>
        </MuiThemeProvider>
    )
};

App.propTypes = {
    history: PropTypes.object,
};

export default App;