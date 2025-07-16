'use strict';

module.exports = function(grunt) {
    var pkg = grunt.file.readJSON('package.json');

    grunt.initConfig({
        dirs: {
            dist: 'assets/dist/',
            source: 'assets/source/',
        },

        cssmin: {
            options: {
                sourceMap: true,
                root: 'root',
            },
            target: {
                files: {
                    '<%= dirs.dist%>/css/public.min.css': [
                        '<%= dirs.source %>/css/public.css'
                    ]
                }
            }
        },

        uglify: {
            options: {
                sourceMap: true,
                mangle: false,
            },
            my_target: {
                files: {
                    '<%= dirs.dist%>js/public.min.js': [
                        '<%= dirs.source%>js/public.js'                    ]
                }
            }
        },
         watch: {
            css:{
                files: ['<%= dirs.source %>css/*.css'],
                tasks: ['cssmin']
            },
            scripts: {
                files: ['<%= dirs.source %>js/*.js'],
                tasks: ['uglify']
            }
        },

         //Generate POT file

         makepot: {
            options:{
                domainPath: '/languages',
                potFilename: 'dp-elementor-widget',
                type: 'wp-plugin'
            }
         },

         // Clean the build folder
         clean:{
            main: ['build/']
         },

         // Copy files to the build folder
         copy:{
            main:{
                src: [
                    '**',
                    '!node_modules/**',
                    '!Gruntfile.js',
                    '!package.json',
                    '!package-lock.json',
                    '!assets/source/**',
                    '!assets/dist/**',  
                    '!assets/build/**',
                    '!assets/css/**',
                    '!assets/js/**',
                    '!assets/images/**',
                    '!assets/fonts/**',
                    '!assets/vendor/**',
                    '!assets/scss/**',
                    '!assets/sass/**',
                    '!assets/less/**'
                   
                ],
                dest: 'build/',
            }
         },

         // compress the build folder
         compress: {
            options:{
                mode: 'zip',
                archive: '.build/dp-elementor-widget-v-' + pkg.version + '.zip',
            },
            expand: true,
            cwd: 'build/',
            src: ['**/*'],
            dest: 'dp-elementor-widget'
         },
    
         // Generate text domain
         addtextdomain:{
            options:{
                textdomain: 'dp-elementor-widget',
                updateDomains: ['dp-elementor-widget']
            },
            target:{
                files:{
                    src: [
                        '*.php',
                        '**/*.php',
                        '!node_modules/**',
                        '!tests/**',
                    ]
                }
            }
         }
    });



    // Load the plugins
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-compress');
    grunt.loadNpmTasks('grunt-wp-i18n');

    // Register grunt tasks
    grunt.registerTask('default', ['clean','cssmin','uglify', 'watch']);
    grunt.registerTask('release', ['makepot']);
    grunt.registerTask('textdomain', ['addtextdomain']);
    grunt.registerTask('zip', ['clean', 'cssmin', 'uglify', 'copy', 'compress']);
}