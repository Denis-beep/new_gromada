const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin')

module.exports = {
    mode: 'production',
    entry: {
        app: "./js/app.js",
    },
    output: {
        filename: '[name].min.js',
        path: path.resolve(__dirname, './js/'),
    },
    devServer: {
        port: 8081,
        contentBase: './dist',
        writeToDisk: true,
        disableHostCheck: true
    },
    devtool: 'source-map',
    watch: true,
    module: {
        rules: [
            {
                test: /\.(sa|sc|c)ss$/,
                use: [
                    {loader: MiniCssExtractPlugin.loader},
                    'css-loader?url=false',
                    'sass-loader',
                ],
            },
            {
                test: /\.(js)$/,
                exclude: /node_modules/,
                use: ['babel-loader'],
            }
        ],
    },
    plugins: []
};