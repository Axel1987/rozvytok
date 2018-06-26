# Angular 1.6 starter kit with Webpack (used RDAHS-UI styles)

### Setup

- npm install
- rename `src/app/services/user.service.js` to `src/app/services/config.js` (this is file to global const)

- npm run webpack-prod (Build into production)
- npm run webpack-dev (Run into dev mode with watcher)

* if you want using ES6 syntax , need uncomment 'bubble' in webpack.config.js

### Features

- Component ES6, used in the project structure.
- Minimum size of bundles (very fast loading)
- Building separate vendors and bundle js and css files.
- Media files DON'T included in bundle (to minimize the iitial load). Media is loaded in default HTML mode.
- The webpack.vendors.js file to specify the components for the assembly (do not load anything superfluous).
- Files of fonts and images are collected automatically. Links are also created automatically

### Thanks

Huge gratitude of all, who helped me to create this :)