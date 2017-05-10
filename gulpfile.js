var project       = 'newxtnews',
    gulp          = require('gulp'),
    browserSync   = require('browser-sync'),
    gulp          = require('gulp'),
    zip           = require('gulp-zip'),
    ignore        = require('gulp-ignore'),
    rimraf        = require('gulp-rimraf'),
    runSequence   = require('gulp-run-sequence'),
    buildInclude 	= [
                  		// include common file types
                  		'**/*.php',
                  		'**/*.html',
                  		'**/*.css',
                  		'**/*.js',
                  		'**/*.svg',
                  		'**/*.ttf',
                  		'**/*.otf',
                  		'**/*.eot',
                  		'**/*.woff',
                  		'**/*.woff2',

                  		// include specific files and folders
                  		'screenshot.png',

                  		// exclude files and folders
                      '!git/**/*',
                  		'!node_modules/**/*',
                  		'!assets/bower_components/**/*',
                  		'!style.css.map',
                  		'!assets/js/custom/*',
                  		'!assets/css/patrials/*'

                  	];

gulp.task('browser-sync', function(){
  var files = [
    './style.css',
    './*.php',
    './*.css',
    './*.js',
    './*.svg',
    './*.ttf',
    './*.otf',
    './*.eot',
    './*.woff',
    './*.woff2',
  ];

  browserSync.init(files, {
    proxy: "http://localhost:8888/"
  });
});




gulp.task('clear', function () {
   cache.clearAll();
 });

 gulp.task('cleanup', function() {
 	return 	gulp.src(['**/.DS_Store'], { read: false }) // much faster
 		.pipe(ignore('node_modules/**')) //Example of a directory to ignore
 		.pipe(rimraf({ force: true }))
 		// .pipe(notify({ message: 'Clean task complete', onLast: true }));
 });
 gulp.task('cleanupFinal', function() {
 	return 	gulp.src(['**/.DS_Store'], { read: false }) // much faster
 		.pipe(ignore('node_modules/**')) //Example of a directory to ignore
 		.pipe(rimraf({ force: true }))
 		// .pipe(notify({ message: 'Clean task complete', onLast: true }));
 });

 gulp.task('buildZip', function () {
 	// return 	gulp.src([build+'/**/', './.jshintrc','./.bowerrc','./.gitignore' ])
 	return 	gulp.src('../'+project+'/**/')
    .pipe(ignore('node_modules/**'))
    .pipe(ignore('node_modules'))
    .pipe(ignore('package.json'))
    .pipe(ignore('gulpfile.js'))
		.pipe(zip(project+'.zip'))
		.pipe(gulp.dest('../../../../WordPress_New_TF/2017Themes/'+project+'_files/'+project));
 });

 // Package Distributable Theme
 gulp.task('zip', function(cb) {
 	runSequence('cleanup', 'buildZip','cleanupFinal', cb);
 });


gulp.task('default', ['browser-sync']);
