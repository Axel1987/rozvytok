import './index-site.scss';
import indexSiteConfig from './index-site.config';

export default angular.module('indexSiteModule', [])
    .config(indexSiteConfig)
    .name;
