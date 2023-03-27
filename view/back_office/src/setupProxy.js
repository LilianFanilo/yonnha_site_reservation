const { createProxyMiddleware } = require("http-proxy-middleware");

module.exports = function (app) {
  app.use(
    "/api",
    createProxyMiddleware({
      target: "http://localhost/yonnha_site_reservation",
      changeOrigin: true,
    })
  );
};
