export const AppHeader = r => require.ensure([], () => r(require('@zix-core/admin/components/Header')), 'base-bundle');
export const AppFooter = r => require.ensure([], () => r(require('@zix-core/admin/components/Footer')), 'base-bundle');
export const AppSideBar = r => require.ensure([], () => r(require('@zix-core/admin/components/Sidebar')), 'base-bundle');
export const AppBreadcrumbs = r => require.ensure([], () => r(require('@zix-core/admin/components/Breadcrumbs')), 'base-bundle');
export const AppNotifications= r => require.ensure([], () => r(require('@zix-core/admin/components/Notifications')), 'base-bundle');
