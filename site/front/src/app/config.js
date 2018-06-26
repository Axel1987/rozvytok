appConfig.$inject = ['localStorageServiceProvider', '$stateProvider', '$urlRouterProvider'];
export default function appConfig($storageProvider, $stateProvider, $urlRouterProvider) {
    $storageProvider
        .setPrefix('myApp')
        .setStorageType('localStorage');
    
    
    $urlRouterProvider.otherwise('/');

    // Application routes
    $stateProvider
        .state('router', {
            abstract: true,
            template: '<ui-view></ui-view>'
        })
}
