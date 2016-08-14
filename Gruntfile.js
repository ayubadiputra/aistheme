module.exports = function (grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    sass: {
      dist: {
        options: {
          style: 'expanded',
          cacheLocation: 'assets/sass/.cache-location',
        },
        files: [{
          'assets/css/ais-front-end.css': 'assets/sass/ais-front-end.scss',
          'assets/css/ais-admin.css': 'assets/sass/ais-admin.scss',
          'assets/css/color-themes/ais-blue.css': 'assets/sass/color-themes/ais-blue.scss',
          'assets/css/color-themes/ais-black.css': 'assets/sass/color-themes/ais-black.scss',
          'assets/css/color-themes/ais-green.css': 'assets/sass/color-themes/ais-green.scss',
          'assets/css/color-themes/ais-red.css': 'assets/sass/color-themes/ais-red.scss',
          'assets/css/color-themes/ais-yellow.css': 'assets/sass/color-themes/ais-yellow.scss',
        }],
      },
    },

    autoprefixer:{
      dist: {
        files: {
          'assets/css/ais-front-end.css': 'assets/css/ais-front-end.css',
          'assets/css/color-themes/ais-blue.css': 'assets/css/color-themes/ais-blue.css',
          'assets/css/color-themes/ais-black.css': 'assets/css/color-themes/ais-black.css',
          'assets/css/color-themes/ais-red.css': 'assets/css/color-themes/ais-red.css',
          'assets/css/color-themes/ais-green.css': 'assets/css/color-themes/ais-green.css',
          'assets/css/color-themes/ais-yellow.css': 'assets/css/color-themes/ais-yellow.css',
        },
      },
    },

    watch: {
      options: {
        livereload: false,
      },
      scripts: {
        files: ['assets/**/*.js'],
        tasks: ['jshint'],
      },
      css: {
        files: 'assets/**/*.scss',
        tasks: ['sass', 'autoprefixer'],
      },
    },

    jshint: {
      all: ['Gruntfile.js', 'assets/js/aisthemes.js'],
    },
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-autoprefixer');

  grunt.registerTask('default', ['watch']);
  grunt.registerTask('css', ['sass', 'autoprefixer']);
};