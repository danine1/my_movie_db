// load gulp
var gulp = require('gulp');

// load sass
var sass = require('gulp-sass');

// specify the 'csscompile' task
gulp.task('csscompile', function() {
    gulp.src('sass/**/*.scss') // use these files as the source for compilation
        .pipe(sass().on('error', sass.logError)) // compile sass to css and also tell us about a problem if happens
        .pipe(gulp.dest('./css/')); // write resulting css in the following destination
});

// specify the 'default' task
gulp.task(
    // name of the task (task named default is ran by default)
    'default',
    // the second parameter is a function that contains everything that the task will do
    function() {
        gulp.watch('sass/**/*.scss', ['csscompile']); // watch for changes in scss and if they change, run 'csscompile' task
    }
);