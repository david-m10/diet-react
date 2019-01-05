import React, {Component} from 'react';
import {Link} from 'react-router-dom';
import DishesList from './DishesList';
import AutoGrid from '../AutoGrid';
import ButtonChangingHistory from '../ButtonChangingHistory';

class DishesIndex extends Component {
    render() {
        return (
            <div>
                <Link className='btn btn-primary btn-sm mb-3' to='/dishes/create'>
                    Create new dish
                </Link>
                <DishesList key={this.props.location.pathname}/>
                <ButtonChangingHistory/>
            </div>
        )
    }
}

export default DishesIndex;