<template>
  <div style="display: flex; flex-direction: row">
    <div class="add_product">
      <p>Админ панель / Добавить новый товар</p>
      <h1>Добавить новый товар</h1>
      <form action="">
        <label for="file">Выберите фото товара</label>
        <input
          type="file"
          id="file"
          ref="file"
          required
          v-on:change="handleFileUpload()"
        />
        <p class="file_name" v-show="file.name">{{ file.name }}</p>

        <input type="text" v-model="name" placeholder="Введите название товара" />

        <input type="text" v-model="price" placeholder="Введите цену товара" />

        <textarea
          placeholder="Введите описание товара"
          v-model="discription"
          name=""
          id=""
          cols="30"
          rows="10"
        ></textarea>

        <select v-model="type" name="Выберите тип" id="">
          <option v-for="typ in types" :key="typ" :value="typ.id">{{ typ.type }}</option>
        </select>

        <button v-if="show == false" @click.prevent="creareProduct()">Добавить</button>
        <button v-if="show == true" @click.prevent="saveEdit()">Редактировать</button>
      </form>
    </div>
    <div style="width: 60%">
      <div class="h2_tovar">
        <h2>Товары</h2>
      </div>
      <div class="all_product">
        <div v-for="product in menu" :key="product">
          <div :id="product.type.type" class="card">
            <img :src="product.images[0].img" alt="" />
            <p>{{ product.name }}</p>
            <p>{{ product.type.type }}</p>
            <p class="price">Цена: {{ product.price }} ₽</p>
            <div style="display: flex; gap: 40px">
              <p @click.prevent="deleteProduct(product.id)">Delete</p>
              <p @click.prevent="editProduct(product.id)">Edit</p>
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
      type: "",
      file: "",
      show: false,
      id_product: 0,
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
      formData.append("file", this.file);
      formData.append("name", this.name);
      formData.append("price", this.price);
      formData.append("discription", this.discription);
      formData.append("type", this.type);
      axios
        .post("/api/create_product", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((res) => {
          (this.name = ""), (this.price = ""), (this.discription = ""), (this.type = "");
          this.file = "";
          this.allMenu();
        });
    },
    handleFileUpload() {
      this.file = this.$refs.file.files[0];
    },
  },
};
</script>

<style lang="css" scoped>
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
  height: 400px;
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
}
</style>
