
var webpack = require('webpack');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var poststylus = require('poststylus');
var rucksack = require('rucksack-css');
var stylusLoader = ExtractTextPlugin.extract("style-loader", "css-loader?minimize!stylus-loader");

module.exports = {
    entry: {
        app: './app/media/js/controller.js'
    },
    output: {
        path: "./app/media/build/",
        filename: 'build.[name].js'
    },
    watch: true,
    watchOptions: {
    	aggregateTimeout: 100
    },
    module: {
        loaders: [
        {
            test: /\.styl$/,
            loader: stylusLoader
        },
        {
            test: /\.js?$/,
            exclude: /(node_modules)/,
            loader: "babel",
            query: {
                presets: ['es2015']
            }
        },
        {
            test: /\.(jpg|png|gif|woff|woff2|eot|ttf|svg|otf)$/, 
            loader: 'url-loader?limit=100000'
        }
        ]
    },
    resolve: {
        modulesDirectories: ["node_modules"],
        extensions: ["", ".js", ".css", ".styl"]
	},
    stylus: {
	  use: [
	    poststylus(rucksack({
		  autoprefixer: true
		}))
	  ]
	},
    plugins: [
        new ExtractTextPlugin("build.[name].css")
    ]
    
}