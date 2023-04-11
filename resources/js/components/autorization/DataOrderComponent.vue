<template>
  <div class="background">
    <form>
      <h2>Данные для брони</h2>
      <!-- <input v-model="adress" type="text" placeholder="Адрес доставки" /> -->
      <input v-model="number" type="text" placeholder="Номер телефона" />
      <!-- <input type="text" v-model="active_promo" placeholder="Промокод (если есть)" /> -->
      <p class="warning" v-show="show == true">{{ messge }}</p>
      <button @click.prevent="dataOrder">Сохранить</button>
    </form>
    <div class="alert" v-if="show2 == true" @click="show2 = false">
      <p>{{ msg }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      id: "",
      adress: localStorage.getItem("adress"),
      number: localStorage.getItem("number"),
      promo: [],
      active_promo: "",
      history_promo: localStorage.getItem("history_promo"),
      show: false,
      show2: false,
      messge: "",
      msg: "",
    };
  },

  mounted() {
    this.getId();
    this.getAdress();
    this.getNumber();
  },

  methods: {
    dataOrder() {
      let formData = new FormData();
      this.getId();
      formData.append("id", this.id);
      formData.append("adress", this.adress);
      formData.append("number", this.number);
      axios
        .post("/api/dataOrder", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((res) => {
          localStorage.setItem("adress", this.adress);
          localStorage.setItem("number", this.number);
          this.adress = localStorage.getItem("adress");
          this.number = localStorage.getItem("number");
          this.getAdress();
          this.getNumber();
          axios
            .get("/api/promo")
            .then((res) => {
              this.promo = res.data;

              for (let index = 0; index < this.promo.length; index++) {
                if (this.promo[index].promo == this.active_promo) {
                  if (this.history_promo == this.active_promo) {
                    this.messge = "Этот промокод вы уже использовали";
                    this.show = true;
                  } else {
                    localStorage.setItem("active_promo", this.active_promo);
                  }
                } else {
                  this.messge = "Такого промокода не существует";
                  this.show = true;
                }
              }
              this.msg = "Данные успешно сохранены!";
              this.show2 = true;
            })
            .cath((err) => {
              this.msg = "Ошибка, попробуйте еще раз.";
              this.show2 = true;
            });
        });
    },

    getId() {
      this.id = localStorage.getItem("id");
    },

    getAdress() {
      this.$store.state.user.adress = localStorage.getItem("adress");
    },

    getNumber() {
      this.$store.state.user.number = localStorage.getItem("number");
    },
  },
};
</script>

<style lang="css" scoped>
.alert {
  position: fixed;
  top: 87vh;
  left: 82%;
  width: 300px;
  height: 100px;
  border: 2px solid #ad9562;
  background: #1d2023;
  border-radius: 7px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  font-family: "Roboto", serif;
  cursor: pointer;
}
.warning {
  font-size: 20px;
  color: white;
  font-family: "Comfortaa", serif;
}
.background {
  background: #202428;
  border: 3px #ad9562 solid;
  width: 60vw;
  height: auto;
  border-radius: 15px;
  color: white;
}
h2 {
  font-size: 24px;
  font-family: "Comfortaa", serif;
}
form {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 80px;
  margin: 40px 0;
}
input {
  width: 80%;
  height: 60px;
  background: #1d2023;
  border: 2px #ad9562 solid;
  border-radius: 9px;
  color: white;
  font-size: 20px;
  padding-left: 20px;
}
input::placeholder {
  color: white;
  font-size: 20px;
}
button {
  width: 350px;
  height: 45px;
  background: #1d2023;
  border: 2px #ad9562 solid;
  border-radius: 9px;
  color: white;
  font-size: 16px;
  font-family: "Comfortaa", serif;
  transition: 0.5s;
}
button:hover {
  background: #ad9562;
  color: #1d2023;
  cursor: pointer;
}
@media screen and (max-width: 900px) {
  button {
    width: 80%;
  }
}
@media screen and (max-width: 540px) {
  .background {
    width: 100%;
  }
}
</style>
