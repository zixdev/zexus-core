/**
 * Components are lazy-loaded - See "Grouping Components in the Same Chunk"
 * http://router.vuejs.org/en/advanced/lazy-loading.html
 */
/* eslint-disable global-require */
export const Roles = r => require.ensure([], () => r(require('./Roles')), 'accounts-bundle');
export const RoleManager = r => require.ensure([], () => r(require('./RoleManager')), 'accounts-bundle');
export const Permissions = r => require.ensure([], () => r(require('./Permissions')), 'accounts-bundle');
