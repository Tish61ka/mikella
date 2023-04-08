<template>
  <div>
    <FirstSectionComponentVue></FirstSectionComponentVue>
    <SecondSectionComponentVue></SecondSectionComponentVue>
    <ThirdSectionComponentVue></ThirdSectionComponentVue>
    <FourSectionComponentVue></FourSectionComponentVue>
  </div>
</template>
<script lang="ts">
import FirstSectionComponentVue from '../../components/MainComponents/FirstSectionComponent.vue';
import SecondSectionComponentVue from '../../components/MainComponents/SecondSectionComponent.vue';
import ThirdSectionComponentVue from '../../components/MainComponents/ThirdSectionComponent.vue';
import FourSectionComponentVue from '../../components/MainComponents/FourSectionComponent.vue'
export default {
  data() {
    return {
      role: '',
    };
  },
  
  mounted(){    
    document.title = "Главная"
  },
  components: {
    FirstSectionComponentVue,
    SecondSectionComponentVue,
    ThirdSectionComponentVue,
    FourSectionComponentVue
  },
};
</script>
<style lang="css" scoped>

</style>