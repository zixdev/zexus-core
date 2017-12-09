import React, {Component} from 'react';
import {Card, CardActions, CardText, FlatButton, RaisedButton, TextField} from "material-ui";
export default class Login extends Component {
    render() {
        return (
            <Card>
                <CardText>
                    <TextField
                        floatingLabelText="Username Or Email"
                        type="text"
                        fullWidth
                    />
                    <TextField
                        floatingLabelText="Password"
                        type="password"
                        fullWidth
                    />

                    <RaisedButton label="Login" primary />
                </CardText>
            </Card>
        );
    }
}

