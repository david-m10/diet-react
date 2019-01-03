import React, {Component} from 'react';
import {connect} from 'react-redux';
import {Link} from 'react-router-dom';
import * as actions from '../../actions/index';

class DishesIndex extends Component {
    componentDidMount() {
        this.props.fetchDishes();
    }

    render() {
        return (
            <div className='container py-4'>
                <div className='row justify-content-center'>
                    <div className='col-md-8'>
                        <div className='card'>
                            <div className='card-header'>All dishes</div>
                            <div className='card-body'>
                                <Link className='btn btn-primary btn-sm mb-3' to='/dishes/create'>
                                    Create new dish
                                </Link>
                                <ul className='list-group list-group-flush'>
                                    {this.props.loading && 'Loading...'}
                                    {this.props.dishes.map(dish => (
                                        <Link
                                            className='list-group-item list-group-item-action d-flex justify-content-between align-items-center'
                                            to={`dishes/${dish.id}`}
                                            key={dish.id}
                                        >
                                            {dish.name}
                                            <span className='badge badge-primary badge-pill'>
                            Some text
                          </span>
                                        </Link>
                                    ))}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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
        fetchDishes: () => dispatch(actions.fetchDishes())
    };
};

export default connect(mapStateToProps, mapDispatchToProps)(DishesIndex);