<template>
  <footer>
    <div class="footer-contacts">
      <p class="footer-subtitle">
        {{ this.translation[this.currentLang].contactsTitle }}
      </p>
      <p>{{ this.translation[this.currentLang].contactsBody }}</p>
    </div>

    <ul class="footer-links">
      <p class="footer-subtitle">
        {{ this.translation[this.currentLang].linksTitle }}
      </p>
      <li>
        <a href="https://himpost.com/">{{
          this.translation[this.currentLang].linksHimpost
        }}</a>
      </li>
      <li>
        <a href="https://himpost.prom.ua/">{{
          this.translation[this.currentLang].linksProm
        }}</a>
      </li>
      <li>
        <a href="https://www.youtube.com/channel/UCWMgCyrXRp25P7zk0iAo8Kg">{{
          this.translation[this.currentLang].linksYoutube
        }}</a>
      </li>
      <li>
        <a
          href="https://www.facebook.com/people/%D0%A7%D0%BF-%D0%A5%D0%B8%D0%BC%D0%BF%D0%BE%D1%81%D1%82%D0%B0%D0%B2%D1%89%D0%B8%D0%BA/100016061283845"
          >{{ this.translation[this.currentLang].linksFacebook }}</a
        >
      </li>
    </ul>

    <div class="footer-contacts">
      <p class="footer-subtitle">
        {{ this.translation[this.currentLang].linksHoursTitle }}
      </p>
      <p>{{ this.translation[this.currentLang].linksHoursBody }}</p>
    </div>

    <div class="footer-contacts">
      <p class="footer-subtitle">
        {{ this.translation[this.currentLang].feedbackTitle }}
      </p>
      <p>+38 (050) 340-35-47</p>
      <p>+38 (050) 480-11-20</p>
      <p>office@himpost.com</p>
    </div>
  </footer>
  <div class="copyright">
    <span>©2021 {{ this.translation[this.currentLang].copyright }}</span>
  </div>
</template>

<script>
import { translationsArray } from "@/language/FooterComp.js";

export default {
  data() {
    return {
      translation: translationsArray,
    };
  },
  props: ["currentLang"],
};
</script>

<style scoped>
/* footer */
* {
  margin: 0;
  padding: 0;

  --first-footer: #e0e0e0;
  --second-footer: rgb(39, 84, 206);
  --link-hover: rgb(39, 84, 206);
  --text-color: rgb(82, 82, 82);
}

footer {
  display: grid;
  grid-template-columns: repeat(4, 250px);
  justify-content: center;
  justify-items: center;
  grid-gap: 3em;
  background-color: var(--first-footer);
  padding: 5em 0;
  line-height: 1.5em;
  color: var(--text-color);
}

.footer-links {
  list-style: none;
}

.footer-links a:visited,
.footer-links a {
  text-decoration: none;
}

.footer-links a:visited {
  color: var(--text-color);
}

.footer-links a:hover {
  color: var(--link-hover);
}

.footer-subtitle {
  font-weight: 600;
}

.copyright {
  padding: 1em;
  font-size: 14px;
  background-color: var(--second-footer);
  color: #fff;
}
</style>