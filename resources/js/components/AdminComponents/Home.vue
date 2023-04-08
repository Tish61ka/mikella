<template>
  <div class="head">
    <p>Админ панель / Главная</p>
    <h1>Главная</h1>
  </div>
  <div class="graph">
    <div class="comments" v-for="comment in comments" :key="comment">
      <div>
        <img :src="comment.id_user.avatar" alt="" />
        <p>{{ comment.id_user.name }} {{ comment.id_user.surname }}</p>
      </div>

      <p>{{ comment.comment }}</p>
      <div>
        <p style="color: #ad9562; cursor: pointer" @click="delComm(comment.id)">Delete</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      comments: [],
    };
  },
  mounted() {
    this.allComm();
  },
  methods: {
    allComm() {
      axios.get("/api/all/comments").then((res) => {
        this.comments = res.data.data;
      });
    },
    delComm(id) {
      axios.post("/api/delete/comment", { id: id }).then((res) => {
        this.allComm();
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
.graph {
  width: 80%;
  margin-left: 10%;
  color: white;
}
.comments {
  display: flex;
  flex-direction: column;
  margin: 2vw;
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
</style>
