loginCtrl.$inject = ['$rootScope', '$scope', '$http', '$state', 'userService'];

export default function loginCtrl($rootScope, $scope, $http, $state, $userService) {

    $scope.loginData = {
        email: '',
        password: ''
    };

    $scope.errorMessage = false;

    $scope.login = function () {
        $http.post('/api/admin/auths/login', $scope.loginData).then(
            function (response) {
                $userService.setUser(response.data).then(
                    function (result) {
                        $state.go('router.app-layout.dashboard');
                    }, function (error) {

                    }
                );
            }, function (error) {
                $scope.errorMessage = error.data.message;
            }
        );
    }
}
