<template>
  <section class="header-section">
    <!-- <aside>
        <nav>
            <ul>
                <a href=""><li>
                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="50" height="50" fill="url(#pattern0)"/>
                        <defs>
                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_6_2" transform="scale(0.0208333)"/>
                        </pattern>
                        <image id="image0_6_2" width="48" height="48" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAABvUlEQVRoge3XP2gUQRiG8V3jn8ChhRADVgbEykbS2GojlnbCdfZiJbYp01rbCXYpRQuxtJFUVlpoJZrCwqAgQczPIh6s58xm73Yuc4fzwBXHzXzf893szctVVaFQmBkYYpjbYypwD7+wj43cPp1BjU3/8hDHcvu1gpN4EpAfsYXl3J5BMMDzFvkRL3Emt+9fYBXbAdlPf17jbGM1t3dVVVWFNbwLSL7HRVzA28DnH3Apt/w6dgJyr3Guse4sXgXWfcHVXPLXsRuQeoHTgfUDPA2s/46bRy0/xF5A5jFOtOxbwqPAvp+4c1Tyo4Aap9M97yAnNgL7Zxt44gG1j/tT1Lvb54uYtFksoPZwu0fdW/gRqLuFU6nkB3gWaPINNxLUv4avgfr9A088oD7jSl/5Rp/L+Bjo8wbnpy3aGlCp5Bv90gWeeEDBSmr5Rt+VSM8drHctEgsoMCv5Rv8YhweeeEDNwwC0BZ54QM3TABzkzoPR+rpLweb7uq4P3dOHSfvN91+8DhxPVWjSxyvVSS78CZQBcpPsNzDO+DM+qyt44U+gDJCbMkBuygC5mTgHUt3nqeos/AmUAQqFQuH/5jetfjfBhcC83QAAAABJRU5ErkJggg=="/>
                        </defs>
                    </svg>                        
                </li></a>
                <a href=""><li>
                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25 4.6875C18.4814 4.6875 13.2812 9.93245 13.2812 16.4062C13.2812 20.9025 15.8162 24.8006 19.5312 26.7659V40.3727C19.5312 41.2313 19.9219 42.0369 20.5933 42.57L23.4212 44.8039C23.8485 45.1457 24.3652 45.3125 24.8779 45.3125C25.4517 45.3125 26.0254 45.1009 26.4771 44.6859L31.5755 39.9577C31.9539 39.6077 32.0638 39.0544 31.8522 38.5864L30.4687 35.5387V35.4655L32.3486 33.134C32.9102 32.4341 32.9427 31.4412 32.4178 30.7088L30.4687 27.9826V26.7659C34.1838 24.8006 36.7187 20.9025 36.7187 16.4062C36.7187 9.93245 31.5186 4.6875 25 4.6875ZM25 7.8125C29.7363 7.8125 33.5937 11.6699 33.5937 16.4062C33.5937 19.5964 31.8359 22.5098 29.008 24.0031L27.3437 24.8861V28.9836L29.3823 31.8359L27.3437 34.3628V36.2142L28.4302 38.6108L24.8413 41.9434L22.8719 40.3849C22.7336 40.2791 22.6562 40.1164 22.6562 39.9414V24.882L20.992 24.0031C18.1641 22.5098 16.4062 19.5964 16.4062 16.4062C16.4062 11.6699 20.2637 7.8125 25 7.8125ZM25 10.9375C23.2747 10.9375 21.875 12.3372 21.875 14.0625C21.875 15.7878 23.2747 17.1875 25 17.1875C26.7253 17.1875 28.125 15.7878 28.125 14.0625C28.125 12.3372 26.7253 10.9375 25 10.9375Z" fill="#7A7A7A"/>
                        </svg>
                </li></a>
                <a href=""><li><img src="/img/exit.png" alt="No Ethernet"></li></a>
            </ul>
        </nav>
    </aside> -->
    <div>
      <img src="/img/logo.png" alt="No Ethernet" />
      <h1>Мы предалагем самые лучшие номера для отдыха</h1>
      <router-link to="/catalog"><button>Посмотреть каталог</button></router-link>
      <p>
        Хотите провести отпуск в уютной обстановке, насладиться комфортом и высоким уровнем сервиса? Тогда вам стоит обратить внимание на нашу услугу аренды номеров в одном из лучших отелей города.
      </p>
    </div>
  </section>
  <section class="contact-information">
    <div>
      <p>г. Москва ул.Огромная 112Б</p>
      <p>happyanddanilka@gmail.com</p>
      <p>8(976)347-43-56</p>
    </div>
    <a href="">Связаться с нами</a>
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
/* Open section header */

.header-section {
  display: flex;
  flex-direction: row;
  background-image: url("/img/back-sect-1.png");
  background-size: cover;
  background-repeat: no-repeat;
  height: 100vh;
  width: 100vw;
}
.header-section aside {
  height: 100vh;
  width: 100px;
  background-color: var(--main-bg-color);
}
.header-section aside nav {
  height: 100%;
}
.header-section aside nav ul {
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 70px;
}
.header-section aside nav ul a li svg {
  width: 40px;
}
.header-section aside nav ul a li img {
  width: 30px;
}
.header-section div {
  margin-left: 100px;
}
.header-section div > img {
  width: 156px;
  height: 47px;
  margin-top: 50px;
}
.header-section div h1 {
  width: 700px;
  font-family: "Oswald";
  font-style: normal;
  font-weight: 600;
  font-size: 52px;
  letter-spacing: -0.01em;
  color: #f6f5f2;
  margin-top: 140px;
}
.header-section div button {
  width: 300px;
  height: 50px;
  background: #ad9562;
  border-radius: 90px;
  font-family: "Roboto";
  font-style: normal;
  font-weight: 400;
  font-size: 18px;
  line-height: 33px;
  color: white;
  outline: none;
  border: none;
  margin-top: 60px;
}
.header-section div p {
  position: absolute;
  right: 100px;
  bottom: 100px;
  width: 570px;
  font-family: "Roboto";
  font-style: normal;
  font-weight: 400;
  font-size: 22px;
  line-height: 30px;
  text-align: right;
  color: white;
}

/* Close section header */
/* Open section contact-information */

.contact-information {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  padding-left: 100px;
  padding-right: 100px;
  margin: 35px 0;
  margin-bottom: 100px;
}
.contact-information div {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  width: 62%;
}
.contact-information p {
  font-family: "Roboto";
  font-style: normal;
  font-weight: 400;
  font-size: 16px;
  line-height: 26px;
  color: #eaeaea;
}
.contact-information a {
  font-family: "Roboto";
  font-style: normal;
  font-weight: 400;
  font-size: 16px;
  line-height: 26px;
  text-decoration-line: underline;
  color: #eaeaea;
}

/* Close section contact-information */

@media screen and (max-width: 1020px) {
  .img_eat {
    display: none;
  }
  .tesnota {
    align-items: center;
  }
}
@media screen and (max-width: 530px) {
  h1 {
    text-align: center;
    font-size: 40px;
  }
}
</style>
