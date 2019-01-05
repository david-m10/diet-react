import React, {Component} from 'react';
import {connect} from 'react-redux';
import * as actions from '../../actions/index';
import {createBrowserHistory} from 'history';
import DishCard from './DishCard';
import AutoGrid from '../AutoGrid';

class DishesList extends Component {
    componentDidMount() {
        const history = createBrowserHistory();
        this.props.fetchDishes(history.location.pathname);
    }

    render() {
        return (
            <div>
                {this.props.loading && 'Loading...'}
                <AutoGrid
                    elements={this.props.dishes.map(dish => (
                        <DishCard
                            key={dish.id}
                            {...dish}
                        />
                    ))}
                />
            </div>
        )
    }
}

const mapStateToProps = state => {
    return {
        dishes: state.dishes.dishes,
        loading: state.dishes.loading
    };
};

const mapDispatchToProps = dispatch => {
    return {
        fetchDishes: (pathname) => dispatch(actions.fetchDishes(pathname)),
    };
};

export default connect(mapStateToProps, mapDispatchToProps)(DishesList);