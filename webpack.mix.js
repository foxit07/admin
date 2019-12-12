const  mix  = require("laravel-mix");
require("laravel-mix-merge-manifest");

if (mix.inProduction()) {
    mix.version();
}

let publicPath = "resources/publishable/assets";

mix.combine([
    './node_modules/startbootstrap-sb-admin-2/vendor/jquery/jquery.js',
    './node_modules/popper.js/dist/umd/popper.js',
    './node_modules/startbootstrap-sb-admin-2/vendor/bootstrap/js/bootstrap.js',
    './node_modules/startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing.js',
], publicPath + "/js/app.js")
    .js('./node_modules/startbootstrap-sb-admin-2/js/sb-admin-2.js',  publicPath + "/js/admin.js")
    .js('./node_modules/bootstrap-table/src/bootstrap-table.js', publicPath + "/js/bootstrap-table.js")
    .js('./node_modules/bootstrap-table-mobile/bootstrap-table-mobile.js', publicPath + "/js/bootstrap-table-mobile.js")
    .sass("./node_modules/startbootstrap-sb-admin-2/scss/sb-admin-2.scss", publicPath + "/css/admin.css")
    .sass("./node_modules/bootstrap-table/src/bootstrap-table.scss", publicPath + "/css/bootstrap-table.css")
    .styles("./node_modules/startbootstrap-sb-admin-2/vendor/fontawesome-free/css/all.css", publicPath + "/css/fontawesome-free.css")
    .options({
        processCssUrls: false
    })
    .extract()
    .sourceMaps()
    .copyDirectory(
         "./node_modules/startbootstrap-sb-admin-2/img",
        publicPath + "/img"
    )
    .copyDirectory(
        "./node_modules/startbootstrap-sb-admin-2/vendor/fontawesome-free/webfonts",
        publicPath + "/webfonts"
    )
    .disableNotifications()
    .setPublicPath(publicPath).mergeManifest();





