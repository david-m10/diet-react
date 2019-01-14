import React, {Component} from 'react';
import {withStyles} from '@material-ui/core/styles';
import InputLabel from '@material-ui/core/InputLabel';
import MenuItem from '@material-ui/core/MenuItem';
import FormControl from '@material-ui/core/FormControl';
import Select from '@material-ui/core/Select';
import {withRouter} from 'react-router-dom';

const styles = () => {
    return {
        sort: {
            minWidth: 200,
        },
    }
};

class DishesSortingSelect extends Component {
    state = {
        sort: 'sort_by=name/sort_type=asc',
    };

    onChangeSort = () => (event) => {
        const sort = event.target.value;
        this.setState({sort});
        this.props.history.push(`/dishes/${sort}`);
    };

    render() {
        const {classes} = this.props;
        return (
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
                    <MenuItem
                        value='sort_by=created_at/sort_type=asc'>Data dodania rosnąco
                    </MenuItem>
                    <MenuItem
                        value='sort_by=created_at/sort_type=desc'>Data dodania malejąco
                    </MenuItem>
                </Select>
            </FormControl>
        );
    }
}

export default withRouter(withStyles(styles)(DishesSortingSelect));


