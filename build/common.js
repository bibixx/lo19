/* eslint-disable import/no-commonjs, import/no-extraneous-dependencies */
const path = require( "path" );
const webpack = require( "webpack" );
const UglifyJSPlugin = require( "uglifyjs-webpack-plugin" );

const iP = process.env.NODE_ENV === "production";

module.exports = {
  iP,
  config: {
    entry: [
      "./src/index.js",
    ],

    output: {
      path: path.join( __dirname, "../dist/lo19.pl/templates/lo19waw" ),
      // path: "/Applications/MAMP/htdocs/templates/lo19waw",
      filename: "./js/script.js",
    },

    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: [ "env" ],
          },
        },
      },
    ],

    plugins: [
      new UglifyJSPlugin(),
      new webpack.DefinePlugin( {
        "process.env.NODE_ENV": JSON.stringify( process.env.NODE_ENV || "development" ),
      } ),
    ],
  },
};
