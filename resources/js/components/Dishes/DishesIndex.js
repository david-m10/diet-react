import React from 'react';
import {withStyles} from '@material-ui/core/styles';
import {withRouter} from 'react-router-dom';
import {Link} from 'react-router-dom';

import DishesList from './DishesList';
import FiltersLeft from "../FiltersLeft";
import DishesSortingSelect from './DishesSortingSelect';
import DishesFiltersHeading from './DishesFiltersHeading';

import AddCircleIcon from '@material-ui/icons/AddCircle';

const styles = () => {
    return {
        root: {
            paddingLeft: '1.5rem',
            paddingRight: '1.5rem',
            paddingTop: '1rem',
            paddingBottom: '1rem',
        },
        main: {
            flexGrow: 1,
        },
        top: {
            display: 'flex',
            alignItems: 'center',
            minHeight: 80,
            width: '100%',
        },
        topLeft: {
            width: 360,
            minWidth: 360,
            paddingRight: 20,
        },
        topRight: {
            flexGrow: 1,
            display: 'flex',
            justifyContent: 'space-between',
            alignItems: 'center',
        },
        MuiButtonBase: {
            minHeight: 50,
            maxHeight: 50,
        },
        addIcon: {
            fontSize: '2.5rem',
        },
    }
};

class DishesIndex extends React.Component {
    state = {
        filtersLeftHidden: false,
    };

    toggleFiltersDisplay = () => () => {
        this.setState({
            filtersLeftHidden: !this.state.filtersLeftHidden,
        });
    };

    componentDidMount() {
        console.log('Dishes index mounted');
    }

    render() {
        console.log('Dishes index rendering...');
        const {classes} = this.props;

        return (
            <div className={classes.root}>
                <div className={classes.top}>
                    <div className={classes.topLeft}>
                        <DishesFiltersHeading
                            toggleFiltersDisplay={this.toggleFiltersDisplay}
                        />
                    </div>

                    <div className={classes.topRight}>
                        <DishesSortingSelect/>
                        <div className="top-right-options">
                            <Link to='/dishes/create'>
                                <AddCircleIcon className={classes.addIcon} color="primary"/>
                            </Link>
                        </div>
                    </div>
                </div>

                <div className="middle d-flex">
                    <FiltersLeft url={'dishes'}/>
                    <main className={classes.main}>
                        <DishesList
                            apiUrl={'dishes'}
                            pathname={this.props.location.pathname}
                        />
                    </main>
                </div>
            </div>
        )
    }

    componentDidUpdate(prevProps) {
        console.log('Dishes index updated');
        console.log({
            prevProps
        });
    }
}

export default withRouter(withStyles(styles)(DishesIndex));