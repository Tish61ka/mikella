<template>
  <div>
    <p class="pagination"><router-link to="/">Главная</router-link> / Корзина</p>
    <div>
      <div v-for="product in cart" :key="product">
        <div class="item">
          <carousel :items-to-show="1" class="img">
            <slide v-for="img in product.id_product[0].images" :key="img">
              <img class="img" :src="img.img" alt="" />
            </slide>
          </carousel>
          <p>{{ product.id_product[0].name }}</p>
          <!-- <p>Кол-во порций: {{ product.count }}</p> -->
          <p v-if="active_promo">
            Цена:
            {{
              (product.id_product[0].price - product.id_product[0].price * 0.15) *
              product.count
            }}
            ₽
          </p>
          <p v-else>Цена: {{ product.id_product[0].price * product.count }} ₽</p>
          <div
            class="delete"
            @click.prevent="deleteProduct(product.id_product[0].id), countCart()"
          >
            <svg
              width="45"
              height="45"
              viewBox="0 0 60 60"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
            >
              <rect width="60" height="60" fill="url(#pattern0)" />
              <defs>
                <pattern
                  id="pattern0"
                  patternContentUnits="objectBoundingBox"
                  width="1"
                  height="1"
                >
                  <use xlink:href="#image0_126_1806" transform="scale(0.0111111)" />
                </pattern>
                <image
                  id="image0_126_1806"
                  width="90"
                  height="90"
                  xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB40lEQVR4nO2cS2rDQBBEtYpz8ijnyWLQhfK5RRmBDAaHENszPVXd9UDglal+SK0RGvWyGGOMMcYYY4wxxpgbAJwAvAP4Po7990lFFRTyA3gB8IFbNgCvCzkS+f8IyRdWNf8/QvKEVc1/R0hK2RL5HwhJJVsi/3F3bnicNvNuLpP/WPY8S5shu4PkC2tE2H2N2YMtso080S5+40dJdJjszpJ3PpeA0Cv60ka2kY7t4pq3UXlHB28jZCtljboUu7cRhYzyhYA4W5qCQJipC0yFgSjLEBgKBEGGEGYWiiqSZxaMapJnFI6qkiMFoLrkCBGw5LBH4DbgP7neeN/LoLOvdrsQlL2lkUwse0snmVB2XslEsvNLJpBdR/JE2fUkT5BdV3KgbEsOkG3J11h0AHDrSCH5Qt0WAi/vUkqud2bDj+AlJOc/s8EjOa9s8EnOJ5tYch7ZfjkbgLcbBOANNAF4S1gA3uQYgLftBsCwFw4EGYbCVCCIsnSFsTAQZnoK5oJAnC1dIRDImOazXwhlHTWvQ/2je6l5HcpjJKTmdWzCg1Fk5nU08VE/EvM6modXZRpnliW/xIC+LPklRk5myS8xRDVLfomxwFnyH6uRfen3dRyr0me/EM9vjDHGGGOMMcYYswRyBpias+umnbidAAAAAElFTkSuQmCC"
                />
              </defs>
            </svg>
          </div>
        </div>
      </div>
      <div class="bottom_div">
        <div class="itogo" v-if="cart.length != 0">
          <p>Итого: {{ summ }} ₽</p>
        </div>
        <div class="order" v-if="cart.length != 0">
          <form>
            <button
              v-if="
                number != 'NULL' &&
                number != 'undefined' &&
                number != ''
              "
              @click.prevent="createOrder(), countCart()"
            >
             Подтвердить бронь
            </button>
            <button v-else @click.prevent="show = true">Оформить заказ</button>
            <div class="warning" v-show="show == true">
              <div class="close" @click="show = false">X</div>
              <p>
                Вы не заполнили данные для совершения заказа! Перейдите в
                <router-link to="/dashboard">профиль</router-link> и заполните ее
              </p>
            </div>
            <div class="check">
              <input
                type="checkbox"
                required
                class="custom-checkbox"
                id="happy"
                name="happy"
                value="yes"
              />
              <label for="happy"></label>
              <span
                >Ставя галочку вы соглашаетесь с
                <a href="./Условия сделки.docx">уловиями сделки</a></span
              >
            </div>
          </form>
        </div>
      </div>
      <div class="cart_empty" v-if="cart.length == 0">
        <h1>Броней нет</h1>
      </div>
    </div>
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
      cart: [],
      summ: 0,
      addres: localStorage.getItem("adress"),
      number: localStorage.getItem("number"),
      show: false,
      active_promo: "",
      cart_coun: 0,
    };
  },
  mounted() {
    this.getCart();
    this.getPromo();
  },
  methods: {
    countCart() {
      this.cart_count = 0;
      axios.get("/api/cart/all").then((res) => {
        for (let index = 0; index < res.data.data.length; index++) {
          this.cart_count += res.data.data[index].count;
        }
        this.$store.state.user.cart_count = this.cart_count;
      });
    },
    getCart() {
      axios.get("/api/cart/all").then((res) => {
        this.cart = res.data.data;
        this.summ = 0;

        if (this.active_promo) {
          for (let index = 0; index < this.cart.length; index++) {
            this.summ +=
              (this.cart[index].id_product[0].price -
                this.cart[index].id_product[0].price * 0.15) *
              this.cart[index].count;
          }
        } else {
          for (let index = 0; index < this.cart.length; index++) {
            this.summ += this.cart[index].id_product[0].price * this.cart[index].count;
          }
        }
      });
    },
    getPromo() {
      this.active_promo = localStorage.getItem("active_promo");
    },
    deleteProduct(id) {
      axios.post(`/api/cart_delete/${id}`).then((res) => {
        this.getCart();
      });
    },
    createOrder() {
      axios
        .post("/api/create_order", {
          summ: this.summ,
        })
        .then((res) => {
          this.getCart();
          localStorage.setItem("history_promo", this.active_promo);
          localStorage.removeItem("active_promo");
        });
    },
  },
};
</script>

<style lang="css" scoped>
.warning {
  position: fixed;
  width: 300px;
  height: 120px;
  border: 2px solid #ad9562;
  background: #212529;
  border-radius: 7px;
  display: flex;
  justify-content: center;
  align-items: center;
  /* margin-left: 7vw;
    margin-top: 10vw; */
}
.warning p {
  font-family: "Roboto", serif;
  font-size: 17px;
  text-align: center;
}
.warning p a {
  color: #ad9562;
}
.close {
  position: relative;
  color: #ad9562;
  font-weight: bold;
  font-size: 20px;
  font-family: "Roboto", serif;
  top: -45px;
  left: 94%;
  cursor: pointer;
}
* {
  color: white;
}
.pagination {
  color: #ad9562;
  font-size: 18px;
  font-family: "Comfortaa", serif;
  margin-left: 5%;
  margin-top: 60px;
}
.pagination a {
  color: #ad9562;
}
.item {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  gap: 155px;
  margin-bottom: 5vw;
  border-bottom: 2px solid #ad9562;
  width: 90%;
  margin-left: 5%;
  padding-bottom: 40px;
}
.item p {
  font-family: "Roboto", serif;
  font-size: 25px;
}
.item:first-child {
  margin-top: 100px;
}
.item .img {
  width: 200px;
  height: 150px;
  border-radius: 14px;
}
.cart_empty {
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 29.5vh 0;
  font-family: "Comfortaa", serif;
  font-size: 20px;
}
.delete {
  cursor: pointer;
}
.itogo p {
  font-size: 28px;
  font-family: "Roboto", serif;
  border-bottom: 2px solid #ad9562;
  padding-bottom: 10px;
}
.order form {
  display: flex;
  flex-direction: column;
  gap: 1vw;
}
.order button {
  width: 360px;
  height: 50px;
  border-radius: 7px;
  background: #212529;
  color: white;
  border: 2px solid #ad9562;
  font-family: "Roboto", serif;
  font-size: 20px;
  transition: 0.5s;
}
.check {
  display: flex;
  flex-direction: row;
  gap: 1vw;
  width: 360px;
  text-align: center;
  font-family: "Roboto", serif;
}
.check span a {
  color: #ad9562;
}
.order button:hover {
  background: #ad9562;
  color: #212529;
  cursor: pointer;
}
.custom-checkbox {
  position: absolute;
  z-index: -1;
  opacity: 0;
}
.custom-checkbox + label {
  display: inline-flex;
  align-items: center;
  user-select: none;
}
.custom-checkbox + label::before {
  content: "";
  display: inline-block;
  width: 1.3em;
  height: 1.3em;
  flex-shrink: 0;
  flex-grow: 0;
  border: 1px solid #ad9562;
  border-radius: 0.25em;
  margin-right: 0.5em;
  background-repeat: no-repeat;
  background-position: center center;
  background-size: 50% 50%;
}
.custom-checkbox:checked + label::before {
  border-color: #ad9562;
  background-color: #212529;
  background-image: url("./img/галочка.svg");
  background-size: cover;
}
/* стили при наведении курсора на checkbox */
.custom-checkbox:not(:disabled):not(:checked) + label:hover::before {
  border-color: #d77070;
}
/* стили для активного состояния чекбокса (при нажатии на него) */
.custom-checkbox:not(:disabled):active + label::before {
  background-color: #d77070;
  border-color: #d77070;
}
/* стили для чекбокса, находящегося в фокусе */
.custom-checkbox:focus + label::before {
  box-shadow: 0 0 0 0.2rem #6f1f1f;
}
/* стили для чекбокса, находящегося в фокусе и не находящегося в состоянии checked */
.custom-checkbox:focus:not(:checked) + label::before {
  border-color: #d77070;
}
/* стили для чекбокса, находящегося в состоянии disabled */
.custom-checkbox:disabled + label::before {
  background-color: #d77070;
}
.bottom_div {
  margin-bottom: 90px;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  width: 90%;
  margin-left: 5%;
}

@media screen and (max-width: 1500px) {
  .item {
    flex-direction: column;
    gap: 3vw;
    text-align: center;
  }
}
@media screen and (max-width: 616px) {
  .bottom_div {
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10vw;
  }
}
</style>
