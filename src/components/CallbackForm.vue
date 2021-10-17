<template>
  <div class="modal-wrap">
    <div class="modal-window">
      <h3 class="modal-title">
        {{ this.translation[this.currentLang].callbackModalTitle }}
      </h3>
      <p>
        {{ this.translation[this.currentLang].callbackModalSubTitle }}
      </p>

      <checkout-cart :cart="cart" :currentLang="currentLang"></checkout-cart>

      <form class="contact-form">
        <div class="form-input-group">
          <label for="name"
            ><span class="asterisk">*</span>
            {{ this.translation[this.currentLang].callbackModalName }}</label
          >
          <input v-model="name" type="text" name="name" />
        </div>

        <div class="form-input-group">
          <label for="tel"><span class="asterisk">*</span>Телефон:</label>
          <input v-model="tel" type="tel" name="tel" />
        </div>

        <div class="form-input-group">
          <label for="comment">{{
            this.translation[this.currentLang].callbackModalComment
          }}</label>
          <textarea v-model="comment" name="comment" rows="3" />
        </div>
        <gen-btn @click="sendData($event)">
          {{ this.translation[this.currentLang].callbackModalBtn }}
        </gen-btn>
      </form>
    </div>
  </div>
</template>

<script>
import { translationsArray } from "@/language/CallbackForm.js";
import CheckoutCart from "./CheckoutCart.vue";

export default {
  components: { CheckoutCart },
  data() {
    return {
      name: "",
      tel: "",
      comment: "",
      translation: translationsArray,
    };
  },
  props: ["cart", "currentLang"],
  emits: ["modal-window", "clear-cart"],
  methods: {
    sendData(e) {
      e.preventDefault();

      const form = document.querySelector(".contact-form");
      const formData = new FormData(form);
      const cartNames = this.cart.map((item) => {
        return `${item.name[0]}(x${item.quantity})`;
      });
      const cartString = cartNames.join("\n");
      const cartData = cartString;
      formData.append("cartData", cartData);
      formData.append("total", this.total);

      console.log(formData);
      fetch("mail.php", {
        method: "post",
        body: formData,
      })
        .then(function (response) {
          return response.text();
        })
        .then(function (text) {
          console.log(text);
        })
        .catch(function (error) {
          console.error(error);
        });
      this.$emit("clear-cart");
      this.$emit("modal-window");
    },
  },
  computed: {
    cartContents() {
      let data = this.cart.map((product) => {
        return product.name[0] + " - " + product.price;
      });
      let temp = data.join("\n");
      console.log(temp);
      console.log(typeof temp);
      return temp;
    },
    total() {
      return this.cart.reduce((sum, item) => {
        return (sum += item.price * item.quantity);
      }, 0);
    },
  },
};
</script>

<style scoped>
* {
  padding: 0;
  margin: 0;

  --text-color: rgb(80, 80, 80);
  --background-color: #ececec;
}

/* callback form */

.modal-wrap {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-template-areas: ".... modal modal ...";
  padding-top: 80px;
  background-color: var(--background-color);
}

.modal-window {
  display: grid;
  grid-template-rows: 0.5fr 0.5fr auto 4fr;
  grid-auto-flow: column;
  grid-gap: 1em;
  align-items: center;
  grid-area: modal;
  margin: 3em auto;
  background-color: #fff;
  padding: 3em 5em;
  border-radius: 5px;
  box-shadow: var(--modal-shadow);
  color: var(--text-color);
}

.modal-window > p {
  text-align: center;
  line-height: 1.4em;
}

.modal-title {
  font-family: "Ubuntu", sans-serif;
  text-align: center;
  font-weight: 400;
  font-size: var(--font-large);
}

.asterisk {
  color: red;
}

.form-input-group {
  display: grid;
}

.contact-form {
  display: grid;
  grid-gap: 1.6em;
}

.contact-form textarea,
.contact-form input {
  background-color: var(--background-color);
  border: none;
  border-radius: 3px;
  padding: 0.8em;
  font-size: 18px;
}
.contact-form textarea:focus,
.contact-form textarea:hover,
.contact-form input:focus,
.contact-form input:hover {
  outline: none;
}

/* other */

textarea,
input,
button {
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
}
</style>