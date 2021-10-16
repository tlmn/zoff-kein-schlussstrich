import i18n from "i18next";
import { reactI18nextModule } from "react-i18next";

import translationEN from "./assets/locales/en/translation.json";
import translationDE from "./assets/locales/de/translation.json";
import translationDELS from "./assets/locales/dels/translation.json";
import Cookies from "js-cookie";

const resources = {
  en: {
    translation: translationEN,
  },
  de: {
    translation: translationDE,
  },
  dels: {
    translation: translationDELS,
  },
};

console.log(Cookies.get("wp-wpml_current_language"));

i18n.use(reactI18nextModule).init({
  resources,
  lng: ["de", "en", "dels"].includes(Cookies.get("wp-wpml_current_language"))
    ? Cookies.get("wp-wpml_current_language")
    : `de`,
  keySeparator: true,
  interpolation: {
    escapeValue: false,
  },
});

export default i18n;
