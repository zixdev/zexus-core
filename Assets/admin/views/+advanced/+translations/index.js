/**
 * Components are lazy-loaded - See "Grouping Components in the Same Chunk"
 * http://router.vuejs.org/en/advanced/lazy-loading.html
 */
/* eslint-disable global-require */
export const Translations = r => require.ensure([], () => r(require('./Translations')), 'advanced-bundle');
export const ManageTranslation = r => require.ensure([], () => r(require('./ManageTranslation')), 'advanced-bundle');
