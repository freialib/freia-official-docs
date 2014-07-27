module.exports = function (grunt) {

	var path = require('path');

	grunt.initConfig({

		clean: {
			purge: [
				'staging/temp',
				'staging/web'
			],
			postcompile: [
				'staging/temp'
			]
		},

		copy: {
			license: {
				src: 'sources/license.txt',
				dest: 'staging/license.txt'
			},
			favicon: {
				src: 'sources/favicon.ico',
				dest: 'staging/favicon.ico'
			},
			web: {
				expand: true,
				cwd: 'sources/web/',
				src: '**/*',
				dest: 'staging/web/'
			}
		},

		rename: {
			fontello_css: {
				src: 'staging/web/scss/vendor/fontello/css/fontello.css',
				dest: 'staging/web/scss/vendor/fontello/css/fontello.scss'
			}
		},

		browserify: {
			main: {
				files: {
					'staging/web/main.js': ['sources/web/javascript/main.js'],
				}
			}
		},

		uglify: {
			options: {
				mangle: false,
				beautify: false,
				preserveComments: true
			},
			main: {
				src: [ 'staging/temp/polyfills.js', 'staging/temp/main.js' ],
				dest: 'staging/web/main.min.js'
			}
		},

		exec: {
			compile_docs: {
				command: 'php sources/index.php > staging/index.html',
				stdout: true,
				stderr: true
			},
			sass: {
				command: [
					'sass -C -f --sourcemap',
					'--update staging/web/scss/main.scss:staging/web/main.css',
					'--style expanded',
					'-E utf-8'
				].join(' '),
				stdout: true,
				stderr: true
			},
			sass_critical: {
				command: [
					'sass -C -f',
					'--update staging/web/scss/main.critical.scss:staging/web/main.critical.css',
					'--style compressed',
					'-E utf-8'
				].join(' '),
				stdout: true,
				stderr: true
			},
			sass_debug: {
				command: [
					'sass -C -f --sourcemap',
					'--update staging/web/scss/main.debug.scss:staging/web/main.debug.css',
					'--style expanded',
					'-E utf-8'
				].join(' '),
				stdout: true,
				stderr: true
			}
		},

		autoprefixer: {
			main: {
				options: {
					browsers: ['last 2 version', 'ie 8', 'ie 9'],
					map: true,
					diff: true
				},
				files: [{
					src: 'staging/web/main.css',
					dest: 'staging/web/main.css'
				}]
			},
			main_critical: {
				options: {
					browsers: ['last 2 version', 'ie 8', 'ie 9'],
					map: false,
					diff: true
				},
				files: [{
					src: 'staging/web/main.critical.css',
					dest: 'staging/web/main.critical.css'
				}]
			}
		},

		imagemin: {
			options: {
				optimizationLevel: 3
			},
			main: {
				files: [{
					expand: true,
					cwd: 'staging/web/images',
					src: [ '**/*.{png,jpg,jpeg,gif}' ],
					dest: 'staging/web/images'
				}]
			},
		},

		watch: {
			the_docs: {
				files: [
					'sources/*',
					'sources/**/*',
					'documentation/*',
					'documentation/**/*'
				],
				tasks: [ 'default' ]
			}
		},

	});

	// Task Definition
	// ---------------

	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-browserify');
	grunt.loadNpmTasks('grunt-rename');
	grunt.loadNpmTasks('grunt-exec');

	grunt.registerTask(
		'default',
		[
			'clean:purge',

			// copy required files
			'copy:license',
			'copy:favicon',
			'copy:web',
			'rename:fontello_css',

			// compile
			'exec:sass',
			'exec:sass_critical',
			'exec:sass_debug',
			'exec:compile_docs',
			'browserify:main',

			// optimize
			'autoprefixer:main',
			'autoprefixer:main_critical',
			'imagemin:main',

			// remove temps
			'clean:postcompile'
		]
	);

	grunt.registerTask(
		'monitor',
		[
			'default',
			'watch'
		]
	);

};
