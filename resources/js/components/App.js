import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter, Route, Switch} from 'react-router-dom'
import Header from './Header'
import DishesList from "./Dishes/DishesIndex";
import DishesCreate from "./Dishes/DishesCreate";

export default class App extends Component {
    render() {
        return (
            <div>
                <Header/>
                <Switch>
                    <Route exact path='/' component={DishesList}/>
                    <Route exact path='/dishes/create' component={DishesCreate}/>
                </Switch>
            </div>
        )
    }
}