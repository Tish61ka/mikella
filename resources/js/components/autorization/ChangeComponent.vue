<template>
  <div class="background">
    <form>
      <h2>Изменить даные</h2>
      <input v-model="name" type="text" placeholder="Имя" />
      <input v-model="surname" type="text" placeholder="Фамилия" />
      <input v-model="email" type="text" placeholder="Email" />
      <!-- <input type="password" placeholder="Пароль" /> -->
      <button @click.prevent="changeInfoUser">Сохранить</button>
    </form>
    <div class="alert" v-if="show == true" @click="show = false">
      <p>{{ msg }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      file: "",
      id: "",
      avatar: "",
      name: localStorage.getItem("name"),
      surname: localStorage.getItem("surname"),
      email: localStorage.getItem("email"),
      show: false,
      msg: "",
    };
  },

  mounted() {
    this.getId();
    this.getName();
    this.getSurame();
    this.getEmail();
  },

  methods: {
    changeInfoUser() {
      let formData = new FormData();
      this.getId();
      formData.append("id", this.id);
      formData.append("name", this.name);
      formData.append("surname", this.surname);
      formData.append("email", this.email);
      axios
        .post("/api/changeInfoUser", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((res) => {
          localStorage.setItem("name", this.name);
          localStorage.setItem("surname", this.surname);
          localStorage.setItem("email", this.email);
          this.name = localStorage.getItem("name");
          this.surname = localStorage.getItem("surname");
          this.email = localStorage.getItem("email");
          this.getName();
          this.getSurame();
          this.getEmail();
          this.msg = "Данные успешно изменены!";
          this.show = true;
        })
        .catch((err) => {
          this.msg = "Ошибка, повторите попытку еще раз.";
          this.show = true;
        });
    },

    submitFile() {
      let formData = new FormData();
      formData.append("file", this.file);
      this.getId();
      formData.append("id", this.id);
      axios
        .post("/api/load-avatar", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((r) => {
          let fileName = "../uploads/" + this.file.name;
          localStorage.setItem("avatar", fileName);
          // console.log(fileName);
          this.$store.state.avatar = fileName;
          this.file = "";
        })
        .catch(function () {
          console.log("FAILURE!!");
        });
    },

    handleFileUpload() {
      this.file = this.$refs.file.files[0];
    },

    getId() {
      this.id = localStorage.getItem("id");
    },

    getName() {
      this.$store.state.user.name = localStorage.getItem("name");
    },

    getSurame() {
      this.$store.state.user.surname = localStorage.getItem("surname");
    },

    getEmail() {
      this.$store.state.user.email = localStorage.getItem("email");
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
/* #file{
        width: 80%;
        height: 60px;
        background: #1D2023;
        border: 2px #AD9562 solid;
        border-radius: 9px;
        color: white;
    } */
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
