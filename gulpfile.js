var gulp = require('gulp');
var watch = require('gulp-watch');
var gulpCopy = require('gulp-copy');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var htmlreplace = require('gulp-html-replace');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var extender = require('gulp-html-extend');
var data = require('gulp-data');
var nunjucksRender = require('gulp-nunjucks-render');
var fs = require('fs');
var rename = require("gulp-rename");
var del = require('del');
var gutil = require('gulp-util');

//convert sass to css
gulp.task('sass', function() {
  gulp.src('frontend/sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('public/css-2017/'));
});

//concat scripts
gulp.task('scripts', function() {
  return gulp.src('frontend/js/*.js')
    .pipe(concat('script.js'))
    .pipe(gulp.dest('public/js-2017/'));
});

gulp.task('customScripts', function() {
    return gulp.src('**', {cwd: 'frontend/js/custom'})
        .pipe(gulpCopy('public/js-2017/custom/'));
});

gulp.task('fonts', function() {
    return gulp.src('**', { cwd: 'frontend/fonts' })
        .pipe(gulpCopy('public/fonts-2017/'));
});

gulp.task('imagecopy', function() {
    return gulp.src('**', {cwd: 'frontend/img/'})
        .pipe(gulpCopy('public/img-2017/'));
});

gulp.task('imagemin', function() {
    return gulp.src('frontend/img/**/*')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest('public/img-2017/'));
});

gulp.task('cssprefix', function() {
    gulp.src('public/css/styles.css')
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('public/css/'))
});

gulp.task('watch', function() {
    gulp.watch('frontend/sass/**/*.scss', ['sass']);
    gulp.watch('frontend/img/**/*.*', ['imagecopy']);
    gulp.watch('frontend/js/*.js', ['scripts']);
    gulp.watch('frontend/js/custom/*.js', ['customScripts']);
    gulp.watch('frontend/fonts', ['fonts']);
    gulp.watch(['frontend/data/**/*','frontend/pages/**/*','frontend/templates/**/*'], ['model_export']);
});

gulp.task('clean', function() {
  return del([
    'public/',
  ]);
});

var cars = ['all-models','tiguan', 'sportwagen', 'alltrack', 'golf', 'jetta', 'gli', 'atlas'];

var language = ['en','fr'];
  
cars.forEach(function(car, car_index, car_array) {
  gulp.task(car, function() {
    // console.log(car);
    language.forEach(function(lang,lang_index,lang_array) {
          // console.log(lang);    
          //set bazaar voice api url
          var manageEnvironment = function(environment) {

              if (lang == 'en') {
                environment.addGlobal('bazaarApi', 'https://display.ugc.bazaarvoice.com/static/vwca/en_CA/bvapi.js');
                environment.addGlobal('language', 'en');
              } else if (lang == 'fr') {
                environment.addGlobal('bazaarApi', 'https://display.ugc.bazaarvoice.com/static/vwca/fr_CA/bvapi.js');
                environment.addGlobal('language', 'fr');
              }

            } 
          //grabs page file from /pages
          var templateSource;
          var destination;
          if (car.indexOf("-family") >= 0) {
            templateSource = 'frontend/pages/family/*.+(html|nunjucks|php)';
            destination = 'public/'+cars[car_index]+'/';
          } else if (car == 'all-models') {  
            templateSource = 'frontend/pages/all-models/*.+(html|nunjucks|php)';
            destination = 'public/';
          } else if (car == 'atlas') {  
            templateSource = 'frontend/pages/countdown/*.+(html|nunjucks|php)';
            destination = 'public/'+cars[car_index]+'/';
          } else {
            templateSource = 'frontend/pages/default/*.+(html|nunjucks|php)';
            destination = 'public/'+cars[car_index]+'/';
          }
          return gulp.src(templateSource)
          //pulls in appropriate data / checks if it exists otherwise throw a warning
          .pipe(data(function() {
              var source = './frontend/data/'+cars[car_index]+'/'+language[lang_index]+'.json';
              if (fs.existsSync(source)) {
                return JSON.parse(fs.readFileSync(source));
              } else {
                console.log('\033[31m========== WARNING: NO "'+cars[car_index].toUpperCase()+' '+language[lang_index].toUpperCase()+'" DATA FILE ==========\033[0m');
                return;
              }
            }))
          // Renders template with nunjucks
          .pipe(nunjucksRender({
              path: ['frontend/templates'],
              manageEnv: manageEnvironment
            }))
          //renames extension to php
          .pipe(rename(function (path) {
              if (language[lang_index] != 'en') {
                path.basename += "-"+language[lang_index];
              } 
              path.extname = ".php";
           }))
          // output files in app folder
          .pipe(gulp.dest(destination));
    });
  });
});


gulp.task('model_export', cars);
gulp.task('default', ['model_export', 'imagecopy', 'fonts', 'sass', 'scripts', 'customScripts', 'watch']);
gulp.task('deploy', ['model_export', 'imagecopy', 'fonts', 'sass', 'cssprefix', 'customScripts', 'scripts']);

// gulp --env=prod deploy (for bazaar voice live env)

