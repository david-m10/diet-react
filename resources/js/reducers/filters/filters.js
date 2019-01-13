import * as actionTypes from '../../actions/actionTypes';
import {updateObject} from '../utilities';

const initialState = {
    filters: [],
    collapsed: false,
    loading: false,
};

const fetchFiltersStart = (state) => {
    return updateObject(state, {
        loading: true
    });
};

const fetchFiltersSuccess = (state, action) => {
    return updateObject(state, {
        filters: action.filters,
        loading: false
    });
};

const fetchFiltersFail = (state) => {
    return updateObject(state, {
        loading: false
    });
};

const toggleCollapseFilter = (state, action) => {
    return updateObject(state, {});
};

const clearFilter = (state, action) => {
    const filterName = action.name;
    const filterValue = action.value;

    // console.log({filterName, filterValue, state});
    //
    const filters = [...state.filters];
    const filter = filters.find((filter) => {
        console.log(filter.name);
        return filter.name === filterName;
    });

    console.log(filter);
    return updateObject(state, {});
};

const updateFilter = (state, action) => {
    const filterName = action.name;
    const filterValue = action.value;

    // console.log({filterName, filterValue, state});
    //
    const filters = state.filters.map((filter) => {
        if (filter.name !== filterName) {
            return filter;
        }

        filter.items = filter.items.map((item) => {
            if (item.value !== filterValue) {
                return item;
            }

            // const checked = !item.checked;

            return {...item, checked: !item.checked};
        });
    });

    return updateObject(state, {});
};

const reducer = (state = initialState, action) => {
    switch (action.type) {
        case actionTypes.FETCH_FILTERS_START:
            return fetchFiltersStart(state);
        case actionTypes.FETCH_FILTERS_SUCCESS:
            return fetchFiltersSuccess(state, action);
        case actionTypes.FETCH_FILTERS_FAIL:
            return fetchFiltersFail(state);
        case actionTypes.UPDATE_FILTER:
            return updateFilter(state, action);
        case actionTypes.TOGGLE_COLLAPSE_FILTER:
            return toggleCollapseFilter(action);
        case actionTypes.CLEAR_FILTER:
            return clearFilter(action);
        default:
            return state;
    }
};

export default reducer;