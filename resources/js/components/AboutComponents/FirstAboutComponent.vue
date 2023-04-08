<template>
  <div class="background">
    <div class="h_pag">
      <p class="pagination"><router-link to="/"> Главная </router-link> / О нас</p>
      <h2>О нас</h2>
    </div>
    <div class="d-f_info">
      <div class="d-f_why_we">
        <div class="why_we">
          <h3>Почему именно мы?</h3>
          <p>
            Потому, что у нас только свежие продукты, которые привозят каждый день. Все
            блюда, приготовленные нашими поварами, получили максимальныые оценки критиков!
            Наше кафе работает уже на протяжении 10 лет, люди посетившие наше заведение
            остаются довольными и сытыми. ТЕСНОТА - выбор гурманов!
          </p>
        </div>
        <div class="why_we">
          <h3>Наши особенности</h3>
          <p>
            Наш шеф-повар получил премию "Лучший шеф-повар года". Зерна для нашего кофе
            поставляются исключительно из Колубии. Блюда приготовленные в нашем кафе имеют
            доступную цену. В честь праздников мы делаем притные бонусы и скидки.
          </p>
        </div>
        <router-link to="/catalog"
          >Перейти к меню
          <p class="arrow">→</p></router-link
        >
      </div>
      <div class="img_text">
        <div class="background_img_text">
          <p>“</p>
          <p>
            Идейные соображения высшего порядка, а также семантический разбор внешних
            противодействий однозначно фиксирует необходимость системы массового участия.
          </p>
          <span>Юрий Тишков</span>
        </div>
        <div class="background2_img_text background_img_text">
          <p>“</p>
          <p>
            Идейные соображения высшего порядка, а также семантический разбор внешних
            противодействий однозначно фиксирует необходимость системы массового участия.
          </p>
          <span>Юрий Тишков</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },

  mounted() {
    document.title = "О нас";
    document.querySelector(".d-f_why_we a").addEventListener("mouseover", function () {
      document.querySelector(".arrow").style.color = "#212529";
    });
    document.querySelector(".d-f_why_we a").addEventListener("mouseleave", function () {
      document.querySelector(".arrow").style.color = "#AD9562";
    });
  },
};
</script>

<style lang="css" scoped>
.pagination,
a {
  color: #ad9562;
  font-size: 18px;
  font-family: "Comfortaa", serif;
  margin-top: 30px;
}
h2 {
  font-family: "Comfortaa", serif;
  font-size: 32px;
  color: white;
  margin-top: 15px;
  margin-bottom: 30px;
}
.h_pag {
  display: flex;
  flex-direction: column;
  align-items: center;
}
.why_we {
  color: white;
}
.why_we h3 {
  font-size: 32px;
  font-family: "Comfortaa", serif;
  margin-bottom: 40px;
}
.why_we p {
  font-size: 20px;
  width: 40vw;
  font-family: "Roboto", sans-serif;
}
.d-f_why_we {
  display: flex;
  flex-direction: column;
  gap: 90px;
}
.d-f_why_we a {
  font-family: "Comfortaa", serif;
  text-decoration: none;
  font-size: 20px;
  color: white;
  display: flex;
  flex-direction: row;
  align-items: center;
  border: 2px #ad9562 solid;
  border-radius: 15px;
  width: 305px;
  height: 41px;
  padding: 10px 25px;
  transition: 0.5s;
}
.d-f_why_we > a:hover {
  background: #ad9562;
  color: #212529;
  font-weight: bold;
}
.arrow {
  font-size: 50px;
  margin-left: 70px;
  font-weight: normal;
  color: #ad9562;
  transition: 0.5s;
}
.img_text {
  display: flex;
  flex-direction: column;
  gap: 90px;
}
.background_img_text {
  width: 685px;
  height: 215px;
  background-image: url("img/about_img.png");
  background-repeat: no-repeat;
  background-size: cover;
  border-radius: 15px;
  font-family: "Cabin", sans-serif;
  font-size: 20px;
  color: white;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 45px;
}
.background_img_text p:first-child {
  font-size: 128px;
  height: 50px;
  margin-top: -30px;
}
.background_img_text p:nth-child(2) {
  font-family: "Comfortaa", serif;
}
span {
  font-weight: bold;
}
.background2_img_text {
  background-image: url("img/about_img2.png");
}
.d-f_info {
  display: flex;
  justify-content: space-evenly;
  margin: 75px 0;
}
@media screen and (max-width: 1440px) {
  .background_img_text {
    width: 40vw;
  }
}
@media screen and (max-width: 1050px) {
  .d-f_info {
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10vw;
  }
  .why_we p {
    width: 80vw;
  }
  .background_img_text {
    width: 75vw;
  }
  .d-f_why_we {
    align-items: center;
  }
}
@media screen and (max-width: 560px) {
  .background_img_text p:first-child {
    font-size: 90px;
  }
}
</style>
