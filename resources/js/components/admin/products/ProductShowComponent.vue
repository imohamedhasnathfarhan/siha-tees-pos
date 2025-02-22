<template>
    <LoadingComponent :props="loading" />

    <div class="col-12">
        <div id="product" class="db-tab-div active">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 mb-5">

                <button @click.prevent="multiTargets($event, 'tab-action', 'tab-content', 'information')"
                    class="tab-action active w-full flex items-center gap-3 h-10 px-4 rounded-lg bg-white hover:text-primary hover:bg-primary/5">
                    <i class="lab lab-fill-info lab-font-size-16"></i>
                    {{ $t("label.information") }}
                </button>
                <button type="button" @click.prevent="multiTargets($event, 'tab-action', 'tab-content', 'image')"
                    class="tab-action w-full flex items-center gap-3 h-10 px-4 rounded-lg transition bg-white hover:text-primary hover:bg-primary/5">
                    <i class="lab lab-fill-image lab-font-size-16"></i>
                    {{ $t("label.images") }}
                </button>
                <button type="button" @click.prevent="multiTargets($event, 'tab-action', 'tab-content', 'variations')"
                    class="tab-action w-full flex items-center gap-3 h-10 px-4 rounded-lg transition bg-white hover:text-primary hover:bg-primary/5">
                    <i class="lab lab-fill-variation lab-font-size-16"></i>
                    {{ $t("label.variation") }}
                </button>

                <button type="button" @click.prevent="multiTargets($event, 'tab-action', 'tab-content', 'offer')"
                    class="tab-action w-full flex items-center gap-3 h-10 px-4 rounded-lg transition bg-white hover:text-primary hover:bg-primary/5">
                    <i class="lab lab-fill-offers lab-font-size-16"></i>
                    {{ $t("label.offer") }}
                </button>
            </div>

            <div class="db-card tab-content active" id="information">
                <div class="db-card-header">
                    <h3 class="db-card-title">{{ $t('label.information') }}</h3>
                </div>
                <div class="db-card-body">
                    <div class="row py-2">
                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="db-list-item p-0">
                                <span class="db-list-item-title w-full sm:w-1/2">{{ $t("label.name") }}</span>
                                <span class="db-list-item-text w-full sm:w-1/2">{{ product.name }}</span>
                            </div>
                        </div>

                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="db-list-item p-0">
                                <span class="db-list-item-title w-full sm:w-1/2">{{ $t("label.sku") }}</span>
                                <span class="db-list-item-text w-full sm:w-1/2">{{ product.sku }}</span>
                            </div>
                        </div>

                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="db-list-item p-0">
                                <span class="db-list-item-title w-full sm:w-1/2">{{ $t("label.category") }}</span>
                                <span class="db-list-item-text w-full sm:w-1/2">{{ product.category }}</span>
                            </div>
                        </div>

                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="db-list-item p-0">
                                <span class="db-list-item-title w-full sm:w-1/2">{{ $t("label.barcode") }}</span>
                                <span class="db-list-item-text w-full sm:w-1/2">{{ product.barcode }}</span>
                            </div>
                        </div>

                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="db-list-item p-0">
                                <span class="db-list-item-title w-full sm:w-1/2">{{ $t("label.brand") }}</span>
                                <span class="db-list-item-text w-full sm:w-1/2">{{ product.brand }}</span>
                            </div>
                        </div>

                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="db-list-item p-0">
                                <span class="db-list-item-title w-full sm:w-1/2">{{ $t("label.tax") }}</span>
                                <span class="db-list-item-text w-full sm:w-1/2">{{ product.tax }}</span>
                            </div>
                        </div>

                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="db-list-item p-0">
                                <span class="db-list-item-title w-full sm:w-1/2">{{ $t("label.buying_price") }}</span>
                                <span class="db-list-item-text w-full sm:w-1/2">{{ product.flat_buying_price }}</span>
                            </div>
                        </div>

                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="db-list-item p-0">
                                <span class="db-list-item-title w-full sm:w-1/2">{{ $t("label.selling_price") }}</span>
                                <span class="db-list-item-text w-full sm:w-1/2">{{ product.flat_selling_price }}</span>
                            </div>
                        </div>

                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="db-list-item p-0">
                                <span class="db-list-item-title w-full sm:w-1/2">{{
                                    $t("label.maximum_purchase_quantity")
                                }}</span>
                                <span class="db-list-item-text w-full sm:w-1/2">{{ product.maximum_purchase_quantity
                                }}</span>
                            </div>
                        </div>

                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="db-list-item p-0">
                                <span class="db-list-item-title w-full sm:w-1/2">{{
                                    $t("label.low_stock_quantity_warning")
                                }}</span>
                                <span class="db-list-item-text w-full sm:w-1/2">{{ product.low_stock_quantity_warning
                                }}</span>
                            </div>
                        </div>

                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="db-list-item p-0">
                                <span class="db-list-item-title w-full sm:w-1/2">{{ $t("label.weight") }}</span>
                                <span class="db-list-item-text w-full sm:w-1/2">{{ product.weight }}</span>
                            </div>
                        </div>

                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="db-list-item p-0">
                                <span class="db-list-item-title w-full sm:w-1/2">{{ $t("label.unit") }}</span>
                                <span class="db-list-item-text w-full sm:w-1/2">{{ product.unit }}</span>
                            </div>
                        </div>

                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="db-list-item p-0">
                                <span class="db-list-item-title w-full sm:w-1/2">{{ $t("label.purchasable") }}</span>
                                <span class="db-list-item-text w-full sm:w-1/2">{{
                                    enums.askEnumArray[product.can_purchasable]
                                }}</span>
                            </div>
                        </div>

                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="db-list-item p-0">
                                <span class="db-list-item-title w-full sm:w-1/2">{{ $t("label.show_stock_out") }}</span>
                                <span class="db-list-item-text w-full sm:w-1/2">{{
                                    enums.activityEnumArray[product.show_stock_out]
                                }}</span>
                            </div>
                        </div>

                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="db-list-item p-0">
                                <span class="db-list-item-title w-full sm:w-1/2">{{ $t("label.refundable") }}</span>
                                <span class="db-list-item-text w-full sm:w-1/2">{{
                                    enums.askEnumArray[product.refundable]
                                }}</span>
                            </div>
                        </div>

                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="db-list-item p-0">
                                <span class="db-list-item-title w-full sm:w-1/2">{{ $t("label.status") }}</span>
                                <span class="db-list-item-text">{{ enums.statusEnumArray[product.status] }}</span>
                            </div>
                        </div>

                        <div class="col-12 sm:col-6 !py-1.5">
                            <div class="db-list-item p-0">
                                <span class="db-list-item-title w-full sm:w-1/2">{{ $t("label.tags") }}</span>
                                <span class="db-list-item-text">{{ product.tags }}</span>
                            </div>
                        </div>

                        <div class="col-12 !py-1.5">
                            <div class="db-list-item p-0">
                                <span class="db-list-item-text mt-2 w-full">
                                    <span class="mt-2 db-list-item-title">{{ $t("label.description") }}</span><br />
                                    <span class="mt-2" v-html="product.description"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="db-card tab-content px-4" id="image">
                <div class="row py-4 p-3">
                    <div class="w-full max-w-[620px] flex flex-col-reverse sm:flex-row gap-3 sm:gap-5">
                        <nav class="flex-shrink-0 w-full sm:max-w-[90px] flex flex-row sm:flex-col gap-3 sm:gap-5">
                            <label for="addImage" v-if="product.images && product.images.length < 6"
                                class="relative w-full h-16 sm:h-20 flex items-center justify-center rounded-2xl cursor-pointer text-heading bg-gray-200">
                                <input type="file" id="addImage" @change="saveImage" ref="imageProperty"
                                    class="w-full h-full absolute -z-10 rounded-2xl opacity-0"
                                    accept="image/png, image/jpeg, image/jpg">
                                <i class="lab-fill-circle-plus text-xl sm:text-3xl"></i>
                            </label>

                            <button class="w-full" type="button" v-for="(image, index) in product.images">
                                <img class="w-full h-16 sm:h-20 object-top object-cover rounded-2xl" :src="image"
                                    alt="product" @click.prevent="switchImage(image, index)" />
                            </button>
                        </nav>
                        <div class="w-full relative" v-if="livePreview">
                            <img class="w-full h-96 sm:h-[480px] object-top object-cover rounded-2xl" alt="products"
                                :src="livePreview" />
                            <button v-if="imageCount > 0" @click.prevent="deleteImage"
                                class="lab-line-cross text-3xl absolute -top-3 -right-3 w-9 h-9 leading-9 text-center rounded-full shadow-md bg-white text-danger"
                                type="button"></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="db-card tab-content" id="variations">
                <ProductVariationListComponent />
            </div>

            <div class="db-card tab-content" id="offer">
                <div class="db-card-header">
                    <h3 class="db-card-title">{{ $t('label.offer') }}</h3>
                </div>
                <div class="db-card-body">
                    <form @submit.prevent="offerSsave" class="d-block w-full">
                        <div class="form-row">
                            <div class="form-col-12 sm:form-col-6">
                                <label for="offer_start_date" class="db-field-title required">{{
                                    $t("label.offer_start_date")
                                }}</label>
                                <Datepicker hideInputIcon autoApply v-model="form.offer_start_date" :enableTimePicker="true"
                                    :is24="false" :monthChangeOnScroll="false" utc="false"
                                    :input-class-name="offerError.offer_start_date ? 'invalid' : ''">
                                    <template #am-pm-button="{ toggle, value }">
                                        <button @click="toggle">{{ value }}</button>
                                    </template>
                                </Datepicker>
                                <small class="db-field-alert" v-if="offerError.offer_start_date">{{
                                    offerError.offer_start_date[0]
                                }}</small>
                            </div>
                            <div class="form-col-12 sm:form-col-6">
                                <label for="offer_end_date" class="db-field-title required">{{ $t("label.offer_end_date")
                                }}</label>
                                <Datepicker hideInputIcon autoApply v-model="form.offer_end_date" :enableTimePicker="true"
                                    :is24="false" :monthChangeOnScroll="false" utc="false"
                                    :input-class-name="offerError.offer_end_date ? 'invalid' : ''">
                                    <template #am-pm-button="{ toggle, value }">
                                        <button @click="toggle">{{ value }}</button>
                                    </template>
                                </Datepicker>
                                <small class="db-field-alert" v-if="offerError.offer_end_date">{{
                                    offerError.offer_end_date[0]
                                }}</small>
                            </div>

                            <div class="form-col-12 sm:form-col-6">
                                <label for="discount" class="db-field-title required">
                                    {{ $t("label.discount_percentage") }}
                                </label>
                                <input v-model="form.discount" v-on:keypress="floatNumber($event)"
                                    v-bind:class="offerError.discount ? 'invalid' : ''" type="text" id="discount"
                                    class="db-field-control" />
                                <small class="db-field-alert" v-if="offerError.discount">{{ offerError.discount[0]
                                }}</small>
                            </div>

                            <div class="form-col-12 sm:form-col-6">
                                <label class="db-field-title required" for="yes">{{ $t("label.add_to_flash_sale")
                                }}</label>
                                <div class="db-field-radio-group">
                                    <div class="db-field-radio">
                                        <div class="custom-radio">
                                            <input type="radio" v-model="form.add_to_flash_sale" id="yes"
                                                :value="enums.askEnum.YES" class="custom-radio-field">
                                            <span class="custom-radio-span"></span>
                                        </div>
                                        <label for="yes" class="db-field-label">{{ $t('label.yes') }}</label>
                                    </div>
                                    <div class="db-field-radio">
                                        <div class="custom-radio">
                                            <input type="radio" class="custom-radio-field" v-model="form.add_to_flash_sale"
                                                id="no" :value="enums.askEnum.NO">
                                            <span class="custom-radio-span"></span>
                                        </div>
                                        <label for="no" class="db-field-label">{{ $t('label.no') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-col-12">
                                <button type="submit" class="db-btn text-white bg-primary">
                                    <i class="lab lab-fill-save"></i>
                                    <span>{{ $t("button.save") }}</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import LoadingComponent from "../components/LoadingComponent";
import statusEnum from "../../../enums/modules/statusEnum";
import askEnum from "../../../enums/modules/askEnum";
import appService from "../../../services/appService";
import targetService from "../../../services/targetService";
import alertService from "../../../services/alertService";
import ProductVariationListComponent from "./variation/ProductVariationListComponent";
import { quillEditor } from 'vue3-quill'
import Datepicker from "@vuepic/vue-datepicker";
import activityEnum from "../../../enums/modules/activityEnum";

export default {
    name: "ProductShowComponent",
    components: {
        LoadingComponent,
        ProductVariationListComponent,
        quillEditor,
        Datepicker
    },
    data() {
        return {
            loading: {
                isActive: false,
            },
            tabMore: false,
            enums: {
                statusEnum: statusEnum,
                askEnum: askEnum,
                statusEnumArray: {
                    [statusEnum.ACTIVE]: this.$t("label.active"),
                    [statusEnum.INACTIVE]: this.$t("label.inactive"),
                },
                askEnumArray: {
                    [askEnum.YES]: this.$t("label.yes"),
                    [askEnum.NO]: this.$t("label.no"),
                },
                activityEnumArray: {
                    [activityEnum.ENABLE]: this.$t("label.enable"),
                    [activityEnum.DISABLE]: this.$t("label.disable"),
                }
            },
            deleteIndex: 0,
            imageCount: 0,
            defaultImage: null,
            previewImage: null,
            livePreview: null,
            form: {
                add_to_flash_sale: "",
                discount: "1.5",
                offer_start_date: "",
                offer_end_date: "",
            },
            offerError: {},
        };
    },
    computed: {
        product: function () {
            return this.$store.getters["product/show"];
        },

    },
    mounted() {
        this.loading.isActive = true;
        this.show();
    },
    methods: {
        multiTargets: function (event, commonBtnClass, commonDivClass, targetID) {
            targetService.multiTargets(event, commonBtnClass, commonDivClass, targetID);
        },
        floatNumber(e) {
            return appService.floatNumber(e);
        },
        switchImage: function (link, index) {
            this.livePreview = link;
            this.deleteIndex = index;
        },
        show: function () {
            this.$store.dispatch("product/show", this.$route.params.id).then((res) => {
                this.defaultImage = res.data.data.preview;
                this.previewImage = res.data.data.preview;
                this.livePreview = res.data.data.image;
                this.imageCount = res.data.data.images.length;
                this.form.add_to_flash_sale = res.data.data.add_to_flash_sale;
                this.form.discount = res.data.data.discount_percentage;
                this.form.offer_start_date = res.data.data.offer_start_date;
                this.form.offer_end_date = res.data.data.offer_end_date;
                this.loading.isActive = false;
            }).catch((error) => {
                this.loading.isActive = false;
            });
        },
        saveImage: function () {
            if (this.$refs.imageProperty.files[0]) {
                try {
                    this.loading.isActive = true;
                    const formData = new FormData();
                    formData.append("image", this.$refs.imageProperty.files[0]);
                    this.$store.dispatch("product/uploadImage", {
                        id: this.$route.params.id,
                        form: formData
                    }).then((res) => {
                        alertService.success(this.$t("message.image_update"));
                        this.defaultImage = res.data.data.preview;
                        this.previewImage = res.data.data.preview;
                        this.livePreview = res.data.data.image;
                        this.imageCount = res.data.data.images.length;

                        if (this.$refs.imageProperty) {
                            this.$refs.imageProperty.value = null;
                        }
                        this.loading.isActive = false;
                    }).catch((err) => {
                        this.loading.isActive = false;
                        alertService.error(err.response.data.errors.image[0]);
                    });
                } catch (err) {
                    this.loading.isActive = false;
                    alertService.error(err.response.data.message);
                }
            }
        },
        deleteImage: function () {
            appService.destroyConfirmation().then((res) => {
                try {
                    this.loading.isActive = true;
                    this.$store.dispatch("product/deleteImage", {
                        id: this.$route.params.id,
                        index: this.deleteIndex,
                    }).then((res) => {
                        this.show();
                        this.loading.isActive = false;
                        alertService.success(this.$t("message.image_delete"));
                        this.deleteIndex = 0;
                    }).catch((err) => {
                        this.loading.isActive = false;
                        alertService.error(err.response.data.message);
                    });
                } catch (err) {
                    this.loading.isActive = false;
                    alertService.error(err.response.data.message);
                }
            }).catch((err) => {
                this.loading.isActive = false;
            });
        },
        offerSsave: function () {
            try {
                this.loading.isActive = true;
                this.$store.dispatch("product/productOffer", {
                    id: this.$route.params.id,
                    form: this.form,
                }).then((res) => {
                    alertService.success(this.$t("message.product_offer"));
                    this.loading.isActive = false;
                    this.offerError = {};
                }).catch((err) => {
                    this.loading.isActive = false;
                    this.offerError = err.response.data.errors;
                });
            } catch (err) {
                this.loading.isActive = false;
                alertService.error(err.response.data.message);
            }
        }
    },
};
</script>
