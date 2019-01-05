import React, {Component} from 'react';
import {connect} from 'react-redux';
import * as actions from '../../actions/index';
import {createBrowserHistory} from 'history';
import DishCard from './DishCard';
import AutoGrid from '../AutoGrid';
import Measure from 'react-measure';

class DishesList extends Component {
    state = {
        dimensions: {
            width: -1,
            height: -1,
        },
    };

    componentDidMount() {
        const history = createBrowserHistory();
        this.props.fetchDishes(history.location.pathname);
    }

    render() {
        const {width, height} = this.state.dimensions;

        return (
            <Measure
                bounds
                onResize={contentRect => {
                    this.setState({dimensions: contentRect.bounds})
                }}
            >
                {({measureRef}) => (
                    <div ref={measureRef}>
                        <div>
                            {this.props.loading && 'Loading...'}
                            <AutoGrid
                                elements={this.props.dishes.map(dish => (
                                    <DishCard
                                        key={dish.id}
                                        {...dish}
                                    />
                                ))}
                                width={Math.ceil(width)}
                            />
                        </div>
                    </div>
                )}
            </Measure>
        )
    }

    componentWillUnmount() {
        this.props.clearDishes();
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
        clearDishes: () => dispatch(actions.clearDishes()),
    };
};

export default connect(mapStateToProps, mapDispatchToProps)(DishesList);