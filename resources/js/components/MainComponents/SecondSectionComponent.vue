<template>
  <section class="about-us">
    <h1>01</h1>
    <div class="top-content">
      <div>
        <div>
          <h2>О КОМПАНИИ</h2>
          <h3>О КОМПАНИИ</h3>
        </div>
        <p>
          У нас вы найдете просторные и уютные номера, оснащенные всем необходимым для комфортного проживания: удобной кроватью, телевизором, кондиционером, бесплатным Wi-Fi и просторной ванной комнатой с современной сантехникой.
        </p>
        <p>
  Кроме того, наш отель предлагает широкий спектр услуг для гостей: оздоровительный центр, кафе и рестораны, конференц-залы, бассейн и многое другое. Вы можете выбрать номер, соответствующий вашим потребностям и бюджету.

        </p>
        <router-link to="/catalog">Перейти к выбору номера</router-link>
      </div>
      <img src="/img/image-sect-3.png" alt="No Ethernet" />
    </div>
    <div class="bot-content">
      <div>
        <h4>3</h4>
        <p>
          года <br />
          на рынке
        </p>
      </div>
      <div>
        <h4>20</h4>
        <p>номеров<br />в гостинице</p>
      </div>
      <div>
        <h4>5</h4>
        <p>люкс <br />номеров</p>
      </div>
      <div>
        <h4>200+</h4>
        <p>положительных <br />отзывов</p>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {};
  },
};
</script>

<style lang="css" scoped>
/* Open section about-us */

.about-us {
  padding-left: 150px;
}
.about-us h1 {
  font-family: "Oswald";
  font-style: normal;
  font-weight: 400;
  font-size: 34px;
  line-height: 59px;
  color: #ad9562;
}
.about-us h2 {
  position: relative;
  font-family: "Oswald";
  font-style: normal;
  font-weight: 400;
  font-size: 34px;
  line-height: 59px;
  color: var(--main-txt-color);
  z-index: 3;
}
.about-us h3 {
  position: relative;
  font-family: "Oswald";
  font-style: normal;
  font-weight: 400;
  font-size: 62px;
  line-height: 107px;
  color: #26252a;
  top: -85px;
  left: 110px;
  z-index: 1;
}
.about-us h4 {
  font-family: "Oswald";
  font-style: normal;
  font-weight: 400;
  font-size: 96px;
  line-height: 142px;
  color: white;
}
.about-us .top-content p {
  width: 500px;
  font-family: "Roboto";
  font-style: normal;
  font-weight: 400;
  font-size: 24px;
  line-height: 38px;
  color: #e5e5e5;
  margin-bottom: 30px;
}
.about-us .bot-content p {
  font-family: "Roboto";
  font-style: normal;
  font-weight: 400;
  font-size: 28px;
  line-height: 42px;
  margin-left: 15px;
  color: white;
}
.about-us a {
  font-family: "Roboto";
  font-style: normal;
  font-weight: 400;
  font-size: 20px;
  text-decoration-line: underline;
  color: #e5e5e5;
  margin-bottom: 50px;
}
.about-us img {
  width: 45vw;
}
.about-us .top-content {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}
.about-us .top-content div {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.about-us .bot-content {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  width: 80vw;
  margin-top: 50px;
  margin-bottom: 100px;
}
.about-us .bot-content div {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
}

/* Close section about-us */
@media screen and (max-width: 1200px) {
  .d-f_info {
    flex-direction: column-reverse;
    justify-content: center;
    align-items: center;
  }
  h3 {
    text-align: center;
  }
  div img {
    width: 70vw;
    margin-bottom: 5vw;
  }
  .text {
    width: 70vw;
    text-align: center;
  }
  .links {
    font-size: 24px;
    justify-content: center;
  }
}
@media screen and (max-width: 850px) {
  .links {
    font-size: 17px;
  }
  .links :first-child {
    text-align: center;
    padding: 17px 70px;
  }
}
@media screen and (max-width: 650px) {
  .background {
    align-items: center;
  }
  .links :first-child {
    padding: 15px 50px;
  }
  .links :last-child {
    padding: 15px 50px;
  }
  h3 {
    font-size: 30px;
    width: 80%;
  }
}
@media screen and (max-width: 426px) {
  h3 {
    font-size: 27px;
  }
  .links :first-child {
    padding: 10px 30px;
  }
  .links :last-child {
    padding: 10px 30px;
  }
  .text {
    font-size: 20px;
  }
}
</style>
