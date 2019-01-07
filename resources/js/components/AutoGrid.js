import React, {Component} from 'react';
import PropTypes from 'prop-types';
import {withStyles} from '@material-ui/core/styles';
import Grid from '@material-ui/core/Grid';

const styles = theme => ({
    root: {
        flexGrow: 1,
    },
    elementsCount1: {
        width: '100%',
    },
    elementsCount2: {
        width: '50%',
    },
    elementsCount3: {
        width: '33.33333%',
    },
    elementsCount4: {
        width: '25%',
    },
    elementsCount5: {
        width: '20%',
    },
    element: {
        color: theme.palette.text.secondary,
    },
});

function getElementsCount(width) {
    let count = Math.floor(width / 400);

    if (count < 1) {
        return 1;
    }

    if (count > 5) {
        return 5;
    }

    return count;
}

class AutoGrid extends Component {
    shouldComponentUpdate(nextProps, nextState) {
        if (this.props.width !== nextProps.width) {
            return getElementsCount(this.props.width) !== getElementsCount(nextProps.width);
        }

        return true;
    };

    render() {
        const {classes, elements} = this.props;
        const elementsCount = getElementsCount(this.props.width);

        return (
            <div className={classes.root}>
                <Grid container spacing={24}>
                    {elements.map(element => (
                        <Grid item
                              className={classes[`elementsCount${elementsCount}`]}
                              key={element.key}>
                            <div className={classes.element}>
                                {element}
                            </div>
                        </Grid>
                    ))}
                </Grid>
            </div>
        )
    }
};

AutoGrid.propTypes = {
    classes: PropTypes.object.isRequired,
};

export default withStyles(styles)(AutoGrid);