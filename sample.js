import React, {Component, ListView} from 'react';
import {RefreshControl} from 'react-native';
import {Container, Badge, Content, List, ListItem, Left, Body, Right, Thumbnail, Text} from 'native-base';
import styles from '../components/style';
import SQLite from 'react-native-sqlite-storage';

let db = SQLite.openDatabase({name: 'app.sqlite', createFromLocation: "~db/app.sqlite"});

export default class App extends Component {
    static navigationOptions = {
        title: "Заказы данной точки"
    };

    constructor(props) {
        super(props);

        this.state = {
            refreshing: false,
            orders: [],
            color: []
        };

        db.transaction((tx) => {
            tx.executeSql(`SELECT * FROM status_orders`, [], (tx, results) => {
                console.log("Query completed");

                let color = [];
                for (let i = 0; i < results.rows.length; i++) {
                    let row = results.rows.item(i);
                    console.log(row);
                    color.push(results.rows.item(i))
                }

                this.setState({
                    color: color
                });
            });

            tx.executeSql('SELECT * FROM orders', [], (tx, results) => {
                console.log("Query completed");

                let orders = [];
                for (let i = 0; i < results.rows.length; i++) {
                    let order = {};
                    let item;

                    item = results.rows.item(i);
                    console.log(item);

                    order.id = item.id;
                    order.number = item.number;
                    order.total_price = item.total_price;
                    order.name = item.name;
                    order.phone = item.phone;
                    order.fulfillment_status = item.fulfillment_status;
                    order.custom_status_title = item.custom_status_title;
                    order.custom_status_permalink = item.custom_status_permalink;
                    order.color = this.assignColorToOrder(order, this.state.color);
                    order.created_at = item.created_at;

                    orders.push(order);

                    console.log(item);
                }

                this.setState({
                    orders: orders
                });
            });
        });
    }

    assignColorToOrder(order, colors) {
        const color = colors.find((item) => {
            return item.permalink === order.custom_status_permalink;
        });

        if (typeof color !== 'undefined') {
            return color.color;
        } else {
            return '#929594';
        }
    }

    errorCB(err) {
        console.log("SQL Error: " + err);
    }

    successCB() {
        console.log("SQL executed fine");
    }

    openCB() {
        console.log("Database OPENED");
    }

    _onRefresh = () => {
        this.setState({refreshing: true});
        db.transaction((tx) => {
            this.setState({refreshing: false});
        });
    };

    render() {
        return (
            <Container style={[styles.container]}>
                <Content>
                    <List refreshControl={
                        <RefreshControl
                            refreshing={this.state.refreshing}
                            onRefresh={this._onRefresh}
                        />
                    }

                          dataArray={this.state.orders}
                          renderRow={(row) =>
                              <ListItem avatar onPress={() => {
                                  this.props.navigation.navigate(
                                      'Details', {
                                          title: 'Заказ №' + ' ' + row.number,
                                          id: row.id,
                                          name: row.name,
                                          phone: row.phone,
                                          total_price: row.total_price,
                                          custom_status_title: row.custom_status_title,
                                          created_at: row.created_at,
                                          color: row.color
                                      });
                              }}
                              >
                                  <Body>
                                  <Text>{'Заказ: №' + ' ' + row.number}</Text>
                                  <Text note>{'Заказчик:' + ' ' + row.name}</Text>
                                  </Body>
                                  <Right>
                                      <Text note>{this.state.total_price + ' ' + '₽'}</Text>
                                      <Badge style={{backgroundColor: row.color}}>
                                          <Text note style={{color: 'white'}}>{row.custom_status_title}</Text>
                                      </Badge>
                                  </Right>
                              </ListItem>
                          }>
                    </List>
                </Content>
            </Container>
        );
    }
}