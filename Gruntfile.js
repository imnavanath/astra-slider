module.exports = function (grunt) {
    grunt.initConfig({
        copy: {
            main: {
                options: {
                    mode: true
                },
                src: [
                    '**',
                    '*.zip',
                    '!node_modules/**',
                    '!build/**',
                    '!css/sourcemap/**',
                    '!.git/**',
                    '!bin/**',
                    '!.gitlab-ci.yml',
                    '!bin/**',
                    '!tests/**',
                    '!phpunit.xml.dist',
                    '!*.sh',
                    '!*.map',
                    '!Gruntfile.js',
                    '!package.json',
                    '!.gitignore',
                    '!phpunit.xml',
                    '!README.md',
                    '!sass/**',
                    '!codesniffer.ruleset.xml',
                    '!vendor/**',
                    '!composer.json',
                    '!composer.lock',
                    '!package-lock.json',
                    '!phpcs.xml.dist',
                ],
                dest: 'astra-slider/'
            }
        },

        compress: {
            main: {
                options: {
                    archive: 'astra-slider.zip',
                    mode: 'zip'
                },
                files: [
                    {
                        src: [
                            './astra-slider/**'
                        ]

                    }
                ]
            }
        },

        clean: {
            main: ["astra-slider"],
            zip: ["astra-slider.zip"],
        },

        makepot: {
            target: {
                options: {
                    domainPath: '/',
                    mainFile: 'astra-slider.php',
                    potFilename: 'languages/astra-slider.pot',
                    potHeaders: {
                        poedit: true,
                        'x-poedit-keywordslist': true
                    },
                    type: 'wp-plugin',
                    updateTimestamp: true
                }
            }
        },

        wp_readme_to_markdown: {
			your_target: {
				files: {
					"README.md": "readme.txt"
				}
			},
		},
        
        addtextdomain: {
            options: {
                textdomain: 'astra-slider',
            },
            target: {
                files: {
                    src: ['*.php', '**/*.php', '!node_modules/**', '!php-tests/**', '!bin/**', '!asset/bsf-core/**']
                }
            }
        },
    });

    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-compress');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-wp-i18n');

    /* Read File Generation task */
    grunt.loadNpmTasks("grunt-wp-readme-to-markdown");

    // Generate Read me file
	grunt.registerTask( "readme", ["wp_readme_to_markdown"] );

    grunt.registerTask('i18n', ['addtextdomain', 'makepot']);
    grunt.registerTask('release', ['clean:zip', 'copy', 'compress', 'clean:main']);
    
};