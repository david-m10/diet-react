import React from 'react';
import PropTypes from 'prop-types';
import IconButton from '@material-ui/core/IconButton';
import Badge from '@material-ui/core/Badge';
import {withStyles} from '@material-ui/core/styles';
import Favorite from '@material-ui/icons/Favorite';

const styles = theme => ({
    badge: {
        top: 10,
        right: -15,
        // The border color match the background color.
        border: `1px solid ${
            theme.palette.type === 'light' ? theme.palette.grey[200] : theme.palette.grey[900]
            }`,
    },
});

function FavoriteBadge(props) {
    const {classes} = props;

    return (
        <IconButton className={props.className} aria-label="Cart">
            <Badge badgeContent={props.count} color="secondary" classes={{badge: classes.badge}}>
                <Favorite color='secondary'/>
            </Badge>
        </IconButton>
    );
}

FavoriteBadge.propTypes = {
    count: PropTypes.number.isRequired,
    classes: PropTypes.object.isRequired,
};

export default withStyles(styles)(FavoriteBadge);