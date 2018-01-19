// https://vuex.vuejs.org/en/state.html
export default {
    token: '',
    user: {},
    messages: {
        success: '',
        error: [],
        warning: '',
        validation: {}
    },
    fetching: false,
    sidebar: {
        show: true,
        clipped: false,
        mini_variant: false
    },
    app_name: 'ZIX DEV',

    lang: {
        supported_languages: ['en', 'fr', 'ar'],
        default_lang: 'en',
        fallback_lang: 'en'
    },

    breadcrumbs: ['dashboard.index']
};
