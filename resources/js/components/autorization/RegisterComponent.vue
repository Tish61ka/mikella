<template>
    <div class="background">
        <div class="form">
            <div style="width: 80%">
                <router-link to="/"
                    ><img src="img/logo.png" alt=""
                /></router-link>
                <p class="welcome">Добро пожаловать!!!</p>
                <h1>Регистрация</h1>
            </div>

            <form>
                <div>
                    <label for="name">Имя</label>
                    <input
                        v-model="name"
                        type="text"
                        name="name"
                        placeholder="Введите имя"
                    />
                </div>

                <div>
                    <label for="surname">Фамилия</label>
                    <input
                        v-model="surname"
                        type="text"
                        name="surname"
                        placeholder="Введите фамилию"
                    />
                </div>

                <div>
                    <label for="email">Email</label>
                    <input
                        v-model="email"
                        type="email"
                        name="email"
                        placeholder="Введите почту"
                    />
                </div>

                <div>
                    <label for="password">Пароль</label>
                    <input
                        v-model="password"
                        type="password"
                        name="password"
                        placeholder="Придумайте пароль"
                    />
                </div>

                <div>
                    <label for="password_confirmation">Повторите пароль</label>
                    <input
                        v-model="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        placeholder="Повторите пароль"
                    />
                </div>

                <button @click.prevent="register">Зарегистрироваться ⇀</button>
                <p>
                    Уже есть аккаунт?
                    <router-link to="/login" href="">Войдите</router-link>
                </p>
            </form>
        </div>
        <div class="people">
            <img src="img/people_reg_log.png" alt="" />
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: "",
            surname: "",
            email: "",
            password: "",
            password_confirmation: "",
        };
    },

    mounted() {
        document.title = "Регистрация";
    },

    methods: {
        register() {
            axios.get("/sanctum/csrf-cookie").then((Response) => {
                axios
                    .post("/register", {
                        name: this.name,
                        surname: this.surname,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password_confirmation,
                    })
                    .then((r) => {
                        console.log(r);
                        this.name = "";
                        this.surname = "";
                        this.email = "";
                        this.password = "";
                        this.password_confirmation = "";
                        localStorage.setItem(
                            "x_xsrf_token",
                            r.config.headers["X-XSRF-TOKEN"]
                        );
                        localStorage.setItem("name", r.data["name"]);
                        localStorage.setItem("surname", r.data["surname"]);
                        localStorage.setItem("email", r.data["email"]);
                        localStorage.setItem("id", r.data["id"]);
                        localStorage.setItem("avatar", r.data["avatar"]);
                        localStorage.setItem("adress", r.data["adress"]);
                        localStorage.setItem("number", r.data["number"]);
                        this.$router.push("/dashboard");
                    });
            });
        },
    },
};
</script>

<style lang="css" scoped>
.background {
    display: flex;
    flex-direction: row;
    align-items: flex-end;
    justify-content: space-around;
    margin-top: 2vh;
}
img {
    width: 200px;
    height: 55px;
    margin-bottom: 25px;
}
.welcome {
    color: rgba(255, 255, 255, 0.5);
}
h1 {
    color: white;
    font-size: 56px;
    font-family: "Cabin", sans-serif;
}
.form {
    background: #1d2023;
    box-shadow: 10px 11px 20px black;
    border-radius: 20px;
    width: 600px;
    height: 900px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.form p {
    color: rgba(255, 255, 255, 0.2);
    font-family: "Cabin", sans-serif;
    font-size: 16px;
    margin: 20px 0;
}
.form p a {
    color: #af3131;
}
form {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
    margin-top: 20px;
}
form div {
    display: flex;
    flex-direction: column;
}
input {
    background: transparent;
    border: 2px #af3131 solid;
    border-radius: 4px;
    width: 480px;
    height: 45px;
    color: white;
    font-size: 16px;
    padding-left: 10px;
    font-family: "Cabin", sans-serif;
}
input::placeholder {
    /* color: white; */
    font-size: 14px;
    font-family: "Cabin", sans-serif;
}
label {
    color: white;
    font-size: 16px;
    font-weight: lighter;
    font-family: "Cabin", sans-serif;
    margin-bottom: 7px;
}
button {
    width: 270px;
    height: 45px;
    border-radius: 23px;
    background-color: #af3131;
    border: none;
    color: white;
    font-size: 16px;
    font-family: "Cabin", sans-serif;
    font-weight: bolder;
    cursor: pointer;
}
.people img {
    width: 730px;
    height: 740px;
}
@media screen and (max-width: 1350px) {
    .people{
        display: none;
    }
}
@media screen and (max-width: 620px) {
    .form{
        width: 100vw;
    }
    input{
        width: 400px;
    }
}
@media screen and (max-width: 420px) {
    input{
        width: 300px;
    }
    h1{
        font-size: 40px;
    }
}
</style>
