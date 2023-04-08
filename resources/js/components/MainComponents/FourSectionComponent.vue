<template>
  <section class="review">
    <h1>02</h1>
    <div>
      <h2>ОТЗЫВ</h2>
      <h3>ОТЗЫВ</h3>
    </div>
    <form action="">
      <div>
        <input type="email" required placeholder="Укажите свой e-mail " />
        <button type="submit">Отправить</button>
      </div>
      <input type="text" placeholder="Оставьте свой отзыв" />
    </form>
  </section>
</template>

<script>
export default {
  data() {
    return {
      email: "",
      text: "",
    };
  },
  methods: {
    addReview() {
      axios
        .post("/api/add_review", {
          email: this.email,
          text: this.text,
        })
        .then((res) => {
          this.email = "";
          this.text = "";
        });
    },
  },
};
</script>

<style lang="css" scoped>
.review {
  padding-left: 150px;
}
.review h1 {
  font-family: "Oswald";
  font-style: normal;
  font-weight: 400;
  font-size: 34px;
  line-height: 59px;
  color: #ad9562;
}
.review h2 {
  position: relative;
  font-family: "Oswald";
  font-style: normal;
  font-weight: 400;
  font-size: 34px;
  line-height: 59px;
  color: var(--main-txt-color);
  z-index: 3;
}
.review h3 {
  position: relative;
  font-family: "Oswald";
  font-style: normal;
  font-weight: 400;
  font-size: 62px;
  line-height: 107px;
  color: #26252a;
  top: -85px;
  left: 50px;
  z-index: 1;
}
.review input::placeholder {
  font-family: "Roboto";
  font-style: normal;
  font-weight: 400;
  font-size: 20px;
  padding-left: 10px;
}
.review input {
  font-family: "Roboto";
  font-style: normal;
  font-weight: 400;
  font-size: 20px;
  padding-left: 10px;
  color: white;
}
.review form {
  display: flex;
  flex-direction: column;
  width: 80vw;
  margin-left: 15px;
}
.review form div {
  display: flex;
  flex-flow: row;
  justify-content: space-between;
  margin-bottom: 40px;
}
.review form > input {
  width: 100%;
  height: 60px;
  border: 2px solid #ad9562;
  background: transparent;
}
.review form div input {
  width: 50%;
  height: 60px;
  border: 2px solid #ad9562;
  background: transparent;
}
.review form div button {
  width: 20%;
  height: 60px;
  border: 2px solid #ad9562;
  font-family: "Roboto";
  font-style: normal;
  font-weight: 400;
  font-size: 24px;
  color: #ffffff;
  background: transparent;
  cursor: pointer;
}
</style>
