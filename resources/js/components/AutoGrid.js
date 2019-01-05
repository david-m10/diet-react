import React from 'react';
import PropTypes from 'prop-types';
import {withStyles} from '@material-ui/core/styles';
import Grid from '@material-ui/core/Grid';

const styles = theme => ({
    root: {
        flexGrow: 1,
    },
    elementParent: {
        width: '25%',
    },
    element: {
        // textAlign: 'center',
        // width: '20%',
        color: theme.palette.text.secondary,
        // marginBottom: 100
    },
});

function AutoGrid(props) {
    const {classes, elements} = props;

    return (
        <div className={classes.root}>
            <Grid container spacing={24}>
                {elements.map(element => (
                    <Grid item className={classes.elementParent} key={element.key}>
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