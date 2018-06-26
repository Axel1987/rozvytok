import usersCtrl from './users.controller';
import view from './users.html';

dashboardConfig.$inject = ['$stateProvider'];

export default function dashboardConfig($stateProvider) {
    $stateProvider
        .state('router.app-layout.users', {
            url:'/admin/users',
            controller:usersCtrl,
            template: view,
            data:{
                header: 'Команда',
                class: 'fa fa-users'
            }
        })
}
