import React, {Component} from 'react'
import {View, Text, Alert, Button, TextInput, TouchableOpacity} from 'react-native';
import Home from './Home';
import SQLite from 'react-native-sqlite-storage';

let db = SQLite.openDatabase({name: 'app.sqlite', createFromLocation: "~db/app.sqlite"});

export default class Setting extends Component {

    static navigationOptions = {
        title: "Синхронизация заказов",
    };

    static getDerivedStateFromProps(props, state) {
        if ('deliveryPoint' === '') {
            props.navigation.navigate('Home')
        }
        return null
    }

    constructor(props) {
        super(props);
        this.state = {
            'X-HM-Authorization': '',
            'deliveryPoint': '',
        }
    }

    Login = async () => {
        const orders = this.getOrders();
        console.log(orders);
        const points = this.getPoints();
        console.log(points);
        /*const statuses = this.getStatuses();
        console.log(statuses);*/
    };

    async getOrders() {
        fetch('https://evotor-insales.helixmedia.ru/app/getupdates', {
            method: 'get',
            headers: {
                'X-HM-Authorization': '94e910b4-a2da-11e8-bb1f-0242c88b367b',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },

        }).then((response) => response.json())
            .then((res) => {
                if (typeof(res.message) !== "undefined") {
                    console.log("Error", "Error: " + res.message);
                } else {
                    console.log('Response', res.response);
                    let orders = res.response.orders;
                    console.log(orders);

                    orders.forEach((order, i, arr) => {
                        db.transaction((tx) => {
                                // tx.executeSql('DELETE FROM pick_points WHERE id = 1535530'  , [], (tx, results) => {
                                tx.executeSql('INSERT INTO orders (id, number, name, phone, total_price, created_at, fulfillment_status, custom_status_permalink, custom_status_title ) VALUES (' +
                                    order.id + ', "' + order.number + '", "' + order.name + '", "' + order.phone + '",  "' +
                                    order.total_price + '", "' + order.created_at + '", "' + order.fulfillment_status + '", "' +
                                    order.custom_status_permalink + '", "' + order.custom_status_title + '")', [], (tx, results) => {
                                    console.log("Query completed");
                                });
                            });
                    });

                    let orderLines = res.response.order_lines;
                    console.log('orderLines', orderLines);

                    if (orderLines !== 'undefined' || orderLines !== null) {
                        orderLines.forEach((order, i, arr) => {
                            console.log('order', order);
                            for (let key in order) {
                                let item = order[key];
                                console.log('order[key]', item);
                                item.forEach((product, i, arr) => {
                                    console.log('product', product);
                                    db.transaction(
                                        (tx) => {
                                            tx.executeSql('INSERT INTO order_lines (order_id, title, total_price, quantity) VALUES (' +
                                                product.id + ', "' + product.title + '", "' +
                                                product.total_price + '", "' + order.quantity + '")', [], (tx, results) => {
                                                console.log('queryResults', results);
                                            });
                                        }
                                    );
                                });
                            }
                        });
                    } else {
                        console.log('Empty order lines.');
                    }
                }
            }).catch((error) => {
            console.error(error);
        });
    }

    async getPoints() {
        fetch('https://evotor-insales.helixmedia.ru/app/getstoreslist', {
            method: 'get',
            headers: {
                'X-HM-Authorization': '94e910b4-a2da-11e8-bb1f-0242c88b367b',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
        }).then((response) => response.json())
            .then((res) => {
                if (typeof(res.message) !== "undefined") {
                    console.log("Error", "Error: " + res.message);
                } else {
                    let points = res.response.points;

                    console.log(points);

                    if (points !== 'undefined' || points !== null) {
                        points.forEach((point, i, arr) => {
                            db.transaction(
                                (tx) => {
                                    tx.executeSql('DELETE FROM pick_points', [], (tx, results) => {
                                            tx.executeSql('INSERT INTO pick_points (id, title) VALUES (' + point.id + ', "' + point.title + '")', [], (tx, results) => {
                                                console.log("Query completed");
                                            });
                                        }
                                    );
                                })
                        });
                    } else {
                        console.log('Empty points list.');
                    }
                }
            }).catch((error) => {
            console.error(error);
        });
    }

    async getStatuses() {
        fetch('https://evotor-insales.helixmedia.ru/app/statuses', {
            method: 'get',
            headers: {
                'X-HM-Authorization': '94e910b4-a2da-11e8-bb1f-0242c88b367b',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },

        }).then((response) => response.json())
            .then((res) => {
                if (typeof(res.message) !== "undefined") {
                    console.log("Error", "Error: " + res.message);
                } else {
                    let statuses = res.response.statuses;

                    console.log(statuses);

                    statuses.forEach((status, i, arr) => {
                        db.transaction(
                            (tx) => {
                                tx.executeSql('INSERT INTO statuses (id, color, permalink, sistem_status, title) VALUES (' +
                                    status.id + ', "' + status.color + '", "' + status.permalink + '", "' +
                                    status.sistem_status + '", "' + status.title + '")', [], (tx, results) => {
                                    console.log("Query completed");
                                });
                            }
                        );
                    });
                }
            }).catch((error) => {
            console.error(error);
        });
    }

    render() {
        return (
            <View>
                <TouchableOpacity onPress={this.Login}>
                    <View
                        style={{
                            height: 50,
                            backgroundColor: 'purple',
                            justifyContent: 'center',
                            alignItems: 'center',
                        }}
                    >
                        <Text
                            style={{
                                fontSize: 20,
                                color: '#FFFFFF',
                            }}
                        >
                            Обновление
                        </Text>
                    </View>
                </TouchableOpacity>
            </View>
        );
    }
}