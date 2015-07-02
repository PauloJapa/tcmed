module.exports = function (grunt) {

    grunt.initConfig({
        // Tasks que o Grunt deve executar
        jsdoc: {
            dist: {
                src: ['public/js/Actions.js'],
                options: {
                    destination: 'public/docs'
                }
            }
        }, //jsdoc

        uglify: {
            options: {
                mangle: false
            },
            my_target: {
                files: {
                    'public/js/main.min.js': [
                        'public/js/Actions.js',
                        'public/js/Modules.js',
                        'public/js/Events.js'
                    ]
                }
            }
        }, // uglify

        sass: {// Task 
            dist: {// Target 
                options: {
                    style: 'compressed'
                },
                files: {// Dictionary of files 
                    'public/css/main.css': ['public/css/main.scss'] // 'destination': 'source' 
                }
            }
        }, //sass

        cssmin: {
            options: {
                shorthandCompacting: false,
                roundingPrecision: -1
            },
            target: {
                files: [{
                        expand: true,
                        cwd: 'public/css',
                        src: [
                            'pagination.css', 
                            'bootstrap-datepicker3.standalone.css'
                        ],
                        dest: 'public/css',
                        ext: '.min.css'
                    }]
            }
        }, //cssmin

        concat: {
            css: {
                //Concatenate all of the files in the cssResources configuration property
                src: [
                    'public/css/bootstrap.min.css',
                    'public/css/font-awesome.min.css',
                    'public/css/metisMenu.min.css',
                    'public/css/sb-admin-2.min.css',
                    'public/css/mycss.min.css',
                    'public/css/bootstrap-datepicker3.standalone.min.css',
                    'public/css/main.css'
                ],
                dest: 'public/css/styles.css'
            }
        }, //concat

        imagemin: {
            dist: {
                options: {
                    optimizationLevel: 3
                },
                files: [
                    {
                        expand: true,
                        cwd: 'dev/',
                        src: ['public/img/*.png', 'public/img/*.jpg', 'public/img/*.jpeg', 'public/img/*.gif'],
                        dest: 'public/img'
                    }
                ]
            }
        }, //Imagemin

        watch: {
            dist: {
                files: [
                    'public/js/Actions.js',
                    'public/js/Modules.js',
                    'public/js/Events.js',
                    'gruntfile.js',
                    'sb-admin-2.js'
                ],
                tasks: ['jsdoc', 'uglify', 'sass', 'concat']
            }
        } // watch
    });

    //Plugins do Grunt
    grunt.loadNpmTasks('grunt-jsdoc');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    // Tarefas que serão executadas
    grunt.registerTask('default', ['jsdoc', 'uglify', 'sass', 'cssmin', 'concat']);

    // Tarefa para Watch
    grunt.registerTask('w', ['watch']);
};

