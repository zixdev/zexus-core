// 1. get all active modules
import Plugins from '@zix/plugins.json';
import './bootstrap/libraries';
import './bootstrap/plugins';

window.Zexus = {
    routes: []
};
for (let key in Plugins) {
    let plugin = Plugins[key];
    if (plugin.status) {
        // TODO:: correct this logic
        // console.info('Loading Plugin: ', plugin.name.toLocaleLowerCase())
        require(`@zix-${'core'}/admin/main.js`);
        // import(`@zix-${plugin.name.toLocaleLowerCase()}/admin/main`)
        // let plug = `@zix-${'core'}/admin/main.js`;
        // import(`${plug}`)
        //     .then(res => {
        //     });
    }
}
