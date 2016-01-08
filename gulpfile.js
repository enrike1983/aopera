var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cssmin = require('gulp-cssmin'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    browserSync = require('browser-sync');

/**
 * Styles
 **/
gulp.task('scss', function() {
    gulp.src('_assets/scss/*.scss')
        .pipe(sass())
        .pipe(cssmin())
        .pipe(gulp.dest('web/css'))
        .pipe(browserSync.stream());
});


/**
 * Scripts
 **/
gulp.task('js', function() {
    gulp.src('_assets/js/**/*.js')
        .pipe(uglify())
        .pipe(gulp.dest('web/js'));
});


gulp.task('watch', ['scss', 'js'], function() {
    gulp.watch( '_assets/scss/**/*.scss' , ['scss']);
    gulp.watch( '_assets/js/**/*.js' , ['js']);
    gulp.watch( 'web/*.html').on('change', browserSync.reload);
});
