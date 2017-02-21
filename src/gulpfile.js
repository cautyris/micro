var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemap = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();

gulp.task('styles', function() {
    gulp.src('./scss/main.scss')
    .pipe(sourcemap.init())
    .pipe(sass({outputStyle: 'compressed'}))
    .pipe(autoprefixer())
    .pipe(sourcemap.write())
    .pipe(gulp.dest("../css"))
    .pipe(browserSync.reload({stream: true}));
});

gulp.task('serve', function() {
  browserSync.init({
    server: {
      baseDir: '../'
    }
  });
  gulp.src('./scss/main.scss')
  .pipe(sourcemap.init())
  .pipe(sass({outputStyle: 'compressed'}))
  .pipe(autoprefixer())
  .pipe(sourcemap.write())
  .pipe(gulp.dest("../css"))

  gulp.watch('./scss/**/*.scss', ['styles']);
  gulp.watch('../js/*.js', browserSync.reload({stream: true}));
});

gulp.task('default', ['serve']);
