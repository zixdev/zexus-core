export const AppHeader = r => require.ensure([], () => r(require('@zix-core/admin/components/header')), 'base-bundle');
export const AppFooter = r => require.ensure([], () => r(require('./footer')), 'base-bundle');
export const AppSideBar = r => require.ensure([], () => r(require('./sidebar')), 'base-bundle');
export const AppSnackBar = r => require.ensure([], () => r(require('./snackbar')), 'base-bundle');
export const AppBreadcrumbs = r => require.ensure([], () => r(require('./Breadcrumbs')), 'base-bundle');
