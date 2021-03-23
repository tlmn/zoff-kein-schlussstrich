"use strict";

const gulp = require("gulp");
const postcss = require("gulp-postcss");
const browserSync = require("browser-sync").create();
const cleancss = require("gulp-clean-css");
const sass = require("gulp-sass");
const postCSSNesting = require("postcss-nesting");

gulp.task("dev:copy", function () {
  return gulp
    .src(["src/**/*", "!src/assets/css/**/*"])
    .pipe(gulp.dest("./wp-content/themes/ks-theme/"));
});

gulp.task("dev:copy:JS", function () {
  return gulp
    .src(["src/assets/js/**/*.js"])
    .pipe(gulp.dest("./wp-content/themes/ks-theme/assets/js"));
});

gulp.task("dev:postcss", function () {
  const config = (file) => ({
    plugins: [
      require("postcss-import")({ root: file.dirname }),
      require("postcss-nesting"),
    ],
  });
  return gulp
    .src("src/assets/css/style.css")
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

gulp.task("build:copy", function () {
  return gulp
    .src(["src/**/*", "!src/assets/css/**/*"])
    .pipe(gulp.dest("./dist/"));
});

gulp.task("build:postcss", function () {
  const config = (file) => ({
    plugins: [
      require("postcss-import")({ root: file.dirname }),
      require("postcss-nesting"),
    ],
  });
  return gulp
    .src("src/assets/css/style.css")
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
    .pipe(gulp.dest("./dist/"));
});

gulp.task("dev:watch", function () {
  browserSync.init({
    proxy: "localhost:8000",
    notify: false,
  });
  gulp
    .watch("src/assets/js/**/*.js", gulp.series(["dev:copy:JS"]))
    .on("change", browserSync.reload);
  gulp
    .watch("src/assets/css/**/*.css", gulp.series(["dev:postcss"]))
    .on("change", browserSync.reload);
  gulp
    .watch("src/**/*.php", gulp.series(["dev:copy"]))
    .on("change", browserSync.reload);
});

gulp.task("dev", gulp.series(["dev:postcss", "dev:copy", "dev:watch"]));
gulp.task("build", gulp.series(["build:postcss", "build:copy"]));
