const webpack = require('webpack')
const path = require('path')

module.exports = {
  entry: {
    theme: [
      './theme/src/js/theme.js'
    ]
  },
  output: {
    path: path.join(__dirname, 'theme/assets'),
    filename: 'js/[name].js'
  },
  devtool: 'inline-source-map',
  resolve: {
    extensions: ['es6', '.js', 'es', 'jsx', '.ts', '.tsx']
  },
  module: {
    rules: [ {
      test: /\.ts(x?)$/,
      include: path.resolve(__dirname, "theme/src/js"),
      exclude: /(node_modules|bower_components)/,
      use: [
        {
          loader: 'babel-loader',
          options: { cacheDirectory: true }
        },
        {
          loader: 'ts-loader'
        }
      ]
    }, {
      test: /\.(js|jsx|es|es6)$/,
      include: path.resolve(__dirname, "theme/src/js"),
      exclude: /(node_modules|bower_components)/,
      use: {
        loader: 'babel-loader',
        options: { cacheDirectory: true }
      }
    } ]
  }
}
