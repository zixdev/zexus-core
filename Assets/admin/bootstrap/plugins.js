import Vue from 'vue'
import Vuetify from 'vuetify'
import VueEvents from 'vue-events';
import VueFroala from 'vue-froala-wysiwyg';



/**
 * Vuetify UI
 */
// TODO:: add dynamic themes
Vue.use(Vuetify, {
    theme: {
        // primary: '#E91E63'
    }
});
Vue.use(VueEvents);
Vue.use(VueFroala);