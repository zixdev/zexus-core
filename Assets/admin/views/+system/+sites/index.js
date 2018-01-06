/**
 * Components are lazy-loaded - See "Grouping Components in the Same Chunk"
 * http://router.vuejs.org/en/advanced/lazy-loading.html
 */
/* eslint-disable global-require */
export const Sites = r => require.ensure([], () => r(require('./Sites')), 'advanced-bundle');
export const SiteManager = r => require.ensure([], () => r(require('./SiteManager')), 'advanced-bundle');
export const SiteConfig = r => require.ensure([], () => r(require('./SiteConfig')), 'advanced-bundle');