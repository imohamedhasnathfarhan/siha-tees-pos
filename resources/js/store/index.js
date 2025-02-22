import { createStore } from "vuex";

import createPersistedState from "vuex-persistedstate";
import { auth } from "./modules/auth";
import { company } from "./modules/company";
import { countryCode } from './modules/countryCode';
import { mail } from "./modules/mail";
import { theme } from "./modules/theme";
import { currency } from "./modules/currency";
import { site } from "./modules/site";
import { productCategory } from "./modules/productCategory";
import { productAttribute } from "./modules/productAttribute";
import { tax } from "./modules/tax";
import { menuSection } from "./modules/menuSection";
import { menuTemplate } from "./modules/menuTemplate";
import { language } from "./modules/language";
import { timezone } from "./modules/timezone";
import { productAttributeOption } from "./modules/productAttributeOption";
import { product } from "./modules/product";
import { frontendSetting } from "./modules/frontend/frontendSetting";
import { frontendLanguage } from "./modules/frontend/frontendLanguage";
import { globalState } from "./modules/frontend/globalState";
import { role } from "./modules/role";
import { permission } from "./modules/permission";
import { administrator } from "./modules/administrator";
import { administratorAddress } from "./modules/administratorAddress";
import { customer } from "./modules/customer";
import { customerAddress } from "./modules/customerAddress";
import { employee } from './modules/employee';
import { employeeAddress } from './modules/employeeAddress';
import { unit } from "./modules/unit";
import { productBrand } from "./modules/productBrand";
import { barcode } from "./modules/barcode";
import { salesReport } from "./modules/salesReport";
import { productVariation } from "./modules/productVariation";
import { user } from "./modules/user";
import { frontendCountryCode } from "./modules/frontend/frontendCountryCode";
import { frontendEditProfile } from './modules/frontend/frontendEditProfile';
import { purchase } from './modules/purchase';
import { damage } from './modules/damage';
import { supplier } from "./modules/supplier";
import { stock } from "./modules/stock";
import { dashboard } from "./modules/dashboard";
import { productsReport } from "./modules/productsReport";
import { myOrderDetails } from "./modules/myOrderDetails";
import { posOrder } from "./modules/posOrder";
import { posProductVariation } from "./modules/posProductVariation";
import { posProductCategory } from "./modules/posProductCategory";
import { posProduct } from "./modules/posProduct";
import { posCart } from "./modules/posCart";
import { license } from "./modules/license";
import {country} from "./modules/country";
import {state} from "./modules/state";
import {city} from "./modules/city";
export default new createStore({
    state: {},
    mutations: {},
    actions: {},
    modules: {
        auth,
        company,
        countryCode,
        mail,
        theme,
        currency,
        site,
        productCategory,
        tax,
        globalState,
        menuSection,
        menuTemplate,
        language,
        productAttribute,
        timezone,
        productAttributeOption,
        role,
        permission,
        product,
        administrator,
        administratorAddress,
        customer,
        customerAddress,
        employee,
        employeeAddress,
        unit,
        productBrand,
        barcode,
        salesReport,
        productVariation,
        user,
        purchase,
        damage,
        supplier,
        frontendSetting,
        frontendLanguage,
        frontendCountryCode,
        frontendEditProfile,
        stock,
        dashboard,
        productsReport,
        myOrderDetails,
        posOrder,
        posProductVariation,
        posProductCategory,
        posProduct,
        posCart,
        license,
        country,
        state,
        city
    },
    plugins: [
        createPersistedState({
            paths: ["auth", "globalState", "posCart"],
        }),
    ],
});
