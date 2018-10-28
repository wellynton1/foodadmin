import http from './../utilities/http';



export default {
    get() {
        return http.get('/empresa/ajax/insumos');
    }
}