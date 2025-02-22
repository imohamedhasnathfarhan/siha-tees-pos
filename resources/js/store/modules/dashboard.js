import axios from "axios";
import appService from "../../services/appService";

export const dashboard = {
    namespaced: true,
    state: {
        totalSales: [],
        totalOrders: [],
        totalCustomers: [],
        totalProducts: [],
        salesSummary: [],
        customerStates: [],
        featuredItems: [],
        topProducts: [],
    },

    getters: {
        totalSales: function (state) {
            return state.totalSales;
        },
        totalOrders: function (state) {
            return state.totalOrders;
        },
        totalCustomers: function (state) {
            return state.totalCustomers;
        },
        totalProducts: function (state) {
            return state.totalProducts;
        },
        salesSummary: function (state) {
            return state.salesSummary;
        },
        customerStates: function (state) {
            return state.customerStates;
        },
        featuredItems: function (state) {
            return state.featuredItems;
        },
        topProducts: function (state) {
            return state.topProducts;
        }
    },

    actions: {
        totalSales: function (context,payload) {
            return new Promise((resolve, reject) => {
                let url = "admin/dashboard/total-sales";
                if (payload) {
                    url = url + appService.requestHandler(payload);
                }
                axios.get(url)
                    .then((res) => {
                        context.commit("totalSales", res.data.data);
                        resolve(res);
                    })
                    .catch((err) => {
                        reject(err);
                    });
            });
        },
        totalOrders: function (context,payload) {
            return new Promise((resolve, reject) => {
                let url = "admin/dashboard/total-orders";
                if (payload) {
                    url = url + appService.requestHandler(payload);
                }
                axios.get(url)
                    .then((res) => {
                        context.commit("totalOrders", res.data.data);
                        resolve(res);
                    })
                    .catch((err) => {
                        reject(err);
                    });
            });
        },
        totalCustomers: function (context,payload) {
            return new Promise((resolve, reject) => {
                let url = "admin/dashboard/total-customers";
                if (payload) {
                    url = url + appService.requestHandler(payload);
                }
                axios.get(url).then((res) => {
                        context.commit("totalCustomers", res.data.data);
                        resolve(res);
                    })
                    .catch((err) => {
                        reject(err);
                    });
            });
        },
        totalProducts: function (context,payload) {
            return new Promise((resolve, reject) => {
                let url = "admin/dashboard/total-products";
                if (payload) {
                    url = url + appService.requestHandler(payload);
                }
                axios.get(url).then((res) => {
                        context.commit("totalProducts", res.data.data);
                        resolve(res);
                    })
                    .catch((err) => {
                        reject(err);
                    });
            });
        },
        salesSummary: function (context,payload) {
            return new Promise((resolve, reject) => {
                let url = "admin/dashboard/sales-summary";
                if (payload) {
                    url = url + appService.requestHandler(payload);
                }
                axios.get(url).then((res) => {
                        context.commit("salesSummary", res.data.data);
                        resolve(res);
                    })
                    .catch((err) => {
                        reject(err);
                    });
            });
        },
        customerStates: function (context,payload) {
            return new Promise((resolve, reject) => {
                let url = "admin/dashboard/customer-states";
                if (payload) {
                    url = url + appService.requestHandler(payload);
                }
                axios.get(url).then((res) => {
                        context.commit("customerStates", res.data.data);
                        resolve(res);
                    })
                    .catch((err) => {
                        reject(err);
                    });
            });
        },
        topProducts: function (context) {
            return new Promise((resolve, reject) => {
                axios
                    .get("admin/dashboard/top-products")
                    .then((res) => {
                        context.commit("topProducts", res.data.data);
                        resolve(res);
                    })
                    .catch((err) => {
                        reject(err);
                    });
            });
        }
    },

    mutations: {
        totalSales: function (state, payload) {
            state.totalSales = payload;
        },
        totalOrders: function (state, payload) {
            state.totalOrders = payload;
        },
        totalCustomers: function (state, payload) {
            state.totalCustomers = payload;
        },
        totalProducts: function (state, payload) {
            state.totalProducts = payload;
        },
        salesSummary: function (state, payload) {
            state.salesSummary = payload;
        },
        customerStates: function (state, payload) {
            state.customerStates = payload;
        },
        featuredItems: function (state, payload) {
            state.featuredItems = payload;
        },
        topProducts: function (state, payload) {
            state.topProducts = payload;
        }
    },
};
