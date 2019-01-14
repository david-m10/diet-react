import React from 'react';
import {connect} from 'react-redux';
import * as actions from '../../actions/index';
import {createBrowserHistory} from 'history';
import DishCard from './DishCard';
import AutoGrid from '../AutoGrid';
import Measure from 'react-measure';

class DishesList extends React.Component {
    state = {
        dimensions: {
            width: -1,
            height: -1,
        },
    };

    componentDidMount() {
        console.log('Dishes list mounted');
        const history = createBrowserHistory();
        this.props.fetchDishes(history.location.pathname);
    }

    render() {
        console.log('Dishes list rendering...');
        // const width = Math.ceil(this.state.dimensions.width);

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
                    width={1200}
                />
            </div>
        )
    }

    componentDidUpdate(prevProps) {
        if (prevProps.pathname !== this.props.pathname) {
            console.log(prevProps.pathname, this.props.pathname);
            this.props.fetchDishes(this.props.pathname);
        }
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