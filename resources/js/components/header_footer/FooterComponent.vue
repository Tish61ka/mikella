<template>
    <div>
        <footer>
            <ul>
                <a href="/policy.html">
                    <li>Политика конфедициальности</li></a>
                <router-link to="/catalog">
                    <li>Каталог</li></router-link>
                <a href="/Условия сделки.docx">
                    <li>Условия брони</li></a>
                <router-link to="/">
                    <li class="adaptive"><img src="../../../../public/img/logo.png" alt="" /></li></router-link>
                 <a href="/yslovie.html">
                    <li>Соглашени на обработку данных</li></a>
                <a href="https://Tish61ka.github.io/admin">
                    <li>Партнеры</li></a>
                <a href="/Условия сделки.docx">
                    <li>Условия сделки</li></a>
            </ul>
        </footer>
    </div>
</template>

<script>
export default {
    data() {
        return {};
    },
};
</script>

<style lang="css" scoped>
ul {
    height: 200px;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    box-shadow: 0 -4px 30px black;
}
ul li {
    color: white;
    font-family: "Comfortaa", cursive;
}
ul li img {
    width: 150px;
    height: 40px;
}
@media screen and (max-width: 1439px) {
    li {
        display: none;
    }
    .adaptive {
        display: block;
    }
}
</style>
