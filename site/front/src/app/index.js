import './scss/main.scss';
import appConfig from './config';
import appRun from './run';
/** Modules */
import refreshTokenInterceptor from './modules/http-refresh-token';
import loginModule from './modules/login';
import appLayoutModule from './modules/admin/app-layout';
import appLayoutSiteModule from './modules/site/app-layout-site';
/** Services */
import userService from './services/user.service';

/** Directives */
import passwordInputDirective from './directives/showPass';

var app = angular.module('app', [
    'ui.router',
    'LocalStorageModule',
    'ui.bootstrap',
    'ngFileUpload',
    refreshTokenInterceptor,
    appLayoutModule,
    appLayoutSiteModule,
    loginModule
]);

app
    .config(appConfig)
    .directive('inputPassword', passwordInputDirective)
    .service('userService', userService)
    .run(appRun);
