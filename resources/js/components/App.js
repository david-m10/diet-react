import React, {Component} from 'react';
import {Route, Switch} from 'react-router-dom'
import {MuiThemeProvider, createMuiTheme} from '@material-ui/core/styles';
import blueGrey from '@material-ui/core/colors/blueGrey';
import Header from './Header'
import DishesIndex from "./Dishes/DishesIndex";
import DishesCreate from "./Dishes/DishesCreate";
import DishesShow from "./Dishes/DishesShow";

const theme = createMuiTheme({
    palette: {
        primary: blueGrey,
    },
});

export default class App extends Component {
    render() {
        return (
            <div>
                <MuiThemeProvider theme={theme}>
                    <Header/>
                    <Switch>
                        <Route exact path='/dishes/create' component={DishesCreate}/>
                        <Route path='/dishes/:id([0-9]+)' component={DishesShow}/>
                        <Route exact path='/dishes/:urlData([a-zA-Z0-9/+_,=,]+)?' component={DishesIndex}/>
                    </Switch>
                </MuiThemeProvider>
            </div>
        )
    }
}