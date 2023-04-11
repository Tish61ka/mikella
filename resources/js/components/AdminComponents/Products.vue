<template>
  <div style="display: flex; flex-direction: row">
    <div class="add_product">
      <p>Админ панель / Добавить новый товар</p>
      <h1>Добавить новый товар</h1>
      <form>
        <label for="file">Выберите фото товара</label>
        <input multiple type="file" id="file" ref="file" required v-on:change="handleFileUpload()" />
        <!-- <p class="file_name" v-show="file.name">{{ file.name }}</p> -->

        <input type="text" v-model="name" placeholder="Введите название товара" />

        <input type="text" v-model="price" placeholder="Введите цену товара" />

        <textarea placeholder="Введите описание товара" v-model="discription" cols="30" rows="10"></textarea>

        <select v-model="type" name="Выберите тип">
          <option v-for="typ in types" :key="typ" :value="typ.id">
            {{ typ.type }}
          </option>
        </select>

        <button v-if="show == false" @click.prevent="creareProduct()">
          Добавить
        </button>
        <button v-if="show == true" @click.prevent="saveEdit()">
          Редактировать
        </button>
      </form>
    </div>
    <div style="width: 60%">
      <div class="h2_tovar">
        <h2>Товары</h2>
      </div>
      <div class="all_product">
        <div style="
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        height: 65vh;
                        width: 100%;
                      " v-if="load == true">
          <div class="fulfilling-bouncing-circle-spinner">
            <div class="circle"></div>
            <div class="orbit"></div>
          </div>
        </div>
        <div v-else v-for="product in menu" :key="product">
          <div :id="product.type.type" class="card">
            <img :src="product.images[0].img" alt="No ethernet" />
            <p>{{ product.name }}</p>
            <p>{{ product.type.type }}</p>
            <p class="price">Цена: {{ product.price }} ₽</p>
            <div style="display: flex; gap: 40px">
              <p @click.prevent="deleteProduct(product.id)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="40px" height="40px">
                  <path fill="#F44336" d="M21.5 4.5H26.501V43.5H21.5z" transform="rotate(45.001 24 24)" />
                  <path fill="#F44336" d="M21.5 4.5H26.5V43.501H21.5z" transform="rotate(135.008 24 24)" />
                </svg>
              </p>
              <p @click.prevent="editProduct(product.id)">
                <!-- icon666.com - MILLIONS vector ICONS FREE --><svg id="Layer_1" viewBox="0 0 32 32" width="30px"
                  height="30px" xmlns="http://www.w3.org/2000/svg">
                  <path fill="orange"
                    d="m31.381 4.62c-1.383-1.412-2.795-2.812-4.002-4.004-.412-.412-.96-.616-1.51-.616-.549 0-1.099.205-1.51.617-7.089 7.101-14.189 14.195-21.288 21.292-.117.117-.205.259-.258.417-.777 2.331-2.172 6.143-2.771 8.323-.216.779.48 1.505 1.269 1.323 2.594-.599 6.064-2.021 8.362-2.787.155-.051.299-.138.417-.252 7.094-7.102 14.197-14.196 21.291-21.295.822-.824.822-2.195 0-3.018zm-28.629 24.626c.187-.575.389-1.157.59-1.763.265.111.514.27.729.487.207.207.359.44.47.688-.601.2-1.207.405-1.789.588zm6.015-2.006c-.685.232-1.449.493-2.206.75-.217-.556-.537-1.084-.983-1.531-.456-.455-.992-.776-1.563-.992.254-.752.519-1.556.743-2.227l17.173-17.18c1.336 1.335 2.671 2.67 4.007 4.006-5.716 5.723-11.448 11.451-17.171 17.174zm18.678-18.685-4.004-4.002 2.427-2.4 3.978 3.975z">
                  </path>
                </svg>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      types: [],
      menu: [],
      name: "",
      price: "",
      discription: "",
      type: [],
      file: null,
      show: false,
      id_product: 0,
      load: true,
      res: ''
    };
  },
  mounted() {
    this.AllTypes();
    this.allMenu();
  },
  methods: {
    AllTypes() {
      axios.get("/api/type_all").then((res) => {
        this.types = res.data;
      });
    },
    allMenu() {
      axios.get("/api/menu_all").then((res) => {
        this.menu = res.data.data;
        console.log(this.menu);
        this.load = false;
      });
    },
    editProduct(id) {
      this.show = true;
      this.id_product = id;
      axios.get(`/api/product/${id}`).then((res) => {
        this.name = res.data.data[0]["name"];
        this.price = res.data.data[0]["price"];
        this.discription = res.data.data[0]["discription"];
        this.type = res.data.data[0]["type"];
      });
    },
    saveEdit() {
      let formData = new FormData();
      formData.append("id_product", this.id_product);
      formData.append("name", this.name);
      formData.append("file", this.file);
      formData.append("price", this.price);
      formData.append("discription", this.discription);
      formData.append("type", this.type);
      axios
        .post("/api/edit_product", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((res) => {
          this.name = "";
          this.price = "";
          this.discription = "";
          this.type = "";
          this.show = false;
          this.allMenu();
        });
    },
    deleteProduct(id) {
      axios.delete(`/api/delete_product${id}`).then((res) => {
        this.allMenu();
      });
    },
    creareProduct() {
      let formData = new FormData();
      for (let index = 0; index < this.file.length; index++) {
        formData.append("file[]", this.file[index]);
      };
      formData.append("name", this.name);
      formData.append("price", this.price);
      formData.append("discription", this.discription);
      formData.append("type", this.type);
      axios.post("/api/create_product", formData, {
        headers: {
          "Content-type": "multipart/form-data"
        },
      })
        .then((res) => {
          this.name = "",
            this.price = "",
            this.discription = "",
            this.type = "";
          this.file = "";
          this.allMenu();
        });
    },
    handleFileUpload() {
      this.file = this.$refs.file.files;
    },
  },
};
</script>

<style lang="css" scoped>
svg {
  cursor: pointer;
}

.fulfilling-bouncing-circle-spinner,
.fulfilling-bouncing-circle-spinner * {
  box-sizing: border-box;
}

.fulfilling-bouncing-circle-spinner {
  height: 60px;
  width: 60px;
  position: relative;
  animation: fulfilling-bouncing-circle-spinner-animation infinite 4000ms ease;
  display: flex;
}

.fulfilling-bouncing-circle-spinner .orbit {
  height: 60px;
  width: 60px;
  position: absolute;
  top: 0;
  left: 0;
  border-radius: 50%;
  border: calc(60px * 0.03) solid #ad9562;
  animation: fulfilling-bouncing-circle-spinner-orbit-animation infinite 4000ms ease;
}

.fulfilling-bouncing-circle-spinner .circle {
  height: 60px;
  width: 60px;
  color: #ad9562;
  display: block;
  border-radius: 50%;
  position: relative;
  border: calc(60px * 0.1) solid #ad9562;
  animation: fulfilling-bouncing-circle-spinner-circle-animation infinite 4000ms ease;
  transform: rotate(0deg) scale(1);
}

@keyframes fulfilling-bouncing-circle-spinner-animation {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

@keyframes fulfilling-bouncing-circle-spinner-orbit-animation {
  0% {
    transform: scale(1);
  }

  50% {
    transform: scale(1);
  }

  62.5% {
    transform: scale(0.8);
  }

  75% {
    transform: scale(1);
  }

  87.5% {
    transform: scale(0.8);
  }

  100% {
    transform: scale(1);
  }
}

@keyframes fulfilling-bouncing-circle-spinner-circle-animation {
  0% {
    transform: scale(1);
    border-color: transparent;
    border-top-color: inherit;
  }

  16.7% {
    border-color: transparent;
    border-top-color: initial;
    border-right-color: initial;
  }

  33.4% {
    border-color: transparent;
    border-top-color: inherit;
    border-right-color: inherit;
    border-bottom-color: inherit;
  }

  50% {
    border-color: inherit;
    transform: scale(1);
  }

  62.5% {
    border-color: inherit;
    transform: scale(1.4);
  }

  75% {
    border-color: inherit;
    transform: scale(1);
    opacity: 1;
  }

  87.5% {
    border-color: inherit;
    transform: scale(1.4);
  }

  100% {
    border-color: transparent;
    border-top-color: inherit;
    transform: scale(1);
  }
}

* {
  color: white;
}

.h2_tovar {
  font-size: 25px;
  font-family: "Comfortaa", serif;
  margin-top: 55px;
  border-bottom: 2px solid #ad9562;
  width: 70%;
  padding-bottom: 35px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-left: 150px;
}

.add_product .file_name {
  margin-top: 0px;
  margin-bottom: 0px;
  text-align: center;
  color: white;
}

.add_product {
  font-family: "Comfortaa", serif;
  width: 40%;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.add_product p {
  color: #ad9562;
  font-size: 15px;
  margin-top: 15px;
  margin-bottom: 25px;
}

.add_product h1 {
  border-bottom: 2px solid #ad9562;
  padding-bottom: 35px;
}

form {
  display: flex;
  flex-direction: column;
  gap: 25px;
  border: 2px solid #ad9562;
  padding: 40px;
  background: #1d2023;
  border-radius: 15px;
  margin-top: 50px;
}

form input,
label {
  background: transparent;
  border: 2px #ad9562 solid;
  height: 50px;
  width: 310px;
  border-radius: 15px;
}

label {
  text-align: center;
  padding-top: 10px;
  height: 30px;
  cursor: pointer;
}

input[type="file"] {
  display: none;
}

form textarea {
  background: transparent;
  border: 2px #ad9562 solid;
  height: 209px;
  width: 310px;
  border-radius: 15px;
  resize: none;
  font-family: "Comfortaa", serif;
  font-size: 15px;
  padding-left: 5px;
  padding-top: 10px;
}

form input {
  font-family: "Comfortaa", serif;
  font-size: 15px;
  padding-left: 5px;
}

input::placeholder,
textarea::placeholder {
  color: white;
  font-family: "Comfortaa", serif;
  font-size: 16px;
}

button {
  background: transparent;
  width: 310px;
  height: 50px;
  border: 2px solid #ad9562;
  font-family: "Comfortaa", serif;
  border-radius: 15px;
  font-size: 16px;
  transition: 0.5s;
}

button:hover {
  background: #ad9562;
  color: #1d2023;
  cursor: pointer;
  font-weight: bold;
}

select {
  width: 310px;
  height: 30px;
  background: transparent;
  border: 2px solid #ad9562;
  font-family: "Comfortaa", serif;
  border-radius: 5px;
}

select:focus-visible {
  border: 2px solid #ad9562;
  font-family: "Comfortaa", serif;
  outline: none;
}

option {
  background-color: #1d2023;
  color: white;
}

.all_product {
  border-left: 2px solid #ad9562;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 5vw;
  padding: 100px;
}

.card {
  width: 350px;
  height: 460px;
  background: #1d2023;
  border: 2px solid #ad9562;
  border-radius: 10px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 1.4vw;
  color: white;
}

.card p {
  font-size: 17px;
}

.card .price {
  font-size: 25px;
}

.card img {
  width: 240px;
  height: 180px;
  border-radius: 5px;
}</style>