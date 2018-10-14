import http from './../utilities/http'; // não precisa de .js


export const getAll = () => {
    return http.get('/empresa/ajax/insumos');
};