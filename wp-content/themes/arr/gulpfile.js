const gulp = require('gulp');
const postcss = require('gulp-postcss');
const stripCssComments = require('gulp-strip-css-comments');
const cleanCSS = require('gulp-clean-css');
const cache = require('gulp-cache');
const browserSync = require('browser-sync').create();
// WP write header and footer
const fs = require('fs');
const header = require('gulp-header');
const footer = require('gulp-footer');

// Package.JSON contents
const pkg = JSON.parse(fs.readFileSync('./package.json'));

function css() {
  const cssbanner = [
    '/*',
    'Theme Name:          ' + pkg.themename,
    'Description:         ' + pkg.description,
    'Author:              ' + pkg.author,
    'Author URI:          ' + pkg.authoruri,
    'Version:             ' + pkg.version,
    'Theme URI:           ' + pkg.homepage,
    'License:             ' + pkg.license,
    'License URI:         ' + pkg.licenseuri,
    'Text Domain:         ' + pkg.textDomain,
    '*/',
    '',
  ].join('\n');

  return gulp
    .src(['src/css/arr.css'], {"allowEmpty": true})

    .pipe(
      postcss([
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
      ])
    )
    .pipe(stripCssComments({ preserve: false }))
    .pipe(cleanCSS(require('./configs/clean-css.js')))
    .pipe(
      header(cssbanner, {
        pkg: pkg,
      })
    )
    .pipe(footer('\n'))
    .on('error', console.error.bind(console))
    .pipe(gulp.dest('./'));
}

// reload function
function reload(done) {
  browserSync.reload();
  done();
}

function clearCache(done) {
  return cache.clearAll(done);
}

// default watch function
exports.default = function () {
  browserSync.init({
    proxy: 'dev.arr',
    port: 3001,
    online: true,
    https: true,
  });
  gulp.watch(
    ['./**/*.php', './src/css/*.css', './src/scss/*.scss'],
    { interval: 750 },
    gulp.series(css, clearCache, reload)
  );
};
