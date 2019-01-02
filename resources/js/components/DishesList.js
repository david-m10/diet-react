import axios from 'axios'
import React, {Component} from 'react'
import {Link} from 'react-router-dom'

class DishesList extends Component {
    constructor() {
        super();
        this.state = {
            dishes: []
        };
    }

    componentDidMount() {
        axios.get('/api/dishes').then(response => {
            this.setState({
                dishes: response.data
            })
        });
    }

    render() {
        const {dishes} = this.state;

        return (
            <div className='container py-4'>
                <div className='row justify-content-center'>
                    <div className='col-md-8'>
                        <div className='card'>
                            <div className='card-header'>All dishes</div>
                            <div className='card-body'>
                                <Link className='btn btn-primary btn-sm mb-3' to='/create'>
                                    Create new dish
                                </Link>
                                <ul className='list-group list-group-flush'>
                                    {dishes.map(dish => (
                                        <Link
                                            className='list-group-item list-group-item-action d-flex justify-content-between align-items-center'
                                            to={`/${dish.id}`}
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

export default DishesList;