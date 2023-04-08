<template>
  <div class="background">
    <div v-if="orders.length != 0">
      <div v-for="order in orders" :key="order">
        <div>
          <h2>Заказ №{{ order.id }}</h2>
          <div
            style="
              display: flex;
              flex-wrap: wrap;
              gap: 5vw;
              justify-content: space-around;
            "
          >
            <div v-for="product in order.products" :key="product">
              <router-link :to="{ path: '/product/' + product.id_product[0].id }">
                <div class="card">
                  <img :src="product.id_product[0].images[0].img" alt="" />
                  <p class="name">{{ product.id_product[0].name }}</p>
                  <p class="price">Цена: {{ product.id_product[0].price }} ₽</p>
                  <p>Кол-во порций: {{ product.count }}</p>
                </div>
              </router-link>
            </div>
          </div>
          <div class="bottom_order">
            <p>Итого заказа: {{ order.order_price }} ₽</p>
            <p>Статус: {{ order.status }}</p>
          </div>
        </div>
      </div>
    </div>
    <div v-else>
      <h1>Заказов нет!</h1>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      orders: [],
    };
  },
  mounted() {
    this.getOrders();
  },
  methods: {
    getOrders() {
      axios.get("/api/orders").then((res) => {
        this.orders = res.data.data;
      });
    },
  },
};
</script>

<style lang="scss" scoped>
h1 {
  font-family: "Comfortaa", serif;
  margin: 15vw 0 15vw 25vw;
}
.background {
  background: #202428;
  border: 3px #ad9562 solid;
  width: 60vw;
  height: auto;
  border-radius: 15px;
  color: white;
}
.card img {
  width: 240px;
  height: 180px;
  border-radius: 5px;
}
.card {
  width: 350px;
  height: 400px;
  background: #1d2023;
  border: 2px solid #ad9562;
  border-radius: 10px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 1.4vw;
  color: white;
  transition: 0.5s;
  cursor: pointer;
}
.card:hover {
  box-shadow: 8px 7px 20px #ad9562;
}
div:empty {
  display: none;
}
.card p {
  font-size: 17px;
  font-family: "Comfortaa", serif;
}
.card .name {
  text-align: center;
}
.card .price {
  font-size: 25px;
}
h2 {
  font-family: "Comfortaa", serif;
  text-align: center;
  margin: 2vw 0;
}
.bottom_order {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  width: 85%;
  margin-left: 7.5%;
  font-family: "Comfortaa", serif;
  font-size: 20px;
  margin-top: 4vw;
  margin-bottom: 4vw;
}
.bottom_order p {
  border-bottom: 2px solid #ad9562;
  padding-bottom: 10px;
}
@media screen and (max-width: 658px) {
  .card {
    width: 50vw;
    height: auto;
    padding-top: 5vw;
    padding-bottom: 5vw;
  }
  .card img {
    width: 40vw;
    height: auto;
  }
  .card p {
    font-size: 14px;
  }
  .bottom_order p {
    font-size: 15px;
  }
}
</style>
