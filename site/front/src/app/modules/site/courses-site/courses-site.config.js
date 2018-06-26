import coursesSiteCtrl from './courses-site.controller';
import view from './courses-site.html';

coursesSiteConfig.$inject = ['$stateProvider'];

export default function coursesSiteConfig($stateProvider) {
    $stateProvider
        .state('router.app-layout-site.courses-site', {
            url:'/courses',
            controller:coursesSiteCtrl,
            template: view
        })
}
