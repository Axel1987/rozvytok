appRun.$inject = ['$rootScope', '$state', '$transitions'];

export default function appRun($rootScope, $state, $transitions) {
    $rootScope.$state = $state;

    $transitions.onSuccess({}, function () {
    });
}
