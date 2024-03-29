module.exports = {
  important: false,
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
    fontWeight: {
      normal: 400,
      medium: 500,
      bold: 700,
      black: 900,
    },
    extend: {
      gridTemplateColumns: {
        6: "repeat(6, minmax(0, 1fr))",
        14: "repeat(14, minmax(0, 1fr))",
        15: "repeat(15, minmax(0, 1fr))",
        16: "repeat(16, minmax(0, 1fr))",
      },
      gridColumn: {
        "span-13": "span 13 / span 13",
        "span-14": "span 14 / span 14",
        "span-15": "span 15 / span 15",
      },
    },
    fontFamily: {
      sans: ["Silka Web", "Helvetica", "Arial", "sans-serif"],
    },
    lineHeight: {
      none: 1,
      tight: 1.05,
      snug: 1.1,
      wide: 1.15,
      wider: 1.3,
      normal: 1.6,
    },
    letterSpacing: {
      tight: "0.2px",
      wider: "0.25px",
    },
    spacing: {
      0: "0",
      1: "4px",
      2: "8px",
      3: "12px",
      4: "16px",
      5: "20px",
      6: "24px",
      7: "40px",
      8: "80px",
    },
    fontSize: {
      xs: "0.75rem",
      sm: "0.875rem",
      base: "1rem",
      m: "1.25rem",
      lg: "1.5rem",
      xl: "1.875rem",
      "2xl": "2.25rem",
      "3xl": "3rem",
      "4xl": "3.5rem",
      "5xl": "4rem",
      "6xl": "6rem",
      "7xl": "8.125rem",
      "8xl": "18rem",
    },
    screens: {
      sm: "576px",
      md: "1024px",
      lg: "1200px",
    },
    letterSpacing: {
      normal: "0",
      wide: ".01em",
      wider: ".03em",
    },
    colors: {
      transparent: "transparent",
      white: "#FFFFFF",
      black: "#000000",
      yellow: "#FFFF34",
      blue: "#0094FF",
      sand: "#EAE8D8",
      darkSand: "#DFDCC4",
      lightSand: "#F8F6E7",
      gray: "#E5E5E5",
      lightGray: "#E5E5E5",
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
  plugins: [
    require("tailwindcss-hyphens"),
    ({ addComponents }) => {
      addComponents({
        ".container": {
          maxWidth: "100%",
          "@screen md": {
            maxWidth: "1200px",
          },
        },
      });
    },
  ],
  future: {
    removeDeprecatedGapUtilities: true,
  },
};
