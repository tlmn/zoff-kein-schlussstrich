"use strict";

const gulp = require("gulp");
const postcss = require("gulp-postcss");
const browserSync = require("browser-sync").create();
const cleancss = require("gulp-clean-css");
const sass = require("gulp-sass");
const postCSSNesting = require("postcss-nesting");

gulp.task("dev:theme:copy", function () {
  return gulp
    .src(["src/theme/**/*", "!src/theme/assets/css/**/*"])
    .pipe(gulp.dest("./wp-content/themes/ks-theme/"));
});

gulp.task("dev:theme:copy:JS", function () {
  return gulp
    .src(["src/theme/assets/js/**/*.js"])
    .pipe(gulp.dest("./wp-content/themes/ks-theme/assets/js"));
});

gulp.task("dev:theme:postcss", function () {
  const config = (file) => ({
    plugins: [
      require("postcss-import")({ root: file.dirname }),
      require("postcss-nesting"),
    ],
  });
  return gulp
    .src("src/theme/assets/css/style.css")
    .pipe(postcss(config))
    .pipe(
      postcss([
        require("tailwindcss"),
        require("postcss-import"),
        require("tailwindcss"),
        require("autoprefixer"),
      ])
    )
    .pipe(cleancss())
    .pipe(gulp.dest("./wp-content/themes/ks-theme/"));
});

gulp.task("build:theme:copy", function () {
  return gulp
    .src(["src/theme/**/*", "!src/assets/css/**/*"])
    .pipe(gulp.dest("./dist/theme/"));
});

gulp.task("build:theme:postcss", function () {
  const config = (file) => ({
    plugins: [
      require("postcss-import")({ root: file.dirname }),
      require("postcss-nesting"),
    ],
  });
  return gulp
    .src("src/theme/assets/css/style.css")
    .pipe(postcss(config))
    .pipe(
      postcss([
        require("tailwindcss"),
        require("postcss-import"),
        require("tailwindcss"),
        require("autoprefixer"),
      ])
    )
    .pipe(cleancss())
    .pipe(gulp.dest("./dist/theme/"));
});

gulp.task("dev:theme:watch", function () {
  browserSync.init({
    proxy: "localhost:8000",
    notify: false,
  });
  gulp
    .watch("src/theme/assets/js/**/*.js", gulp.series(["dev:theme:copy:JS"]))
    .on("change", browserSync.reload);
  gulp
    .watch("src/theme/assets/css/**/*.css", gulp.series(["dev:theme:postcss"]))
    .on("change", browserSync.reload);
  gulp
    .watch("src/theme/**/*.php", gulp.series(["dev:theme:copy"]))
    .on("change", browserSync.reload);
});

gulp.task("dev", gulp.series(["dev:theme:postcss", "dev:theme:copy", "dev:theme:watch"]));
gulp.task("build", gulp.series(["build:theme:postcss", "build:theme:copy"]));
