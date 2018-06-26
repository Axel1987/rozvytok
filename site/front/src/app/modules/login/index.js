import './login.scss';
import adminLoginConfig from './login.config';

export default angular.module('adminLoginModule', [])
    .config(adminLoginConfig)
    .name;
