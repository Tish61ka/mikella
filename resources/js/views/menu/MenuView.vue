<template>
    <div>
        <FirstSectionComponent></FirstSectionComponent>
    </div>
</template>

<script>
import FirstSectionComponent from '../../components/MenuComponets/FirstSectionComponent.vue';
    export default {
        components:{
            FirstSectionComponent,
        },
        data(){
            return{

            }
        },
        mounted() {
            document.title = 'Меню'
        },
    }
</script>

<style lang="css" scoped>

</style>
