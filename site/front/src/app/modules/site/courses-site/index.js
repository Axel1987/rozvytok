import './courses-site.scss';
import indexSiteConfig from './courses-site.config';

export default angular.module('coursesSiteModule', [])
    .config(indexSiteConfig)
    .name;
