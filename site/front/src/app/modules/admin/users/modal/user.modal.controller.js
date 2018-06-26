userModalCtrl.$inject = ['$scope', '$uibModalInstance', '$http', 'items'];

export default function userModalCtrl ($scope, $uibModalInstance, $http, items) {

    $scope.user = items.user;
    $scope.errorMessage = [];
    $scope.roles = [];
    $scope.cities = [];

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };

    /** Get list of roles */
    $scope.getRoles = function () {
        $http.get('/api/admin/assignments').then(
            function (response) {
                $scope.roles = response.data;
            },function (error) {

            }
        );
    };
    $scope.getRoles();

    /** Get list of Cities */
    $scope.getRoles = function () {
        $http.get('/api/admin/cities').then(
            function (response) {
                $scope.cities = response.data;
            },function (error) {

            }
        );
    };
    $scope.getRoles();

    /** Submit user form */
    $scope.submit = function () {
        if($scope.user.id){
            $scope.editUser();
        }else{
            $scope.addUser();
        }
    };

    /** Edit user */
    $scope.editUser = function () {
        $http.put('/api/admin/users/' + $scope.user.id, $scope.user).then(
            function (response) {
                $uibModalInstance.close(response.data);
            },function (error) {
                $scope.errorMessage = error.data.errors;
            }
        );
    };

    /** Add new user */
    $scope.addUser = function () {
        $http.post('/api/admin/users', $scope.user).then(
            function (response) {
                $uibModalInstance.close(response.data);
            },function (error) {
                $scope.errorMessage = error.data.errors;
            }
        );
    }
}