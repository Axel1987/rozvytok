import loginCtrl from './login.controller';
import view from './login.html';

loginConfig.$inject = ['$stateProvider'];

export default function loginConfig($stateProvider) {
    $stateProvider
        .state('router.login', {
            url:'/login',
            controller:loginCtrl,
            template: view,
            data:{
                header: 'Login',
                class: 'fa fa-tachometer'
            }
        })
}
