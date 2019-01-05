import React from 'react';
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

function getElementsCountByWidth(width) {
    let maxCount = Math.floor(width / 300) || 1;

    if (maxCount > 5) {
        maxCount = 5;
    }

    return `elementsCount${maxCount}`;
}

function AutoGrid(props) {
    const {classes, elements, width} = props;
    const elementsCountClass = getElementsCountByWidth(width);

    return (
        <div className={classes.root}>
            <Grid container spacing={24}>
                {elements.map(element => (
                    <Grid item className={classes[elementsCountClass]} key={element.key}>
                        <div className={classes.element}>
                            {element}
                        </div>
                    </Grid>
                ))}
            </Grid>
        </div>
    );
}

AutoGrid.propTypes = {
    classes: PropTypes.object.isRequired,
};

export default withStyles(styles)(AutoGrid);