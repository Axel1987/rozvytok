import './app-layout.scss';
import appLayoutConfig from './app-layout.config';
import dashboardModule from '../dashboard';
import usersModule from '../users';

export default angular.module('appLayoutModule', [
    dashboardModule,
    usersModule,
]).config(appLayoutConfig)
  .name;
