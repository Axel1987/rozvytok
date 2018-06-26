userService.$inject = ['localStorageService', '$http', '$q'];

export default function userService($storage, $http, $q) {
    "use strict";

    var _setUser = function (user) {
            var deferred = $q.defer();

            $http.defaults.headers.common['Authorization'] = 'Bearer ' + user.access_token;
            $http.defaults.cache = false;

            $storage.set('user', user);

            deferred.resolve('ok');
            deferred.reject('false');

            return deferred.promise;
        },

        _getUser = function () {
            return $storage.get('user');
        },

        _dropUser = function () {
            $storage.remove('user');
        };


    return {
        setUser: _setUser,
        getUser: _getUser,
        dropUser: _dropUser
    }
}
