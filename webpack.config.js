/**
 * WordPress dependencies
 */
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

/**
 * Local dependencies
 */
const path = require( 'path' );

module.exports = [
	{
		...defaultConfig,
		entry: {
			style: path.resolve( process.cwd(), 'src/scss', 'index.scss' ),
			'editor-style': path.resolve( process.cwd(), 'src/scss', 'editor.scss' ),
		},
		output: {
			path: path.resolve( process.cwd(), 'build' ),
		},
	},
];
