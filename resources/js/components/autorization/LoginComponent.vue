<template>
    <div class="background">
        <div class="form">
            <div style="width: 80%">
                <router-link to="/"><img src="img/logo.png" alt="" /></router-link>
                <p class="welcome">Рады вас видеть снова!!!</p>
                <h1>Войти</h1>
            </div>

            <form>
                <div :class="{ error: v$.email.$errors.length }">
                    <label for="email">Email</label>
                    <input v-model="v$.email.$model" type="email" name="email" placeholder="Введите почту" />
                    <div class="input-errors" v-for="(error, index) of v$.email.$errors" :key="index">
                        <div class="error-msg">{{ error.$message }}</div>
                    </div>
                </div>

                <div :class="{ error: v$.password.$errors.length }">
                    <label for="password">Пароль</label>
                    <input v-model="v$.password.$model" type="password" name="password" placeholder="Придумайте пароль" />
                    <div class="input-errors" v-for="(error, index) of v$.password.$errors" :key="index">
                        <div class="error-msg">{{ error.$message }}</div>
                    </div>
                </div>

                <button @click.prevent="login">Войти ⇀</button>
                <p>
                    Нет аккаунта?
                    <router-link to="/register" href="">Зарегистрироваться</router-link>
                </p>
            </form>
        </div>
        <!-- <div class="people">
            <img src="img/people_reg_log.png" alt="" />
        </div> -->
    </div>
</template>

<script>
import useVuelidate from "@vuelidate/core";
import { required, email, minLength, helpers } from "@vuelidate/validators";
export function validName(name) {
    let validNamePattern = new RegExp("^[а-яА-Я]+(?:[-'\\s][а-яА-Я]+)*$");
    if (validNamePattern.test(name)) {
        return true;
    }
    return false;
}
export default {
    name: "Login",
    setup() {
        return { v$: useVuelidate() };
    },
    data() {
        return {
            email: null,
            password: null,
        };
    },
    validations() {
        return {
            name: {
                required: helpers.withMessage(
                    "Обязательное поле для заполнения",
                    required
                ),
                name_validation: {
                    $validator: validName,
                    $message:
                        "Недопустимое имя. Допустимое имя содержит только русские буквы.",
                },
            },
            surname: {
                required: helpers.withMessage(
                    "Обязательное поле для заполнения",
                    required
                ),
                name_validation: {
                    $validator: validName,
                    $message:
                        "Недопустимая фамилия. Допустимая фамилия содержит только русские буквы.",
                },
            },
            email: {
                required: helpers.withMessage(
                    "Обязательное поле для заполнения",
                    required
                ),
                email: helpers.withMessage(
                    "Значение не является действительным адресом электронной почты",
                    email
                ),
            },
            password: {
                required: helpers.withMessage(
                    "Обязательное поле для заполнения",
                    required
                ),
                min: helpers.withMessage(
                    "Минимальное количество символов 8",
                    minLength(8)
                ),
            },
        };
    },
    mounted() {
        document.title = "Войти";
    },
    methods: {
        login() {
            axios.get("/sanctum/csrf-cookie").then((response) => {
                axios
                    .post("/login", {
                        email: this.email,
                        password: this.password,
                    })
                    .then((r) => {
                        console.log(r);
                        this.email = "";
                        this.password = "";
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
                        localStorage.setItem("role", r.data["role"]);
                        if (r.data["role"] == 0) {
                            this.$router.push("/dashboard");
                        } else if (r.data["role"] == 1 || r.data["role"] == 2) {
                            this.$router.push("/admin");
                        } else
                            axios.post("/logout").then((res) => {
                                localStorage.removeItem("x_xsrf_token");
                                localStorage.removeItem("name");
                                localStorage.removeItem("surname");
                                localStorage.removeItem("email");
                                localStorage.removeItem("id");
                                localStorage.removeItem("avatar");
                                localStorage.removeItem("adress");
                                localStorage.removeItem("number");
                                localStorage.removeItem("age");
                                localStorage.removeItem("city");
                                localStorage.removeItem("role");
                                this.$router.push("/login");
                            });
                    })
                    .catch((err) => {
                        console.log(err.response);
                    });
            });
        },
    },
};
</script>

<style lang="css" scoped>
.error {
    display: flex;
    flex-direction: column;
    width: 500px;
}

.error-msg {
    color: #ad9562;
    font-family: "Roboto", serif;
    font-size: 16px;
    padding-top: 0.5vw;
    width: 80%;
}

.background {
    display: flex;
    flex-direction: row;
    align-items: flex-end;
    justify-content: space-around;
    margin-top: 12vh;
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
    height: 750px;
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
    color: #ad9562;
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
    width: 100%;
}

input {
    background: transparent;
    border: 2px #ad9562 solid;
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
    width: 150px;
    height: 45px;
    border-radius: 23px;
    background-color: #ad9562;
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
    .people {
        display: none;
    }
}

@media screen and (max-width: 620px) {
    .form {
        width: 100vw;
    }

    input {
        width: 400px;
    }

    .error {
        width: 400px;
    }
}

@media screen and (max-width: 420px) {
    input {
        width: 300px;
    }

    .error {
        width: 300px;
    }
}</style>