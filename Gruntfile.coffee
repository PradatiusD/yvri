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

		watch:
			styles:
				files: 'theme/*'
				tasks: ['sftp-deploy']
	)

	grunt.loadNpmTasks('grunt-contrib-watch')
	grunt.loadNpmTasks('grunt-sftp-deploy')
	grunt.registerTask('default', ['watch'])
	grunt.registerTask('deploy', ['sftp-deploy'])
