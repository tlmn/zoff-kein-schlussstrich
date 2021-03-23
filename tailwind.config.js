module.exports = {
  purge: {
    content: [
      "./src/**/*.js",
      "./src/**/*.jsx",
      "./src/**/*.ts",
      "./src/**/*.tsx",
    ],
    options: {
      whitelistPatterns: [/text.*$/],
    },
  },
  theme: {
    fontFamily: {
      sans: ["Silka Web", "Helvetica", "Arial", "sans-serif"],
    },
    lineHeight: {
      none: 1,
      tight: 1.15,
      snug: 1.25,
      wider: 1.33,
      normal: 1.5,
      xl: 1.8
    },
    letterSpacing: {
      tight: "0.2px",
      wider: "0.25px",
    },
    spacing: {
      0: "0",
      1: "6px",
      2: "12px",
      3: "24px",
      4: "40px",
      5: "48px",
      6: "72px",
      7: "96px",
      8: "112px",
      9: "200px",
      10: "280px",
    },
    fontSize: {
      xs: "12px",
      sm: "14px",
      tiny: "16px",
      base: "18px",
      lg: "20px",
      xl: "22px",
      "2xl": "24px",
      "3xl": "26px",
      "4xl": "28px",
      "5xl": "30px",
      "6xl": "32px",
      "7xl": "44px",
      "8xl": "48px",
      "9xl": "52px",
      "10xl": "58px",
      "11xl": "68px",
      "12xl": "72px"
    },
    screens: {
      sm: "576px",
      md: "1280px",
    },
    colors: {
      transparent: "transparent",
      white: "#FFFFFF",
      black: "#000000",
      red: "#FF0000",
      blue: "#0076E2",
      green: "#23D64A",
      gray: "#353535",
      lightGray: "#F1F1F1",
    },
    container: {
      center: true,
    },
  },
  variants: {
    margin: ["last", "responsive"],
  },
  zIndex: {
    0: 0,
    10: 10,
    20: 20,
    30: 30,
    40: 40,
    50: 50,
    60: 60,
    70: 70,
    80: 80,
    90: 90,
    100: 100,
    auto: "auto",
  },
  options: { important: true },
  plugins: [require("tailwindcss-hyphens")],
  future: {
    removeDeprecatedGapUtilities: true,
  },
};
