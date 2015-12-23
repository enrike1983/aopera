var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cssmin = require('gulp-cssmin'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    browserSync = require('browser-sync');

/**
 * Styles
 **/
gulp.task('styles', function() {
    gulp.src('_assets/scss/*.scss')
        .pipe(sass())
        .pipe(cssmin())
        .pipe(gulp.dest('web/css'));
});


/**
 * Scripts
 **/
gulp.task('scripts', function() {
    gulp.src('_assets/js/**/*.js')
        .pipe(uglify())
        .pipe(gulp.dest('web/js'));
});


gulp.task('serve', ['styles', 'scripts'], function() {
    browserSync.init({
        server: "./web"
    });
    gulp.watch( '_assets/scss/**/*.scss' , ['styles']);
    gulp.watch( '_assets/js/**/*.js' , ['scripts']);
    gulp.watch( 'web/*.html').on('change', browserSync.reload
    )
        .pipe(browserSync.stream());
});
