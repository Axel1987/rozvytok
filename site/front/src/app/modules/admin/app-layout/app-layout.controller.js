appLayoutCtrl.$inject = ['localStorageService', '$scope', '$state', '$transitions', 'userService'];
export default function appLayoutCtrl($storage, $scope, $state, $transitions, userService) {

    /** Sidebar options */
    $scope.toggle = !($storage.get('toggle') ? false : true);

    $scope.toggleSidebar = function () {
        $scope.toggle = !$scope.toggle;
        $storage.set('toggle', $scope.toggle);
    };

    /** Set captions params */
    $scope.headerText = $state.current.data.header;
    $scope.headerClass = $state.current.data.class;
    $scope.user = userService.getUser();

    if(!$scope.user){
        $state.go('router.login');
    }else{
        userService.setUser($scope.user);
    }

    /** Change header on state change success */
    $transitions.onSuccess({}, function () {
        $scope.headerText = $state.current.data.header;
        $scope.headerClass = $state.current.data.class;
        $scope.user = userService.getUser();

        if(!$scope.user){
            $state.go('router.login');
        }
    });
}
