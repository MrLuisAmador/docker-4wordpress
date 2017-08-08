const path = require('path');
const ExtractTextPlugin = require("extract-text-webpack-plugin");

const extractSass = new ExtractTextPlugin({
    filename: "css/main.css",
    disable: process.env.NODE_ENV === "development"
});

module.exports = {
    entry: './src/js/main.js',

    output: {
        path: path.resolve(__dirname, 'assets'),
        filename: './js/bundle.js',
        publicPath: 'assets'
    },

    devtool: "inline-source-map",

    module: {
        rules: [{

             test: /\.js$/,
      exclude: /(node_modules|bower_components)/,
      use: {
        loader: 'babel-loader',
        options: {
          presets: ['env']
        }
      },
        test: /\.scss$/,
        use: extractSass.extract({
                use: [{
                    loader: "css-loader", options: {sourceMap: true}
                }, 
                {
                    loader: "postcss-loader", options: {sourceMap: true}
                },   
                {
                    loader: "sass-loader", options: {sourceMap: true}
                }],
                // use style-loader in development
                fallback: "style-loader"
            })
        }]
    },
    plugins: [
        extractSass
    ]
}