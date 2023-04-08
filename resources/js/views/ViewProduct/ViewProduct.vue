<template>
  <div>
    <p class="pagination">
      <router-link to="/">Главная</router-link> /
      <router-link to="/catalog">Меню</router-link> / {{ this.product["name"] }}
    </p>
    <div class="adaptive">
      <div class="w50">
        <carousel :items-to-show="1">
          <slide v-for="img in this.product.images" :key="img">
            <img class="active" :src="img.img" alt="" />
          </slide>

          <template #addons>
            <navigation />
            <pagination />
          </template>
        </carousel>
      </div>
      <div class="adaptive_two">
        <h1>{{ this.product["name"] }}</h1>
        <p class="price" v-if="active_promo">
          {{ this.product["price"] - this.product["price"] * 0.15 }} ₽ /
          <span v-if="this.product['name'] == 'Пончики шоколадные'">шт</span
          ><span v-else>порция</span>
        </p>
        <p class="price" v-else>
          {{ this.product["price"] }} ₽ /
          <span v-if="this.product['name'] == 'Пончики шоколадные'">шт</span
          ><span v-else>порция</span>
        </p>
        <div style="display: flex; flex-direction: column; width: 360px">
          <div v-show="token" class="count">
            <p>
              {{ counter }} / кол-во
              <span v-if="this.product['name'] == 'Пончики шоколадные'">шт</span
              ><span v-else>порций</span>
            </p>
            <div>
              <button @click="counter++">+</button>
              <button @click="Plus">-</button>
            </div>
          </div>
          <button
            v-show="token"
            @click.prevent="addCart(product.id), countCart(), accessMessage(product.name)"
          >
            В корзину
          </button>
        </div>
      </div>
    </div>
    <div
      style="
        width: 90%;
        border-top: 2px solid #ad9562;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 115px;
        margin-left: 5%;
      "
    >
      <div class="text">
        <p @click="comm = false">Описание</p>
        <p @click="(comm = true), getComm()">Коментарии</p>
      </div>
      <p class="discription" v-if="comm == false">{{ this.product["discription"] }}</p>
      <div v-if="comm == true" style="width: 80%">
        <div class="add_comm" v-if="token">
          <form action="">
            <textarea
              v-model="text_comm"
              name=""
              id=""
              cols="30"
              rows="10"
              placeholder="Оставьте коментарий о нашем продукте"
            ></textarea>
            <button @click.prevent="addComm()">Отправить</button>
          </form>
        </div>
        <div class="comments" v-for="comment in comments" :key="comment">
          <div>
            <img :src="comment.id_user.avatar" alt="" />
            <p>{{ comment.id_user.name }} {{ comment.id_user.surname }}</p>
          </div>

          <p>{{ comment.comment }}</p>
        </div>
      </div>
      <div v-if="comm == true && comments.length == 0">
        <p class="no_comm">Коментариев пока нет!</p>
      </div>
    </div>
    <div class="alert" v-show="alert == true">
      <div @click="alert = false">X</div>
      <p>{{ message }}</p>
    </div>
  </div>
</template>

<script>
import StyleComponent from "../../components/StyleComponent.vue";
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";
export default {
  components: {
    Carousel,
    Slide,
    Pagination,
    Navigation,
    StyleComponent,
  },
  data() {
    return {
      product: [],
      id: null,
      token: localStorage.getItem("x_xsrf_token"),
      active_promo: localStorage.getItem("active_promo"),
      counter: 1,
      alert: false,
      message: "",
      comm: false,
      comments: [],
      text_comm: "",
    };
  },
  mounted() {
    this.parseURL();
    this.getProduct();
    this.getComm();
  },
  methods: {
    addComm() {
      axios
        .post("/api/add/comment", { id_product: this.id, comment: this.text_comm })
        .then((res) => {
          this.alert = true;
          this.message = "Коментарий успешно отправлен!";
          this.text_comm = "";
          this.getComm();
        });
    },
    getComm() {
      axios.post("/api/comments", { id_product: this.id }).then((res) => {
        this.comments = res.data.data;
      });
    },
    accessMessage(name) {
      this.alert = true;
      this.message = "Товар " + name + " добавлен в корзину";
    },
    Plus() {
      if (this.counter == 1) {
        this.counter = 1;
      } else {
        this.counter--;
      }
    },
    countCart() {
      this.cart_count = 0;
      axios.get("/api/cart/all").then((res) => {
        for (let index = 0; index < res.data.data.length; index++) {
          this.cart_count += res.data.data[index].count;
        }
        this.$store.state.user.cart_count = this.cart_count;
      });
    },
    getProduct() {
      axios.get(`/api/product/${this.id}`).then((res) => {
        this.product = res.data.data[0];
        document.title = this.product["name"];
      });
    },
    parseURL() {
      let url = window.location.pathname;
      this.id = url.split("/")[2];
    },
    addCart(id) {
      axios.post(`/api/cart/${id}`, { counter: this.counter });
    },
  },
};
</script>

<style lang="scss" scoped>
.no_comm {
  font-size: 2vw;
  font-family: "Comfortaa", serif;
  margin-top: 4vw;
  margin-bottom: 4vw;
}
.add_comm {
  margin-bottom: 2vw;
  form {
    textarea {
      width: 99%;
      background: #1d2023;
      border: 2px solid #ad9562;
      resize: none;
      padding-left: 1%;
      padding-top: 1%;
      color: white;
      font-size: 17px;
      font-family: "Roboto", serif;
      border-radius: 7px;
    }
    button {
      width: 30%;
    }
  }
}
.comments {
  display: flex;
  flex-direction: column;
  margin: 2vw;
  margin-top: 0;
  padding: 2vw;
  padding-top: 0;
  padding-bottom: 0;
  border: 2px solid #ad9562;
  background: #1d2023;
  border-radius: 7px;
  width: auto;
  div {
    display: flex;
    flex-direction: row;
    align-items: center;
    p {
      font-family: "Comfortaa", serif;
      font-size: 20px;
    }
  }
  img {
    width: 80px;
    height: 80px;
    border-radius: 100%;
    margin-top: 25px;
  }
  p {
    font-size: 16px;
    font-family: "Roboto", serif;
    margin: 1vw;
  }
}
.text {
  display: flex;
  justify-content: center;
  gap: 4vw;
}
.text p {
  font-family: "Comfortaa", serif;
  font-size: 30px;
  margin-top: 30px;
  margin-bottom: 60px;
  cursor: pointer;
}
.alert {
  position: fixed;
  color: white;
  background: #1d2023;
  border: 2px solid #ad9562;
  top: 85vh;
  left: 74%;
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
.adaptive {
  display: flex;
  flex-direction: row;
  margin-left: 8vw;
}
.adaptive_two {
  width: 50%;
  color: white;
  font-family: "Roboto";
  margin-left: 4vw;
}
.count {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  gap: 1vw;
  width: auto;
  height: 4vw;
  margin-top: 2vw;
  background: #1d2023;
  border: 2px solid #ad9562;
  border-radius: 7px;
}
.count p {
  font-size: 20px;
}
.count div {
  display: flex;
  flex-direction: column;
}
.count button {
  width: 30px;
  height: 30px;
  margin: 0px;
}
.w50 {
  width: 50%;
}
.active {
  width: 750px;
  height: auto;
  border-radius: 15px;
  margin-left: 1.5vw;
}
.pagination {
  color: #ad9562;
  text-decoration: none;
  font-size: 18px;
  font-family: "Comfortaa", serif;
  margin-top: 60px;
  margin-bottom: 100px;
  margin-left: 150px;
}
.pagination a {
  text-decoration: none;
  color: #ad9562;
}
.price {
  margin-top: 40px;
  font-size: 25px;
}
div button {
  background: #1d2023;
  color: white;
  border: 2px solid #ad9562;
  height: 50px;
  border-radius: 7px;
  margin-top: 40px;
  font-family: "Roboto", sans-serif;
  font-size: 17px;
  transition: 0.5s;
}
div button:hover {
  background: #ad9562;
  color: #1d2023;
  cursor: pointer;
  font-weight: bold;
}
div .discription {
  font-family: "Roboto", sans-serif;
  font-size: 20px;
  text-align: center;
  margin-bottom: 100px;
}
@media screen and (max-width: 1600px) {
  .adaptive {
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 0;
  }
  .adaptive_two {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
}
@media screen and (max-width: 1460px) {
  .w50 {
    width: 100%;
  }
  .adaptive_two {
    width: 90%;
  }
  .count {
    height: 65px;
  }
  .add_comm {
    form {
      button {
        width: 100%;
      }
    }
  }
}

@media screen and (max-width: 1000px) {
  .no_comm {
    font-size: 20px;
  }
}
@media screen and (max-width: 750px) {
  .active {
    width: 500px;
  }
  .adaptive_two h1 {
    text-align: center;
  }
}
@media screen and (max-width: 507px) {
  .active {
    width: 375px;
  }
  .pagination {
    margin-left: 0;
    text-align: center;
  }
}
</style>
