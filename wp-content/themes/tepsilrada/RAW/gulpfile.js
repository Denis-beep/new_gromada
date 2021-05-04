const
    { src, dest, watch, parallel } = require('gulp'),
    scss = require('gulp-sass'),
    concat = require('gulp-concat'),
    browserSync = require('browser-sync').create(),
    autoprefixer = require('gulp-autoprefixer'),
    image = require('gulp-imagemin'),
    reload = browserSync.reload,
    uglify = require('gulp-uglify-es').default;


function browsersync() {
    browserSync.init({
        server: {
            baseDir: './'
        },
        notify: false
    })
}

function styles() {
    return src(["assets/sass/**/*",
        'node_modules/sweetalert2/dist/sweetalert2.min.css',
        'node_modules/@splidejs/splide/dist/css/splide.min.css',])
        .pipe(scss({ outputStyle: 'compressed' }))
        .pipe(concat('style.min.css'))
        .pipe(autoprefixer({
            overrideBrowserslist: ['last 10 version'],
            grid: true,
        }))
        .pipe(dest('assets/css'))
        .pipe(dest('../assets/css'))
        .pipe(browserSync.stream())
}

function scripts() {
    return src([
        'assets/js/libs/jquery/dist/jquery.js',
        'assets/js/app.js',
        'node_modules/sweetalert2/dist/sweetalert2.min.js',
        'node_modules/@splidejs/splide/dist/js/splide.min.js'
    ])
        .pipe(concat('app.min.js'))
        .pipe(uglify())
        .pipe(dest('assets/js'))
        .pipe(dest('../assets/js'))
        .pipe(browserSync.stream())
}

function images() {
    return src([
        'assets/images/*'
    ])
        .pipe(image())
        .pipe(dest('assets/compressed/images'))
}

function watching() {
    watch(['assets/sass/**/*.scss'], styles)
    watch(['assets/js/app.js'], scripts)
    watch(['**/*.html']).on('change', reload);
}


exports.styles = styles;
exports.scripts = scripts;
exports.watching = watching;
exports.browsersync = browsersync;
exports.images = images;

exports.default = parallel(scripts, styles, images, browsersync, watching)

