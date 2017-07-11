
const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
    entry: './src/js/main.js',
    output: {
        path: path.resolve(__dirname, 'assets'),
        filename: './js/bundle.js',
        publicPath: 'assets'
    },
    
    module: {
        rules: [{
            test: /\.css$/,
            use: ExtractTextPlugin.extract({
               use: [
                    { loader: 'css-loader', options: { importLoaders: 1 } },
                    'postcss-loader'
                ]
            })
        }]
    },

    plugins: [
        new ExtractTextPlugin('./css/main.css'),
    ]
}