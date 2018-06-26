import userModalCtrl from './modal/user.modal.controller';
import userModalTpl from './modal/user.modal.html';

usersCtrl.$inject = ['$rootScope', '$scope', '$http', '$uibModal'];

export default function usersCtrl($rootScope, $scope, $http, $uibModal) {

    /**
     * Model of the empty User to the create action
     * @type {{email: string, name: string, surname: string, phone: string, city: string, authAssigment: string}}
     */
    $scope.emptyUser = {
        email: '',
        name: '',
        surname: '',
        phone: '',
        city_id: '',
        authAssigment: {
            item_name: ''
        }
    };

    /**
     * Get list of the users
     */
    $scope.getUsers = function () {
        $http.get('/api/admin/users').then(
            function (response) {
                $scope.users = response.data;
            }, function (error) {
                console.log('error', error);
            }
        );
    };

    $scope.getUsers();

    /**
     * Create a new User in the team
     */
    $scope.create = function () {
        var modalInstance = $uibModal.open({
            template: userModalTpl,
            controller: userModalCtrl,
            resolve: {
                items: {
                    user: $scope.emptyUser
                }
            }
        });

        return modalInstance.result.then(function (result) {
            $scope.getUsers();
        });
    };

    /**
     * Edit the User in the team
     */
    $scope.edit = function (user) {
        var modalInstance = $uibModal.open({
            template: userModalTpl,
            controller: userModalCtrl,
            resolve: {
                items: {
                    user: angular.copy(user)
                }
            }
        });

        return modalInstance.result.then(function (result) {
            $scope.getUsers();
        });
    };

    $scope.delete = function (user) {

    }
}
