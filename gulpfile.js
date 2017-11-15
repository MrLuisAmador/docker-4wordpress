var gulp          = require('gulp'),
    sass          = require('gulp-sass'),
    sourcemaps    = require('gulp-sourcemaps'),
    uglify        = require('gulp-uglify'),
    autoprefixer  = require('autoprefixer'),
    minifycss     = require('gulp-minify-css'),
    rename        = require('gulp-rename'),
    imagemin      = require('gulp-imagemin'),
    pngquant      = require('imagemin-pngquant'),
    postcss       = require('gulp-postcss'),
    browserify    = require('gulp-browserify'),
    browserSync = require('browser-sync').create();

// Node Sass Task
gulp.task('sass', function() {
    var processors = [
        autoprefixer({browsers: ['last 2 version']})
    ];

    gulp.src('./scss/main.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({errLogToConsole: true}))
    .pipe(postcss(processors))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./css'))
    .pipe(browserSync.stream());
});

// HTML Task
gulp.task('html', function () {
   gulp.src('./*.php')
  .pipe(browserSync.stream());
});

//Javascript Task
gulp.task('js', function () {
   gulp.src('./js/main.js')
   .pipe(browserify({
          insertGlobals : true,
          debug : !gulp.env.production
    }))
  .pipe(rename('browserify.js'))
  .pipe(gulp.dest('./js'))
  .pipe(browserSync.stream());
});

// Image Minification
gulp.task('imagemin', function () {
    return gulp.src('img/*.{png,jpg,gif,svg}')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest('img/'));
});

// Minify CSS Task
gulp.task('minifycss', function () {
    gulp.src('./css/*.css')
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('./css'));
});// Completed

// Uglify Task
gulp.task('uglify', function() {
  gulp.src('./js/*.js')
    .pipe(uglify())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('./js/'));
});//Completed

// Browser Sync
gulp.task('serve', function() {
    browserSync.init({
        proxy: "localhost" //Add Localhost URL Here
    });

    gulp.watch(["scss/**/*.scss","./*.php",'./js/**/*.js'], ['sass', 'html','js']);
});

// Default Task
gulp.task('default', ['serve']);

// My Compress Task
gulp.task('compress', ['uglify', 'minifycss', 'imagemin']);
