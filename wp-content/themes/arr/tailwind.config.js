// tailwind.config.js
const colors = require("tailwindcss/colors");

module.exports = {
  purge: {
    enabled: true,
    content: ["./**/*.php"],
  },
  theme: {
    extend: {
      maxWidth: {
        "logo-desktop": "300px",
        "logo-tablet": "240px",
        "logo-mobile": "180px",
      },
      colors: {
        blue: "var(--color-blue)",
        darkblue: "var(--color-darkblue)",
        midnightblue: "var(--color-midnightblue)",
        lightblue: "var(--color-lightblue)",
        iceblue: "var(--color-iceblue)",
        quoteblue: "var(--color-quoteblue)",
        lightgrey: "var(--color-lightgrey)",
        green: "var(--color-green)",
        orange: "var(--color-orange)",
      },
      borderWidth: {
        1: "1px",
      },
    },
  },
};
