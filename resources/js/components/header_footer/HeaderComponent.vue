<template>
  <div>
    <header id="menu">
      <div class="d-f_adaptive">
        <div>
          <router-link to="/">
            <img src="/img/logo.png" alt="" />
          </router-link>
        </div>

        <div>
          <a class="burger" id="burger" v-on:click="display()">
            <img src="img/burger_menu.svg" alt="" />
          </a>
        </div>
      </div>

      <ul id="navig">
        <li id="logo">
          <router-link to="/">
            <img src="/img/logo.png" alt="" />
          </router-link>
        </li>
        <li><router-link to="/">Главная</router-link></li>
        <li><router-link to="/catalog">Каталог</router-link></li>
        <li v-show="token">
          <router-link to="/cart"
            >Корзина
            <p class="cart_count" v-if="this.$store.state.user.cart_count != 0">
              {{ this.$store.state.user.cart_count }}
            </p></router-link
          >
        </li>
        <li><router-link to="/about">О нас</router-link></li>
        <li>
          <input type="search" placeholder="Поиск" v-model="search" />
          <!-- <img
                        class="search"
                        src="img/search.png"
                        alt=""
                    /> -->
        </li>
        <li>
          <router-link v-show="!token" class="register" to="/register"
            >Регистрация</router-link
          >
          <router-link v-show="token" to="/dashboard">{{
            this.$store.state.user.name
          }}</router-link>
        </li>
      </ul>
      <!-- <a class="burger-menu_button" id="burger" v-on:click="display()">
                    <span class="burger-menu_lines"></span>
                </a> -->
    </header>
  </div>
</template>

<script>
export default {
  data() {
    return {
      token: "",
      name: "",
      width: window.innerWidth,
      cart_count: 0,
      search: "",
    };
  },

  watch: {
    $route() {
      this.getToken();
      this.getName();
      this.countCart();
    },
  },

  mounted() {
    if (window.location.href == "http://127.0.0.1:8000") {
      window.addEventListener("scroll", function () {
        if (pageYOffset >= 50) {
          document.querySelector("header").style.opacity = 1;
        } else {
          document.querySelector("header").style.opacity = 0;
        }
      });
    } else {
      document.querySelector("header").style.opacity = 1;
      document.querySelector("header").style.position = "relative";
    }

    this.countCart();
    this.getToken();
    this.getName();
    window.addEventListener(
      "resize",
      function () {
        let width_window = this.innerWidth;
        if (width_window >= 768) {
          document.getElementById("navig").style.display = "flex";
          document.getElementById("navig").style.opacity = "1";
        } else {
          document.getElementById("navig").style.display = "none";
          document.getElementById("burger").style.display = "block";
          document.getElementById("navig").style.opacity = "0";
          document.getElementById("burger").style.opacity = "1";
        }
      },
      false
    );
  },

  updated() {
    this.getToken();
    this.getName();
  },

  methods: {
    getToken() {
      this.token = localStorage.getItem("x_xsrf_token");
    },
    countCart() {
      if (this.token) {
        this.cart_count = 0;
        axios.get("/api/cart/all").then((res) => {
          for (let index = 0; index < res.data.data.length; index++) {
            this.cart_count += res.data.data[index].count;
          }
          this.$store.state.user.cart_count = this.cart_count;
        });
      }
    },
    getName() {
      this.$store.state.user.name = localStorage.getItem("name");
    },
    display() {
      if (document.getElementById("navig").style.opacity == "1") {
        document.getElementById("navig").style.opacity = "0";
        document.getElementById("navig").style.display = "none";
      } else {
        document.getElementById("navig").style.opacity = "1";
        document.getElementById("navig").style.display = "flex";
      }
    },
  },
};
</script>

<style lang="css" scoped>
header {
  width: 100vw;
  height: 100px;
  position: fixed;
  opacity: 0;
  transition: 500ms;
  background: rgba(0, 0, 0, 0.9);
  z-index: 1000;
}
.cart_count {
  position: absolute;
  top: 3%;
  right: 54%;
  background: #ad9562;
  width: 20px;
  height: 20px;
  border-radius: 100%;
  font-size: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.d-f_adaptive {
  display: none;
}
.burger {
  display: none;
}
ul {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: space-evenly;
  align-items: center;
}
img {
  width: 150px;
  height: 40px;
}
a {
  color: white;
  font-family: "Comfortaa", cursive;
  font-size: 18px;
}
li input {
  height: 44px;
  width: 400px;
  background: transparent;
  border: white 2px solid;
  border-radius: 13px;
  color: white;
  font-family: "Comfortaa", cursive;
  padding-left: 10px;
  margin-right: 20px;
}
li input::placeholder {
  color: white;
}
.search {
  position: relative;
  width: 30px;
  height: 30px;
  /* margin-left: -70px; */
  /* margin-bottom: -10px; */
  left: -70px;
  bottom: -10px;
  z-index: 2;
}
button {
  background: transparent;
  border: none;
}
.register {
  padding: 10px 30px;
  border-radius: 12px;
  border: 2px #ad9562 solid;
  transition: 0.5s;
}
.register:hover {
  background-color: #ad9562;
  color: #212529;
}
@media screen and (max-width: 1024px) {
  ul li a {
    font-size: 15px;
  }
  .adaptive input {
    width: 30vw;
  }
  ul li img {
    width: 15vw;
    height: 4vw;
  }
  ul li:last-child {
    padding: 7px 25px;
  }
}
@media screen and (max-width: 768px) {
  #logo {
    display: none;
  }
  .burger {
    display: block;
    z-index: 10;
  }
  .burger img {
    width: 44px;
    height: 44px;
  }
  ul {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5vw;
    margin-top: 5vw;
    font-weight: bolder;
    font-size: 30px;
  }
  li input {
    width: 50vw;
  }
  .d-f_adaptive {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-around;
  }
}
</style>
