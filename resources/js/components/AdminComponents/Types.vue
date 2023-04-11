<template>
    <div style="display: flex; flex-direction: row">
        <div class="add_product">
            <p>Админ панель / Тип товара</p>
            <h1>Тип товара</h1>
            <form action="">
                <input type="text" v-model="type" placeholder="Введите тип товара" />

                <button @click.prevent="addType()">Добавить</button>
            </form>
        </div>
        <div style="width: 60%">
            <div class="h2_tovar">
                <h2>Все типы</h2>
            </div>
            <div class="all_product">
                <div style="
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 65vh;
                width: 100%;
              " v-if="load == true">
                    <div class="fulfilling-bouncing-circle-spinner">
                        <div class="circle"></div>
                        <div class="orbit"></div>
                    </div>
                </div>
                <div v-else v-for="i in types" :key="i">
                    <div class="card">
                        <p>{{ i.type }}</p>
                        <div style="cursor: pointer" @click.prevent="deleteType(i.id)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="40px" height="40px">
                                <path fill="#F44336" d="M21.5 4.5H26.501V43.5H21.5z" transform="rotate(45.001 24 24)" />
                                <path fill="#F44336" d="M21.5 4.5H26.5V43.501H21.5z" transform="rotate(135.008 24 24)" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            load: true,
            types: [],
            type: "",
        };
    },
    mounted() {
        this.AllTypes();
    },
    methods: {
        AllTypes() {
            axios.get("/api/type_all").then((res) => {
                this.types = res.data;
                this.load = false;
            });
        },
        addType() {
            axios.post("/api/add/type", { type: this.type }).then((res) => {
                this.type = "";
                this.AllTypes();
            });
        },
        deleteType(id) {
            axios.post(`/api/delete/type/${id}`).then((res) => {
                this.AllTypes();
            });
        },
    },
};
</script>

<style lang="css" scoped>
.fulfilling-bouncing-circle-spinner,
.fulfilling-bouncing-circle-spinner * {
    box-sizing: border-box;
}

.fulfilling-bouncing-circle-spinner {
    height: 60px;
    width: 60px;
    position: relative;
    animation: fulfilling-bouncing-circle-spinner-animation infinite 4000ms ease;
    display: flex;
}

.fulfilling-bouncing-circle-spinner .orbit {
    height: 60px;
    width: 60px;
    position: absolute;
    top: 0;
    left: 0;
    border-radius: 50%;
    border: calc(60px * 0.03) solid #c22020;
    animation: fulfilling-bouncing-circle-spinner-orbit-animation infinite 4000ms ease;
}

.fulfilling-bouncing-circle-spinner .circle {
    height: 60px;
    width: 60px;
    color: #c22020;
    display: block;
    border-radius: 50%;
    position: relative;
    border: calc(60px * 0.1) solid #c22020;
    animation: fulfilling-bouncing-circle-spinner-circle-animation infinite 4000ms ease;
    transform: rotate(0deg) scale(1);
}

@keyframes fulfilling-bouncing-circle-spinner-animation {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

@keyframes fulfilling-bouncing-circle-spinner-orbit-animation {
    0% {
        transform: scale(1);
    }

    50% {
        transform: scale(1);
    }

    62.5% {
        transform: scale(0.8);
    }

    75% {
        transform: scale(1);
    }

    87.5% {
        transform: scale(0.8);
    }

    100% {
        transform: scale(1);
    }
}

@keyframes fulfilling-bouncing-circle-spinner-circle-animation {
    0% {
        transform: scale(1);
        border-color: transparent;
        border-top-color: inherit;
    }

    16.7% {
        border-color: transparent;
        border-top-color: initial;
        border-right-color: initial;
    }

    33.4% {
        border-color: transparent;
        border-top-color: inherit;
        border-right-color: inherit;
        border-bottom-color: inherit;
    }

    50% {
        border-color: inherit;
        transform: scale(1);
    }

    62.5% {
        border-color: inherit;
        transform: scale(1.4);
    }

    75% {
        border-color: inherit;
        transform: scale(1);
        opacity: 1;
    }

    87.5% {
        border-color: inherit;
        transform: scale(1.4);
    }

    100% {
        border-color: transparent;
        border-top-color: inherit;
        transform: scale(1);
    }
}

* {
    color: white;
}

.h2_tovar {
    font-size: 25px;
    font-family: "Comfortaa", serif;
    margin-top: 55px;
    border-bottom: 2px solid #ad9562;
    width: 70%;
    padding-bottom: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: 150px;
}

.add_product .file_name {
    margin-top: 0px;
    margin-bottom: 0px;
    text-align: center;
    color: white;
}

.add_product {
    font-family: "Comfortaa", serif;
    width: 40%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.add_product p {
    color: #ad9562;
    font-size: 15px;
    margin-top: 15px;
    margin-bottom: 25px;
}

.add_product h1 {
    border-bottom: 2px solid #ad9562;
    padding-bottom: 35px;
}

form {
    display: flex;
    flex-direction: column;
    gap: 25px;
    border: 2px solid #ad9562;
    padding: 40px;
    background: #1d2023;
    border-radius: 15px;
    margin-top: 50px;
}

form input,
label {
    background: transparent;
    border: 2px #ad9562 solid;
    height: 50px;
    width: 310px;
    border-radius: 15px;
}

label {
    text-align: center;
    padding-top: 10px;
    height: 30px;
    cursor: pointer;
}

input[type="file"] {
    display: none;
}

form textarea {
    background: transparent;
    border: 2px #ad9562 solid;
    height: 209px;
    width: 310px;
    border-radius: 15px;
    resize: none;
    font-family: "Comfortaa", serif;
    font-size: 15px;
    padding-left: 5px;
    padding-top: 10px;
}

form input {
    font-family: "Comfortaa", serif;
    font-size: 15px;
    padding-left: 5px;
}

input::placeholder,
textarea::placeholder {
    color: white;
    font-family: "Comfortaa", serif;
    font-size: 16px;
}

button {
    background: transparent;
    width: 310px;
    height: 50px;
    border: 2px solid #ad9562;
    font-family: "Comfortaa", serif;
    border-radius: 15px;
    font-size: 16px;
    transition: 0.5s;
}

button:hover {
    background: #ad9562;
    color: #1d2023;
    cursor: pointer;
    font-weight: bold;
}

select {
    width: 310px;
    height: 30px;
    background: transparent;
    border: 2px solid #ad9562;
    font-family: "Comfortaa", serif;
    border-radius: 5px;
}

select:focus-visible {
    border: 2px solid #ad9562;
    font-family: "Comfortaa", serif;
    outline: none;
}

option {
    background-color: #1d2023;
    color: white;
}

.all_product {
    border-left: 2px solid #ad9562;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1vw;
    padding: 100px;
}

.card {
    width: 130px;
    height: 90px;
    background: #1d2023;
    border: 2px solid #ad9562;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 0.5vw;
    color: white;
}

.card p {
    font-size: 17px;
}

.card .price {
    font-size: 25px;
}

.card img {
    width: 240px;
    height: 180px;
    border-radius: 5px;
}</style>