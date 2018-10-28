import http from './../utilities/http';



export default {

    getSelect2(search) {
        return http.get('/empresa/ajax/cardapios', {
            q: search
        });
    }
}