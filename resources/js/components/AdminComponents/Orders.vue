<template>
  <div class="head">
    <p>Админ панель / Заказы</p>
    <h1>Заказы</h1>
  </div>
  <div style="width: 90%; margin-left: 5%">
    <div v-for="order in orders" :key="order">
      <div>
        <h2>Заказ №{{ order.id }}</h2>
        <div style="display: flex; flex-wrap: wrap; gap: 5vw; justify-content: center">
          <div class="card" v-for="product in order.products" :key="product">
            <img :src="product.id_product[0].images[0].img" alt="" />
            <p>{{ product.id_product[0].name }}</p>
            <p class="price">Цена: {{ product.id_product[0].price }} ₽</p>
            <p>Кол-во порций: {{ product.count }}</p>
          </div>
        </div>
        <div class="bottom_order">
          <p>Итого заказа: {{ order.order_price }} ₽</p>
          <p>Статус: {{ order.status }}</p>
          <div style="display: flex; flex-direction: row; gap: 5vw">
            <select v-model="status" name="status" id="status">
              <option selected value="Выберите статус">Выберите статус</option>
              <option value="Ожидает подтверждения брони">Ожидает подтверждения брони</option>
              <option value="Забронирован">Забронирован</option>
              <option value="Завершен">Завершен</option>
            </select>
            <button @click.prevent="changeStatusOrder(order.id)">Изменить статус</button>
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
      orders: [],
      status: "",
    };
  },
  mounted() {
    this.getAllOrders();
  },
  methods: {
    getAllOrders() {
      axios.get("/api/orders_admin").then((res) => {
        this.orders = res.data.data;
      });
    },
    changeStatusOrder(id) {
      axios
        .post(`/api/order_status/${id}`, {
          status: this.status,
        })
        .then((res) => {
          this.getAllOrders();
        });
    },
  },
};
</script>

<style lang="scss" scoped>
* {
  color: white;
}
.head {
  display: flex;
  flex-direction: column;
  width: 80%;
  margin-left: 10%;
  margin-top: 2vw;
  font-size: 18px;
  border-bottom: 2px solid #ad9562;
  padding-bottom: 35px;
  p {
    color: #ad9562;
    font-family: "Comfortaa", serif;
  }
  h1 {
    color: white;
    font-family: "Comfortaa", serif;
    margin-top: 25px;
  }
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
button {
  width: 360px;
  height: 50px;
  border-radius: 7px;
  background: #1d2023;
  border: 2px solid #ad9562;
  font-family: "Comfortaa", serif;
  font-size: 17px;
  transition: 0.5s;
}
button:hover {
  background: #ad9562;
  color: #1d2023;
  cursor: pointer;
}
</style>
