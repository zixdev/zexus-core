const Dashboard = r => require.ensure([], () => r(require('./Dashboard')), 'base-bundle');
export default [{
    name: 'dashboard.index',
    path: '/',
    component: Dashboard,
    meta: {
        requiresAuth: true,
        icon:  'dashboard',
        menu: true
    }
}]
