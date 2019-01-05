import React, {Component} from 'react';
import DishesList from './DishesList';
import {withStyles} from '@material-ui/core/styles';
import FiltersLeft from "../FiltersLeft";
import {Link} from 'react-router-dom';
import ExpansionPanel from '@material-ui/core/ExpansionPanel';
import ExpansionPanelSummary from '@material-ui/core/ExpansionPanelSummary';
import ExpandMoreIcon from '@material-ui/icons/ExpandMore';
import Clear from '@material-ui/icons/Clear';
import Typography from '@material-ui/core/Typography';
import InputLabel from '@material-ui/core/InputLabel';
import MenuItem from '@material-ui/core/MenuItem';
import FormControl from '@material-ui/core/FormControl';
import Select from '@material-ui/core/Select';
import {withRouter} from 'react-router-dom';
import AddCircleIcon from '@material-ui/icons/AddCircle';

const styles = theme => {
    return {
        root: {
            paddingLeft: '1.5rem',
            paddingRight: '1.5rem',
            paddingTop: '1rem',
            paddingBottom: '1rem',
        },
        heading: {
            fontSize: theme.typography.pxToRem(15),
            flexGrow: 1,
        },
        secondaryHeading: {
            fontSize: theme.typography.pxToRem(15),
            color: theme.palette.text.secondary,
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
        sort: {
            minWidth: 200,
        },
        filter: {
            // backgroundColor: 'red',
            // '& > *': {
            //     'minHeight': '20px !important',
            //     'maxHeight': 50,
            //
            //     '& > *': {
            //         'margin': '0 !important',
            //     },
            // },
        },
        addIcon: {
            fontSize: '2.5rem',
            color: theme.palette.text.primary,
        },
    }
};

class DishesIndex extends Component {
    state = {
        filtersLeftHidden: false,
        sort: 'sort_by=name/sort_type=asc',
    };

    clearFilters() {

    }

    toggleFiltersDisplay = () => () => {
        this.setState({
            filtersLeftHidden: !this.state.filtersLeftHidden,
        });
    };

    onChangeSort = () => (event) => {
        const sort = event.target.value;
        this.setState({sort});
        this.props.history.push(`/dishes/${sort}`);
    };

    render() {
        const {classes} = this.props;

        return (
            <div className={classes.root}>
                <div className={classes.top}>
                    <div className={classes.topLeft}>
                        <ExpansionPanel
                            className={classes.filter}
                            key={0}
                            // expanded={this.state.filtersLeftHidden}
                            expanded={false}
                            onChange={this.toggleFiltersDisplay()}>
                            <ExpansionPanelSummary expandIcon={<ExpandMoreIcon/>}>
                                <Typography className={classes.heading}>Filtry</Typography>
                                <Typography className={classes.secondaryHeading}>
                                    <Clear/>
                                </Typography>
                            </ExpansionPanelSummary>
                        </ExpansionPanel>
                    </div>

                    <div className={classes.topRight}>
                        <div>
                            <FormControl className={`${classes.formControl} ${classes.sort}`}>
                                <InputLabel htmlFor="sort_by">Sortuj według</InputLabel>
                                <Select
                                    value={this.state.sort}
                                    onChange={this.onChangeSort()}
                                    inputProps={{
                                        name: 'sort_by',
                                        id: 'sort_by',
                                    }}
                                >
                                    <MenuItem value='sort_by=name/sort_type=asc'>Nazwa rosnąco</MenuItem>
                                    <MenuItem value='sort_by=name/sort_type=desc'>Nazwa malejąco</MenuItem>
                                    <MenuItem
                                        value='sort_by=time_preparation/sort_type=asc'>Czas przygotowania rosnąco
                                    </MenuItem>
                                    <MenuItem
                                        value='sort_by=time_preparation/sort_type=desc'>Czas przygotowania malejąco
                                    </MenuItem>
                                    <MenuItem
                                        value='sort_by=time_making/sort_type=asc'>Czas robienia rosnąco
                                    </MenuItem>
                                    <MenuItem
                                        value='sort_by=time_making/sort_type=desc'>Czas robienia malejąco
                                    </MenuItem>
                                </Select>
                            </FormControl>
                        </div>
                        <div className="top-right-options">
                            <Link to='/dishes/create'>
                                <AddCircleIcon className={classes.addIcon}/>
                            </Link>
                        </div>
                    </div>
                </div>

                <div className="middle d-flex">
                    <FiltersLeft
                        hidden={this.state.filtersLeftHidden}
                        data={[
                            {
                                'display': 'Tagi',
                                'name': 'tags',
                                'type': 'search',
                                'position': 1,
                            },
                            {
                                'display': 'Tagi własne',
                                'name': 'tags_own',
                                'type': 'checkbox',
                                items: [
                                    {
                                        id: 1,
                                        display: 'Kuchnia polska',
                                    },
                                    {
                                        id: 2,
                                        display: 'Wysoka ilość białka',
                                    }
                                ],
                                'position': 2,
                            },
                            {
                                'display': 'Produkty',
                                'name': 'products',
                                'type': 'search',
                                'position': 3,
                            },
                            {
                                'display': 'Czas przygotowania',
                                'name': 'time_preparation',
                                'type': 'range',
                                'min': 1,
                                'max': 10,
                                'position': 4,
                            },
                        ]}
                        cookiePrefix="FiltersDishesIndex"
                    />

                    <main className={classes.main}>
                        <DishesList key={this.props.location.pathname}/>
                    </main>
                </div>
            </div>
        )
    }
}

export default withRouter(withStyles(styles)(DishesIndex));