<template>
    <button class="settings-btn w-full md:hidden flex items-center justify-center gap-2 p-2 rounded bg-primary text-white">
        <span class="capitalize">{{ $t('menu.settings_menu') }}</span>
        <i class="fa-solid fa-chevron-down text-sm"></i>
    </button>
    <div class="h-0 overflow-hidden md:h-auto md:overflow-auto transition-all duration-300 font-medium">
        <nav class="db-card p-3">
            <router-link :to="{ name: 'admin.settings.company' }" class="db-tab-btn">
                <i class="lab lab-line-company text-sm"></i>
                {{ $t("menu.company") }}
            </router-link>
            <router-link :to="{ name: 'admin.settings.site' }" class="db-tab-btn">
                <i class="lab lab-line-site  text-sm"></i>
                {{ $t("menu.site") }}
            </router-link>
            <router-link :to="{ name: 'admin.settings.mail' }" class="db-tab-btn d-none">
                <i class="lab lab-line-mail text-sm"></i>
                {{ $t("menu.mail") }}
            </router-link>
            <router-link :to="{ name: 'admin.settings.locationSetup' }" class="db-tab-btn d-none">
                <i class="lab lab-line-location-setup text-sm"></i>
                {{ $t("menu.location_setup") }}
            </router-link>
            <router-link :to="{ name: 'admin.settings.theme' }" class="db-tab-btn">
                <i class="lab lab-line-theme text-sm"></i>
                {{ $t("menu.theme") }}
            </router-link>
            <router-link :to="{ name: 'admin.settings.currency' }" class="db-tab-btn d-none">
                <i class="lab lab-line-currencies text-sm"></i>
                {{ $t("menu.currencies") }}
            </router-link>
            <router-link :to="{ name: 'admin.settings.productCategory' }" class="db-tab-btn">
                <i class="lab lab-line-item-categories text-sm"></i>
                {{ $t("menu.product_categories") }}
            </router-link>
            <router-link :to="{ name: 'admin.settings.productAttribute' }" class="db-tab-btn">
                <i class="lab lab-line-item-attributes text-sm"></i>
                {{ $t("menu.product_attributes") }}
            </router-link>
            <router-link :to="{ name: 'admin.settings.productBrand' }" class="db-tab-btn">
                <i class="lab lab-line-brand text-sm"></i>
                {{ $t("menu.product_brands") }}
            </router-link>
            <router-link :to="{ name: 'admin.settings.supplier' }" class="db-tab-btn">
                <i class="lab lab-line-supplier text-sm"></i>
                {{ $t("menu.suppliers") }}
            </router-link>
            <router-link :to="{ name: 'admin.settings.unit' }" class="db-tab-btn">
                <i class="lab lab-line-unit text-sm"></i>
                {{ $t("menu.units") }}
            </router-link>
            <router-link :to="{ name: 'admin.settings.tax' }" class="db-tab-btn d-none">
                <i class="lab lab-line-taxes text-sm"></i>
                {{ $t("menu.taxes") }}
            </router-link>
            <router-link :to="{ name: 'admin.settings.role' }" class="db-tab-btn">
                <i class="lab lab-line-role-permission text-sm"></i>
                {{ $t("menu.role_permissions") }}
            </router-link>
            <router-link :to="{ name: 'admin.settings.language' }" class="db-tab-btn d-none">
                <i class="lab lab-line-global text-sm"></i>
                {{ $t("menu.languages") }}
            </router-link>
            <router-link :to="{ name: 'admin.settings.license' }" class="db-tab-btn d-none">
                <i class="lab-line-license-code text-sm"></i>
                {{ $t("menu.license") }}
            </router-link>
        </nav>
    </div>
</template>

<script>
export default {
    name: "MenuComponent",
};
</script>
