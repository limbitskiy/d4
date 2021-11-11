<template>
  <div class="modal-wrap">
    <div class="container-small">
      <div class="modal-window">
        <h3 class="modal-title">
          {{ this.translation[this.currentLang].callbackModalTitle }}
        </h3>
        <p>
          {{ this.translation[this.currentLang].callbackModalSubTitle }}
        </p>

        <Cart
          :cart="cart"
          :currentLang="currentLang"
          @removeFromCart="this.$emit('removeFromCart', $event)"
          @changeQuantity="this.$emit('changeQuantity', $event)"
        />

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
          <gen-btn @click.prevent="sendData()">
            {{ this.translation[this.currentLang].callbackModalBtn }}
          </gen-btn>
          <gen-btn-grey @click.prevent="this.$emit('home-btn')">
            {{ this.translation[this.currentLang].callbackModalBtnBack }}
          </gen-btn-grey>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { translationsArray } from "@/language/CallbackForm.js";
import Cart from "./Cart.vue";

export default {
  components: { Cart },
  data() {
    return {
      name: "",
      tel: "",
      comment: "",
      translation: translationsArray,
    };
  },
  props: ["cart", "currentLang"],
  emits: [
    "modal-window",
    "clear-cart",
    "changeQuantity",
    "removeFromCart",
    "home-btn",
  ],
  methods: {
    sendData() {
      const form = document.querySelector(".contact-form");
      const formData = new FormData(form);
      const cartNames = this.cart.map((item) => {
        return `${item.name[0]} - ${item.select} - x${item.quantity}`;
      });
      const cartData = cartNames.join("\n");
      formData.append("cartData", cartData);
      formData.append("total", this.total);

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
      console.log(this.cart);
    },
  },
  computed: {
    // cartContents() {
    //   let data = this.cart.map((product) => {
    //     return product.name[0] + " - " + product.price;
    //   });
    //   let temp = data.join("\n");
    //   console.log(temp);
    //   console.log(typeof temp);
    //   return temp;
    // },
    total() {
      return this.cart.reduce((sum, item) => {
        return (sum += item.price[item.select] * item.quantity);
      }, 0);
    },
  },
};
</script>

<style lang="scss" scoped>
* {
  padding: 0;
  margin: 0;

  --text-color: rgb(80, 80, 80);
  --background-color: #ececec;
}

.container-small {
  max-width: 800px;
  margin: 0 auto;
}

/* callback form */

.modal-wrap {
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

  > p {
    text-align: center;
    line-height: 1.4em;
  }
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

  textarea,
  input {
    background-color: var(--background-color);
    border: none;
    border-radius: 3px;
    padding: 0.8em;
    font-size: 18px;
  }

  textarea {
    &:focus,
    &:hover {
      outline: none;
    }
  }

  input {
    &:focus,
    &:hover {
      outline: none;
    }
  }
}

/* other */

textarea,
input,
button {
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
}

@media screen and (max-width: 800px) {
  .container-small {
    width: 100%;
  }

  .modal-window {
    padding: 2em;
  }
}

@media screen and (max-width: 400px) {
  .modal-window {
    padding: 2em 10px !important;
  }
}
</style>