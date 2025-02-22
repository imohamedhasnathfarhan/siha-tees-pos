<template>
    <LoadingComponent :props="loading" />
    <div class="col-12">
        <div class="db-card db-tab-div active">
            <div class="db-card-header">
                <h3 class="db-card-title">{{ $t('menu.sales_report') }}</h3>
                <div class="db-card-filter">
                    <TableLimitComponent :method="list" :search="props.search" :page="paginationPage" />
                    <FilterComponent />
                    <div class="dropdown-group">
                        <ExportComponent />
                        <div class="dropdown-list db-card-filter-dropdown-list">
                            <PrintComponent :props="printObj" />
                            <ExcelComponent :method="xls" />
                            <PdfComponent :method="downloadPdf" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-filter-div">
                <form class="p-4 sm:p-5 mb-5 w-full d-block" @submit.prevent="search">
                    <div class="row">
                        <div class="col-12 sm:col-6 md:col-4 xl:col-3">
                            <label for="order_id" class="db-field-title after:hidden">{{ $t('label.order_id') }}</label>
                            <input id="order_id" v-model="props.search.order_serial_no" type="text"
                                class="db-field-control">
                        </div>
                        <div class="col-12 sm:col-6 md:col-4 xl:col-3">
                            <label for="searchStatus" class="db-field-title after:hidden">{{
                                $t('label.status')
                            }}</label>
                            <vue-select class="db-field-control f-b-custom-select" id="searchStatus"
                                v-model="props.search.status" :options="[
                                    { id: enums.orderStatusEnum.CONFIRMED, name: $t('label.confirmed') },
                                    { id: enums.orderStatusEnum.DELIVERED, name: $t('label.delivered') },
                                ]" label-by="name" value-by="id" :closeOnSelect="true" :searchable="true"
                                :clearOnClose="true" placeholder="--" search-placeholder="--" />
                        </div>

                        <div class="col-12 sm:col-6 md:col-4 xl:col-3">
                            <label for="searchStartDate" class="db-field-title after:hidden">{{
                                $t('label.date')
                            }}</label>
                            <DatePickerComponent @update:modelValue="handleDate" inputStyle="filter"
                                v-model="modelValue" />
                        </div>

                        <div class="col-12 sm:col-6 md:col-4 xl:col-3">
                            <label for="searchStatus" class="db-field-title after:hidden">{{
                                $t('label.paid_status')
                            }}</label>
                            <vue-select class="db-field-control f-b-custom-select" id="searchStatus"
                                v-model="props.search.payment_status" :options="[
                                    { id: enums.paymentStatusEnum.PAID, name: $t('label.paid') },
                                    { id: enums.paymentStatusEnum.UNPAID, name: $t('label.unpaid') }
                                ]" label-by="name" value-by="id" :closeOnSelect="true" :searchable="true"
                                :clearOnClose="true" placeholder="--" search-placeholder="--" />
                        </div>
                        <div class="col-12 sm:col-6 md:col-4 xl:col-3">
                            <label for="searchStatus" class="db-field-title after:hidden">{{
                                $t('label.payment_type')
                                }}</label>
                            <vue-select class="db-field-control f-b-custom-select" id="searchStatus"
                                v-model="props.search.payment_method" :options="[
                                    { id: enums.posPaymentMethodEnum.CASH, name: $t('label.cash') },
                                    { id: enums.posPaymentMethodEnum.CARD, name: $t('label.card') },
                                    { id: enums.posPaymentMethodEnum.MOBILE_BANKING, name: $t('label.mobile_banking') },
                                    { id: enums.posPaymentMethodEnum.OTHER, name: $t('label.other') }]" label-by="name"
                                value-by="id" :closeOnSelect="true" :searchable="true" :clearOnClose="true"
                                placeholder="--" search-placeholder="--" />
                        </div>
                        <div class="col-12">
                            <div class="flex flex-wrap gap-3 mt-4">
                                <button class="db-btn py-2 text-white bg-primary">
                                    <i class="lab lab-line-search lab-font-size-16"></i>
                                    <span>{{ $t('button.search') }}</span>
                                </button>
                                <button class="db-btn py-2 text-white bg-gray-600" @click="clear">
                                    <i class="lab lab-line-cross lab-font-size-22"></i>
                                    <span>{{ $t('button.clear') }}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row px-5 mt-5 mb-5">
                <div class="col-12 sm:col-6 md:col-4 lg:col-6 xl:col-4">
                    <div class="border flex items-center gap-4 p-4 rounded-lg">
                        <div class="bg-[#F7F7F7] w-12 h-12 rounded-full flex items-center justify-center">
                            <i class="lab-fill-box text-[#6E7191] text-2xl lab-font-size-24"></i>
                        </div>
                        <div>
                            <h3 class="font-medium text-sm capitalize tracking-wide mb-1">
                                {{ $t('label.total_orders') }}
                            </h3>
                            <h4 class="font-bold text-lg text-[#6E7191]">{{ salesReportOverview.total_orders }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-12 sm:col-6 md:col-4 lg:col-6 xl:col-4">
                    <div class="border flex items-center gap-4 p-4 rounded-lg">
                        <div class="bg-[#F7F7F7] w-12 h-12 rounded-full flex items-center justify-center">
                            <i class="lab-fill-dollar-circle text-[#6E7191] text-2xl lab-font-size-24"></i>
                        </div>
                        <div>
                            <h3 class="font-medium text-sm capitalize tracking-wide mb-1">{{
                                $t('label.total_earnings') }}
                            </h3>
                            <h4 class="font-bold text-lg text-[#6E7191]">{{ salesReportOverview.total_earnings }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-12 sm:col-6 md:col-4 lg:col-6 xl:col-4">
                    <div class="border flex items-center gap-4 p-4 rounded-lg">
                        <div class="bg-[#F7F7F7] w-12 h-12 rounded-full flex items-center justify-center">
                            <i class="lab-fill-ticket-discount text-[#6E7191] text-2xl lab-font-size-24"></i>
                        </div>
                        <div>
                            <h3 class="font-medium text-sm capitalize tracking-wide mb-1">{{
                                $t('label.total_discounts')
                                }}
                            </h3>
                            <h4 class="font-bold text-lg text-[#6E7191]">{{ salesReportOverview.total_discounts }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="db-table-responsive">
                <table class="db-table stripe" id="print">
                    <thead class="db-table-head">
                        <tr class="db-table-head-tr">
                            <th class="db-table-head-th">{{ $t('label.order_id') }}</th>
                            <th class="db-table-head-th">{{ $t('label.date') }}</th>
                            <th class="db-table-head-th">{{ $t('label.total') }}</th>
                            <th class="db-table-head-th">{{ $t('label.discount') }}</th>
                            <th class="db-table-head-th">{{ $t('label.payment_type') }}</th>
                            <th class="db-table-head-th">{{ $t('label.payment_status') }}</th>
                        </tr>
                    </thead>
                    <tbody class="db-table-body" v-if="salesReports.length > 0">
                        <tr class="db-table-body-tr" v-for="salesReport in salesReports" :key="salesReport">
                            <td class="db-table-body-td">{{ salesReport.order_serial_no }}</td>
                            <td class="db-table-body-td">{{ salesReport.order_datetime }}</td>
                            <td class="db-table-body-td">{{ salesReport.total_amount_price }}</td>
                            <td class="db-table-body-td">{{ salesReport.discount_amount_price }}</td>
                            <td class="db-table-body-td">
                                {{ salesReport.pos_payment_method_name }}
                            </td>
                            <td class="db-table-body-td">
                                <span :class="statusClass(salesReport.payment_status)">
                                    {{ enums.paymentStatusEnumArray[salesReport.payment_status] }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-6">
                <PaginationSMBox :pagination="pagination" :method="list" />
                <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                    <PaginationTextComponent :props="{ page: paginationPage }" />
                    <PaginationBox :pagination="pagination" :method="list" />
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import LoadingComponent from "../components/LoadingComponent";
import alertService from "../../../services/alertService";
import PaginationTextComponent from "../components/pagination/PaginationTextComponent";
import PaginationBox from "../components/pagination/PaginationBox";
import PaginationSMBox from "../components/pagination/PaginationSMBox";
import appService from "../../../services/appService";
import paymentStatusEnum from "../../../enums/modules/paymentStatusEnum";
import orderStatusEnum from "../../../enums/modules/orderStatusEnum";
import TableLimitComponent from "../components/TableLimitComponent";
import FilterComponent from "../components/buttons/collapse/FilterComponent";
import ExportComponent from "../components/buttons/export/ExportComponent";
import print from 'vue3-print-nb';
import PrintComponent from "../components/buttons/export/PrintComponent";
import ExcelComponent from "../components/buttons/export/ExcelComponent";
import DatePickerComponent from "../components/DatePickerComponent";
import SmIconViewComponent from "../components/buttons/SmIconViewComponent";
import statusEnum from "../../../enums/modules/statusEnum";
import sourceEnum from "../../../enums/modules/sourceEnum";
import posPaymentMethodEnum from "../../../enums/modules/posPaymentMethodEnum";
import PdfComponent from "../components/buttons/export/PdfComponent";

export default {
    name: "SalesReportListComponent",
    components: {
        TableLimitComponent,
        PaginationSMBox,
        PaginationBox,
        PaginationTextComponent,
        LoadingComponent,
        ExportComponent,
        FilterComponent,
        PrintComponent,
        ExcelComponent,
        DatePickerComponent,
        SmIconViewComponent,
        PdfComponent
    },

    data() {
        return {
            loading: {
                isActive: false
            },
            enums: {
                paymentStatusEnum: paymentStatusEnum,
                orderStatusEnum: orderStatusEnum,
                posPaymentMethodEnum: posPaymentMethodEnum,
                sourceEnum: sourceEnum,
                paymentStatusEnumArray: {
                    [paymentStatusEnum.PAID]: this.$t("label.paid"),
                    [paymentStatusEnum.UNPAID]: this.$t("label.unpaid")
                },
                orderStatusEnumArray: {
                    [orderStatusEnum.CONFIRMED]: this.$t("label.confirmed"),
                    [orderStatusEnum.DELIVERED]: this.$t("label.delivered"),
                },
            },
            printLoading: true,
            printObj: {
                id: "print",
                popTitle: this.$t('menu.sales_report')
            },
            props: {
                search: {
                    paginate: 1,
                    page: 1,
                    per_page: 10,
                    order_column: 'id',
                    payment_status: null,
                    payment_method: null,
                    order_serial_no: "",
                    status: null,
                    from_date: "",
                    to_date: "",
                    source: null,
                }
            },
            modelValue: null
        }
    },
    mounted() {
        this.list();
    },
    computed: {
        salesReports: function () {
            return this.$store.getters['salesReport/lists'];
        },
        pagination: function () {
            return this.$store.getters['salesReport/pagination'];
        },
        paginationPage: function () {
            return this.$store.getters['salesReport/page'];
        },
        salesReportOverview: function () {
            return this.$store.getters['salesReport/salesReportOverview'];
        }
    },
    methods: {
        floatNumber(e) {
            return appService.floatNumber(e);
        },
        statusClass: function (status) {
            return appService.statusClass(status);
        },
        textShortener: function (text, number = 30) {
            return appService.textShortener(text, number);
        },
        search: function () {
            this.list();
        },
        handleDate: function (e) {
            if (e) {
                this.props.search.from_date = e[0];
                this.props.search.to_date = e[1];
            } else {
                this.props.search.from_date = null;
                this.props.search.to_date = null;

            }
        },

        clear: function () {
            this.props.search.paginate = 1;
            this.props.search.page = 1;
            this.props.search.order_serial_no = "";
            this.props.search.payment_status = null;
            this.props.search.payment_method = null;
            this.props.search.status = null;
            this.props.search.from_date = "";
            this.props.search.to_date = "";
            this.props.search.source = null;
            this.modelValue = null;
            this.list();
        },
        list: function (page = 1) {
            this.loading.isActive = true;
            this.props.search.page = page;
            this.$store.dispatch('salesReport/lists', this.props.search).then(res => {
                this.loading.isActive = false;
            }).catch((err) => {
                this.loading.isActive = false;
            });
            this.$store.dispatch('salesReport/salesReportOverview', this.props.search).then(res => {
                this.loading.isActive = false;
            }).catch((err) => {
                this.loading.isActive = false;
            });
        },

        xls: function () {
            this.loading.isActive = true;
            this.$store.dispatch('salesReport/export', this.props.search).then(res => {
                this.loading.isActive = false;
                const blob = new Blob([res.data], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = this.$t("menu.sales_report");
                link.click();
                URL.revokeObjectURL(link.href);
            }).catch((err) => {
                this.loading.isActive = false;
                alertService.error(err.response.data.message);
            });
        },
        downloadPdf: function () {
            this.loading.isActive = true;
            this.$store.dispatch("salesReport/exportPdf", this.props.search).then((res) => {
                this.loading.isActive = false;
                const blob = new Blob([res.data], { type: 'application/pdf' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = "Sales-report.pdf";
                link.click();
                URL.revokeObjectURL(link.href);
            }).catch((err) => {
                this.loading.isActive = false;
                alertService.error(err.response.data.message);
            });
        }
    }
}
</script>
<style scoped>
@media print {
    .hidden-print {
        display: none !important;
    }
}
</style>