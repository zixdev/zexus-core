import {Sites, SiteManager, SiteConfig} from './+sites';
import {FileManager} from './+storage';
import {SystemLogs} from './+logs';
import {Translations, TranslationManager} from './+translations';

export default [
    {
        name: 'system.index',
        path: '/system',
        component: Sites,
        meta: {requiresAuth: true, permission: 'view_admin', icon: 'settings', menu: true},
        children: [
            {
                name: 'system.sites.index',
                path: '/system/sites',
                component: Sites,
                meta: {requiresAuth: true, permission: 'view_sites', menu: true},
            },
            {
                name: 'system.sites.create',
                path: '/system/sites/create',
                component: SiteManager,
                meta: {requiresAuth: true, permission: 'create_sites'},
            },
            {
                name: 'system.sites.edit',
                path: '/system/sites/:id/edit',
                component: SiteManager,
                meta: {requiresAuth: true, permission: 'update_sites'},
            },
            {
                name: 'system.sites.config.index',
                path: '/system/sites/:id/config',
                component: SiteConfig,
                meta: {requiresAuth: true, permission: 'view_site_configs'},
            },
            {
                name: 'system.file_manager.index',
                path: '/system/file-manager',
                component: FileManager,
                meta: {requiresAuth: true, permission: 'view_sites', menu: true},
            },
            {
                name: 'system.logs.index',
                path: '/system/logs',
                component: SystemLogs,
                meta: {requiresAuth: true, permission: 'view_sites', menu: true},
            },


            {
                name: 'system.translations.index',
                path: '/system/translations',
                component: Translations,
                meta: {requiresAuth: true, permission: 'view_translations', menu: true},
            },
            {
                name: 'system.translations.create',
                path: '/system/translations/create',
                component: TranslationManager,
                meta: {requiresAuth: true, permission: 'create_translations'},
            },
            {
                name: 'system.translations.edit',
                path: '/system/translations/:id/edit',
                component: TranslationManager,
                meta: {requiresAuth: true, permission: 'update_translations'},
            },
        ]
    }
];