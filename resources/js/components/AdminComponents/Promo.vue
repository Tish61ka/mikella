<template>
  <div class="head">
    <p>Админ панель / Промокоды</p>
    <h1>Промокоды</h1>
  </div>
  <div
    style="
      width: 90%;
      margin-left: 5%;
      display: flex;
      justify-content: center;
      margin-top: 5vw;
      flex-direction: column;
    "
  >
    <div>
      <form action="">
        <h1>Добавить промокод на 15% скидку</h1>
        <input type="text" v-model="promocode" placeholder="Придумайте промокод" />
        <button @click.prevent="addPromo()">Добавить промокод</button>
      </form>
    </div>
    <div class="container">
      <h2>Промокоды на скидку 15%</h2>
      <ul class="responsive-table">
        <li class="table-header">
          <div class="col col-1">Id</div>
          <div class="col col-2">Промокод</div>
          <div class="col col-3">Действие</div>
        </li>
        <li class="table-row" v-if="promos.length == 0">
          <div class="col col-1" data-label="">Промокодов нет</div>
        </li>
        <li class="table-row" v-for="promo in promos" :key="promo">
          <div class="col col-1" data-label="ID">{{ promo.id }}</div>
          <div class="col col-2" data-label="Промокод">{{ promo.promo }}</div>
          <div class="col col-3" @click="deletePromo(promo.id)" data-label="Действие">
            Delete
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      promos: [],
      promocode: "",
    };
  },
  mounted() {
    this.getAllPromo();
  },
  methods: {
    getAllPromo() {
      axios.get("/api/promo").then((res) => {
        this.promos = res.data;
      });
    },
    deletePromo(id) {
      axios.delete(`/api/delete_promo/${id}`).then((res) => {
        this.getAllPromo();
      });
    },
    addPromo() {
      axios
        .post("/api/add_promo", {
          promo: this.promocode,
        })
        .then((res) => {
          this.getAllPromo();
          this.promocode = "";
        });
    },
  },
};
</script>

<style lang="scss" scoped>
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
.container {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
}

h2 {
  color: white;
  font-size: 26px;
  margin: 20px 0;
  text-align: center;
  small {
    font-size: 0.5em;
  }
}

.responsive-table {
  color: white;
  font-family: "Comfortaa", serif;
  li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
  }
  .table-header {
    background-color: #ad9562;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
  }
  .table-row {
    background-color: #604b1d;
    box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
  }
  .col-1 {
    flex-basis: 10%;
  }
  .col-2 {
    flex-basis: 40%;
  }
  .col-3 {
    flex-basis: 25%;
  }
  .col-4 {
    flex-basis: 25%;
  }

  @media all and (max-width: 767px) {
    .table-header {
      display: none;
    }
    li {
      display: block;
    }
    .col {
      flex-basis: 100%;
    }
    .col {
      display: flex;
      padding: 10px 0;
      &:before {
        color: #6c7a89;
        padding-right: 10px;
        content: attr(data-label);
        flex-basis: 50%;
        text-align: right;
      }
    }
  }
}

form {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 1vw;
  margin-bottom: 5vw;
  h1 {
    color: white;
  }
  button {
    width: 330px;
    height: 40px;
    border-radius: 7px;
    border: 2px solid #ad9562;
    background: #1d2023;
    color: white;
    font-family: "Comfortaa", serif;
    transition: 0.5s;
  }
  button:hover {
    background: #ad9562;
    color: #1d2023;
    cursor: pointer;
  }
  input {
    width: 360px;
    height: 50px;
    border-radius: 10px;
    background: #1d2023;
    border: 2px solid #ad9562;
    color: white;
    font-size: 20px;
    font-family: "Comfortaa", serif;
  }
}
</style>
