var gulp = require('gulp'),
    less = require('gulp-less'),
    path = require('path'),
    connect = require('gulp-connect'),
    autoprefixer = require('gulp-autoprefixer'),
    rename = require('gulp-rename'),
    cleanCSS = require('gulp-clean-css'),
    headerfooter = require('gulp-headerfooter');

var paths = {
    less: './src/less/**/*.less',
    // html: './src/content/*.html',
    // partialsHtml: './src/partials/*.html',
    js: './src/js/**/*.js'
};

gulp.task('less', function () {
    gulp.src(paths.less)
        .pipe(less({
            paths: [ path.join(__dirname, 'less', 'includes') ]
        }))
        .pipe(autoprefixer())
        .pipe(gulp.dest('./css'))
        .pipe(cleanCSS())
        .pipe(rename({ extname: '.min.css' }))
        .pipe(gulp.dest('./css'))
        .pipe(connect.reload());
});

// gulp.task('html', function () {
//     gulp.src(paths.html)
//         .pipe(headerfooter.header('./src/partials/header.html'))
//         .pipe(headerfooter.footer('./src/partials/footer.html'))
//         .pipe(gulp.dest('./dist'))
//         .pipe(connect.reload());
// });

gulp.task('js', function () {
    gulp.src(paths.js)
        .pipe(gulp.dest('./js'))
        .pipe(connect.reload());
});

gulp.task('connect', function() {
    connect.server({
        root: ['dist'],
        livereload: true
    });
});

gulp.task('watcher', function () {
    gulp.watch(paths.less, ['less']);
    // gulp.watch([paths.html, paths.partialsHtml], ['html']);
    gulp.watch(paths.js, ['js']);
});

// gulp.task('default', ['connect', 'less', 'html', 'js', 'watcher']);

gulp.task('default', ['connect', 'less', 'js', 'watcher']);