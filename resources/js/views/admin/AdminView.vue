<template>
  <div style="display: flex; flex-direction: row">
    <div class="side_bar">
      <div class="d-f">
        
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
        <div v-if="role == 1" class="item" @click.prevent="show = 'type'" id="type">
            <svg
              width="40"
              height="40"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M17.448 1.75C16.5495 1.74997 15.8003 1.74995 15.2055 1.82991C14.5777 1.91432 14.0109 2.09999 13.5555 2.55546C13.1 3.01093 12.9143 3.57773 12.8299 4.20552C12.7499 4.8003 12.75 5.54951 12.75 6.44798V6.552C12.75 7.45047 12.7499 8.19971 12.8299 8.79448C12.9143 9.42228 13.1 9.98908 13.5555 10.4445C14.0109 10.9 14.5777 11.0857 15.2055 11.1701C15.8003 11.2501 16.5495 11.25 17.448 11.25H17.552C18.4505 11.25 19.1997 11.2501 19.7945 11.1701C20.4223 11.0857 20.9891 10.9 21.4445 10.4445C21.9 9.98908 22.0857 9.42228 22.1701 8.79448C22.2501 8.1997 22.25 7.45048 22.25 6.552V6.44801C22.25 5.54953 22.2501 4.80031 22.1701 4.20552C22.0857 3.57773 21.9 3.01093 21.4445 2.55546C20.9891 2.09999 20.4223 1.91432 19.7945 1.82991C19.1997 1.74995 18.4505 1.74997 17.552 1.75H17.448ZM14.6161 3.61612C14.7464 3.4858 14.9439 3.37858 15.4054 3.31654C15.8884 3.2516 16.536 3.25 17.5 3.25C18.464 3.25 19.1116 3.2516 19.5946 3.31654C20.0561 3.37858 20.2536 3.4858 20.3839 3.61612C20.5142 3.74644 20.6214 3.94393 20.6835 4.4054C20.7484 4.88843 20.75 5.53599 20.75 6.5C20.75 7.46401 20.7484 8.11157 20.6835 8.59461C20.6214 9.05607 20.5142 9.25357 20.3839 9.38389C20.2536 9.5142 20.0561 9.62143 19.5946 9.68347C19.1116 9.74841 18.464 9.75 17.5 9.75C16.536 9.75 15.8884 9.74841 15.4054 9.68347C14.9439 9.62143 14.7464 9.5142 14.6161 9.38389C14.4858 9.25357 14.3786 9.05607 14.3165 8.59461C14.2516 8.11157 14.25 7.46401 14.25 6.5C14.25 5.53599 14.2516 4.88843 14.3165 4.4054C14.3786 3.94393 14.4858 3.74644 14.6161 3.61612Z"
                fill="#ffffff"
              />
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M6.44801 12.75C5.54954 12.75 4.8003 12.7499 4.20552 12.8299C3.57773 12.9143 3.01093 13.1 2.55546 13.5555C2.09999 14.0109 1.91432 14.5777 1.82991 15.2055C1.74995 15.8003 1.74997 16.5495 1.75 17.448V17.552C1.74997 18.4505 1.74995 19.1997 1.82991 19.7945C1.91432 20.4223 2.09999 20.9891 2.55546 21.4445C3.01093 21.9 3.57773 22.0857 4.20552 22.1701C4.80031 22.2501 5.54953 22.25 6.44801 22.25H6.552C7.45048 22.25 8.1997 22.2501 8.79448 22.1701C9.42228 22.0857 9.98908 21.9 10.4445 21.4445C10.9 20.9891 11.0857 20.4223 11.1701 19.7945C11.2501 19.1997 11.25 18.4505 11.25 17.552V17.448C11.25 16.5495 11.2501 15.8003 11.1701 15.2055C11.0857 14.5777 10.9 14.0109 10.4445 13.5555C9.98908 13.1 9.42228 12.9143 8.79448 12.8299C8.19971 12.7499 7.4505 12.75 6.55203 12.75H6.44801ZM3.61612 14.6161C3.74644 14.4858 3.94393 14.3786 4.4054 14.3165C4.88843 14.2516 5.53599 14.25 6.5 14.25C7.46401 14.25 8.11157 14.2516 8.59461 14.3165C9.05607 14.3786 9.25357 14.4858 9.38389 14.6161C9.5142 14.7464 9.62143 14.9439 9.68347 15.4054C9.74841 15.8884 9.75 16.536 9.75 17.5C9.75 18.464 9.74841 19.1116 9.68347 19.5946C9.62143 20.0561 9.5142 20.2536 9.38389 20.3839C9.25357 20.5142 9.05607 20.6214 8.59461 20.6835C8.11157 20.7484 7.46401 20.75 6.5 20.75C5.53599 20.75 4.88843 20.7484 4.4054 20.6835C3.94393 20.6214 3.74644 20.5142 3.61612 20.3839C3.4858 20.2536 3.37858 20.0561 3.31654 19.5946C3.2516 19.1116 3.25 18.464 3.25 17.5C3.25 16.536 3.2516 15.8884 3.31654 15.4054C3.37858 14.9439 3.4858 14.7464 3.61612 14.6161Z"
                fill="#ffffff"
              />
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M1.75 6.5C1.75 3.87665 3.87665 1.75 6.5 1.75C9.12336 1.75 11.25 3.87665 11.25 6.5C11.25 9.12336 9.12336 11.25 6.5 11.25C3.87665 11.25 1.75 9.12336 1.75 6.5ZM6.5 3.25C4.70508 3.25 3.25 4.70508 3.25 6.5C3.25 8.29493 4.70508 9.75 6.5 9.75C8.29493 9.75 9.75 8.29493 9.75 6.5C9.75 4.70508 8.29493 3.25 6.5 3.25Z"
                fill="#ffffff"
              />
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M12.75 17.5C12.75 14.8767 14.8767 12.75 17.5 12.75C20.1234 12.75 22.25 14.8767 22.25 17.5C22.25 20.1234 20.1234 22.25 17.5 22.25C14.8767 22.25 12.75 20.1234 12.75 17.5ZM17.5 14.25C15.7051 14.25 14.25 15.7051 14.25 17.5C14.25 19.2949 15.7051 20.75 17.5 20.75C19.2949 20.75 20.75 19.2949 20.75 17.5C20.75 15.7051 19.2949 14.25 17.5 14.25Z"
                fill="#ffffff"
              />
            </svg>
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
      <Types v-if="show == 'type'" />
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
import Types from "../../components/AdminComponents/Types.vue";
export default {
  components: {
    Products,
    Orders,
    Promo,
    Users,
    Reviews,
    Home,
    Types
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
