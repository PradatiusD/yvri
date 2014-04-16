module.exports = (grunt) -> 
	grunt.initConfig(
		'sftp-deploy':
			build:
				auth:
					host: '50.116.51.79'
					port: 22
					authKey: 'key1'
				src: 'theme'
				dest: 'wp-content/themes/young-voices-ri-pd'

		sass:                              # Task
			dist:                            # Target
				options:                       # Target options
					style: 'expanded'
				files:                         # Dictionary of files
					'theme/style.css': 'custom.scss',       # 'destination': 'source'


		watch:
			deploy:
				files: 'theme/*'
				tasks: ['sftp-deploy']
			styles:
				files: 'custom.scss'
				tasks: ['sass']
	)

	grunt.loadNpmTasks('grunt-contrib-sass')
	grunt.loadNpmTasks('grunt-contrib-watch')
	grunt.loadNpmTasks('grunt-sftp-deploy')
	grunt.registerTask('default', ['watch'])
	grunt.registerTask('deploy', ['sftp-deploy'])
