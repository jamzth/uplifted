//var patt = new RegExp("/(glyphs|tgm-plugin-activation|unbox|not-wpcom|theme_updater|.scss|.DS_Store|Gruntfile.js|.git|config.)/g");

module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		sass: {
			dist: {
				files: {
					'editor-style.css' : 'assets/sass/editor-style.scss',
					'style.css' : 'assets/sass/style.scss'
				}
			}
		},

		jshint: {
			all: ['js/**/*.js', 'Gruntfile.js']
		},

		autoprefixer: {
			options: {
				// Task-specific options go here.
			},
			your_target: {
				src: '*.css'
			},
		},

		cssjanus: {
			theme: {
				options: {
					swapLtrRtlInUrl: false
				},
				files: [
					{
						src: 'style.css',
						dest: 'style-rtl.css'
					}
				]
			}
		},

		pot: {
				options:{
					text_domain: 'uplifted', //Your text domain. Produces my-text-domain.pot
					dest: 'languages/', //directory to place the pot file
					keywords: [ //WordPress localisation functions
						'__:1',
						'_e:1',
						'_x:1,2c',
						'esc_html__:1',
						'esc_html_e:1',
						'esc_html_x:1,2c',
						'esc_attr__:1',
						'esc_attr_e:1',
						'esc_attr_x:1,2c',
						'_ex:1,2c',
						'_n:1,2',
						'_nx:1,2,4c',
						'_n_noop:1,2',
						'_nx_noop:1,2,3c'
					],
				},
				files:{
					src:	[ '**/*.php' ], //Parse all php files
					expand: true,
				}
		},

		phplint: {
			options: {
				swapPath: '/.phplint'
			},
			all: ['**/*.php']
		},

		browserSync: {
				dev: {
			bsFiles: {
				src: [
					"*.css",
					"**/*.php",
					"*.js"
				]
			},
			options: {
				// proxy: "local.wordpress.dev",
				watchTask: true
			}
				}
		},

		devUpdate: {
			main: {
				options: {
					updateType: 'report', //just report outdated packages
					reportUpdated: false, //don't report up-to-date packages
					semver: true, //stay within semver when updating
					packages: {
						devDependencies: true, //only check for devDependencies
						dependencies: false
					},
					packageJson: null, //use matchdep default findup to locate package.json
					reportOnlyPkgs: [] //use updateType action on all packages
				}
			}
		},

		watch: {
			css: {
				files: '**/*.scss',
				tasks: ['sass','autoprefixer','cssjanus']
			},
			scripts: {
				files: ['js/**/*.js', 'Gruntfile.js' ],
				tasks: ['jshint'],
				options: {
					interrupt: true,
				}
			},
			pot: {
				files: [ '**/*.php' ],
				tasks: ['pot'],
			},
		}
	});

	grunt.loadNpmTasks('grunt-dev-update');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-browser-sync');
	grunt.loadNpmTasks('grunt-cssjanus');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-pot');
	grunt.registerTask('default',['watch']);
	grunt.registerTask('lint',['jshint']);
	grunt.registerTask('translate',['pot']);

};
