import React, {PureComponent} from 'react';
import PropTypes from "prop-types";
import ExpansionPanel from '@material-ui/core/ExpansionPanel';
import ExpansionPanelSummary from '@material-ui/core/ExpansionPanelSummary';
import ExpandMoreIcon from '@material-ui/icons/ExpandMore';
import Clear from '@material-ui/icons/Clear';
import Typography from '@material-ui/core/Typography';
import {withStyles} from '@material-ui/core/styles';
import {withRouter} from 'react-router-dom';

const styles = theme => {
    return {
        heading: {
            fontSize: theme.typography.pxToRem(15),
            flexGrow: 1,
        },
        secondaryHeading: {
            fontSize: theme.typography.pxToRem(15),
            color: theme.palette.text.secondary,
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
    }
};

class DishesFiltersHeading extends PureComponent {
    render() {
        const {classes} = this.props;

        return (
            <ExpansionPanel
                className={classes.filter}
                key={0}
                // expanded={this.state.filtersLeftHidden}
                expanded={false}
                onChange={this.props.toggleFiltersDisplay()}>
                <ExpansionPanelSummary expandIcon={<ExpandMoreIcon/>}>
                    <Typography className={classes.heading}>Filtry</Typography>
                    <Typography className={classes.secondaryHeading}>
                        <Clear/>
                    </Typography>
                </ExpansionPanelSummary>
            </ExpansionPanel>
        );
    }
}

DishesFiltersHeading.propTypes = {
    toggleFiltersDisplay: PropTypes.func.isRequired
};

export default withRouter(withStyles(styles)(DishesFiltersHeading));


