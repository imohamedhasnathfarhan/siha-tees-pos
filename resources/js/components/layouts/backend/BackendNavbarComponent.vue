<template>
    <div class="backdrop"></div>
    <header class="db-header">
        <router-link class="w-32 flex-shrink-0" :to="{ name: 'admin.dashboard' }">
            <img class="w-full" :src="setting.theme_logo" alt="logo">
        </router-link>
        <div class="flex items-center justify-end w-full gap-4">
            <div
                class="sub-header flex items-center gap-4 transition xh:justify-between xh:fixed xh:left-0 xh:w-full xh:p-4 xh:border-y xh:border-[#EFF0F6] xh:bg-white">
                <div class="flex items-center justify-between md:justify-center gap-4">
                    <div v-if="setting.site_language_switch === enums.activityEnum.ENABLE" class="dropdown-group relative">
                        <button class="dropdown-btn flex items-center gap-2 h-9 px-3 rounded-lg bg-[#FFEDF4]">
                            <img :src="language.image" alt="flag" class="w-4 h-4 rounded-full">
                            <span class="hidden md:block whitespace-nowrap text-xs font-medium capitalize text-heading">
                                {{ language.name }}
                            </span>
                        </button>
                        <ul v-if="languages.length > 0"
                            class="p-2 min-w-[180px] rounded-lg shadow-xl absolute top-14 right-0 z-10 border border-gray-200 bg-white hidden dropdown-list">
                            <li @click="changeLanguage(language.id, language.code, language.display_mode)" v-for="language in languages"
                                class="flex items-center gap-2 py-1.5 px-2.5 rounded-md cursor-pointer hover:bg-gray-100">
                                <img :src="language.image" alt="flag" class="w-4 h-4 rounded-full">
                                <span class="text-heading capitalize text-sm">{{ language.name }}</span>
                            </li>
                        </ul>
                    </div>

                    <router-link v-if="pos.permission"
                        class="w-9 h-9 rounded-lg flex items-center justify-center text-primary bg-[#FFEBD8]"
                        :to="{ path: '/admin/' + pos.url }">
                        <i class="lab lab-fill-pos lab-font-size-16 font-fill-pos"></i>
                    </router-link>
                </div>
            </div>
            <button class="fa-solid fa-align-left db-header-nav w-9 h-9 rounded-lg text-primary bg-primary/5"></button>

            <div class="dropdown-group">
                <button class="dropdown-btn flex items-center gap-2">
                    <img class="flex-shrink-0 w-9 h-9 object-cover rounded-lg" :src="authInfo.image" alt="avatar">
                    <h3 class="whitespace-nowrap text-sm capitalize text-left leading-[17px]">{{ $t('label.hello') }} <b
                            class="block font-semibold">{{ textShortener(authInfo.name, 15) }}</b></h3>
                    <i class="lab lab-arrow-down text-xs ml-1.5 lab-font-size-14"></i>
                </button>
                <div
                    class="dropdown-list fixed sm:absolute top-[75px] sm:top-12 ltr:right-0 rtl:left-0 z-[60] rounded-xl w-full h-[calc(100vh_-_75px)] overflow-y-auto sm:h-auto sm:w-[360px] p-4 shadow-paper bg-white">
                    <div class="w-fit mx-auto text-center mb-5">
                        <figure
                            class="relative z-10 w-[98px] h-[98px] border-2 border-dashed rounded-full inline-flex items-center justify-center border-white bg-gradient-to-t from-[#FF7A00] to-[#FF016C] before:absolute before:top-1/2 before:left-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:w-24 before:h-24 before:rounded-full before:-z-10 before:bg-white">
                            <img class="w-[90px] h-[90px] rounded-full shadow-avatar" :src="authInfo.image" alt="avatar">
                        </figure>

                        <label for="imageProperty"
                            class="block w-11 h-11 mx-auto -mt-7 mb-3 relative z-10 rounded-full border-2 cursor-pointer bg-heading border-white">
                            <input @change="saveImage" accept="image/png, image/jpeg, image/jpg" ref="imageProperty"
                                type="file" id="imageProperty" class="w-full h-full rounded-full opacity-0 cursor-pointer">
                            <i
                                class="lab lab-fill-edit absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 -z-10 lab-font-size-24 lab-font-color-1 cursor-pointer"></i>
                        </label>

                        <h3 class="font-medium text-sm leading-6 capitalize mb-0.5">
                            {{ textShortener(authInfo.name, 20) }}
                        </h3>
                        <p class="text-xs mb-0.5">{{ authInfo.email }}</p>
                        <p v-if="authInfo.phone" dir="ltr" class="text-xs">{{ authInfo.country_code }}{{ authInfo.phone }}</p>
                        <h3 class="font-medium text-sm leading-6 capitalize mb-0.5">{{ authInfo.currency_balance }}</h3>
                    </div>
                    <nav>
                        <router-link :to="{ name: 'admin.profile.editProfile' }"
                            class="paper-link transition w-full flex items-center gap-3.5 py-3 border-b last:border-none border-[#EFF0F6]">
                            <i class="lab lab-line-edit lab-font-size-17"></i>
                            <span class="text-sm leading-6 capitalize">{{ $t('button.edit_profile') }}</span>
                        </router-link>

                        <router-link :to="{ name: 'admin.profile.changePassword' }"
                            class="paper-link transition w-full flex items-center gap-3.5 py-3 border-b last:border-none border-[#EFF0F6]">
                            <i class="lab lab-line-key lab-font-size-17"></i>
                            <span class="text-sm leading-6 capitalize">{{ $t('button.change_password') }}</span>
                        </router-link>

                        <button @click="logout()"
                            class="paper-link transition w-full flex items-center gap-3.5 py-3 border-b last:border-none border-[#EFF0F6]">
                            <i class="lab lab-line-logout lab-font-size-17"></i>
                            <span class="text-sm leading-6 capitalize">{{ $t('button.logout') }}</span>
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </header>
</template>

<script>

import {onMounted, ref} from "vue";
import activityEnum from "../../../enums/modules/activityEnum";
import _ from "lodash";
import alertService from "../../../services/alertService";
import appService from "../../../services/appService";

export default {
    name: "BackendNavbarComponent",
    setup() {
        const isSticky = ref();
        onMounted(() => {
            window.addEventListener('scroll', function () {
                let windowScroll = this.scrollY;
                if (windowScroll > 0) {
                    isSticky.value = true;
                } else {
                    isSticky.value = false;
                }
            })
        })
        return {isSticky}
    },
    data() {
        return {
            loading: {
                isActive: false,
            },
            enums: {
                activityEnum: activityEnum
            },
            defaultBranch: null,
            pos: {
                permission: false,
                url: '',
            },
            languageProps: {
                paginate: 0,
                order_column: "id",
                order_type: "asc",
            },
        }
    },
    computed: {
        setting: function () {
            return this.$store.getters['frontendSetting/lists'];
        },
        authInfo: function () {
            return this.$store.getters.authInfo;
        },
        languages: function () {
            return this.$store.getters['frontendLanguage/lists'];
        },
        language: function () {
            return this.$store.getters['frontendLanguage/show'];
        },
        permissions: function () {
            return this.$store.getters.authPermission;
        }
    },
    mounted() {
        appService.responsiveLoad();
        this.posPermissionCheck();
        //this.$store.dispatch('frontendLanguage/lists', this.languageProps).then().catch();


        this.$store.dispatch('frontendSetting/lists').then(res => {
            this.defaultLanguage = res.data.data.site_default_language;
            const globalState = this.$store.getters['globalState/lists'];
            if (globalState.language_id > 0) {
                this.defaultLanguage = globalState.language_id;
            }

            this.loading.isActive = false;
            this.$store.dispatch('frontendLanguage/lists', this.languageProps).then().catch();
            this.$store.dispatch('frontendLanguage/show', this.defaultLanguage).then(res => {
                this.$i18n.locale = res.data.data.code;
                this.$store.dispatch("globalState/init", {
                    language_code: res.data.data.code,
                    display_mode: res.data.data.display_mode
                });
            }).catch();
            this.loading.isActive = false;
        }).catch((err) => {
            this.loading.isActive = false;
        });

    },
    methods: {
        textShortener: function (text, number = 30) {
            return appService.textShortener(text, number);
        },
        logout: function () {
            this.$store.dispatch("logout").then(res => {
                this.$router.push({ name: "auth.login" });
            }).catch();
        },
        changeLanguage: function (id, code, mode) {
            this.defaultLanguage = id;
            this.$store.dispatch("globalState/set", { language_id: id, language_code: code, display_mode:mode}).then(res => {
                this.$store.dispatch('frontendLanguage/show', id).then(res => {
                    this.$i18n.locale = res.data.data.code;
                }).catch();
            }).catch();
        },
        posPermissionCheck: function () {
            const permissions = this.$store.getters.authPermission;
            if (permissions.length > 0) {
                _.forEach(permissions, (permission) => {
                    if (permission.name === 'pos') {
                        if (permission.access === true) {
                            this.pos.permission = true;
                            this.pos.url = permission.url;
                        }
                    }
                });
            }
        },
        saveImage: function () {
            if (this.$refs.imageProperty.files[0]) {
                try {
                    this.loading.isActive = true;
                    const formData = new FormData();
                    formData.append("image", this.$refs.imageProperty.files[0]);
                    this.$store.dispatch("frontendEditProfile/changeImage", { form: formData }).then((res) => {
                        this.$store.dispatch('updateAuthInfo', res.data.data).then(res => {
                            this.loading.isActive = false;
                            alertService.success(this.$t("message.photo_update"));
                            this.$refs.imageProperty.value = null;
                        }).catch((err) => {
                            this.loading.isActive = false;
                            alertService.error(err);
                        });
                    }).catch((err) => {
                        this.loading.isActive = false;
                        this.imageErrors = err.response.data.errors;
                    });
                } catch (err) {
                    this.loading.isActive = false;
                    alertService.error(err.response.data.message);
                }
            }
        }
    }
}
</script>
