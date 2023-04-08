<template>
    <transition name="scale" mode="out-in">
        <div
            v-if="
                this.$route.path === '/register' ||
                this.$route.path === '/login' ||
                this.$route.path === '/admin'
            "
        ></div>
        <HeaderComponentVue v-else></HeaderComponentVue>
    </transition>

    <router-view v-slot="{ Component, route }">
        <transition name="scale" mode="out-in">
            <component :is="Component" :key="route.path"></component>
        </transition>

        <transition name="scale1" mode="out-in">
            <div :key="route.path" class="bg"></div>
        </transition>

        <transition name="bounce" mode="out-in">
            <div :key="route.path" class="translate">
                <img src="img/logo.png" alt="" />
            </div>
        </transition>

        <transition name="bounce2" mode="out-in">
            <div :key="route.path" class="translate2">
                <img src="img/animation.png" alt="" />
            </div>
        </transition>
    </router-view>

    <transition name="scale" mode="out-in">
        <div
            v-if="
                this.$route.path === '/register' ||
                this.$route.path === '/login' ||
                this.$route.path === '/admin'
            "
        ></div>
        <FooterComponentVue v-else></FooterComponentVue>
    </transition>
</template>
<script lang="ts">
import HeaderComponentVue from "../../components/header_footer/HeaderComponent.vue";
import FooterComponentVue from "../../components/header_footer/FooterComponent.vue";
export default {
    components: { HeaderComponentVue, FooterComponentVue },

    data() {
        return {};
    },

    computed: {
        headerTab() {
            if (this.$route.path === "/register") {
                HeaderComponentVue;
            }
        },
    },
};
</script>
<style lang="css">
@import url("https://fonts.googleapis.com/css2?family=Comfortaa&display=swap"); /* font-family: 'Comfortaa', cursive; */
@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap"); /* font-family: 'Roboto', sans-serif; */
@import url("https://fonts.googleapis.com/css2?family=Cabin&display=swap"); /* font-family: 'Cabin', sans-serif; */

.scale-enter-active,
.scale-leave-active {
    transition: all 1s;
}
.scale-enter-from,
.scale-leave-to {
    opacity: 0;
}

/* .scale1-enter-active,
.scale1-leave-active {
    transition: all 4s;
} */

/* .scale1-enter-from {
    opacity: 1;
} */

/* .scale1-leave-to {
    transition: all 0.5s;
} */

.bounce-enter-active {
    animation: bounce-in 4s;
}
/* .bounce-leave-active {
    animation: bounce-in 4s;
} */
@keyframes bounce-in {
    0% {
        opacity: 1;
        transform: translateX(0%);
    }
    100% {
        transform: translateX(250%);
    }
}
.bounce2-enter-active {
    animation: bounce2-in 2s;
}
/* .bounce2-leave-active {
    animation: bounce2-in 2s;
} */
@keyframes bounce2-in {
    0% {
        /* opacity: 1; */
        transform: translateX(0%);
    }
    100% {
        transform: translateX(170%);
    }
}
.bg {
    position: fixed;
    top: 0;
    left: -100%;
    width: 100%;
    height: 130%;
    background: #212529;
}
.translate {
    position: fixed;
    top: 0;
    left: -100%;
    /* background: #212529; */
    height: 110vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.translate img {
    width: 25vw;
}
.translate2 {
    position: fixed;
    top: -50px;
    left: -100%;
    background: transparent;
    height: 110vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.translate2 img {
    /* width: ; */
    height: 100vh;
}
@media screen and (max-width: 555px) {
    .translate2 {
        left: -100vh;
    }
}
</style>
