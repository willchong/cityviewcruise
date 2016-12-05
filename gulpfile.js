var gulp = require('gulp');
var watch = require('gulp-watch');
var gulpCopy = require('gulp-copy');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var fs = require('fs');
var rename = require("gulp-rename");
var del = require('del');
var gutil = require('gulp-util');

//convert sass to css
gulp.task('sass', function() {
  gulp.src('sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('css/'));
});

gulp.task('cssprefix', function() {
    gulp.src('css/styles.css')
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('css/'))
});

gulp.task('imagemin', function() {
    return gulp.src('images/**/*')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest('images/'));
});

gulp.task('watch', function() {
    gulp.watch('sass/**/*.scss', ['sass']);
});

gulp.task('default', ['sass', 'watch']);
gulp.task('deploy', ['sass', 'cssprefix', 'imagemin']);

