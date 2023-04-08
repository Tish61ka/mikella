<template>
  <div class="head">
    <p>Админ панель / Пользователи</p>
    <h1>Пользователи</h1>
  </div>
  <div style="display: flex; flex-wrap: wrap; justify-content: center; margin-top: 3vw">
    <div class="card" v-for="user in users" :key="user">
      <img
        v-if="user.avatar == 'NULL' || user.avatar == 'undefinded'"
        src="/img/no_avatar.jpg"
        alt=""
      />
      <img v-else :src="user.avatar" alt="" />
      <div>
        <p>{{ user.name }}</p>
        <p>{{ user.surname }}</p>
      </div>
      <p class="email">{{ user.email }}</p>
      <div class="setting">
        <div @click="Ban(user.id)">
          <img src="/img/Ban.svg" alt="" />
          <p>Ban</p>
        </div>
        <div @click="Unban(user.id)">
          <img src="/img/Unban.svg" alt="" />
          <p>Unban</p>
        </div>
        <div @click="Setadmin(user.id)">
          <img src="/img/Setadmin.svg" alt="" />
          <p>Set Admin</p>
        </div>
        <div @click="Setmanager(user.id)">
          <img src="/img/Setadmin.svg" alt="" />
          <p>Set Manager</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      users: [],
    };
  },
  mounted() {
    this.allUsers();
  },
  methods: {
    allUsers() {
      axios.get("/api/all_users").then((res) => {
        this.users = res.data;
        console.log(this.users);
      });
    },
    Ban(id) {
      axios.post(`/api/ban/${id}`);
    },
    Unban(id) {
      axios.post(`/api/unban/${id}`);
    },
    Setadmin(id) {
      axios.post(`/api/setadmin/${id}`);
    },
    Setmanager(id) {
      axios.post(`/api/setmanager/${id}`);
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
.card {
  width: 500px;
  height: 500px;
  background-color: #16181b;
  border-radius: 7px;
  color: white;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 2vw;
  font-family: "Comfortaa", serif;
  font-size: 20px;
  img {
    width: 150px;
    height: 150px;
    border-radius: 100%;
    border: 5px rgba(255, 255, 255, 0.5) solid;
  }
  div {
    display: flex;
    flex-direction: row;
    gap: 0.3vw;
  }
  .email {
    font-family: "Roboto", serif;
    font-size: 14px;
    color: gray;
    margin-top: -1.5vw;
  }
  .setting {
    display: flex;
    flex-direction: row;
    gap: 1vw;
    div {
      display: flex;
      flex-direction: column;
      align-items: center;
      cursor: pointer;
      img {
        border-radius: 0%;
        width: 50px;
        height: 50px;
        border: none;
      }
    }
  }
}
</style>
