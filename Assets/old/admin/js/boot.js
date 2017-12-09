// 1. get all active modules
import Plugins from '@zix-base/plugins.json';

window.Zexus = {
    routes: []
};
for (let key in Plugins) {
    let plugin = Plugins[key];
    if (plugin.status) {
        import(`@zix-base/${plugin.name}/Assets/admin/js/app`)
            .then(res => {
            });
    }
}

