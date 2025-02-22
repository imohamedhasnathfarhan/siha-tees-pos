<template>
    <div v-if="theme === 'frontend'">
        <router-view></router-view>
    </div>

    <div v-if="theme === 'backend'">
        <main class="db-main" v-if="logged">
            <BackendNavbarComponent />
            <BackendMenuComponent />
            <router-view></router-view>
        </main>
        <div v-if="!logged">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import BackendNavbarComponent from "./layouts/backend/BackendNavbarComponent";
import BackendMenuComponent from "./layouts/backend/BackendMenuComponent";
import env from "../config/env";
import DisplayModeEnum from "../enums/modules/displayModeEnum";

export default {
    name: "DefaultComponent",
    components: {
        BackendNavbarComponent,
        BackendMenuComponent,
    },
    data() {
        return {
            theme: "frontend",
        }
    },
    computed: {
        logged: function () {
            return this.$store.getters.authStatus;
        },
        displayMode: function () {
            return this.$store.getters['globalState/lists'].display_mode;
        },
    },
    beforeMount() {
        this.displayModeDefine();
        this.$store.dispatch('frontendSetting/lists').then(res => {

            this.$store.dispatch('frontendLanguage/show', res.data.data.site_default_language).then(res => {
                
            }).catch();
            this.$store.dispatch("globalState/init", {
                language_id: res.data.data.site_default_language
            });

            if ( env.DEMO.toLocaleLowerCase() === "true" || env.DEMO.toLocaleLowerCase() === true || env.DEMO === "1" || env.DEMO === 1) {
            this.$store.dispatch("authcheck").then(res => {
                if (res.data.status === false) {
                    this.$router.push({ name: "auth.login" });
                };
            }).catch();
        }


        }).catch();
    },
    methods: {
        displayModeDefine: function () {
            let dir = "ltr";
            const attributes = {
                dir: "ltr",
            };

            if (this.$store.getters['globalState/lists'].display_mode === DisplayModeEnum.RTL) {
                dir = "rtl";
            } else {
                dir = "ltr";
            }
            Object.keys(attributes).forEach(attr => {
                document.documentElement.setAttribute(attr, dir);
            });
        }
    },
    watch: {
        $route(e) {
            if (e.meta.isFrontend === true) {
                this.theme = "frontend";
            } else {
                this.theme = "backend";
            }
        },
        displayMode() {
            this.displayModeDefine();
        }
    },
}
</script>
