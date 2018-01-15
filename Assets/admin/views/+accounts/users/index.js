/**
 * Components are lazy-loaded - See "Grouping Components in the Same Chunk"
 * http://router.vuejs.org/en/advanced/lazy-loading.html
 */
/* eslint-disable global-require */
export const Users = r => require.ensure([], () => r(require('./Users')), 'accounts-bundle');
export const UserManager = r => require.ensure([], () => r(require('./UserManager')), 'accounts-bundle');
