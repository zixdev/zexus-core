import {AllUsers, CreateUsers, UserRoles, UserDetails} from './users';
import {Roles, RoleManager, Permissions} from './roles';

export default [
    {
        name: 'accounts.index',
        path: '/accounts',
        component: AllUsers,
        meta: {requiresAuth: true, permission: 'view_users', icon: 'person', menu: true},
        children: [
            /*
             * User Management
             */
            {
                name: 'accounts.users.index',
                path: '/accounts',
                component: AllUsers,
                meta: {requiresAuth: true, permission: 'view_users', menu: true},
            },
            {
                name: 'accounts.users.create',
                path: '/accounts/create',
                component: CreateUsers,
                meta: {requiresAuth: true, permission: 'create_users'},
            },
            {
                name: 'accounts.users.edit',
                path: '/accounts/:id/edit',
                component: CreateUsers,
                meta: {requiresAuth: true, permission: 'update_users'},
            },
            {
                name: 'accounts.users.details',
                path: '/accounts/:id/details',
                component: UserDetails,
                meta: {requiresAuth: true, permission: 'update_users'},
            },
            {
                name: 'accounts.users.roles',
                path: '/accounts/:id/roles',
                component: UserRoles,
                meta: {requiresAuth: true, permission: 'update_roles'},
            },
            /*
             * Roles Managements
             */
            {
                name: 'accounts.roles.index',
                path: '/accounts/roles',
                component: Roles,
                meta: {requiresAuth: true, permission: 'view_roles', menu: true},
            },
            {
                name: 'accounts.roles.create',
                path: '/accounts/roles/create',
                component: RoleManager,
                meta: {requiresAuth: true, permission: 'create_roles'},
            },
            {
                name: 'accounts.roles.edit',
                path: '/accounts/roles/:id/edit',
                component: RoleManager,
                meta: {requiresAuth: true, permission: 'update_roles'},
            },
            {
                name: 'accounts.roles.permissions',
                path: '/accounts/roles/:id/permissions',
                component: Permissions,
                meta: {requiresAuth: true, permission: 'update_roles'},
            },
        ]
    }
];