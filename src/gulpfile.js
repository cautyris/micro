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

gulp.task('html', function(){
  gulp.src('./')
  .pipe(browserSync.reload({stream:true}));
});

gulp.task('js', function(){
  gulp.src('./')
  .pipe(browserSync.reload({stream:true}));
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
  gulp.watch('./../js/*.js', ['js']);
  gulp.watch('./../index.html', ['html']);
});

gulp.task('default', ['serve']);
