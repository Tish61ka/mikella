<template>
    <div>
        <FirstCartComponent />
    </div>
</template>

<script>
import FirstCartComponent from '../../components/CartComponents/FirstCartComponent.vue';
    export default {
        components: {
            FirstCartComponent
        },
        data() {
            return {
                
            }
        },
        mounted() {
            document.title = 'Корзина'
        },
    }
</script>

<style lang="css" scoped>

</style>