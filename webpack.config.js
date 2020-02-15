const webpack = require('webpack')
const path = require('path')

module.exports = {
    entry: [
        'react-hot-loader/patch',
        'webpack-dev-server/client?http://0.0.0.0:3001',
        'webpack/hot/only-dev-server',
        path.resolve(__dirname, 'sockets/client', 'index.jsx')
    ],
    resolve: {
        modules: [path.resolve(__dirname, 'node_modules')],
        extensions: ['*', '.js', '.jsx']
    },
    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                exclude: /node_modules/,
                use: ['babel-loader']
            }
        ],
    },
    output: {
        path: path.resolve(__dirname, 'sockets/public'),
        publicPath: '/',
        filename: 'bundle.js',
    },
    plugins: [
        new webpack.HotModuleReplacementPlugin(),
        new webpack.DefinePlugin({
            'process.env': {
                NODE_ENV: '"development"'
            }
        })
    ],
    devServer: {
        port: 3001,
        contentBase: path.resolve(__dirname, 'sockets/public'),
        hot: true,
        historyApiFallback: true,
        contentBase: __dirname + '/sockets/public',
    },
    devtool: 'source-map'
};
