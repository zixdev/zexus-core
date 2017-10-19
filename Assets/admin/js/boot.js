// 1. get all active modules
import Plugins from '@zix-base/plugins.json';

for(let key in Plugins) {
    let plugin = Plugins[key];
    if(plugin.status && plugin.name !== 'Core') {
        import(`@zix-base/${plugin.name}/Assets/admin/js/app`)
            .then(res => {});
    }
}