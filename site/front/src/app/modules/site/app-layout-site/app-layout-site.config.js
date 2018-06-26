import appLayoutSiteCtrl from './app-layout-site.controller';
import view from './app-layout-site.html';

appLayoutConfig.$inject = ['$stateProvider'];

export default function appLayoutConfig($stateProvider) {
    $stateProvider
        .state('router.app-layout-site', {
            abstract: true,
            controller:appLayoutSiteCtrl,
            template: view
        })
}
