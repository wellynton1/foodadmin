import http from './../utilities/http';



export default {

    listAll() {
        return http.get('/empresa/ajax/status-cardapio');
    }
}