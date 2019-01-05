import React, {Component} from 'react';
import {withRouter} from 'react-router-dom';

class ButtonChangingHistory extends Component {
    render() {
        return (
            <button onClick={() => {
                // this.props.fetchDishes();
                this.props.history.push("/dishes/aa=bb")
            }
            }>Change</button>
        )
    }
}

export default withRouter(ButtonChangingHistory);