var path = require( 'path' );
var ExtractTextPlugin = require( 'extract-text-webpack-plugin' );
var BrowserSyncPlugin = require( 'browser-sync-webpack-plugin' );

var extractSass = new ExtractTextPlugin({
  filename: 'css/main.css'
});

module.exports = {
  context: __dirname,
  entry: './docker-4wordpress-theme/src/js/main.js',
  devtool: 'inline-source-map',
  output: {
    path: path.resolve( __dirname, 'docker-4wordpress-theme/assets' ),
    filename: './js/bundle.js',
    publicPath: 'docker-4wordpress-theme/assets'
  },
  resolve: {
    extensions: [ '.js', '.jsx', '.json' ]
  },
  stats: {
    colors: true,
    reasons: true,
    chunks: true
  },
  module: {
    rules: [
      {
        enforce: 'pre',
        test: /\.js?$/,
        loader: 'eslint-loader',
        exclude: /(node_modules|bower_components)/
      },
      {
        test: /\.js?$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: [ '@babel/preset-env' ]
          }
        }
      },
      {
        test: /\.(png|jpg|gif|svg)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[name].[ext]',
              outputPath: 'img/'
            }
          }
        ]
      },

      {
        test: /\.scss$/,
        use: extractSass.extract({
          use: [
            {
              loader: 'css-loader',
              options: { sourceMap: true }
            },

            {
              loader: 'postcss-loader',
              options: {
                sourceMap: true
              }
            },

            {
              loader: 'sass-loader',
              options: {
                sourceMap: true
              }
            }
          ],

          // use style-loader in development
          fallback: 'style-loader'
        })
      }
    ]
  },
  plugins: [
    extractSass,
    new BrowserSyncPlugin({

      // browse to http://localhost:3000/ during development,
      // ./public directory is being served
      host: 'localhost',
      port: 3000,
      proxy: 'http://localhost/'
    })
  ]
};
