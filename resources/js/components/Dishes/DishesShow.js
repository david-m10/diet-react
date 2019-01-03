import React, {Component} from 'react';
import {connect} from 'react-redux';
import * as actions from '../../actions/index';

class DishesShow extends Component {
    componentDidMount() {
        this.props.fetchDish(this.props.match.params.id);
    }

    render() {
        return (
            <div className='container py-4'>
                <div className='row justify-content-center'>
                    <div className='col-md-8'>
                        <div className='card'>
                            <div className='card-header'>{this.props.dish.name}</div>
                            <div className='card-body'>
                                <p>{this.props.dish.description}</p>

                                <button className='btn btn-primary btn-sm'>
                                    Do something
                                </button>

                                <hr/>

                                <ul className='list-group mt-3'>List something</ul>
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
        dish: state.dish.dish,
        loading: state.dish.loading
    };
};

const mapDispatchToProps = dispatch => {
    return {
        fetchDish: (id) => dispatch(actions.fetchDish(id))
    };
};

export default connect(mapStateToProps, mapDispatchToProps)(DishesShow)