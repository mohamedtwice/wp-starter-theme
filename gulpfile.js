var gulp = require('gulp');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');

var paths = {
  scripts: [
    './node_modules/boostrap/js/src/**/*.js',
  ],
  scss: [
    './assets/scss/main.scss',
  ]
};

gulp.task('sass', function () {
 return gulp.src('./assets/scss/main.scss')
  .pipe(sourcemaps.init())
  .pipe(sass().on('error', sass.logError))
  .pipe(sourcemaps.write())
  .pipe(gulp.dest('./static/css'));
});

// Rerun the task when a file changes
gulp.task('watch', function() {
  gulp.watch('./assets/scss/**/*.scss', ['sass']);
});

// default task
gulp.task('default', ['watch', 'sass']);
