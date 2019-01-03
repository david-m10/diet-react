import React, {Component} from 'react';
import {Route, Switch} from 'react-router-dom'
import Header from './Header'
import DishesList from "./Dishes/DishesIndex";
import DishesCreate from "./Dishes/DishesCreate";
import DishesShow from "./Dishes/DishesShow";

export default class App extends Component {
    render() {
        return (
            <div>
                <Header/>
                <Switch>
                    <Route exact path='/' component={DishesList}/>
                    <Route exact path='/dishes/create' component={DishesCreate}/>
                    <Route path='/dishes/:id' component={DishesShow}/>
                </Switch>
            </div>
        )
    }
}