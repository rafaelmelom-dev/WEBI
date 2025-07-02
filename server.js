var liveServer = require("live-server");
const https = require("https");
const fs = require("fs");
const path = require("path");
const url = require("url");

var serverParams = {
    port: 5050,
    host: "arch.localdomain",
    root: ".",
    open: false,
    https: {
        cert: fs.readFileSync(__dirname + "/credentials/cert.pem"),
        key: fs.readFileSync(__dirname + "/credentials/key.pem"),
        passphrase: "1234",
    },
};

liveServer.start(serverParams);
