import React from 'react';
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

class FiltersLeft extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            collapsed: [],
            filters: []
        }
    }

    handleChange = panelName => () => {
        const newCollapsed = [...this.state.collapsed];
        const index = newCollapsed.indexOf(panelName);

        index > -1
            ? newCollapsed.splice(index, 1)
            : newCollapsed.push(panelName);

        this.setState({
            collapsed: newCollapsed
        });
    };

    handleCheckboxChange = (name, value) => event => {
        this.props.history.push(`/dishes/${name}=${value}`);
    };

    render() {
        const {classes, data} = this.props;
        const {collapsed} = this.state;

        return (
            <div className={[classes.root, (this.props.hidden ? classes.hidden : '')].join(' ')}>
                {data.map((data) => {
                    const {display, name, type, items} = data;
                    return (
                        <ExpansionPanel
                            key={name}
                            expanded={!collapsed.includes(name)}
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
                                                checked={this.state[name] && this.state[name][item.id]}
                                                onClick={this.handleCheckboxChange(name, item.id)}
                                                value={'' + item.id}
                                                color="primary"
                                            />
                                        }
                                        label={item.display}
                                    />
                                })}

                            </ExpansionPanelDetails>
                        </ExpansionPanel>);
                })}
            </div>
        );
    }
}

FiltersLeft.propTypes = {
    classes: PropTypes.object.isRequired,
};

export default withRouter(withStyles(styles)(FiltersLeft));