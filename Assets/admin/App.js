import React, {Component} from 'react';
import Example from "@zix-core/admin/components/Example";
import {AppBar, Drawer, MenuItem} from "material-ui";
import Login from '@zix-core/admin/pages/Login';

class App extends Component {
    render() {
        const auth = false;
        return (
            <div>
                {auth ? this.renderDashboard() : <Login/>}
            </div>
        );
    }


    renderDashboard() {
        return (
            <div>
                <AppBar
                    title="ZIX Admin"
                    iconClassNameRight="muidocs-icon-navigation-expand-more"
                />
                <Drawer
                    open={true}
                    docked={true}
                >
                    <MenuItem>Menu Item</MenuItem>
                    <MenuItem>Menu Item 2</MenuItem>
                </Drawer>
                <h2>Hello World</h2>
                <Example/>
            </div>
        )
    }
}

export default App;