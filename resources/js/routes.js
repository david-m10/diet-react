import React from 'react';
import {Route, Switch} from 'react-router';
import Header from "./components/Header";
import DishesIndex from "./components/Dishes/DishesIndex";
import DishesCreate from "./components/Dishes/DishesCreate";
import DishesShow from "./components/Dishes/DishesShow";

const routes = (
    <div>
        <Header/>
        <Switch>
            <Route exact path='/dishes/create' component={DishesCreate}/>
            <Route path='/dishes/:id([0-9]+)' component={DishesShow}/>
            <Route exact path='/dishes/:urlData([a-zA-Z0-9/+_,=,]+)?' component={DishesIndex}/>
        </Switch>
    </div>
);

export default routes;