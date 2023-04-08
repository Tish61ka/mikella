<template>
  <section class="host">
    <div class="hovered">
      <h1>01</h1>
      <p>Одноместные номера</p>
      <a href=""
        >Эко-дом<svg
          width="102"
          height="24"
          viewBox="0 0 102 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M101.061 13.0919C101.646 12.5061 101.646 11.5564 101.061 10.9706L91.5147 1.42465C90.9289 0.838861 89.9792 0.838861 89.3934 1.42465C88.8076 2.01044 88.8076 2.96018 89.3934 3.54597L97.8787 12.0313L89.3934 20.5165C88.8076 21.1023 88.8076 22.0521 89.3934 22.6379C89.9792 23.2236 90.9289 23.2236 91.5147 22.6379L101.061 13.0919ZM0 13.5312L100 13.5313V10.5313L0 10.5312L0 13.5312Z"
            fill="#E5E5E5"
          />
        </svg>
      </a>
    </div>
    <div>
      <h1>02</h1>
      <p>Двухместные номера</p>
      <a href=""
        >Эко-дом<svg
          width="102"
          height="24"
          viewBox="0 0 102 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M101.061 13.0919C101.646 12.5061 101.646 11.5564 101.061 10.9706L91.5147 1.42465C90.9289 0.838861 89.9792 0.838861 89.3934 1.42465C88.8076 2.01044 88.8076 2.96018 89.3934 3.54597L97.8787 12.0313L89.3934 20.5165C88.8076 21.1023 88.8076 22.0521 89.3934 22.6379C89.9792 23.2236 90.9289 23.2236 91.5147 22.6379L101.061 13.0919ZM0 13.5312L100 13.5313V10.5313L0 10.5312L0 13.5312Z"
            fill="#E5E5E5"
          />
        </svg>
      </a>
    </div>
    <div>
      <h1>03</h1>
      <p>Номера для отдыха всей семьей</p>
      <a href=""
        >Кирпичный-дом<svg
          width="102"
          height="24"
          viewBox="0 0 102 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M101.061 13.0919C101.646 12.5061 101.646 11.5564 101.061 10.9706L91.5147 1.42465C90.9289 0.838861 89.9792 0.838861 89.3934 1.42465C88.8076 2.01044 88.8076 2.96018 89.3934 3.54597L97.8787 12.0313L89.3934 20.5165C88.8076 21.1023 88.8076 22.0521 89.3934 22.6379C89.9792 23.2236 90.9289 23.2236 91.5147 22.6379L101.061 13.0919ZM0 13.5312L100 13.5313V10.5313L0 10.5312L0 13.5312Z"
            fill="#E5E5E5"
          />
        </svg>
      </a>
    </div>
    <div>
      <h1>04</h1>
      <p>Люкс номера</p>
      <a href=""
        >VIP-дом<svg
          width="102"
          height="24"
          viewBox="0 0 102 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M101.061 13.0919C101.646 12.5061 101.646 11.5564 101.061 10.9706L91.5147 1.42465C90.9289 0.838861 89.9792 0.838861 89.3934 1.42465C88.8076 2.01044 88.8076 2.96018 89.3934 3.54597L97.8787 12.0313L89.3934 20.5165C88.8076 21.1023 88.8076 22.0521 89.3934 22.6379C89.9792 23.2236 90.9289 23.2236 91.5147 22.6379L101.061 13.0919ZM0 13.5312L100 13.5313V10.5313L0 10.5312L0 13.5312Z"
            fill="#E5E5E5"
          />
        </svg>
      </a>
    </div>
  </section>
</template>

<script>
export default {};
</script>

<style lang="css" scoped>
.host {
  display: flex;
  flex-direction: row;
  width: 100vw;
  margin-bottom: 100px;
}
.host h1 {
  font-family: "Oswald";
  font-style: normal;
  font-weight: 400;
  font-size: 64px;
  color: #e5e5e5;
  margin-top: 40px;
  margin-left: 40px;
}
.host p,
.host a {
  font-family: "Oswald";
  font-style: normal;
  font-weight: 400;
  font-size: 40px;
  color: #e5e5e5;
  margin-left: 40px;
  margin-top: 10px;
}
.host div a {
  position: absolute;
  bottom: 100px;
  left: -100px;
  right: unset;
  transform: rotate(-90deg);
  z-index: 2;
}
.host div:nth-child(3) a {
  bottom: 160px;
  left: -130px;
}
.host div {
  position: relative;
  width: 25%;
  height: 1000px;
}
.host div:first-child {
  background: linear-gradient(0deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
    url("/img/room1.png");
}
.host div:nth-child(2) {
  background: linear-gradient(0deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
    url("/img/room2.png");
}
.host div:nth-child(3) {
  background: linear-gradient(0deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
    url("/img/room3.png");
}
.host div:last-child {
  background: linear-gradient(0deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
    url("/img/room4.png");
}
.host div:first-child:hover {
  background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),
    url("/img/room1.png");
}
.host div:nth-child(2):hover {
  background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),
    url("/img/room2.png");
}
.host div:nth-child(3):hover {
  background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),
    url("/img/room3.png");
}
.host div:last-child:hover {
  background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),
    url("/img/room4.png");
}
</style>
