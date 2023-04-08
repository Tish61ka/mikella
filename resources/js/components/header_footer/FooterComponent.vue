<template>
    <div>
        <footer>
            <ul>
                <li>Политика конфедициальности</li>
                <li>Условия возврата</li>
                <li>О компании</li>
                <li class="adaptive"><img src="../../../../public/img/logo.png" alt="" /></li>
                <li>Соглашени на обработку данных</li>
                <li>Партнеры</li>
                <li>Условия сделки</li>
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
