import './app-layout-site.scss';
import appLayoutConfig from './app-layout-site.config';
import indexSiteModule from '../index-site';
import coursesSiteModule from '../courses-site';

export default angular.module('appLayoutSiteModule', [
    indexSiteModule,
    coursesSiteModule
]).config(appLayoutConfig)
  .name;
