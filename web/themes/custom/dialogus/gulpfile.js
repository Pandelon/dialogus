const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();
const sourcemaps = require('gulp-sourcemaps');
const cssnano = require('cssnano');


function style() {
  return gulp.src('./scss/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
   /* .pipe(postcss( cssnano() ))*/
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('./css'))
    .pipe(browserSync.stream());
}
function watch() {
    browserSync.init({
      proxy: {
        target: "http://dialogus.loc",
      }
    });
    gulp.watch('./scss/**/*.scss', style)
}

exports.style  = style;
exports.watch = watch;
exports.default = watch;
