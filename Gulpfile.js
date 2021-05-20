"use strict";

const gulp = require("gulp");
const postcss = require("gulp-postcss");
const browserSync = require("browser-sync").create();
const cleancss = require("gulp-clean-css");
const nested = require("postcss-nested");
const run = require("gulp-run-command").default;
const replace = require("gulp-replace");
const favicons = require("gulp-favicons");

const config = (file) => ({
  plugins: [
    require("postcss-import")({ root: file.dirname }),
    require("postcss-nested"),
  ],
});

gulp.task("dev:theme:favicons", function () {
  return gulp
    .src("src/theme/assets/images/favicons/icon.png")
    .pipe(
      favicons({
        appName: "Kein Schlussstrich",
        appShortName: "Kein Schlussstrich",
        appDescription: "Kein Schlussstrich",
        path: "favicons/",
        url: "https://www.keinschlussstrich.de/",
        display: "standalone",
        orientation: "portrait",
        scope: "/",
        start_url: "/?homescreen=1",
        version: 1.0,
        logging: false,
        html: "index.html",
        pipeHTML: true,
        replace: true,
      })
    )
    .pipe(gulp.dest("./wp-content/themes/ks-theme/assets/favicons/"));
});

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

gulp.task("dev:theme:postcss:editor", function () {
  return gulp
    .src("src/theme/assets/css/editor-style.css")
    .pipe(postcss(config))
    .pipe(
      postcss([
        require("tailwindcss"),
        require("postcss-import"),
        require("tailwindcss"),
        require("autoprefixer"),
      ])
    )
    .pipe(replace(";", "!important;"))
    .pipe(cleancss())
    .pipe(gulp.dest("./wp-content/themes/ks-theme/"));
});

gulp.task("build:clean", run("rm -rf ./dist"));

gulp.task(
  "build:plugin:npmInstall",
  run("npm install", { cwd: "src/plugin/widget/" })
);

gulp.task(
  "build:plugin:build",
  run("npm run build", { cwd: "src/plugin/widget/" })
);

gulp.task("build:plugin:copy:build", function () {
  return gulp
    .src(["src/plugin/widget/build/**/*"])
    .pipe(gulp.dest("./dist/plugin/widget/build/"));
});

gulp.task("build:theme:favicons", function () {
  return gulp
    .src("src/theme/assets/images/favicons/icon.png")
    .pipe(
      favicons({
        appName: "Kein Schlussstrich",
        appShortName: "Kein Schlussstrich",
        appDescription: "Kein Schlussstrich",
        path: "favicons/",
        url: "https://www.keinschlussstrich.de/",
        display: "standalone",
        orientation: "portrait",
        scope: "/",
        start_url: "/?homescreen=1",
        version: 1.0,
        logging: false,
        html: "index.html",
        pipeHTML: true,
        replace: true,
      })
    )
    .pipe(gulp.dest("./dist/theme/assets/favicons/"));
});

gulp.task("build:plugin:copy:includes", function () {
  return gulp
    .src(["src/plugin/includes/**/*"])
    .pipe(gulp.dest("./dist/plugin/includes/"));
});

gulp.task("build:plugin:copy:pluginFile", function () {
  return gulp
    .src(["src/plugin/ks-calendar.php"])
    .pipe(gulp.dest("./dist/plugin/"));
});

gulp.task("build:theme:copy", function () {
  return gulp
    .src(["src/theme/**/*", "!src/assets/css/**/*"])
    .pipe(gulp.dest("./dist/theme/"));
});

gulp.task("build:theme:postcss", function () {
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
    .watch(
      "src/theme/assets/css/**/*.css",
      gulp.series(["dev:theme:postcss"])
    )
    .on("change", browserSync.reload);
  gulp
    .watch("src/theme/**/*.php", gulp.series(["dev:theme:copy"]))
    .on("change", browserSync.reload);
  gulp
    .watch("src/theme/**/*.json", gulp.series(["dev:theme:copy"]))
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
    "build:plugin:npmInstall",
    "build:plugin:build",
    "build:plugin:copy:build",
    "build:plugin:copy:pluginFile",
    "build:plugin:copy:includes",
  ])
);
