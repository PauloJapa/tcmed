module.exports = function (grunt) {

    grunt.initConfig({
        // Tasks que o Grunt deve executar

        /**
         * Gera documentação do js
         */
        jsdoc: {
            dist: {
                src: ['public/js/Actions.js'],
                options: {
                    destination: 'public/docs'
                }
            }
        }, //jsdoc

        /**
         * Concatena e minifica os arquivos 
         */
        uglify: {
            options: {
                mangle: false
            },
            main: {
                files: {
                    'public/js/main.min.js': [
                        'public/js/jquery.min.js',
                        'public/js/sb-admin-2.js',
//                        'public/js/Actions.js',
//                        'public/js/Modules.js',
                    ]
                }
            }
        }, // uglify

        /**
         * Processa e minifica o css
         */
        sass: {
            main: {
                options: {
                    style: 'compressed',
                },
                files: {
                    'public/css/main.css': ['public/css/main.scss']
                }
            },
        }, //sass

        /**
         * Assiste as alterações
         */
        watch: {
            js_main: {
                files: [
                    'public/js/Actions.js',
                    'public/js/Modules.js'
                ],
                tasks: ['uglify:main']
            },
            css_main: {
                files: [
                    'public/css/main.scss'
                ],
                tasks: ['sass:main'],
            },
        } // watch
    });

    //Plugins do Grunt
    grunt.loadNpmTasks('grunt-jsdoc');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');

    // Tarefas que serão executadas
    grunt.registerTask('default', ['uglify', 'sass']);

    // Tarefa para Watch
    grunt.registerTask('w', ['watch']);
};

