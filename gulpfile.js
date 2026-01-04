// 読み込み
const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cssSorter = require("css-declaration-sorter");
const mmq = require("gulp-merge-media-queries");
const browserSync = require("browser-sync");
const cleanCSS = require("gulp-clean-css");
const uglify = require("gulp-uglify");
const rename = require("gulp-rename");
const htmlBeautify = require("gulp-html-beautify");
const connectPhp = require("gulp-connect-php");

// コンパイル
function compileSass() {
  return (
    gulp
      .src("./src/assets/sass/style.scss", { encoding: false })
      .pipe(sass().on("error", sass.logError))
      .pipe(postcss([autoprefixer(), cssSorter()]))
      .pipe(mmq())
      .pipe(gulp.dest("./src/assets/css"))
      .pipe(gulp.dest("./assets/css"))
      .pipe(cleanCSS())
      .pipe(rename({ suffix: ".min" }))
      .pipe(gulp.dest("./assets/css"))
  );
}

function minJS() {
  return (
    gulp
      .src("./src/assets/js/**/*.js", { encoding: false })
      .pipe(gulp.dest("./assets/js"))
      .pipe(uglify())
      .pipe(rename({ suffix: ".min" }))
      .pipe(gulp.dest("./assets/js"))
  );
}

// ファイル監視
function watch() {
  gulp.watch(
    "./src/assets/sass/**/*.scss",
    compileSass
  );
  gulp.watch(
    "./src/assets/js/**/*.js",
    minJS
  );
}

exports.compileSass = compileSass;
exports.minJS = minJS;
exports.watch = watch;
exports.dev = gulp.series(compileSass, minJS, watch);
