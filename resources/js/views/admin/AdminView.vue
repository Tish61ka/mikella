<template>
  <div style="display: flex; flex-direction: row">
    <div class="side_bar">
      <div class="d-f">
        <div class="logo">
          <img
            width="50"
            height="60"
            style="margin-top: 1vw"
            src="img/logo_admin.svg"
            alt=""
          />
        </div>
        <div class="item" @click="show = 'home'">
          <svg
            width="50"
            height="50"
            viewBox="0 0 70 70"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
          >
            <rect width="70" height="70" fill="url(#pattern0)" />
            <defs>
              <pattern
                id="pattern0"
                patternContentUnits="objectBoundingBox"
                width="1"
                height="1"
              >
                <use xlink:href="#image0_111_588" transform="scale(0.0111111)" />
              </pattern>
              <image
                id="image0_111_588"
                width="90"
                height="90"
                xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAABmJLR0QA/wD/AP+gvaeTAAADX0lEQVR4nO3cvYscZRzA8e9jJJcDT2w9MFUsBEG0yZ8Qi6hg5UtSiJDW0s6XbtW/QMVYmKSUBBTEKoXIaREiQgqxschdGQiB+IZfi92FY3Obnd1n5rcv8/s01+w8M/O9h7l7dmYXUkoppZTSIeoJ9SN1Xz1QB+qJZR/XRlF31T0fdEM9uezj2wjq8+ofR0Qeu62eXvZxrjX1vHr/IZHH7qvnGo55/NAlaPIXNlCPd31eK0M9pn7SIPCkj9VjM8YezBhjEHWeS6XuqNcWiDz2nfrEQ8afnMmTDiLPdynUU+qtishjv6nPTNnHTNHnHUo9o95pIfLYXfWlI/bT39DqBfWfFiOP/au+O7Gv/oVWt9QvOwg86Yq6PdrnTMvu0iqnL0K6ckM92eSFXZxv6WLQWRwuML4GdoN3vd9kn6WU1ruEh1ZfB74AtqP33VQXoR9pe8BpHC5CBsAVVjhyVx6N2Im6A1wGHvh3qy86D60+DVwDjlxA9EWnlw71DPAzPY8MHYZW3wG+Baa+79Anrf91dXjX43Og0duWK2q7lPJnmwO2OqPVXeA66x0Z4EdbvnPT2oxWXwCuAk+1NeaSHQCvllL22hislRk9WoT8wOZEBngSuK6+1cZgVaF7sAjZAi6qn6pV/wovfOlQHwcu0Z9FyPfAa6WUO4tsvFDoHi9CfgdeKaXcmnfDuS8d6ov0dxFyCthTX553w7lCjxYh39DvRcgOcFX9YJ6NGl06HD7rcBF4c4ED22SXgLdLKX/PemHTGf0hGfko5xi2manpjL5N/N2QdXFQSpnZJuyN/w32X5MXNQ39VcWBbLpGbZqudt4b/TxPXkLG9hlGfr/Ji6veVOrq1vyqqrlpm9foIBk6SIYOkqGDZOggGTpIhg6SoYOEPHs3j7ae5Fy1xVTO6CAZOkiGDpKhg2ToIBk6SIYOkqGDZOggGTpIhg6SoYNk6CAZOkiGDpKhg2ToIBk6SIYOkqGDZOggGTpIhg5S+1zHPeCxNg5kbNWexzjkbs3GtTN67o/qrrGqc60Nfbly+3VSda61n2HZAn4CnqsZZw3cBE43+YTsNFUzupTyF3AW+KVmnBV3EzhbExla+qqf0cy+ALwBPEvLfyCX4B7wK8MvfPmsNnJKKaWUUkoppZTSpvkfnqqllceXlrcAAAAASUVORK5CYII="
              />
            </defs>
          </svg>
        </div>
        <div v-if="role == 1" class="item" @click="show = 'products'">
          <img width="50" height="50" src="img/Plus.svg" alt="" />
        </div>
        <div v-if="role == 1" class="item" @click="show = 'users'">
          <img width="50" height="50" src="img/Users.svg" alt="" />
        </div>
        <div v-if="role == 2" class="item" @click="show = 'review'">
          <img width="50" height="50" src="img/Speech.svg" alt="" />
        </div>
        <div v-if="role == 2" class="item" @click="show = 'orders'">
          <img width="50" height="50" src="img/Purchase Order.svg" alt="" />
        </div>
        <div v-if="role == 2" class="item" @click="show = 'promo'">
          <img width="50" height="50" src="img/Document Writer.svg" alt="" />
        </div>
      </div>
      <div class="bottom_sidebar">
        <div class="item" @click.prevent="logout">
          <img width="50" height="50" src="img/Logout.svg" alt="" />
        </div>
      </div>
    </div>
    <div class="info">
      <Home v-if="show == 'home'" />
      <Products v-if="show == 'products'" />
      <Orders v-if="show == 'orders'" />
      <Promo v-if="show == 'promo'" />
      <Users v-if="show == 'users'" />
      <Reviews v-if="show == 'review'" />
    </div>
  </div>
</template>

<script>
import Products from "../../components/AdminComponents/Products.vue";
import Orders from "../../components/AdminComponents/Orders.vue";
import Promo from "../../components/AdminComponents/Promo.vue";
import Users from "../../components/AdminComponents/Users.vue";
import Reviews from "../../components/AdminComponents/Reviews.vue";
import Home from "../../components/AdminComponents/Home.vue";
export default {
  components: {
    Products,
    Orders,
    Promo,
    Users,
    Reviews,
    Home,
  },
  data() {
    return {
      role: localStorage.getItem("role"),
      show: "home",
    };
  },
  mounted() {
    document.title = "Админка";
    if (this.role == 1 || this.role == 2) {
      this.$router.push("/admin");
    } else {
      this.$router.push("/");
    }
  },
  methods: {
    logout() {
      axios.post("/logout").then((res) => {
        localStorage.removeItem("x_xsrf_token");
        localStorage.removeItem("name");
        localStorage.removeItem("surname");
        localStorage.removeItem("email");
        localStorage.removeItem("id");
        localStorage.removeItem("avatar");
        localStorage.removeItem("adress");
        localStorage.removeItem("number");
        this.$router.push("/");
        // console.log(res);
      });
    },
  },
};
</script>

<style lang="css" scoped>
.side_bar {
  background-color: #ad9562;
  width: 100px;
  height: 900px;
  border-bottom-right-radius: 30px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  position: fixed;
}
.d-f {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 2vw;
}
.bottom_sidebar {
  margin-bottom: 2vw;
}
.item {
  cursor: pointer;
}
.active {
  background-color: #212529;
}
.info {
  width: 100%;
}
</style>
