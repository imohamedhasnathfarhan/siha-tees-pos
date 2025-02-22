import SettingsComponent from "../../components/admin/settings/SettingsComponent";
import CompanyComponent from "../../components/admin/settings/Company/CompanyComponent";
import SiteComponent from "../../components/admin/settings/Site/SiteComponent";
import MailComponent from "../../components/admin/settings/Mail/MailComponent";
import ThemeComponent from "../../components/admin/settings/Theme/ThemeComponent";
import CurrencyComponent from "../../components/admin/settings/Currency/CurrencyComponent";
import CurrencyListComponent from "../../components/admin/settings/Currency/CurrencyListComponent";
import ProductCategoryListComponent from "../../components/admin/settings/ProductCategory/ProductCateogryListComponent";
import ProductCategoryComponent from "../../components/admin/settings/ProductCategory/ProductCategoryComponent";
import ProductCategoryShowComponent from "../../components/admin/settings/ProductCategory/ProductCategoryShowComponent";
import ProductAttributeComponent from "../../components/admin/settings/ProductAttribute/ProductAttributeComponent";
import ProductAttributeListComponent from "../../components/admin/settings/ProductAttribute/ProductAttributeListComponent";
import ProductAttributeShowComponent from "../../components/admin/settings/ProductAttribute/ProductAttributeShowComponent";
import TaxComponent from "../../components/admin/settings/Tax/TaxComponent";
import TaxListComponent from "../../components/admin/settings/Tax/TaxListComponent";
import LanguageComponent from "../../components/admin/settings/Language/LanguageComponent";
import LanguageListComponent from "../../components/admin/settings/Language/LanguageListComponent";
import LanguageShowComponent from "../../components/admin/settings/Language/LanguageShowComponent";
import RoleComponent from "../../components/admin/settings/Role/RoleComponent";
import RoleListComponent from "../../components/admin/settings/Role/RoleListComponent";
import RoleShowComponent from "../../components/admin/settings/Role/RoleShowComponent";
import ProductBrandComponent from "../../components/admin/settings/ProductBrand/ProductBrandComponent";
import ProductBrandListComponent from "../../components/admin/settings/ProductBrand/ProductBrandListComponent";
import ProductBrandShowComponent from "../../components/admin/settings/ProductBrand/ProductBrandShowComponent";
import UnitComponent from "../../components/admin/settings/Unit/UnitComponent";
import UnitListComponent from "../../components/admin/settings/Unit/UnitListComponent";
import SupplierComponent from "../../components/admin/settings/Supplier/SupplierComponent";
import SupplierListComponent from "../../components/admin/settings/Supplier/SupplierListComponent";
import SupplierShowComponent from "../../components/admin/settings/Supplier/SupplierShowComponent";
import LicenseComponent from "../../components/admin/settings/License/LicenseComponent";
import CountryListComponent from "../../components/admin/settings/countries/CountryListComponent";
import StateListComponent from "../../components/admin/settings/states/StateListComponent";
import CityListComponent from "../../components/admin/settings/cities/CityListComponent";
import LocationSetupComponent from "../../components/admin/settings/LocationSetup/LocationSetupComponent";



export default [
    {
        path: "/admin/settings",
        component: SettingsComponent,
        name: "admin.settings",
        redirect: { name: "admin.settings.company" },
        meta: {
            isFrontend: false,
            auth: true,
            permissionUrl: "settings",
            breadcrumb: "settings",
        },
        children: [
            {
                path: "company",
                component: CompanyComponent,
                name: "admin.settings.company",
                meta: {
                    isFrontend: false,
                    auth: true,
                    permissionUrl: "settings",
                    breadcrumb: "company",
                },
            },
            {
                path: "site",
                component: SiteComponent,
                name: "admin.settings.site",
                meta: {
                    isFrontend: false,
                    auth: true,
                    permissionUrl: "settings",
                    breadcrumb: "site",
                },
            },
            {
                path: "mail",
                component: MailComponent,
                name: "admin.settings.mail",
                meta: {
                    isFrontend: false,
                    auth: true,
                    permissionUrl: "settings",
                    breadcrumb: "mail",
                },
            },
            {
                path: "theme",
                component: ThemeComponent,
                name: "admin.settings.theme",
                meta: {
                    isFrontend: false,
                    auth: true,
                    permissionUrl: "settings",
                    breadcrumb: "theme",
                },
            },
            {
                path: "currencies",
                component: CurrencyComponent,
                name: "admin.settings.currency",
                redirect: { name: "admin.settings.currency.list" },
                meta: {
                    isFrontend: false,
                    auth: true,
                    permissionUrl: "settings",
                    breadcrumb: "currencies",
                },
                children: [
                    {
                        path: "list",
                        component: CurrencyListComponent,
                        name: "admin.settings.currency.list",
                        meta: {
                            isFrontend: false,
                            auth: true,
                            permissionUrl: "settings",
                            breadcrumb: "",
                        },
                    },
                ],
            },
            {
                path: "product-categories",
                component: ProductCategoryComponent,
                name: "admin.settings.productCategory",
                redirect: { name: "admin.settings.productCategory.list" },
                meta: {
                    isFrontend: false,
                    auth: true,
                    permissionUrl: "settings",
                    breadcrumb: "product_categories",
                },
                children: [
                    {
                        path: "list",
                        component: ProductCategoryListComponent,
                        name: "admin.settings.productCategory.list",
                        meta: {
                            isFrontend: false,
                            auth: true,
                            permissionUrl: "settings",
                            breadcrumb: "",
                        },
                    },
                    {
                        path: "show/:id",
                        component: ProductCategoryShowComponent,
                        name: "admin.settings.productCategory.show",
                        meta: {
                            isFrontend: false,
                            auth: true,
                            permissionUrl: "settings",
                            breadcrumb: "view",
                        },
                    },
                ],
            },
            {
                path: "product-brands",
                component: ProductBrandComponent,
                name: "admin.settings.productBrand",
                redirect: { name: "admin.settings.productBrand.list" },
                meta: {
                    isFrontend: false,
                    auth: true,
                    permissionUrl: "settings",
                    breadcrumb: "product_brands",
                },
                children: [
                    {
                        path: "list",
                        component: ProductBrandListComponent,
                        name: "admin.settings.productBrand.list",
                        meta: {
                            isFrontend: false,
                            auth: true,
                            permissionUrl: "settings",
                            breadcrumb: "",
                        },
                    },
                    {
                        path: "show/:id",
                        component: ProductBrandShowComponent,
                        name: "admin.settings.productBrand.show",
                        meta: {
                            isFrontend: false,
                            auth: true,
                            permissionUrl: "settings",
                            breadcrumb: "view",
                        },
                    },
                ],
            },

            {
                path: "suppliers",
                component: SupplierComponent,
                name: "admin.settings.supplier",
                redirect: { name: "admin.settings.supplier.list" },
                meta: {
                    isFrontend: false,
                    auth: true,
                    permissionUrl: "settings",
                    breadcrumb: "suppliers",
                },
                children: [
                    {
                        path: "list",
                        component: SupplierListComponent,
                        name: "admin.settings.supplier.list",
                        meta: {
                            isFrontend: false,
                            auth: true,
                            permissionUrl: "settings",
                            breadcrumb: "",
                        },
                    },
                    {
                        path: "show/:id",
                        component: SupplierShowComponent,
                        name: "admin.settings.supplier.show",
                        meta: {
                            isFrontend: false,
                            auth: true,
                            permissionUrl: "settings",
                            breadcrumb: "view",
                        },
                    },
                ],
            },

            {
                path: "product-attributes",
                component: ProductAttributeComponent,
                name: "admin.settings.productAttribute",
                redirect: { name: "admin.settings.productAttribute.list" },
                meta: {
                    isFrontend: false,
                    auth: true,
                    permissionUrl: "settings",
                    breadcrumb: "product_attributes",
                },
                children: [
                    {
                        path: "list",
                        component: ProductAttributeListComponent,
                        name: "admin.settings.productAttribute.list",
                        meta: {
                            isFrontend: false,
                            auth: true,
                            permissionUrl: "settings",
                            breadcrumb: "",
                        },
                    },
                    {
                        path: "show/:id",
                        component: ProductAttributeShowComponent,
                        name: "admin.settings.productAttribute.show",
                        meta: {
                            isFrontend: false,
                            auth: true,
                            permissionUrl: "settings",
                            breadcrumb: "view",
                        },
                    },
                ],
            },
            {
                path: "units",
                component: UnitComponent,
                name: "admin.settings.unit",
                redirect: { name: "admin.settings.unit.list" },
                meta: {
                    isFrontend: false,
                    auth: true,
                    permissionUrl: "settings",
                    breadcrumb: "units",
                },
                children: [
                    {
                        path: "list",
                        component: UnitListComponent,
                        name: "admin.settings.unit.list",
                        meta: {
                            isFrontend: false,
                            auth: true,
                            permissionUrl: "settings",
                            breadcrumb: "",
                        },
                    },
                ],
            },
            {
                path: "taxes",
                component: TaxComponent,
                name: "admin.settings.tax",
                redirect: { name: "admin.settings.tax.list" },
                meta: {
                    isFrontend: false,
                    auth: true,
                    permissionUrl: "settings",
                    breadcrumb: "taxes",
                },
                children: [
                    {
                        path: "list",
                        component: TaxListComponent,
                        name: "admin.settings.tax.list",
                        meta: {
                            isFrontend: false,
                            auth: true,
                            permissionUrl: "settings",
                            breadcrumb: "",
                        },
                    },
                ],
            },
            {
                path: "languages",
                component: LanguageComponent,
                name: "admin.settings.language",
                redirect: { name: "admin.settings.language.list" },
                meta: {
                    isFrontend: false,
                    auth: true,
                    permissionUrl: "settings",
                    breadcrumb: "languages",
                },
                children: [
                    {
                        path: "list",
                        component: LanguageListComponent,
                        name: "admin.settings.language.list",
                        meta: {
                            isFrontend: false,
                            auth: true,
                            permissionUrl: "settings",
                            breadcrumb: "",
                        },
                    },
                    {
                        path: "show/:id",
                        component: LanguageShowComponent,
                        name: "admin.settings.language.show",
                        meta: {
                            isFrontend: false,
                            auth: true,
                            permissionUrl: "settings",
                            breadcrumb: "view",
                        },
                    },
                ],
            },
            {
                path: "role",
                component: RoleComponent,
                name: "admin.settings.role",
                redirect: { name: "admin.settings.role.list" },
                meta: {
                    isFrontend: false,
                    auth: true,
                    permissionUrl: "settings",
                    breadcrumb: "role_permissions",
                },
                children: [
                    {
                        path: "list",
                        component: RoleListComponent,
                        name: "admin.settings.role.list",
                        meta: {
                            isFrontend: false,
                            auth: true,
                            permissionUrl: "settings",
                            breadcrumb: "",
                        },
                    },
                    {
                        path: "show/:id",
                        component: RoleShowComponent,
                        name: "admin.settings.role.show",
                        meta: {
                            isFrontend: false,
                            auth: true,
                            permissionUrl: "settings",
                            breadcrumb: "view",
                        },
                    },
                ],
            },
            {
                path: "license",
                component: LicenseComponent,
                name: "admin.settings.license",
                meta: {
                    isFrontend: false,
                    auth: true,
                    permissionUrl: "settings",
                    breadcrumb: "license",
                }
            },
            {
                path: "location-setup",
                component: LocationSetupComponent,
                name: "admin.settings.locationSetup",
                redirect :{name: "admin.settings.locationSetup.countries"},
                meta: {
                    isFrontend: false,
                    auth: true,
                    permissionUrl: "settings",
                    breadcrumb: "location_setup",
                },
                children: [
                    {
                        path: "countries",
                        component: CountryListComponent,
                        name: "admin.settings.locationSetup.countries",
                        meta: {
                            isFrontend: false,
                            auth: true,
                            permissionUrl: "settings",
                            breadcrumb: "",
                        },
                    },
                    {
                        path: "states",
                        component: StateListComponent,
                        name: "admin.settings.locationSetup.states",
                        meta: {
                            isFrontend: false,
                            auth: true,
                            permissionUrl: "settings",
                            breadcrumb: "",
                        },
                    },
                    {
                        path: "cities",
                        component: CityListComponent,
                        name: "admin.settings.locationSetup.cities",
                        meta: {
                            isFrontend: false,
                            auth: true,
                            permissionUrl: "settings",
                            breadcrumb: "",
                        },
                    },
                ],
            },
        ],
    },
];
