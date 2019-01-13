import * as actionTypes from '../actionTypes';
import axios from 'axios';

export const fetchFiltersStart = () => {
    return {
        type: actionTypes.FETCH_FILTERS_START
    };
};

export const fetchFiltersSuccess = (filters) => {
    return {
        type: actionTypes.FETCH_FILTERS_SUCCESS,
        filters
    };
};

export const fetchFiltersFail = (error) => {
    return {
        type: actionTypes.FETCH_FILTERS_FAIL,
        error
    };
};

export const emitFiltersChange = () => {
    return {
        type: actionTypes.EMIT_FILTERS_CHANGE,
        error
    };
};

export const updateFilter = (name, value) => {
    return {
        type: actionTypes.UPDATE_FILTER,
        name, value,
    };
};

export const toggleCollapseFilter = (name) => {
    return {
        type: actionTypes.TOGGLE_COLLAPSE_FILTER,
        name,
    };
};

export const clearFilter = (name) => {
    return {
        type: actionTypes.CLEAR_FILTER,
        name,
    };
};

export const fetchFilters = () => {
    return dispatch => {
        dispatch(fetchFiltersStart());

        dispatch(fetchFiltersSuccess(
            [
                {
                    display: 'Nazwa',
                    name: 'name',
                    type: 'search_with_items',
                    items: [
                        {
                            name: 'name_contain',
                            display: 'Zawiera',
                        },
                        {
                            name: 'name_not_contain',
                            display: 'Nie zawiera',
                        },
                    ],
                    position: 0,
                    collapsed: false,
                },
                {
                    display: 'Tagi',
                    name: 'tags',
                    type: 'search',
                    position: 1,
                    collapsed: false,
                },
                {
                    display: 'Tagi własne',
                    name: 'tags_own_id',
                    type: 'checkbox',
                    items: [
                        {
                            id: 1,
                            value: 1,
                            display: 'Kuchnia polska',
                            checked: false,
                        },
                        {
                            id: 2,
                            value: 2,
                            display: 'Wysoka ilość białka',
                            checked: true,
                        }
                    ],
                    position: 2,
                    collapsed: false,
                },
                {
                    display: 'Produkty',
                    name: 'products',
                    type: 'search',
                    position: 3,
                    collapsed: true,
                },
                {
                    display: 'Czas przygotowania',
                    name: 'time_preparation',
                    type: 'range',
                    min: 1,
                    max: 10,
                    position: 4,
                    collapsed: true,
                },
            ]
        ));

        return;

        axios
            .get(`/api/dishes/filters`)
            .then(res => {
                const fetchedFilters = [];

                for (const key of res.data.data) {
                    fetchedFilters.push({
                        ...key,
                    });
                }
                dispatch(fetchFiltersSuccess(fetchedFilters));
            })
            .catch(err => {
                dispatch(fetchFiltersFail(err));
            });
    };
};