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
        if ('deliveryPoint' == '') {
            props.navigation.navigate('Home')
        }
        return null
    }

    constructor(props) {
        super(props)
        this.state = {
            'X-HM-Authorization': '',
            'deliveryPoint': '',
        }
    }

    Login = async () => {
        this.getOrderLines();
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
                    let deliveryPoint = res.response.statuses;

                    this.setState({deliveryPoint: res.id});
                    // console.log( deliveryPoints[1].id + ',' + ' ' + '\'' + deliveryPoints[1].title +  '\'');
                    console.log(deliveryPoint);
                    //if (typeof deliveryPoints === 'array') {
                    /* let db = SQLite.openDatabase({name: 'app.sqlite', createFromLocation : "~db/app.sqlite"}, this.openCB, this.errorCB);
                          deliveryPoints.forEach((point, i, arr) => {
                              db.transaction(
                                  (tx) => {
                                      tx.executeSql('DELETE FROM pick_points WHERE id = 25356 OR id = 25357 OR id = 25358 '  , [], (tx, results) => {
                                      //tx.executeSql('INSERT INTO pick_points (id, title) VALUES (' + point.id + ', "' + point.title + '")', [], (tx, results) => {
                                          console.log("Query completed");
                                      });
                                  }
                              );
                          })*/
                    /* let db = SQLite.openDatabase({name: 'app.sqlite', createFromLocation : "~/db/app.sqlite"}, this.openCB, this.errorCB);
                       deliveryPoints.forEach((order, i, arr) => {
                           db.transaction(
                               (tx) => {
                                  // tx.executeSql('DELETE FROM pick_points WHERE id = 1535530'  , [], (tx, results) => {
                                   tx.executeSql('INSERT INTO orders (id, number, name, phone, total_price, created_at, fulfillment_status, custom_status_permalink, custom_status_title ) VALUES (' + order.id + ', "' + order.number + '", "' + order.name + '", "' + order.phone + '",  "' + order.total_price + '", "' + order.created_at + '", "' + order.fulfillment_status + '", "' + order.custom_status_permalink + '", "' + order.custom_status_title + '")', [], (tx, results) => {
                                       console.log("Query completed");
                                   });
                               }
                           );
                       })*/

                    deliveryPoint.forEach((deliveryPoint, i, arr) => {
                        db.transaction(
                            (tx) => {
                                tx.executeSql('INSERT INTO status_orders (id, color, permalink, sistem_status, title) VALUES (' +
                                    point.id + ', "' + point.color + '", "' + point.permalink + '", "' +
                                    point.sistem_status + '", "' + point.title + '")', [], (tx, results) => {
                                    console.log("Query completed");
                                });
                            }
                        );
                    });

                    deliveryPoints.forEach((order_line, i, arr) => {
                        db.transaction(
                            (tx) => {
                                tx.executeSql('INSERT INTO order_lines (id, order_id, title, total_price, quantity ) VALUES (' +
                                    order_line.id + ', "' + order_line.id.order_id + '", "' + order_line.id.title + '", "' +
                                    order_line.id.total_price + '", "' + order.id.quantity + '")', [], (tx, results) => {
                                    console.log("Query completed");
                                });
                            }
                        );
                    })
                }
            }).catch((error) => {
                console.error(error);
            });

        getOrderLines = async () => {
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
                        let orderLines = res.response.order_lines;
                        console.log(orderLines);

                        orderLines.forEach((order, i, arr) => {
                            for (let key in order) {
                                key.forEach((product, i, arr) => {
                                    db.transaction(
                                        (tx) => {
                                            tx.executeSql('INSERT INTO order_lines (order_id, title, total_price, quantity) VALUES (' +
                                                product.id + ', "' + product.title + '", "' +
                                                product.total_price + '", "' + order.quantity + '")', [], (tx, results) => {
                                                console.log(results);
                                            });
                                        }
                                    );
                                });
                            }
                        });
                    }
                }).catch((error) => {
                console.error(error);
            });
    };

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