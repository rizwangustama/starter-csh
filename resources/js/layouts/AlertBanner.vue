<template>
    <div class="alert-banner" v-if="$settings.alert_banner !== ''">
        <p class="text-white">{{ $settings.alert_banner }}</p>
    </div>
</template>
<script>
export default {
    
}
</script>
<style lang="scss" scoped>
    .alert-banner{
        @apply w-full bg-blue flex justify-center pt-[15px] pb-5 border-b-4 border-b-red sticky top-0 z-50;
    }
</style>