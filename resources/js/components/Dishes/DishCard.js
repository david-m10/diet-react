import React from "react";
import PropTypes from "prop-types";
import {withStyles} from "@material-ui/core/styles";
import Card from "@material-ui/core/Card";
import CardActionArea from "@material-ui/core/CardActionArea";
import CardActions from "@material-ui/core/CardActions";
import CardContent from "@material-ui/core/CardContent";
import CardMedia from "@material-ui/core/CardMedia";
import Typography from "@material-ui/core/Typography";
import Avatar from '@material-ui/core/Avatar';
import Chip from '@material-ui/core/Chip';
import FaceIcon from '@material-ui/icons/Face';
import AccessTime from '@material-ui/icons/AccessTime';
import AccessAlarm from '@material-ui/icons/AccessAlarm';
import FavoriteBadge from '../FavoriteBadge';

const styles = theme => ({
    card: {
        maxWidth: '100%'
    },
    media: {
        height: 150
    },
    favorite: {
        marginLeft: 'auto',
        marginRight: 10,
    },
    description: {
        fontSize: theme.typography.pxToRem(13),
    }
});

function personsLabel(min, max) {
    if (min === max) {
        return min;
    }

    return `${min} - ${max}`;
}

function DishCard(props) {
    return (
        <Card className={props.classes.card}>
            <CardActionArea>
                <CardMedia
                    className={props.classes.media}
                    image={props.main_image_url}
                    title={props.name}
                />
                <CardContent>
                    <Typography gutterBottom variant="h6" component="h3">
                        {props.name}
                    </Typography>
                    <Typography className={props.classes.description} component="p">
                        {props.description_short}
                    </Typography>
                </CardContent>
            </CardActionArea>
            <CardActions>
                <Chip
                    avatar={<Avatar><FaceIcon/></Avatar>}
                    label={personsLabel(props.persons_min, props.persons_max)}
                />
                <Chip
                    avatar={<Avatar><AccessTime/></Avatar>}
                    label={`${props.time_preparation}min`}
                />
                <Chip
                    avatar={<Avatar><AccessAlarm/></Avatar>}
                    label={`${props.time_making}min`}
                />
                <FavoriteBadge className={props.classes.favorite} count={props.favorites_count}/>
            </CardActions>
        </Card>
    );
}

DishCard.propTypes = {
    name: PropTypes.string.isRequired,
    description_short: PropTypes.string,
    main_image_url: PropTypes.string,
    time_preparation: PropTypes.number,
    time_making: PropTypes.number,
    persons_min: PropTypes.number,
    persons_max: PropTypes.number,
    favorites_count: PropTypes.number,
    classes: PropTypes.object.isRequired
};

export default withStyles(styles)(DishCard);
