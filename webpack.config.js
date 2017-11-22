const path = require('path');
const ExtractTextPlugin = require("extract-text-webpack-plugin");

const extractSass = new ExtractTextPlugin({
  filename: "css/main.css",
  disable: process.env.NODE_ENV === "development"
});

module.exports = {
  entry: './lu-theme/src/js/main.js',

  output: {
    path: path.resolve(__dirname, 'lu-theme/assets'),
    filename: './js/bundle.js',
    publicPath: 'lu-theme/assets'
  },

  devtool: "inline-source-map",

  // devServer: {
  //     contentBase: path.join(__dirname),
  //     compress: true,
  //     port: 9000,
  //     hot: true,
  //     inline: true,
  //     proxy: [{
  //       context: ['/wp-content', '/wp-includes', '/wp-admin', '/comicneue'],
  //       changeOrigin: true,
  //       target: 'http://localhost',
  //     }]
  //   },

  module: {
    rules: [
        {
          test: /\.js$/,
          exclude: /(node_modules|bower_components)/,
          use: {
              loader: 'babel-loader',
              options: {
              presets: ['env']
              }
          }
        },

        {
          test: /\.(png|jpg|gif)$/,
          use: [
              {
                  loader: 'file-loader',
                  options: {
                      name: '[name].[ext]',
                      outputPath: 'img/',
                      // publicPath: 'assets/img'
                  }
              }
          ]
        },

        {
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
        }
    ],
  },
  plugins: [
      extractSass,
  ],
}