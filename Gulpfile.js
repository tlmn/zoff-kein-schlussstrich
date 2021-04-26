"use strict";

const gulp = require("gulp");
const postcss = require("gulp-postcss");
const browserSync = require("browser-sync").create();
const cleancss = require("gulp-clean-css");
const sass = require("gulp-sass");
const postCSSNesting = require("postcss-nesting");
const run = require("gulp-run-command").default;

gulp.task("dev:theme:copy", function () {
  return gulp
    .src(["src/theme/**/*", "!src/theme/assets/css/**/*"])
    .pipe(gulp.dest("./wp-content/themes/ks-theme/"));
});

gulp.task("dev:plugin:copy", function () {
  return gulp
    .src([
      "src/plugin/**/*",
      "!src/plugin/widget/node_modules/**/*",
      "!src/plugin/widget/src/**/*",
    ])
    .pipe(gulp.dest("./wp-content/plugins/ks-calendar/"));
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

gulp.task("build:clean", run("rm -rf ./dist"));

gulp.task(
  "build:plugin:build",
  run("cd ./src/plugin/widget/ && npm install && npm run build")
);

gulp.task("build:plugin:copy:build", function () {
  return gulp
    .src(["src/plugin/widget/build/**/*"])
    .pipe(gulp.dest("./dist/plugin/widget/"));
});

gulp.task("build:plugin:copy:includes", function () {
  return gulp
    .src([
      "src/plugin/includes/**/*",
    ])
    .pipe(gulp.dest("./dist/plugin/includes/"));
});

gulp.task("build:plugin:copy:pluginFile", function () {
  return gulp
    .src([
      "src/plugin/ks-calendar.php",
    ])
    .pipe(gulp.dest("./dist/plugin/"));
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

gulp.task("dev:watch", function () {
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
  gulp
    .watch(
      ["src/plugin/*", "src/plugin/widget/build/*/**"],
      gulp.series(["dev:plugin:copy"])
    )
    .on("change", browserSync.reload);
});

gulp.task(
  "dev",
  gulp.series([
    "dev:theme:postcss",
    "dev:theme:copy",
    "dev:plugin:copy",
    "dev:watch",
  ])
);

gulp.task(
  "build",
  gulp.series([
    "build:clean",
    "build:theme:postcss",
    "build:theme:copy",
    "build:plugin:build",
    "build:plugin:copy:build",
    "build:plugin:copy:pluginFile",
    "build:plugin:copy:includes",
  ])
);
