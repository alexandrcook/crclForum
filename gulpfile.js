'use strict';

var proxy = 'crclOOP2.dev';

var gulp = require('gulp'),
    watch = require('gulp-watch'),
    browserSync = require("browser-sync"),
    reload = browserSync.reload;

var path = {
    build: {
        main:"./build"
    },
    src: {
        main:"./build"
    },
    watch: {
        main:"./build"
    },
    clean: './build'
};

gulp.task('main:rebuild', function () {
    gulp.src(path.src.main)
        //.pipe(gulp.dest(path.build.main))
        .pipe(reload({stream: true}));
});

gulp.task('watch', function(){
    watch([path.watch.main], function(event, cb) {
        console.log('reload');
        gulp.start('main:rebuild');
    });
});

gulp.task('clean', function (cb) {
    rimraf(path.clean, cb);
});

// ////////////////////////////////////////////////
// Browser-Sync
// // /////////////////////////////////////////////
gulp.task('bsPHP', function() {
    browserSync({
        proxy: proxy,
        port:8000
    });
});


gulp.task('default', ['watch','bsPHP']);