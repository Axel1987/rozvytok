import indexSiteCtrl from './index-site.controller';
import view from './index-site.html';

appLayoutConfig.$inject = ['$stateProvider'];

export default function appLayoutConfig($stateProvider) {
    $stateProvider
        .state('router.app-layout-site.index-site', {
            url:'/',
            controller:indexSiteCtrl,
            template: view
        })
}
