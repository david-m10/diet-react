import React, {Component} from 'react';
import {compose} from 'redux';
import {connect} from 'react-redux';
import PropTypes from 'prop-types';
import {withStyles} from '@material-ui/core/styles';
import ExpansionPanel from '@material-ui/core/ExpansionPanel';
import ExpansionPanelDetails from '@material-ui/core/ExpansionPanelDetails';
import ExpansionPanelSummary from '@material-ui/core/ExpansionPanelSummary';
import Typography from '@material-ui/core/Typography';
import ExpandMoreIcon from '@material-ui/icons/ExpandMore';
import Clear from '@material-ui/icons/Clear';
import FormControlLabel from '@material-ui/core/FormControlLabel';
import Checkbox from '@material-ui/core/Checkbox';
import {withRouter} from 'react-router-dom';
import TextField from '@material-ui/core/TextField';
import * as actions from '../actions/index';

const styles = theme => ({
    root: {
        width: 360,
        minWidth: 360,
        paddingRight: 20,
    },
    hidden: {
        display: 'none',
    },
    heading: {
        fontSize: theme.typography.pxToRem(15),
        flexGrow: 1,
    },
    secondaryHeading: {
        fontSize: theme.typography.pxToRem(15),
        color: theme.palette.text.secondary,
    },
    checkboxes: {
        display: 'flex',
        flexDirection: 'column',
    },
});

class FiltersLeft extends Component {
    handleChange = panelName => () => {
        const newCollapsed = [...this.props.collapsed];
        const index = newCollapsed.indexOf(panelName);

        index > -1
            ? newCollapsed.splice(index, 1)
            : newCollapsed.push(panelName);

        this.setState({
            collapsed: newCollapsed
        });
    };

    handleCheckboxChange = (name, value) => () => {
        this.props.changeFilter(name, value);
// this.props.history.push(`/dishes/${event.target.name}=${event.target.value}`);
    };

    handleSearchChange = (name) => (event) => {
        const value = event.target.value;

        if (!value.length) {
            this.props.history.push(`/dishes`);
            return;
        }

        this.props.history.push(`/dishes/${name}=${value}`);
    };

    componentDidMount() {
        this.props.fetchFilters(this.props.url);
    }

    render() {
        const {classes, collapsed, filters} = this.props;

        return (
            <div className={[classes.root, (this.props.collapsed ? classes.hidden : '')].join(' ')}>
                {filters.map((filter) => {
                    const {display, name, type, items} = filter;
                    return (
                        <ExpansionPanel
                            key={name}
                            expanded={!filter.collapsed}
                            name={name}
                            onChange={this.handleChange(name)}>
                            <ExpansionPanelSummary expandIcon={<ExpandMoreIcon/>}>
                                <Typography className={classes.heading}>{display}</Typography>
                                <Typography className={classes.secondaryHeading}>
                                    <Clear/>
                                </Typography>
                            </ExpansionPanelSummary>
                            <ExpansionPanelDetails className={classes.checkboxes}>
                                {type === 'checkbox' && Array.isArray(items) && items.map((item) => {
                                    return <FormControlLabel
                                        key={item.id}
                                        control={
                                            <Checkbox
                                                checked={filter.checked}
                                                onClick={this.handleCheckboxChange(name, item.id)}
                                                value={'' + item.id}
                                                color="primary"
                                            />
                                        }
                                        label={item.display}
                                    />
                                })}

                                {type === 'search_with_items' && Array.isArray(items) && items.map((item) => {
                                    return <TextField
                                        key={item.name}
                                        label={item.display}
                                        type="search"
                                        className={classes.textField}
                                        margin="normal"
                                        onChange={this.handleSearchChange(item.name)}
                                    />
                                })}

                                {type === 'search' && (
                                    <TextField
                                        id="standard-search"
                                        label="Search field"
                                        type="search"
                                        className={classes.textField}
                                        margin="normal"
                                        onChange={this.handleSearchChange(name)}
                                    />
                                )}

                            </ExpansionPanelDetails>
                        </ExpansionPanel>);
                })}
            </div>
        );
    }
}

FiltersLeft.propTypes = {
    classes: PropTypes.object.isRequired,
    url: PropTypes.string.isRequired,
};

const mapStateToProps = state => {
    return {
        filters: state.filters.filters,
        collapsed: state.filters.collapsed,
        loading: state.filters.loading,
    };
};

const mapDispatchToProps = dispatch => {
    return {
        fetchFilters: () => dispatch(actions.fetchFilters()),
        changeFilter: (name, value) => dispatch(actions.changeFilter(name, value)),
        clearFilter: (name) => dispatch(actions.clearFilter(name)),
        toggleCollapsedFilter: (name) => dispatch(actions.toggleCollapseFilter(name)),
    };
};

export default compose(
    connect(mapStateToProps, mapDispatchToProps),
    withRouter,
    withStyles(styles)
)(FiltersLeft);
