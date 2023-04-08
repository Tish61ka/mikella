<template>
  <div class="all">
    <div class="side_filter" v-show="show == true">
      <h2>Фильтры</h2>
      <div class="d-f gap">
        <div class="d-f">
          <div>
            <div class="filter">
              <p>Виды</p>
            </div>
          </div>
          <div class="last_active">
            <div
              v-for="typ in types"
              :key="typ"
              @click="sort_on.includes(typ.type) ? {} : this.sort_on.push(typ.type)"
              class="active"
            >
              <p>{{ typ.type }}</p>
            </div>
          </div>
        </div>
        <div class="d-f">
          <div>
            <div class="filter">
              <p>Цена</p>
            </div>
          </div>
          <div class="last_active">
            <div class="active">
              <div class="range-slider">
                <span @change="slider">
                  <p>От</p>
                  <input v-model.number="minPrice" type="number" :min="80" :max="5000" />
                  <p>До</p>
                  <input v-model.number="maxPrice" type="number" :min="80" :max="5000" />
                </span>
                <input
                  @change="slider"
                  v-model.number="minPrice"
                  :min="80"
                  :max="5000"
                  step="1"
                  type="range"
                />
                <input
                  @change="slider"
                  v-model.number="maxPrice"
                  :min="80"
                  :max="5000"
                  step="1"
                  type="range"
                />
                <svg width="100%" height="24"></svg>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button class="apply_filter" @click="show = false" v-show="mobile == true">
        Применить фильтры
      </button>
    </div>
    <div class="adaptive" style="width: 70%">
      <p class="pagination"><router-link to="/"> Главная </router-link> / Каталог</p>
      <h3>Каталог</h3>
      <div v-if="sort_on != ''" class="d-f-2">
        <div class="last_active">
          <div
            class="active"
            v-for="(active, index) in sort_on"
            :key="active"
            @click="sort_on.splice(index, 1)"
          >
            <p>{{ active }}</p>
            <p>X</p>
          </div>
        </div>
      </div>
      <div class="adaptive_filter">
        <h4>Каталог</h4>
        <img @click="show = true" src="../../../../public/img/Vector.svg" alt="" />
      </div>
      <div class="products_df">
        <div v-for="product in menu" :key="product" ref="element">
          <router-link
            :to="{ path: '/product/' + product.id }"
            v-if="
              (product.price >= minPrice && product.price <= maxPrice && sort_on == '') ||
              sort_on.includes(product.type.type)
            "
          >
            <div class="card">
              <img class="img" :src="product.images[0].img" alt="" />
              <p class="name">{{ product.name }}</p>
              <p class="price" v-if="active_promo">
                Цена: {{ product.price - product.price * 0.15 }} ₽
              </p>
              <p class="price" v-else>Цена: {{ product.price }} ₽</p>
              <button
                v-if="token"
                @click.prevent="
                  addCart(product.id), this.countCart(), accessMessage(product.name)
                "
              >
                Купить
              </button>
            </div>
          </router-link>
        </div>
      </div>
    </div>
    <transition mode="out-in">
      <div class="alert" v-show="alert == true">
        <div @click="alert = false">X</div>
        <p>{{ message }}</p>
      </div>
    </transition>
  </div>
</template>

<script>
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";
export default {
  components: {
    Carousel,
    Slide,
    Pagination,
    Navigation,
  },
  data() {
    return {
      minPrice: 0,
      maxPrice: 0,
      menu: [],
      price: [],
      token: localStorage.getItem("x_xsrf_token"),
      types: [],
      sort_on: [],
      active_promo: localStorage.getItem("active_promo"),
      cart_coun: 0,
      alert: false,
      message: "",
      counter: 1,
      show: false,
      mobile: false,
    };
  },
  mounted() {
    this.allMenu();
    this.AllTypes();
    if (window.innerWidth > 1600) {
      this.show = true;
      this.mobile = false;
    } else {
      this.show = false;
      this.mobile = true;
    }
  },
  methods: {
    accessMessage(name) {
      this.alert = true;
      this.message = "Товар " + name + " добавлен в корзину";
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
    slider: function () {
      if (this.minPrice > this.maxPrice) {
        let tmp = this.maxPrice;
        this.maxPrice = this.minPrice;
        this.minPrice = tmp;
      }
    },
    allMenu() {
      axios.get("/api/menu_all").then((res) => {
        this.menu = res.data.data;

        for (let index = 0; index < this.menu.length; index++) {
          this.price.push(this.menu[index]["price"]);
        }
        this.minPrice = Math.min.apply(null, this.price);
        this.maxPrice = Math.max.apply(null, this.price);
      });
    },
    AllTypes() {
      axios.get("/api/type_all").then((res) => {
        this.types = res.data;
      });
    },
    addCart(id) {
      axios.post(`/api/cart/${id}`, { counter: this.counter });
    },
  },
};
</script>

<style lang="scss" scoped>
.adaptive_filter {
  display: none;
}

.alert {
  position: fixed;
  color: white;
  background: #1d2023;
  border: 2px solid #ad9562;
  margin-left: 74%;
  margin-top: 35%;
  font-family: "Comfortaa", serif;

  p {
    padding: 2vw 1vw;
  }

  .link {
    color: #ad9562;
  }

  div {
    float: right;
    margin-top: 10px;
    margin-right: 10px;
    color: #ad9562;
    cursor: pointer;
  }
}

.warning {
  color: white;
  font-family: "Comfortaa", serif;
  margin: 14vw;
}

.side_filter {
  position: fixed;
  left: 100px;
  top: 25px;
}

.products_df {
  display: flex;
  flex-wrap: wrap;
  gap: 5vw;
  margin-bottom: 5vw;
}

.pagination,
a {
  color: #bfbfbf;
  font-size: 18px;
  font-family: "Comfortaa", serif;
  margin-top: 30px;
}

.card {
  width: 350px;
  height: 400px;
  background: #e5e5e5;
  border: none;
  border-radius: 10px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 1.4vw;
  color: white;
  transition: 0.5s;
  cursor: pointer;
  padding: 15px 0;
}

.card:hover {
  box-shadow: 8px 7px 20px #ad9562;
}

div:empty {
  display: none;
}

.card p {
  font-size: 17px;
  color: #000;
}

.card .name {
  text-align: center;
}

.card .price {
  font-size: 25px;
}

.card button {
  width: 240px;
  height: 40px;
  background: transparent;
  border: 2px solid #000;
  color: black;
  background-color: white;
  border-radius: 7px;
  cursor: pointer;
  transition: 0.7s;
}

.card button:hover {
  font-weight: bold;
}

.card img {
  width: 90%;
  height: 200px;
  border-radius: 5px;
}

.all {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
}

.range-slider {
  width: 90%;
  margin: auto;
  text-align: center;
  position: relative;
  height: 6em;
}

.range-slider svg,
.range-slider input[type="range"] {
  position: absolute;
  left: 0;
  top: 70px;
}

input[type="number"] {
  border: none;
  color: white;
  text-align: center;
  font-size: 1.2vw;
  background: transparent;
}

input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
  -webkit-appearance: none;
}

input[type="number"]:invalid,
input[type="number"]:out-of-range {
  border: 2px solid #ff6347;
}

input[type="range"] {
  width: 100%;
}

input[type="range"]:focus {
  outline: none;
}

input[type="range"]:focus::-webkit-slider-runnable-track {
  background: white;
}

input[type="range"]:focus::-ms-fill-lower {
  background: white;
}

input[type="range"]:focus::-ms-fill-upper {
  background: white;
}

input[type="range"]::-webkit-slider-runnable-track {
  width: 100%;
  height: 5px;
  cursor: pointer;
  background: white;
  border-radius: 1px;
  box-shadow: none;
  border: 0;
}

span p {
  margin-top: 3px;
}

input[type="range"]::-webkit-slider-thumb {
  z-index: 2;
  position: relative;
  box-shadow: 0px 0px 0px #000;
  border: 1px solid white;
  height: 18px;
  width: 18px;
  border-radius: 25px;
  background: white;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -7px;
}

span {
  display: flex;
  margin-top: 20px;
}

h2 {
  color: white;
  font-family: "Comfortaa", serif;
  font-size: 40px;
  margin-top: 100px;
  margin-bottom: 40px;
}

h3 {
  color: white;
  font-family: "Comfortaa", serif;
  font-size: 40px;
  margin-top: 50px;
  margin-bottom: 10px;
}

.filter {
  color: white;
  font-family: "Comfortaa", serif;
  font-size: 30px;
  width: 270px;
  height: 50px;
  background: #212529;
  display: flex;
  justify-content: center;
  align-items: center;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.active {
  color: white;
  font-family: "Comfortaa", serif;
  font-size: 30px;
  width: 270px;
  height: 50px;
  display: flex;
  justify-content: space-around;
  align-items: center;
  background: #ad9562;
  font-size: 18px;
  border-bottom: 1px white solid;
  cursor: pointer;
}

.d-f-2 .last_active {
  display: flex;
  flex-direction: row;
  gap: 5px;
}

.d-f-2 .last_active .active,
.d-f-2 .last_active {
  border: none;
  border-radius: 11px;
  height: 40px;
  width: auto;
  margin-bottom: 20px;
}

.d-f-2 .last_active .active {
  padding: 0 10px;
}

.d-f-2 .last_active p:last-child {
  margin-left: 10px;
}

.d-f {
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.d-f .d-f:nth-child(2) .last_active {
  height: 117px;
}

.d-f .d-f:nth-child(2) .active {
  height: 100%;
}

.gap {
  gap: 10px;
}

.last_active :last-child {
  border-bottom: none;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}

.adaptive {
  margin-left: 20vw;
}

@media screen and (max-width: 1600px) {
  h3 {
    display: none;
  }

  .adaptive_filter {
    display: flex;
    flex-direction: row;

    h4 {
      color: white;
      font-family: "Comfortaa", serif;
      font-size: 40px;
      margin-top: 50px;
      margin-bottom: 40px;
    }

    img {
      margin-left: 45vw;
    }
  }

  .products_df {
    align-items: center;
    justify-content: center;
  }

  .adaptive {
    margin-left: 5vw;
  }

  .side_filter {
    background: #212529;
    width: 100%;
    height: 100vh;
    left: 0;
    top: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    overflow-y: hidden;

    .apply_filter {
      background: #ad9562;
      color: white;
      border: none;
      font-size: 15px;
      font-family: "Comfortaa", serif;
      padding: 15px;
      border-radius: 7px;
      margin-top: 4vw;
    }
  }
}
</style>
