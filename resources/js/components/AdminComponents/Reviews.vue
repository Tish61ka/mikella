<template>
  <div class="head">
    <p>Админ панель / Отзывы</p>
    <h1>Отзывы</h1>
  </div>
  <div style="display: flex; flex-wrap: wrap; justify-content: center; margin-top: 3vw">
    <div class="card" v-for="review in reviews" :key="review">
      <p>{{ review.created_at.substr(0, 10) }}</p>
      <p>{{ review.number }}</p>
      <p>{{ review.email }}</p>
      <p>{{ review.text }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      reviews: [],
    };
  },
  mounted() {
    this.allReview();
  },
  methods: {
    allReview() {
      axios.get("/api/reviews").then((res) => {
        this.reviews = res.data;
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
.card {
  width: 300px;
  height: auto;
  border: 2px solid #ad9562;
  padding: 10px;
  border-radius: 7px;
  color: white;
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  gap: 1vw;
  align-items: center;
  font-family: "Comfortaa", serif;
}
</style>
