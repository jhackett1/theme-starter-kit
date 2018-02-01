const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const gutil = require('gulp-util');

const webpack = require('webpack');
const webpackStream = require('webpack-stream');
const webpackConfig = require('./webpack.config.js');

gulp.task('sass', function () {
  return gulp.src('sass/*.sass')
    .pipe(sass({ style: 'expanded', sourceComments: 'map', errLogToConsole: true }))
    .pipe(autoprefixer('last 2 version', "> 1%", 'ie 8', 'ie 9'))
    .pipe(gulp.dest('css'))
    .on('error', gutil.log)
});

gulp.task('js', function() {
  gulp.src('./js/index.js')
    .pipe(webpackStream(webpackConfig), webpack)
    .pipe(gulp.dest('./js'));
});

gulp.task('default', ['sass', 'js'], function () {
  gulp.watch("sass/*.sass", ['sass']);
  gulp.watch("js/index.js", ['js']);
})
